<template>
  <nav
    class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg"
    color-on-scroll="100"
    id="sectionsNav"
  >
    <div class="container">
      <div class="navbar-translate" style=" position: relative;">
        <a class="navbar-brand" href="http://my-entry.ru">
          <h4 class="card-title" style="color:white">My-Entry</h4>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>

      <div id="main-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li
            class="dropdown nav-item"
            v-show="loginedUser"
            style="margin-top: 22px;"
          >
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">gesture</i> Оформление
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="#" class="dropdown-item" @click="showUserAvatar()">
                <i class="material-icons">face</i> Аватар
              </a>
              <a href="#" class="dropdown-item" @click="showAboutUserForm()">
                <i class="material-icons">list_alt</i> О себе
              </a>
              <a href="#" class="dropdown-item" @click="showBackgroundForm()">
                <i class="material-icons">insert_photo</i> Фон
              </a>
              <a href="#" class="dropdown-item" @click="showUserInfoSocial()">
                <i class="material-icons">recent_actors</i> Соцсети и способы
                связи
              </a>
              <a href="#" class="dropdown-item" @click="showlinkButton()">
                <i class="material-icons">screen_share</i> Кнопка связи
              </a>
              <a href="#" class="dropdown-item" @click="showAddServiceForm()">
                <i class="material-icons">playlist_add</i> Добавить услугу
              </a>
              <!-- <a href="#" class="dropdown-item" @click="showAccessTimeForm()">
              <i class="material-icons">access_time</i> Рабочее время 
              </a>-->
            </div>
          </li>

          <li
            class="nav-item"
            v-show="!loginedUser"
            style="margin-top: 22px;margin-right: 15px;margin-left: 15px;"
          >
            <a
              class="btn btn-success btn-block btn-round"
              data-toggle="collapse"
              data-target=".navbar-collapse.show"
              href="#"
              @click="showLoginForm()"
            >
              <i class="material-icons">meeting_room</i>
              Вход
            </a>
          </li>

          <li
            class="dropdown nav-item"
            v-show="loginedUser"
            style="margin-top: 22px;"
          >
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">face</i>
              <b>{{ loginedUser }}</b>
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="#" class="dropdown-item" @click="showAddressForm">
                <i class="material-icons">code</i> QR-код и адрес
              </a>
              <a href="#" class="dropdown-item" @click="showAddressChangeForm">
                <i class="material-icons">code</i> Сменить адрес
              </a>
              <a href="#" class="dropdown-item" @click="integrationFormShow">
                <i class="material-icons">code</i> Интеграция
              </a>
              <a href="#" class="dropdown-item" @click="showZoneRu">
                <i class="material-icons">language</i> Создать визитку в зоне RU
              </a>
              <a href="#" class="dropdown-item" @click="logout">
                <i class="material-icons">meeting_room</i> Выход
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
//import { http } from "./../http";
import { eventEmitter } from "./../main";

export default {
  name: "mainMenu",
  data() {
    return {
      buttonLogin: true
    };
  },
  methods: {
    showAccessTimeForm() {
      eventEmitter.$emit("showAccessTime");
    },
    showBackgroundForm() {
      eventEmitter.$emit("showBackgroundForm");
    },
    showAddServiceForm() {
      eventEmitter.$emit("showServiceForm");
    },
    showAboutUserForm() {
      eventEmitter.$emit("showAboutUserForm");
    },
    showlinkButton() {
      eventEmitter.$emit("linkButtonShow");
    },
    showUserAvatar() {
      eventEmitter.$emit("showAvatarForm");
    },
    showUserInfoSocial() {
      eventEmitter.$emit("showContactsForm");
    },
    showZoneRu() {
      eventEmitter.$emit(
        "showMessage",
        "Мы можем подобрать для вас адрес ИМЯ.RU и создать на нем вашу онлайн-визитку без логотипа My-Entry. Визитка будет выглядеть как ваш персональный сайт. Это повысит доверие к вам и увеличит конверсию. Стоимость услуги 1899р за год. Напишите нам на info@my-entry.ru и мы с вами свяжемся!"
      );
    },
    showAddressForm() {
      eventEmitter.$emit("showAddressFrom");
    },
    showAddressChangeForm() {
      eventEmitter.$emit("showAddressChangeFrom");
    },
    showLoginForm() {
      eventEmitter.$emit("showLoginForm");
    },
    logout() {
      this.$store.dispatch("logoutUser");
    },
    integrationFormShow() {
      eventEmitter.$emit("integrationFormShow");
    }
  },
  computed: {
    loginedUser() {
      return this.$store.state.currentUser.name;
    }
  } //,
  // beforeMount() {
  //   // http.get("authorizationOnStart").then(response => {
  //   //   if (response.data > 0) {
  //   //     eventEmitter.$emit("showMenu");
  //   //     // if (!this.$router.currentRoute.params["user"]) {
  //   //     //   if (this.$store.state.currentUser.name) {
  //   //     //     //this.$router.push("/" + this.$store.state.currentUser.name);
  //   //     //   }
  //   //     // }
  //   //   }
  //   // });
  // }
};
</script>
