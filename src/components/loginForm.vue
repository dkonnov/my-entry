<template>
  <div
    class="modal fade"
    id="loginForm"
    tabindex="-1"
    role="dialog"
    aria-labelledby="loginForm"
    aria-hidden="false"
  >
    <div class="modal-dialog" role="document">
      <div
        class="modal-content"
        style="background-color:transparent;box-shadow: none;"
      >
        <div class="col-lg-8 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" @submit.prevent="authorization">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Авторизация</h4>
                <div class="social-line"></div>
              </div>
              <p class="description text-center">Введите учетные данные</p>
              <div class="card-body">
                <div
                  class="input-group"
                  :class="{ 'has-danger': $v.login.$error }"
                >
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input
                    v-model="login"
                    id="login"
                    @input="$v.login.$touch"
                    type="email"
                    class="form-control"
                    placeholder="Электронная почта ..."
                  />
                </div>
                <div
                  class="input-group"
                  :class="{ 'has-danger': $v.password.$error }"
                >
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input
                    v-model="password"
                    id="password"
                    @input="$v.password.$touch"
                    type="password"
                    class="form-control"
                    placeholder="Пароль ..."
                  />
                </div>
              </div>

              <div class="footer text-center">
                <button
                  type="submit"
                  class="btn btn-primary btn-round"
                  data-toggle="modal"
                  :disabled="$v.$invalid"
                >
                  Вход
                </button>
                <br />
                <a
                  href="#"
                  @click="showRegistrationForm"
                  class="btn btn-primary btn-link btn-wd"
                  >Регистрация</a
                >
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { http } from "./../http";
import { eventEmitter } from "./../main";
import { email, required } from "vuelidate/lib/validators/";

export default {
  name: "loginForm",
  data() {
    return {
      login: "",
      password: ""
    };
  },
  validations: {
    login: {
      email
    },
    password: {
      required
    }
  },
  methods: {
    showRegistrationForm() {
      eventEmitter.$emit("showRegistrationForm");
    },
    authorization() {
      http
        .get("authorization", {
          params: {
            email: this.login,
            password: this.password
          }
        })
        .then(response => {
          if (response.data == false) {
            eventEmitter.$emit(
              "showMessage",
              "Такой пользователь не обнаружен. Пожалуйста, проверьте вводимые данные и попробуйте снова. Если вы не зарегистрированы, то мы будем рады, если вы станете частью нашей системы.",
              "toRegistration"
            );
          }
          if (response.data == "restore") {
            eventEmitter.$emit(
              "showMessage",
              "Пароль введен не верно. Если вы забыли пароль, то мы можем отправить его вам на электронную почту.",
              "sendPassword"
            );
          }
          if (response.data == "notconfirmed") {
            eventEmitter.$emit(
              "showMessage",
              "Ваша учетная запись не подтверждена. Мы отправили на указанный при регистрации адрес электронной почты письмо для подтверждения аккаунта."
            );
          }
          if (response.data == true) {
            $("#loginForm").modal("hide");
            eventEmitter.$emit("showMessage", "Привет! Рады видеть тебя!");
            // получим первоначальные сведения о пользователе, вошедшем в систему
            this.$store.dispatch("getCurrentUser");
            // очистим поля формы
            this.login = "";
            this.password = "";
          }
        });
    }
  },
  created() {
    eventEmitter.$on("showLoginForm", () => {
      $("#loginForm").modal("show");
    });
  }
};
</script>

<style lang="sass" scoped>
.card-login
    max-height: 370px
</style>
