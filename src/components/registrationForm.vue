<template>
  <div
    class="modal fade"
    id="registrationForm"
    tabindex="-1"
    role="dialog"
    aria-labelledby="registrationForm"
    aria-hidden="false"
  >
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
                    <p
                      class="description"
                    >Зарегистрируйтесь сейчас и используйте больше возможностей системы.</p>
                  </div>

                  <div class="icon icon-rose">
                    <i class="material-icons">favorite_border</i>
                  </div>
                  <div class="description">
                    <h4 class="info-title">Это бесплатно</h4>
                    <p
                      class="description"
                    >Наш сервис для вас полностью бесплатен! Вы можете пользоваться всеми его функциями.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <form class="form2" method action>
                  <p class="description text-center">Введите учетные данные</p>
                  <div class="card-body">
                    <div class="input-group form-group label-floating has-success">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">face</i>
                        </span>
                      </div>
                      <input
                        v-model="name"
                        @input="nameCheck"
                        type="text"
                        class="form-control"
                        placeholder="Адрес (my-entry.ru\имя)"
                      />
                      <button v-show="nameOk" class="form-control-feedback">
                        <i class="material-icons">done</i>
                      </button>
                      <button
                        v-show="!nameOk"
                        class="form-control-feedback"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="Имя страницы должно быть уникальным, начинаться с латинской буквы и может содержать только латинские буквы и цифры."
                      >
                        <i class="material-icons">clear</i>
                      </button>
                    </div>

                    <div class="input-group form-group label-floating has-success">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">mail</i>
                        </span>
                      </div>
                      <input
                        v-model="email"
                        @input="emailCheck"
                        type="email"
                        class="form-control"
                        placeholder="Электронная почта ..."
                      />
                      <button v-show="emailOk" class="form-control-feedback">
                        <i class="material-icons">done</i>
                      </button>
                      <button
                        v-show="!emailOk"
                        class="form-control-feedback"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="Необходимо ввести адрес электронной почты, которого нет в системе. Возможны вы ранее уже регистрировались, попробуйте войти или восстановить пароль."
                      >
                        <i class="material-icons">clear</i>
                      </button>
                    </div>

                    <div class="input-group form-group label-floating has-success">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input
                        v-model="password"
                        type="password"
                        @input="passwordCheck"
                        class="form-control"
                        placeholder="Пароль ..."
                      />
                      <button v-show="passwordOk" class="form-control-feedback">
                        <i class="material-icons">done</i>
                      </button>
                      <button
                        v-show="!passwordOk"
                        class="form-control-feedback"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="Пароль дожен состоять минимум из 6 символов"
                      >
                        <i class="material-icons">clear</i>
                      </button>
                    </div>

                    <div class="input-group form-group label-floating has-success">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input
                        v-model="password2"
                        type="password"
                        v-on:input="password2Check"
                        class="form-control"
                        placeholder="Пароль еще раз ..."
                      />
                      <button v-show="password2Ok" class="form-control-feedback">
                        <i class="material-icons">done</i>
                      </button>
                      <button
                        v-show="!password2Ok"
                        class="form-control-feedback"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="Пароли не совпадают"
                      >
                        <i class="material-icons">clear</i>
                      </button>
                    </div>

                    <br />
                    <center>
                      <button
                        :disabled="!registrationOk"
                        @click="registration"
                        type="button"
                        class="btn btn-primary btn-round"
                        data-toggle="modal"
                      >Регистрация</button>
                      <br />
                      <a
                        href="#"
                        class="btn btn-primary btn-link btn-wd"
                        data-dismiss="modal"
                      >Закрыть</a>
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
import { http } from "./../http";
import { eventEmitter } from "./../main";

export default {
  name: "registrationForm",
  data() {
    return {
      name: "",
      nameOk: false,
      emailOk: false,
      passwordOk: false,
      password2Ok: false,
      email: "",
      password: "",
      password2: "",
      registrationOk: false
    };
  },
  created() {
    eventEmitter.$on("showRegistrationForm", () => {
      $("#registrationForm").modal("show");
    });
  },
  methods: {
    // проверяет есть ли уже такое имя
    nameCheck() {
      if (/^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$/.test(this.name)) {
        http
          .get("nameRegistrationCheck", {
            params: {
              name: this.name
            }
          })
          .then(response => {
            if (response.data == true) {
              this.nameOk = false;
              this.registrationOk = false; // костыль
            } else {
              this.nameOk = true;
            }
          });
      } else {
        this.nameOk = false;
        this.registrationOk = false; // костыль
      }
      this.checkForm();
    },
    // проверяет есть ли уже такой email
    emailCheck() {
      if (checkEmail(this.email)) {
        http
          .get("emailRegistrationCheck", {
            params: {
              email: this.email
            }
          })
          .then(response => {
            if (response.data == true) {
              this.emailOk = false;
            }
          });
        this.emailOk = true;
      } else {
        this.emailOk = false;
      }
      this.checkForm();
    },
    // проверяет требования к паролю (более 6 символов, латиница, цифры, символы)
    passwordCheck() {
      if (/[0-9a-zA-Z!@#$%^&*]{6,}/.test(this.password)) {
        this.passwordOk = true;
      } else {
        this.passwordOk = false;
      }
      if (this.password == this.password2) {
        this.password2Ok = true;
      } else {
        this.password2Ok = false;
      }
      this.checkForm();
    },
    registration() {
      http
        .get("registration", {
          params: {
            name: this.name,
            email: this.email,
            password: this.password
          }
        })
        .then(response => {
          this.nameRegistration = "";
          this.emailRegistration = "";
          this.password = "";
          this.password2 = "";
          this.nameRegistrationOk = false;
          this.emailRegistrationOk = false;
          this.passwordOk = false;
          this.password2Ok = false;
          this.registrationOk = false;
          eventEmitter.$emit(
            "showMessage",
            "Спасибо за регистрацию. Теперь можно войти в систему и приступить к настройке своей страницы."
          );
          $("#registrationForm").modal("hide");
        });
    },
    // проверет равны ли пароли
    password2Check() {
      if (this.password == this.password2) {
        this.password2Ok = true;
      } else {
        this.password2Ok = false;
      }
      this.checkForm();
    },
    // проверяет регистрационную форму, все ли галочки стоят
    checkForm() {
      if (
        this.nameOk == true &&
        this.emailOk == true &&
        this.passwordOk == true &&
        this.password2Ok == true
      ) {
        this.registrationOk = true;
      } else {
        this.registrationOk = false;
      }
    }
  }
};
/*Check is email or not*/
function checkEmail(value) {
  return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/.test(value);
}
</script>

<style lang="sass" scoped>
.modal-dialog
    max-width: 750px
.card-login
	min-height: 500px
.form-control-feedback
    margin-top: -28px
</style>



