<template>
<div class="modal fade" id="serviceForm" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form5" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">{{ addServiceWindowName }}</h2>
          <div class="row">
          <div class="card-body">
          <form>
          <div class="form-group">
              <label>Название услуги</label>
              <input type="text" v-model="addServiceFormName" @input="addServiceFormNameCheck" class="form-control">
              <small id="emailHelp" class="form-text text-muted">Обязательное поле</small>
          </div>
          <div class="form-group">
              <label>Описание услуги</label>
              <textarea class="form-control" v-model="addServiceFormDescription" rows="4" placeholder=""></textarea>
              <small id="emailHelp" class="form-text text-muted">Опишите подробности оказываемой услуги</small>
          </div>
          <div class="form-group">
              <label>Стоимость</label>
              <input type="text" v-model="addServiceFormPrice" class="form-control">
          </div>
        </form>
        <br>
        <center>
          <button v-show="addServiceFormOk" type="submit" class="btn btn-primary btn-round" @click="addServiceFormSave()">{{ addServiceWindowButton }}</button>
          <button v-show="!addServiceFormOk" type="submit" class="btn btn-primary btn-round" disabled>{{ addServiceWindowButton }}</button>
          <a href="#" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
        </center>
        
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</template>

<script>
import axios from 'axios'
import {eventEmitter} from "./../main"

export default {
  name: 'aboutUserForm',
  data () {
    return {
      addServiceWindowName: '',
      addServiceWindowButton: '',
      addServiceFormName: '',
      addServiceFormPrice: '',
      userSeviceId: ''
    }
  },
  methods:{
    addServiceFormNameCheck: function(){
      if (this.addServiceFormName) {this.addServiceFormOk = true} else {this.addServiceFormOk = false}
    },
    addServiceFormSave: function(){
      axios
      .get('public/my_entry.php?action=addServiceFormSave&id_service=' + this.userSeviceId + '&name=' + this.addServiceFormName + '&description=' + this.addServiceFormDescription + '&price=' + this.addServiceFormPrice)
      .then(response => {
        eventEmitter.$emit('reloadMainCard');
        $("#serviceForm").modal('hide');
        this.addServiceFormName = '';
        this.addServiceFormDescription = '';
        this.addServiceFormPrice = '';
      });
    },
   },
  created() {
    eventEmitter.$on('showServiceForm', (value) => {
      if (value){
        this.addServiceWindowName = "Услуга";
        this.addServiceWindowButton = "Сохранить";
        axios
          .get('public/my_entry.php?action=getService&id_service=' + value)
          .then(response => {
            this.addServiceFormName = response.data.name;
            this.addServiceFormDescription = response.data.description;
            this.addServiceFormPrice = response.data.price;
            this.userSeviceId = value;
            this.addServiceFormOk = true;
          });
      } else {
        this.addServiceWindowName = "Новая услуга";
        this.addServiceWindowButton = "Добавить";
        this.userSeviceId = '';
        this.addServiceFormOk = false;
        this.addServiceFormName = '';
        this.addServiceFormDescription = '';
        this.addServiceFormPrice = '';
      }
      $("#serviceForm").modal('show');
    })
  }
}
</script>

