<template>
  <div class="modal fade" id="addressChangeForm" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog form5" role="document">
      <div class="modal-content" style="background-color:transparent;box-shadow: none;">
        <div class="col-lg-8 col-md-6 ml-auto mr-auto">
          <div
            class="card card-signup"
            style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;"
          >
            <h2 class="card-title text-center">Сменить адрес</h2>
            <div class="row">
              <div class="card-body">
                <center>
                  <p
                    class="card-description"
                  >Вам не нравиться адрес вашей страницы, и вы хотите его сменить? В поле ниже вы можете подобрать новое имя!</p>
                  <div
                    class="input-group form-group label-floating"
                    :class="{'has-danger': $v.name.$error}"
                  >
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons" style="margin-left: -15px;">face</i>
                      </span>
                    </div>
                    <input
                      v-model="name"
                      id="id"
                      @input="$v.name.$touch"
                      type="text"
                      class="form-control"
                      placeholder="Имя (my-entry.ru\имя)"
                    />
                    <button v-show="$v.$invalid" class="form-control-feedback">
                      <i class="material-icons" style="margin-top: 28px;">done</i>
                    </button>
                    <button v-show="!$v.$invalid" class="form-control-feedback">
                      <i class="material-icons" style="margin-top: 28px;">clear</i>
                    </button>
                    <small
                      v-show="!$v.name.required"
                      id="emailHelp"
                      class="form-text text-muteds small-alert"
                    >Имя страницы должно быть уникальным, начинаться с латинской буквы и может содержать только латинские буквы и цифры.</small>
                  </div>
                  <br />
                  <div v-show="nameRegistrationOk">
                    Адрес вашей страницы будет:
                    <br />
                    <b>http://my-entry.ru/{{ name }}</b>
                  </div>
                  <br />
                  <button
                    :disabled="$v.$invalid"
                    @click="changeLoginNameFormSave"
                    type="button"
                    class="btn btn-primary btn-round"
                    data-toggle="modal"
                  >Сохранить</button>
                  <br />
                  <a href="#" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
                  {{$v}}
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
import { http } from "./../http";
import { eventEmitter } from "./../main";
import { required, alphaNum } from "vuelidate/lib/validators/";

export default {
  name: "addressChangeFrom",
  data() {
    return {
      name: "",
      nameRegistrationOk: false
    };
  },
  validations: {
    name: {
      required,
      alphaNum,
      uniqLoginName: function() {
        setTimeout(1000);
        http
          .get("nameRegistrationCheck", {
            params: {
              name: this.name
            }
          })
          .then(response => {
            return response.data;
            console;
          });
        return true;
      }
    }
  },
  methods: {
    changeLoginNameFormSave: function() {
      http
        .get("changeLoginNameFormSave", {
          params: {
            name: this.name
          }
        })
        .then(() => {
          //$("#addressChangeForm").modal("hide");
          this.name = "";
          this.nameRegistrationOk = false;
          eventEmitter.$emit(
            "showMessage",
            "Адрес вашей страницы изменен. Не забудьте поменять его в ваших социальных сетях и рекламных материалах!"
          );
        });
    },
    nameRegistrationCheck() {
      http
        .get("nameRegistrationCheck", {
          params: {
            name: this.name
          }
        })
        .then(response => {
          if (response.data == true) {
            this.nameRegistrationOk = false;
          }
        });
      this.nameRegistrationOk = true;
    }
  },
  created() {
    eventEmitter.$on("showAddressChangeFrom", () => {
      $("#addressChangeForm").modal("show");
    });
  }
};
</script>

<style lang="sass" scoped>
.form-control-feedback
  margin-top: -52px
.small-alert
  padding-left: 40px
  text-align: left
</style>


