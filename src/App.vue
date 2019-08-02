<template>
  <div id="app">
    <mainMenu />
    <div id="backgroundDiv" class="page-header header-filter" style="background-size: cover; background-position: top center;">
      <!-- Desktop -->  
      <div class="container wow fadeIn" data-wow-duration="2s" style="display: flex;  align-items: center; flex-direction: column;">
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
  </div>
</template>

<script>
import mainMenu from './components/mainMenu.vue'
import avatarForm from './components/avatarForm.vue'
import loginForm from './components/loginForm.vue'
import registrationForm from './components/registrationForm.vue'
import modalWindow from './components/modalWindow.vue'
import addressFrom from './components/addressFrom.vue'
import addressChangeFrom from './components/addressChangeFrom.vue'
import aboutUserForm from './components/aboutUserForm.vue'
import contactsForm from './components/contactsForm.vue'

import axios from 'axios'

export default {
  name: 'app',
  components: {
    mainMenu, avatarForm, loginForm, registrationForm, modalWindow,
    addressFrom, addressChangeFrom, aboutUserForm, contactsForm
  }
}
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
</style>

