<template>
   <div class="modal fade" id="loginForm" tabindex="-1" role="dialog" aria-labelledby="loginForm" aria-hidden="false"> 
   <div class="modal-dialog" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;">
        <div class="col-lg-8 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="" action="">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Авторизация</h4>
                <div class="social-line"></div>
              </div>
              <p class="description text-center">Введите учетные данные</p>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input v-model="emailLogin" @input="emailLoginCheck" type="email" class="form-control" placeholder="Электронная почта ...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input v-model="password" type="password" class="form-control" placeholder="Пароль ...">
                </div>
              </div>
              <div class="footer text-center">
                <button v-show="loginOk" v-on:click="login()" type="button" class="btn btn-primary btn-round" data-toggle="modal">Вход</button>
                <button v-show="!loginOk" type="button" class="btn btn-primary btn-round" data-toggle="modal" disabled>Вход</button>
                <br>
                <a href="#" @click="showRegistrationForm()" class="btn btn-primary btn-link btn-wd">Регистрация</a>
              </div>
            </form>
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
  name: 'loginForm',
  data () {
    return {
      loginOk: false,
      emailLogin: '',
      password: ''
     }
  },
  methods: {
    showRegistrationForm() {
      eventEmitter.$emit('showRegistrationForm');
    },
    emailLoginCheck() {
      if (checkEmail(this.emailLogin)) {this.loginOk = true;} else {this.loginOk = false;}
    },
    login(){
      axios
      .get('public/my_entry.php?action=authorization&email=' + this.emailLogin + '&password=' + this.password)
      .then(response => {
        if (response.data == false) {
          eventEmitter.$emit('showMessage', 'Такой пользователь не обнаружен. Пожалуйста, проверьте вводимые данные и попробуйте снова. Если вы не зарегистрированы, то мы будем рады, если вы станете частью нашей системы.', 'toRegistration');
        } 
        if (response.data == 'restore') {
          eventEmitter.$emit('showMessage', 'Пароль введен не верно. Если вы забыли пароль, то мы можем отправить его вам на электронную почту.', 'sendPassword');
        }
        if (response.data == 'notconfirmed') {
          eventEmitter.$emit('showMessage', 'Ваша учетная запись не подтверждена. Мы отправили на указанный при регистрации адрес электронной почты письмо для подтверждения аккаунта.');
        }
        if (response.data == true) {
          $("#loginForm").modal('hide');
          eventEmitter.$emit('showMessage', 'Привет! Рады видеть тебя!');
          // загрузим фон
          axios
          .get('public/my_entry.php?action=getBackground')
          .then(response => {
            // сменим фон
            if (response.data) {document.getElementById("backgroundDiv").style.backgroundImage='url(\'img/backgrounds/'+response.data+'\')';}
            // уберем приветсвенное окно
            eventEmitter.$emit('hideHollowCard');
            // покажем меню
            eventEmitter.$emit('showMenu');
          });

        }

      });
    }
  }
}
/*Check is email or not*/
function checkEmail(value){
  return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/.test(value))
}
</script>

<style lang="sass" scoped>
.card-login
    max-height: 370px
</style>

