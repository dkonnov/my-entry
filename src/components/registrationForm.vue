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
      <div
        class="modal-content"
        style="background-color:transparent;box-shadow: none;"
      >
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
                      Зарегистрируйтесь сейчас и используйте больше возможностей
                      системы.
                    </p>
                  </div>

                  <div class="icon icon-rose">
                    <i class="material-icons">favorite_border</i>
                  </div>
                  <div class="description">
                    <h4 class="info-title">Это бесплатно</h4>
                    <p class="description">
                      Наш сервис для вас полностью бесплатен! Вы можете
                      пользоваться всеми его функциями.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <form class="form2" method action>
                  <p class="description text-center">Введите учетные данные</p>
                  <div class="card-body">
                    <div
                      class="input-group form-group label-floating"
                      :class="{ 'has-danger': $v.name.$error }"
                    >
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">face</i>
                        </span>
                      </div>
                      <input
                        v-model="name"
                        @input="$v.name.$touch"
                        type="text"
                        class="form-control"
                        placeholder="Адрес (my-entry.ru\имя)"
                      />
                      <button
                        v-if="$v.name.$error"
                        class="form-control-feedback"
                      >
                        <i class="material-icons">clear</i>
                      </button>
                    </div>
                    <small
                      v-if="$v.name.$error"
                      class="form-text text-muteds small-alert"
                      >Имя страницы должно быть уникальным, начинаться с буквы и
                      может содержать только латинские буквы и цифры.</small
                    >

                    <div
                      class="input-group form-group label-floating"
                      :class="{ 'has-danger': $v.email.$error }"
                    >
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">mail</i>
                        </span>
                      </div>
                      <input
                        v-model="email"
                        @input="$v.email.$touch"
                        type="email"
                        class="form-control"
                        placeholder="Электронная почта ..."
                      />
                      <button
                        v-if="$v.email.$error"
                        class="form-control-feedback"
                      >
                        <i class="material-icons">clear</i>
                      </button>
                      <small
                        v-if="$v.email.$error"
                        class="form-text text-muteds small-alert"
                        >Необходимо ввести адрес электронной почты, которого нет
                        в системе.</small
                      >
                    </div>

                    <div
                      class="input-group form-group label-floating"
                      :class="{ 'has-danger': $v.password.$error }"
                    >
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input
                        v-model="password"
                        type="password"
                        @input="$v.password.$touch"
                        class="form-control"
                        placeholder="Пароль ..."
                      />
                      <button
                        v-if="$v.password.$error"
                        class="form-control-feedback"
                      >
                        <i class="material-icons">clear</i>
                      </button>
                    </div>
                    <small
                      v-if="$v.password.$error"
                      class="form-text text-muteds small-alert"
                      >Минимум 6 символов.</small
                    >

                    <div
                      class="input-group form-group label-floating"
                      :class="{ 'has-danger': $v.password2.$error }"
                    >
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input
                        v-model="password2"
                        type="password"
                        @input="$v.password2.$touch"
                        class="form-control"
                        placeholder="Пароль еще раз ..."
                      />
                      <button
                        v-if="$v.password2.$error"
                        class="form-control-feedback"
                      >
                        <i class="material-icons">clear</i>
                      </button>
                    </div>
                    <small
                      v-if="$v.password2.$error"
                      class="form-text text-muteds small-alert"
                      >Пароли не совпадают.</small
                    >
                    <br />
                    <center>
                      <button
                        :disabled="$v.$invalid"
                        @click="registration"
                        type="button"
                        class="btn btn-primary btn-round"
                        data-toggle="modal"
                      >
                        Регистрация
                      </button>
                      <br />
                      <a
                        href="#"
                        class="btn btn-primary btn-link btn-wd"
                        data-dismiss="modal"
                        >Закрыть</a
                      >
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
import { required, email, minLength, sameAs } from "vuelidate/lib/validators/";

export default {
  name: "registrationForm",
  data() {
    return {
      name: "",
      uniqName: "",
      uniqEmail: "",
      email: "",
      password: "",
      password2: ""
    };
  },
  validations: {
    name: {
      required,
      validLogin: function() {
        if (this.name.match(/^[a-zA-Z](.[a-zA-Z0-9_-]*)$/)) {
          return true;
        } else {
          return false;
        }
      },
      uniqLoginName: function() {
        http
          .get("nameRegistrationCheck", {
            params: {
              name: this.name
            }
          })
          .then(response => {
            this.uniqName = response.data;
          });
        return this.uniqName;
      }
    },
    email: {
      email,
      uniqEmail: function() {
        http
          .get("emailRegistrationCheck", {
            params: {
              email: this.email
            }
          })
          .then(response => {
            this.uniqEmail = response.data;
          });
        return this.uniqEmail;
      }
    },
    password: {
      minLength: minLength(6)
    },
    password2: {
      sameAs: sameAs("password")
    }
  },
  created() {
    eventEmitter.$on("showRegistrationForm", () => {
      $("#registrationForm").modal("show");
    });
  },
  methods: {
    registration() {
      http
        .get("registration", {
          params: {
            name: this.name,
            email: this.email,
            password: this.password
          }
        })
        .then(() => {
          this.nameRegistration = "";
          this.emailRegistration = "";
          this.password = "";
          this.password2 = "";
          eventEmitter.$emit(
            "showMessage",
            "Спасибо за регистрацию. Теперь можно войти в систему и приступить к настройке своей страницы."
          );
          $("#registrationForm").modal("hide");
        });
    }
  }
};
</script>

<style lang="sass" scoped>
.modal-dialog
    max-width: 750px
.card-login
	min-height: 500px
.form-control-feedback
    margin-top: -28px
.small-alert
  padding-left: 55px
  text-align: left
</style>
