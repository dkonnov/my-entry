<template>
<div class="modal fade" id="serviceForm" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form5" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">{{ WindowName }}</h2>
          <div class="row">
          <div class="card-body">
          <form>
          <div class="form-group">
              <label>Название услуги</label>
              <input type="text" v-model="name" @input="addServiceFormNameCheck" class="form-control">
              <small id="emailHelp" class="form-text text-muted">Обязательное поле</small>
          </div>
          <div class="form-group">
              <label>Описание услуги</label>
              <textarea class="form-control" v-model="description" rows="4" placeholder=""></textarea>
              <small id="emailHelp" class="form-text text-muted">Опишите подробности оказываемой услуги</small>
          </div>
          <div class="form-group">
              <label>Стоимость</label>
              <input type="text" v-model="price" class="form-control">
          </div>
          <div class="form-group">
              <label>Время оказания услуги</label>
              <input type="text" id="timeServiseForm" class="form-control datetimepicker">
              <small id="emailHelp" class="form-text text-muted">Данное поле необходимо для записи через интерент на ваши услуги. Если оно заполнено, то функция записи через интернет включена. Так же необходимо заполнить ваш режим работы.</small>
          </div>
        </form>
        <br>
        <center>
          <button :disabled="!formOk" type="submit" class="btn btn-primary btn-round" @click="addServiceFormSave">{{ WindowButton }}</button>
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
import {http} from "./../http"
import {eventEmitter} from "./../main"

export default {
  name: 'aboutUserForm',
  data () {
    return {
      description: '',
      WindowName: '',
      WindowButton: '',
      name: '',
      price: '',
      userSeviceId: '',
      formOk: false,
      time: ''
    }
  },
  methods:{
    addServiceFormNameCheck: function(){
      if (this.name) {this.formOk = true} else {this.formOk = false}
    },
    addServiceFormSave: function(){
       http.get('addServiceFormSave', {
        params:{
          id_service: this.userSeviceId,
          name: this.name,
          description: this.description,
          price: this.price,
          time: document.getElementById('timeServiseForm').value
        }
      })
      .then(response => {
        eventEmitter.$emit('reloadMainCard');
        $("#serviceForm").modal('hide');
        this.name = '';
        this.description = '';
        this.price = '';
        this.time = '';
      }); 
    }
   },
  mounted(){
    var piker = $('.datetimepicker').datetimepicker({
      format: 'LT',
      locale: 'ru',
      stepping: 15,
      showClose: true,
      toolbarPlacement: 'bottom',
      enabledHours: [0, 1, 2, 3],
      icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-check'
        }
    });
  },
  created() {
    eventEmitter.$on('deleteService', (value) => {
      http.get('deleteService', {
        params:{
          id_service: value
        }
      })
      .then(response => {
        if (response.data){
          eventEmitter.$emit('showMessage', 'Услуга удалена!');
          eventEmitter.$emit('reloadMainCard');
        }
      });
    });
    eventEmitter.$on('showServiceForm', (value) => {
      
      if (value){
        this.WindowName = "Услуга";
        this.WindowButton = "Сохранить";
        http.get('getService', {
          params:{
            id_service: value
          }
        })
        .then(response => {
          document.getElementById('timeServiseForm').value = response.data.time;
          this.name = response.data.name;
          this.description = response.data.description;
          this.price = response.data.price;
          this.userSeviceId = value;
          this.formOk = true;
          });
      } else {
        document.getElementById('timeServiseForm').value = '00:00';
        this.WindowName = "Новая услуга";
        this.WindowButton = "Добавить";
        this.userSeviceId = '';
        this.formOk = false;
        this.name = '';
        this.description = '';
        this.price = '';
      }
      $("#serviceForm").modal('show');
    });
  }
}
</script>

