<template>
   <div class="modal fade" id="registrationForm" tabindex="-1" role="dialog" aria-labelledby="registrationForm" aria-hidden="false"> 
   <div class="modal-dialog" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;">
          <div class="card card-login">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Регистрация</h4>
                <div class="social-line"></div>
              </div>
              <div class="card-body" style="padding-left: 50px;">
              <div class="row">
              <div class="col-md-6">
              <div class="info info-horizontal" stype="padding: 0px 0 30px;">
                  <div class="icon icon-primary">
                   <i class="material-icons">accessibility_new</i>
                  </div>
                  <div class="description">
                    <h4 class="info-title">Добро пожаловать</h4>
                    <p class="description">
                    Зарегистрируйтесь сейчас и используйте больше возможностей системы.
                    </p>
                  </div>
               
                  <div class="icon icon-rose">
                   <i class="material-icons">favorite_border</i>
                  </div>
                  <div class="description">
                    <h4 class="info-title">Это бесплатно</h4>
                    <p class="description">
                    Наш сервис для вас полностью бесплатен! Вы можете пользоваться всеми его функциями.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <form class="form2" method="" action="">
                <p class="description text-center">Введите учетные данные</p>
                <div class="card-body">

                  <div class="input-group form-group label-floating has-success">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input v-model="nameRegistration" @input="nameRegistrationCheck"  type="text" class="form-control" placeholder="Адрес (my-entry.ru\имя)">
                  <button v-show="nameRegistrationOk" class="form-control-feedback">
                    <i class="material-icons">done</i>
                  </button>  
                  <button v-show="!nameRegistrationOk" class="form-control-feedback" data-toggle="tooltip" data-placement="right" title="Имя страницы должно быть уникальным, начинаться с латинской буквы и может содержать только латинские буквы и цифры.">
                    <i class="material-icons">clear</i>
                  </button>  
                  </div>
                
                  <div class="input-group form-group label-floating has-success">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">mail</i>
                      </span>
                    </div>
                    <input v-model="emailRegistration" @input="emailRegistrationCheck" type="email" class="form-control" placeholder="Электронная почта ...">
                    <button v-show="emailRegistrationOk" class="form-control-feedback">
                      <i class="material-icons">done</i>
                    </button>  
                    <button v-show="!emailRegistrationOk" class="form-control-feedback" data-toggle="tooltip" data-placement="right" title="Необходимо ввести адрес электронной почты, которого нет в системе. Возможны вы ранее уже регистрировались, попробуйте войти или восстановить пароль.">
                      <i class="material-icons">clear</i>
                    </button>
                  </div>

                  <div class="input-group form-group label-floating has-success">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input v-model="password" type="password" @input="passwordCheck" class="form-control" placeholder="Пароль ...">
                    <button v-show="passwordOk" class="form-control-feedback">
                      <i class="material-icons">done</i>
                    </button>  
                    <button v-show="!passwordOk" class="form-control-feedback" data-toggle="tooltip" data-placement="right" title="Пароль дожен состоять минимум из 6 символов">
                      <i class="material-icons">clear</i>
                    </button>
                  </div>

                  <div class="input-group form-group label-floating has-success">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input v-model="password2" type="password"  v-on:input="password2Check" class="form-control" placeholder="Пароль еще раз ...">
                    <button v-show="password2Ok" class="form-control-feedback">
                      <i class="material-icons">done</i>
                    </button>
                    <button v-show="!password2Ok" class="form-control-feedback" data-toggle="tooltip" data-placement="right" title="Пароли не совпадают">
                      <i class="material-icons">clear</i>
                    </button>
                  </div>
  
                <br>
                <center>
                  <button v-show="registrationOk" @click="registration()" type="button" class="btn btn-primary btn-round" data-toggle="modal">Регистрация</button>
                  <button v-show="!registrationOk" type="button" class="btn btn-primary btn-round" data-toggle="modal" disabled>Регистрация</button>
                  <br>
                  <a href="#" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
                </center>
                </div>
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
import {eventEmitter} from "./../main"
import axios from 'axios'

export default {
  name: 'registrationForm',
  data () {
    return {
      nameRegistrationOk: false,
      emailRegistrationOk: false,
      passwordOk: false,
      password2Ok: false,
      nameRegistration: '',
      emailRegistration: '',
      password: '',
      password2: '',
      registrationOk: false
     }
  },
  created(){
    eventEmitter.$on('showRegistrationForm', () => {
      $("#registrationForm").modal('show');
    })
  },
  methods: {
    // проверяет есть ли уже такое имя
    nameRegistrationCheck() {
      if (/^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$/.test(this.nameRegistration)){
        axios
        .get('public/my_entry.php?action=nameRegistrationCheck&name=' + this.nameRegistration)
        .then(response => {
          if (response.data == true) {
            this.nameRegistrationOk = false;
            this.registrationOk = false; // костыль
          } else {
            this.nameRegistrationOk = true;
          }
        });
        
      } else {
        this.nameRegistrationOk = false;
        this.registrationOk = false; // костыль
      }
      this.checkRegistrationForm();
  },
  // проверяет есть ли уже такой email
    emailRegistrationCheck() {
      if (checkEmail(this.emailRegistration))
      {
        axios
        .get('public/my_entry.php?action=emailRegistrationCheck&email=' + this.emailRegistration)
        .then(response => {
          if (response.data == true) {this.emailRegistrationOk = false;}
        });
        this.emailRegistrationOk = true;
      } else {this.emailRegistrationOk = false;}
      this.checkRegistrationForm();
    },
  // проверяет требования к паролю (более 6 символов, кириллица, цифры, символы)
    passwordCheck(){
      if (/[0-9a-zA-Z!@#$%^&*]{6,}/.test(this.password)){this.passwordOk = true;} else {this.passwordOk = false;}
      if (this.password == this.password2){this.password2Ok = true;} else {this.password2Ok = false;}
      this.checkRegistrationForm();
    },
    // проверет равны ли пароли
    password2Check(){
      if (this.password == this.password2){this.password2Ok = true;} else {this.password2Ok = false;}
      this.checkRegistrationForm();
    },
   // проверяет регистрационную форму, все ли галочки стоят
    checkRegistrationForm(){
      if (this.nameRegistrationOk == true && this.emailRegistrationOk == true && this.passwordOk == true && this.password2Ok == true){this.registrationOk = true;} else {this.registrationOk = false;}
    }
}
}
/*Check is email or not*/
function checkEmail(value){
  return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/.test(value))
}
</script>

<style lang="sass" scoped>
.modal-dialog
    max-width: 750px
.card-login
	min-height: 500px

</style>



