<template>
  <div
    class="modal fade"
    id="contactsForm"
    tabindex="-1"
    role="dialog"
    aria-hidden="false"
  >
    <div class="modal-dialog form4" role="document">
      <div
        class="modal-content"
        style="background-color:transparent;box-shadow: none;"
      >
        <div class="col-lg-8 col-md-6 ml-auto mr-auto">
          <div
            class="card card-signup"
            style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;"
          >
            <h2 class="card-title text-center">Соцсети</h2>

            <div class="card-body">
              <form class="form" @submit.prevent="save">
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text userInfoSocial">
                          <i class="fab fab fa-instagram"></i>
                        </span>
                      </div>
                      <input
                        v-model="instagram"
                        type="text"
                        class="form-control"
                        placeholder="Профиль Instagram ..."
                      />
                    </div>
                    <div style="margin-top:-10px; margin-left:30px">
                      <small class="form-text text-muted"
                        >Введите имя профиля Instagram без использования символа
                        "@".</small
                      >
                    </div>

                    <div
                      class="input-group"
                      :class="{ 'has-danger': $v.whatsApp.$error }"
                    >
                      <div class="input-group-prepend">
                        <span class="input-group-text userInfoSocial">
                          <i class="fab fab fa-whatsapp"></i>
                        </span>
                      </div>
                      <input
                        v-model="whatsApp"
                        type="text"
                        class="form-control"
                        @input="$v.whatsApp.$touch"
                        placeholder="Номер телефона для WhatsApp ..."
                      />
                      <button
                        v-if="$v.whatsApp.$error"
                        class="form-control-feedback"
                      >
                        <i class="material-icons">clear</i>
                      </button>
                    </div>

                    <div class="input-group" style="margin-top: 0px;">
                      <div class="input-group-prepend">
                        <span class="input-group-text userInfoSocial">
                          <i class="fab fab fa-whatsapp wa-white"></i>
                        </span>
                      </div>
                      <textarea
                        class="form-control"
                        v-model="whatsAppText"
                        rows="3"
                        placeholder="Приветствие для WhatsApp ..."
                      ></textarea>
                    </div>
                    <div style="margin-top:-10px; margin-left:30px">
                      <small id="emailHelp" class="form-text text-muted"
                        >Например, «Привет! Меня заинтересовал Ваш
                        товар.»</small
                      >
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div
                      class="input-group"
                      :class="{ 'has-danger': $v.email.$error }"
                    >
                      <div class="input-group-prepend">
                        <span class="input-group-text userInfoSocial">
                          <i class="fas fa-envelope"></i>
                        </span>
                      </div>
                      <input
                        v-model="email"
                        type="email"
                        @input="$v.email.$touch"
                        class="form-control"
                        placeholder="Электронная почта ..."
                      />
                      <button
                        v-if="$v.email.$error"
                        class="form-control-feedback"
                      >
                        <i class="material-icons">clear</i>
                      </button>
                    </div>
                    <div style="margin-top:-10px; margin-left:30px">
                      <small class="form-text text-muted"
                        >Укажите адрес электронной почты</small
                      >
                    </div>

                    <div
                      class="input-group"
                      :class="{ 'has-danger': $v.phone.$error }"
                    >
                      <div class="input-group-prepend">
                        <span class="input-group-text userInfoSocial">
                          <i class="fas fa-phone"></i>
                        </span>
                      </div>
                      <input
                        v-model="phone"
                        type="text"
                        class="form-control"
                        @input="$v.phone.$touch"
                        placeholder="Телефон ..."
                      />
                      <button
                        v-if="$v.phone.$error"
                        class="form-control-feedback"
                      >
                        <i class="material-icons">clear</i>
                      </button>
                    </div>
                    <div style="margin-top:-10px; margin-left:30px">
                      <small class="form-text text-muted"
                        >Укажите номер телефона для связи</small
                      >
                    </div>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text userInfoSocial">
                          <i class="fab fa-facebook-square"></i>
                        </span>
                      </div>
                      <input
                        v-model="facebook"
                        type="text"
                        class="form-control"
                        placeholder="Профиль Facebook ..."
                      />
                    </div>
                    <div style="margin-top:-10px; margin-left:30px">
                      <small class="form-text text-muted"
                        >Укажите только имя пользовятеля, которое идет после
                        адреса "facebook.com\"</small
                      >
                    </div>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text userInfoSocial">
                          <i class="fab fa-vk"></i>
                        </span>
                      </div>
                      <input
                        v-model="vk"
                        type="text"
                        class="form-control"
                        placeholder="Профиль ВКонтакте ..."
                      />
                    </div>
                    <div style="margin-top:-10px; margin-left:30px">
                      <small class="form-text text-muted"
                        >Укажите только имя пользовятеля, которое идет после
                        адреса "vk.com\"</small
                      >
                    </div>
                  </div>
                </div>

                <center>
                  <br />
                  <button
                    type="submit"
                    class="btn btn-primary btn-round"
                    :disabled="$v.$invalid"
                  >
                    Сохранить
                  </button>
                  <a
                    href="#pablo"
                    class="btn btn-primary btn-link btn-wd"
                    data-dismiss="modal"
                    >Закрыть</a
                  >
                </center>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { eventEmitter } from "./../main";
import { email, numeric } from "vuelidate/lib/validators/";

export default {
  name: "contactsForm",
  data() {
    return {
      instagram: "",
      whatsApp: "",
      whatsAppText: "",
      email: "",
      phone: "",
      facebook: "",
      vk: ""
    };
  },
  validations: {
    email: {
      email
    },
    phone: {
      numeric
    },
    whatsApp: {
      numeric
    }
  },
  methods: {
    save() {
      this.$store.dispatch("updateCurrentUser", {
        userInfoInstagram: this.instagram,
        userInfoWhatsApp: this.whatsApp,
        userInfoWhatsAppText: this.whatsAppText,
        userInfoEMail: this.email,
        userInfoPhone: this.phone,
        userInfoFacebook: this.facebook,
        userInfoVK: this.vk
      });
      $("#contactsFor").modal("hide");
    }
  },
  computed: {
    user() {
      return this.$store.state.currentUser;
    }
  },
  created() {
    eventEmitter.$on("showContactsForm", () => {
      this.instagram = this.user.userInfoInstagram;
      this.whatsApp = this.user.userInfoWhatsApp;
      this.whatsAppText = this.user.userInfoWhatsAppText;
      this.facebook = this.user.userInfoFacebook;
      this.vk = this.user.userInfoVK;
      this.phone = this.user.userInfoPhone;
      this.userInfoEMail = this.user.email;
      $("#contactsForm").modal("show");
    });
  }
};
</script>

<style lang="sass" scoped>
.modal-dialog
  max-width: 1300px;
.text-muted
  padding-left: 15px;
.form-control-feedback
    margin-top: -28px
</style>
