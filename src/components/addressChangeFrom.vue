<template>
<div class="modal fade" id="addressChangeForm" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form5" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">Сменить адрес</h2>
        <div class="row">
          <div class="card-body">
          <center>
            <p class="card-description">
              Вам не нравиться адрес вашей страницы, и вы хотите его сменить? В поле ниже вы можете подобрать новое имя!
            </p>  
            <div class="input-group form-group label-floating has-success">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="material-icons" style="margin-left: -15px;">face</i>
                </span>
              </div>
              <input v-model="nameRegistration" v-on:input="nameRegistrationCheck" type="text" class="form-control" placeholder="Имя (my-entry.ru\имя)">
              <button v-show="nameRegistrationOk" class="form-control-feedback">
                <i class="material-icons" style="margin-top: 28px;">done</i>
              </button>  
              <button v-show="!nameRegistrationOk" class="form-control-feedback" data-toggle="tooltip" data-placement="right" title="Имя страницы должно быть уникальным, начинаться с латинской буквы и может содержать только латинские буквы и цифры.">
                <i class="material-icons" style="margin-top: 28px;">clear</i>
              </button>  
            </div>
            <br>
            <div v-show="nameRegistrationOk">Адрес вашей страницы будет:<br><b>http://my-entry.ru/{{ nameRegistration }}</b></div>
            <br>
            <button v-show="nameRegistrationOk" @click="changeLoginNameFormSave()" type="button" class="btn btn-primary btn-round" data-toggle="modal">Сохранить</button>
            <button v-show="!nameRegistrationOk" type="button" class="btn btn-primary btn-round" data-toggle="modal" disabled>Сохранить</button>
            <br>
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
  name: 'addressChangeFrom',
  data () {
    return {
      nameRegistration: '',
      nameRegistrationOk: false
     }
  },
  methods: {
    changeLoginNameFormSave: function(){
      axios
      .get('public/my_entry.php?action=changeLoginNameFormSave&name=' + this.nameRegistration)
      .then(() => {
        $("#addressChangeForm").modal('hide');
        this.nameRegistration = '';
        this.nameRegistrationOk = false;
        eventEmitter.$emit('showMessage', 'Адрес вашей страницы изменен. Не забудьте поменять его в ваших социальных сетях и рекламных материалах!');
      });
    },
    nameRegistrationCheck() {
      if (/^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$/.test(this.nameRegistration)){
        axios
        .get('public/my_entry.php?action=nameRegistrationCheck&name=' + this.nameRegistration)
        .then(response => {
          if (response.data == true) {
            this.nameRegistrationOk = false;
          }
        });
        this.nameRegistrationOk = true;
      } else {
        this.nameRegistrationOk = false;
      }
      this.checkRegistrationForm();
    }
  },
  created(){
    eventEmitter.$on('showAddressChangeFrom', () => {
      $("#addressChangeForm").modal('show');

    })
  },
}
</script>

<style lang="sass" scoped>
.form-control-feedback
  margin-top: -28px
</style>


