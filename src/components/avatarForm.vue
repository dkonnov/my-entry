<template>
<div class="modal fade" id="userAvatar" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form5" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">Аватар</h2>
        <div class="row">
          <div class="card-body">
            <center>
            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
              <div class="fileinput-new thumbnail img-circle img-raised">
                <img id="avatarimgform" src="img/placeholder.jpg">
              </div>
              <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div><br><br>
                <div>
                  <span class="btn btn-raised btn-round btn-default btn-file">
                    <span class="fileinput-new">Добавить фото</span>
                    <span class="fileinput-exists">Заменить фото</span>
                    <input name="userfile" id="userfile" type="file" accept="image/jpeg" @change="addAvatar"><div class="ripple-container"></div>
                  </span>
                  <a v-show="deleteAvatarButton" class="btn btn-info btn-round" @click="deleteAvatar()" href="#"><i class="fa fa-times"></i> Удалить</a>
                </div>
              </div>
              <a href="#" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
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
import {eventEmitter} from "./../main"

export default {
  name: 'avatarForm',
  data () {
    return {
      deleteAvatarButton: false
    }
  },
  methods:{
    addAvatar(){

    }
  },
  created() {
    eventEmitter.$on('showAvatarForm', () => {
      $("#userAvatar").modal('show');
    })
  }
}
</script>

