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
  },
  beforeMount(){ 
    axios
      .get('./my-entry/my_entry.php?action=getRandomBackground')
      .then(response => {
        document.getElementById("backgroundDiv").style.backgroundImage='url(\'img/backgrounds/'+response.data+'\')';
      })
    
  }
}
</script>


