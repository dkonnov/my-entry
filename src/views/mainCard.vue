<template>
    <div class="row" v-show="mainCard">
  
      <div class="card card-profile" style="max-width: 500px">

        <div v-show="avatar" class="card-avatar wow fadeInDown" data-wow-duration="2s" data-wow-delay="1s"> 
          <a href="#" @click="showUserAvatarIfLogined()">
            <img src="img/placeholder.jpg" id="avatarimg" class="img-raised rounded-circle img-fluid">
          </a>
        </div>
        <div class="card-body">
          <div @click="showUserInfoIfLogined()">
            <h4 class="card-title wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s">{{ mainCardName }}</h4>
            <h6 class="card-category text-gray wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s">{{ mainСardSpecialization }}</h6>
          </div>
          
          <template v-for="userSocButton in userInfoSoc">
            <a class="btn btn-just-icon btn-link wow fadeInUp" data-wow-duration="2s" :data-wow-delay="userSocButton.delay" :href="userSocButton.href" :key="userSocButton" target=new>
              <i :class="userSocButton.icon"></i>        
              <div class="ripple-container"></div>
            </a>
          </template>

          <div @click="showUserInfoIfLogined()">
            <p class="card-description wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">
                {{ mainCardAbout }}
            </p>  
          </div>
          <a v-show="linkButton" class="btn btn-info btn-round wow fadeIn" data-wow-duration="2s" data-wow-delay="2s" :href="linkButtonHref">{{ linkButtonName }}</a>

          <div id="accordion" role="tablist" aria-multiselectable="false" class="card-collapse">

          <template v-for="userService in userServices">
            <div class="card card-plain wow fadeInUp" data-wow-duration="1s" :data-wow-delay="userService.delay" :key="userService">
              <div class="card-header" role="tab" :id="userService.heading" style="padding-top: 0px;padding-right: 0px;">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" :href="userService.href" aria-expanded="flase" aria-controls="collapseOne" style="padding-left: 24px;">
                  {{ userService.name }} {{ userService.price }}
                  <i class="material-icons">keyboard_arrow_down</i>
                 </a>
              </div>

              <div :id="userService.collapse" class="collapse" role="tabpanel" :aria-labelledby="userService.heading">
                <div class="card-body wow fadeIn" data-wow-duration="2s" >
                  {{ userService.description }}

                  <div class="dropdown wow fadeIn" data-wow-duration="2s" data-wow-delay="1s" align=right style="margin-right: -4px;">
                    <!-- <button class="btn btn-primary btn-sm btn-round">Заказать</button> -->
                    <template v-if="ifLogined">
                    <button class="btn btn-secondary btn-fab btn-fab-mini btn-round" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="material-icons">more_horiz</i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#" @click="showAddServiceForm(userService.id)">Редактировать</a>
                      <a class="dropdown-item" href="#" @click="deleteService(userService.id)">Удалить</a>
                    </div>
                    </template>
                  </div>

                </div>
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {http} from "./../http"
import {eventEmitter} from "./../main"

export default {
  name: 'mainCard',
  data () {
    return {
      avatar: false,
      user: '',
      mainCard: true,
      userInfoSoc: '',
      mainCardName: '',
      mainСardSpecialization: '',
      mainCardAbout: '',
      linkButton: false,
      linkButtonHref: '',
      linkButtonName: '',
      userServices: '',
      ifLogined: false
     }
  },
  methods:{
    loadMainCardInf: function(value){
      http.get('loadMainCard', {
        params:{
          userNameID: value
        }
      })  
      .then(response => {
        if (response.data.userInfoName) {
          // аватар 
          if (response.data.avatar){
            this.avatar = true;
            document.getElementById('avatarimg').src = 'img/avatars/' + response.data.avatar;
          }
          // фон
          document.getElementById("backgroundDiv").style.backgroundImage='url(\'img/backgrounds/'+response.data.background+'\')';
          // другие переменные
          this.mainCardName = response.data.userInfoName;         
          this.mainСardSpecialization = response.data.userInfoSpecialization;     
          this.mainCardAbout = response.data.userInfoAbout; 
          if (response.data.userLinkButtonAction === 'notShow'){this.linkButton = false;} else {this.linkButton = true;}
          this.linkButtonName = response.data.userLinkButtonName;
          this.linkButtonHref = response.data.userLinkButtonHref;
          this.footer = false;
          // загрузим соц сети
          http.get('loadUserSocButtons', {
            params:{
              userNameID: value
            }
          })  
          .then(response => {
            this.userInfoSoc = response.data;
          });
          // загрузим услуги
          http.get('loadServices', {
            params:{
              userNameID: value
            }
          })  
          .then(response => {
            this.userServices = response.data;
          });
          // имя 
          http.get('getUserName')
          .then(response => {
            if (response.data == value) {this.ifLogined = true;}
          });
          }
          //такой страницы не существует
          if (!this.mainCardName){
            this.$router.push('/');
            eventEmitter.$emit('showMessage', 'Ой! Такой страницы не существует :(');
          }
      })
    },
    deleteService(value){
      eventEmitter.$emit('deleteService', value);
    },
    showAddServiceForm(value){
      eventEmitter.$emit('showServiceForm', value);
    },
    showUserAvatarIfLogined(){
      if (this.ifLogined){
        eventEmitter.$emit('showAvatarForm');
      }
    },
    showUserInfoIfLogined(){
      if (this.ifLogined){
        eventEmitter.$emit('showAboutUserForm');
      }
    }
  },
  created(){
    this.user = this.$router.currentRoute.params['user'];
    this.loadMainCardInf(this.user);
    eventEmitter.$on('reloadMainCard', () => {
       http.get('getUserName')
       .then(response => {
         if (response.data) {
           this.$router.push('/' + response.data);
           this.loadMainCardInf(response.data);
           }
        });
    });
  }
}
</script>

