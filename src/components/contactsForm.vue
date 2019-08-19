<template>
<div class="modal fade" id="contactsForm" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form4" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">Соцсети</h2>
          
          <div class="card-body">
          <div class="row">
          
            <div class="col-md-6">
              
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text  userInfoSocial">
                    <i class="fab fab fa-instagram"></i>     
                  </span>
                </div>
                <input v-model="userInfoInstagram" type="text" class="form-control" placeholder="Профиль Instagram ...">
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
                <input v-model="userInfoWhatsApp" type="text" class="form-control" placeholder="Номер телефона для WhatsApp ...">
              </div>
            
              <div class="input-group" style="margin-top: 0px;">
                 <div class="input-group-prepend">
                  <span class="input-group-text userInfoSocial">
                    <i class="fab fab fa-whatsapp wa-white"></i>     
                  </span>
                </div>
                <textarea class="form-control" v-model="userInfoWhatsAppText" rows="3" placeholder="Приветствие для WhatsApp ..."></textarea>
              </div>
              <div style="margin-top:-10px; margin-left:30px">
                <small id="emailHelp" class="form-text text-muted">Например, «Привет! Меня заинтересовал Ваш товар.»</small>
              </div>
            
            </div>
    
            <div class="col-md-6">

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text userInfoSocial">
                  <i class="fas fa-envelope"></i>   
                </span>
              </div>
              <input v-model="userInfoEMail" type="email" class="form-control" placeholder="Электронная почта ...">
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
              <input v-model="userInfoPhone" type="email" class="form-control" placeholder="Телефон ...">
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
              <input v-model="userInfoFacebook" type="email" class="form-control" placeholder="Профиль Facebook ...">
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
              <input v-model="userInfoVK" type="email" class="form-control" placeholder="Профиль ВКонтакте ...">
            </div>
            <div style="margin-top:-10px; margin-left:30px">
              <small id="emailHelp" class="form-text text-muted">Укажите только имя пользовятеля, которое идет после адреса "vk.com\"</small>
            </div>
            
            </div>
            
        </div>
        
          <center>
            <br>
            <button type="submit" class="btn btn-primary btn-round" @click="showUserInfoSocialSave()">Сохранить</button>
            <a href="#pablo" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
          </center>
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
  name: 'contactsForm',
  data () {
    return {
      userInfoInstagram: '',
      userInfoWhatsApp: '',
      userInfoWhatsAppText: '',
      userInfoEMail: '',
      userInfoPhone: '',
      userInfoFacebook: '',
      userInfoVK: ''
     }
  },
  methods: {
    showUserInfoSocialSave() {
      http.get('showUserInfoSocialSave', {
        params:{
          userInfoInstagram: this.userInfoInstagram,
          userInfoWhatsApp: this.userInfoWhatsApp,
          userInfoEMail: this.userInfoEMail,
          userInfoPhone: this.userInfoPhone,
          userInfoWhatsAppText: this.userInfoWhatsAppText,
          userInfoFacebook: this.userInfoFacebook,
          userInfoVK: this.userInfoVK
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
        this.userInfoInstagram = response.data.userInfoInstagram;
        this.userInfoWhatsApp = response.data.userInfoWhatsApp;
        this.userInfoWhatsAppText = response.data.userInfoWhatsAppText;
        this.userInfoFacebook = response.data.userInfoFacebook;
        this.userInfoVK = response.data.userInfoVK;
        this.userInfoPhone = response.data.userInfoPhone;
        this.userInfoEMail = response.data.userInfoEMail;
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
