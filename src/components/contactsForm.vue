<template>
<div class="modal fade" id="contactsForm" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form4" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">Соцсети</h2>
          
          <div class="card-body">
          <form class="form" @submit.prevent="save">
          <div class="row">
          
            <div class="col-md-6">
              
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text  userInfoSocial">
                    <i class="fab fab fa-instagram"></i>     
                  </span>
                </div>
                <input v-model="instagram" type="text" class="form-control" placeholder="Профиль Instagram ...">
              </div>
              <div style="margin-top:-10px; margin-left:30px">
                <small id="emailHelp" class="form-text text-muted">Введите имя профиля Instagram без использования символа "@".</small>
              </div>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text userInfoSocial">
                    <i class="fab fab fa-whatsapp"></i>     
                  </span>
                </div>
                <input v-model="whatsApp" type="text" class="form-control" placeholder="Номер телефона для WhatsApp ...">
              </div>
            
              <div class="input-group" style="margin-top: 0px;">
                 <div class="input-group-prepend">
                  <span class="input-group-text userInfoSocial">
                    <i class="fab fab fa-whatsapp wa-white"></i>     
                  </span>
                </div>
                <textarea class="form-control" v-model="whatsAppText" rows="3" placeholder="Приветствие для WhatsApp ..."></textarea>
              </div>
              <div style="margin-top:-10px; margin-left:30px">
                <small id="emailHelp" class="form-text text-muted">Например, «Привет! Меня заинтересовал Ваш товар.»</small>
              </div>
            
            </div>
    
            <div class="col-md-6">

            <div class="input-group" :class="{'has-danger': $v.email.$error}">
              <div class="input-group-prepend">
                <span class="input-group-text userInfoSocial">
                  <i class="fas fa-envelope"></i>   
                </span>
              </div>
              <input v-model="email" type="email" @input="$v.email.$touch" class="form-control" placeholder="Электронная почта ...">
            </div>
            <div style="margin-top:-10px; margin-left:30px">
              <small id="emailHelp" class="form-text text-muted">Укажите адрес электронной почты</small>
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text userInfoSocial">
                  <i class="fas fa-phone"></i>     
                </span>
              </div>
              <input v-model="phone" type="text" class="form-control" placeholder="Телефон ...">
            </div>
            <div style="margin-top:-10px; margin-left:30px">
              <small id="emailHelp" class="form-text text-muted">Укажите номер телефона для связи</small>
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text userInfoSocial">
                  <i class="fab fa-facebook-square"></i>     
                </span>
              </div>
              <input v-model="facebook" type="text" class="form-control" placeholder="Профиль Facebook ...">
            </div>
            <div style="margin-top:-10px; margin-left:30px">
              <small id="emailHelp" class="form-text text-muted">Укажите только имя пользовятеля, которое идет после адреса "facebook.com\"</small>
            </div>
  
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text userInfoSocial">
                  <i class="fab fa-vk"></i>     
                </span>
              </div>
              <input v-model="vk" type="text" class="form-control" placeholder="Профиль ВКонтакте ...">
            </div>
            <div style="margin-top:-10px; margin-left:30px">
              <small id="emailHelp" class="form-text text-muted">Укажите только имя пользовятеля, которое идет после адреса "vk.com\"</small>
            </div>
            
            </div>
            
        </div>
        
          <center>
            <br>
            <button type="submit" class="btn btn-primary btn-round">Сохранить</button>
            <a href="#pablo" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
          </center>
          
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</template>

<script>
import {http} from "./../http"
import {eventEmitter} from "./../main"
import {email} from "vuelidate/lib/validators/"

export default {
  name: 'contactsForm',
  data () {
    return {
      instagram: '',
      whatsApp: '',
      whatsAppText: '',
      email: '',
      phone: '',
      facebook: '',
      vk: ''
     }
  },
  validations: {
    email:{
      email
    }
  },
  methods: {
    save() {
      http.get('showUserInfoSocialSave', {
        params:{
          instagram: this.instagram,
          whatsApp: this.whatsApp,
          email: this.email,
          phone: this.phone,
          whatsAppText: this.whatsAppText,
          facebook: this.facebook,
          vk: this.vk
        }
      })
      .then(() => {
        $("#contactsForm").modal('hide');
      });
    }
  },
  created(){
    eventEmitter.$on('showContactsForm', () => {
      http.get('showUserInfoSocialForm')
      .then(response => {
        this.instagram = response.data.instagram;
        this.whatsApp = response.data.whatsApp;
        this.whatsAppText = response.data.whatsAppText;
        this.facebook = response.data.facebook;
        this.vk = response.data.vk;
        this.phone = response.data.phone;
        this.email = response.data.email;
        $("#contactsForm").modal('show'); 
      });
    })
  }
}
</script>

<style lang="sass" scoped>
.modal-dialog 
  max-width: 1300px;
.text-muted
  padding-left: 15px;
</style>
