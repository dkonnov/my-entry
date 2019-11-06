<template>
  <div id="app">
    <integrationPixel />
    <mainMenu />
    <div
      id="backgroundDiv"
      class="page-header header-filter"
      style="background-size: cover; background-position: top center;"
    >
      <!-- Desktop -->

      <div
        class="container wow fadeIn"
        data-wow-duration="2s"
        style="display: flex;  align-items: center; flex-direction: column;"
      >
        <router-view></router-view>
      </div>
    </div>
    <loginForm />
    <registrationForm />
    <modalWindow />
    <avatarForm />
    <addressFrom />
    <addressChangeFrom />
    <aboutUserForm />
    <contactsForm />
    <integrationForm />
    <linkButton />
    <serviceForm />
    <backgroundForm />
    <accessTime />
  </div>
</template>

<script>
import mainMenu from "./components/mainMenu";
import avatarForm from "./components/avatarForm";
import loginForm from "./components/loginForm";
import registrationForm from "./components/registrationForm";
import modalWindow from "./components/modalWindow";
import addressFrom from "./components/addressFrom";
import addressChangeFrom from "./components/addressChangeFrom";
import aboutUserForm from "./components/aboutUserForm";
import contactsForm from "./components/contactsForm";
import integrationForm from "./components/integrationForm";
import linkButton from "./components/linkButton";
import serviceForm from "./components/serviceForm";
import backgroundForm from "./components/backgroundForm";
import accessTime from "./components/accessTime";

export default {
  name: "app",
  components: {
    mainMenu,
    avatarForm,
    loginForm,
    registrationForm,
    modalWindow,
    addressFrom,
    addressChangeFrom,
    aboutUserForm,
    contactsForm,
    integrationForm,
    linkButton,
    serviceForm,
    backgroundForm,
    accessTime
  },
  computed: {
    background() {
      return this.$store.state.currentUser.background;
    }
  },
  watch: {
    background: value => {
      // сменим фон, если он изменился в state
      document.getElementById("backgroundDiv").style.backgroundImage =
        "url('img/backgrounds/" + value + "')";
    }
  }
};
</script>

<style lang="sass">
.login-page 
  .page-header 
    .container
      padding-top: 15vh
.fa-instagram 
  color: #125688
.fa-facebook-square 
  color: #3b5998
.fa-whatsapp 
  color: #128c7e
.fa-vk 
  color: #0099e5
.fa-phone-square 
  color: #68217a
.fa-envelope 
  color: #239ab9
.wa-white
	color: white
.form-control-feedback
	position: absolute
	right: 0
	z-index: 200
	display: block
	width: 24px
	height: 24px
	line-height: 24px
	text-align: center
	pointer-events: auto
	background: transparent
	padding-left: 0px
	padding-right: 0px
  border: 0px
	border-left-width: 0px
	border-left-style: solid
	border-top-width: 0px
	border-top-style: solid
	border-right-width: 0px
	border-right-style: solid
	border-bottom-width: 0px
	border-bottom-style: solid
</style>

