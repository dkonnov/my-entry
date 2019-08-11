<template>
<div class="modal fade" id="aboutUserForm" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form5" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">О себе</h2>
          <div class="row">
          <div class="card-body">
            <form>

            <div class="form-group">
              <label>Имя</label>
              <input type="text" v-model="userInfoName" class="form-control" aria-describedby="userInfoName" placeholder="Отображаемое имя ...">
            </div>

            <div class="form-group">
              <label>Специализация</label>
              <input type="text" v-model="userInfoSpecialization" class="form-control" aria-describedby="userInfoNameSpecialization" placeholder="Чем вы занимаетесь...">
              <small id="emailHelp" class="form-text text-muted">Ваша професиия или специализация. Например, "Web дизайнер", "Мастер депиляции", "Маркетолог".</small>
            </div>
  
            <div class="form-group">
              <label>О себе</label>
              <textarea class="form-control" v-model="userInfoAbout" rows="5" placeholder="Опишите чем вы занимаетесь, что предлагаете ..."></textarea>
            </div>

            <center>
              <button type="submit" class="btn btn-primary btn-round" @click="showUserInfoSave()">Сохранить</button>
              <a href="#pablo" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
            </center>
            
            </form>
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
      userInfoName: '',
      userInfoSpecialization: '',
      userInfoAbout: ''
    }
  },
  methods:{
    showUserInfoSave() {
      axios
      .get('public/my_entry.php?action=showUserInfoSave&userInfoName=' + this.userInfoName + '&userInfoSpecialization=' + this.userInfoSpecialization + '&userInfoAbout=' + this.userInfoAbout)
      .then(() => {
        eventEmitter.$emit('reloadMainCard');
        $("#aboutUserForm").modal('hide');
      });
    },
  },
  created() {
    eventEmitter.$on('showAboutUserForm', () => {
      axios
      .get('public/my_entry.php?action=showUserInfo')
      .then(response => {
        this.userInfoName = response.data.userInfoName;
        this.userInfoSpecialization = response.data.userInfoSpecialization;
        this.userInfoAbout = response.data.userInfoAbout;
        $("#aboutUserForm").modal('show');
      });
    })
  }
}
</script>

