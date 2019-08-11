<template>
<!-- Link Button -->                
<div class="modal fade" id="linkButton" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form5" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">Кнопка связи</h2>
        <div class="row">
          <div class="card-body">
          
          <form>
            <div class="form-group">
              <label>Действие при нажатии</label>
              <select v-model="linkButtonAction" id="sel" class="form-control" data-style="btn btn-link">
                <option value="notShow">Не отображать кнопку</option>
                <option value="wa">Написать в WhatsApp</option>
                <option value="tel">Позвонить по телефону</option>
                <option value="email">Написать на электронную почту</option>
              </select>
              <small class="form-text text-muted">Данные берутся из раздела "Соцсети и способы связи".</small>
            </div>
            <div class="form-group">
              <label>Текст на кнопке</label>
              <input type="text" v-model="linkButtonName" class="form-control">
            </div>
          </form>

          <br>
          <center>
            <button type="submit" class="btn btn-primary btn-round" @click="showlinkButtonSave()">Сохранить</button>
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
import axios from 'axios'
import {eventEmitter} from "./../main"

export default {
  name: 'linkButton',
  data () {
    return {
      linkButtonName: '',
      linkButtonAction: '' 
    }
  },
  methods: {
    showlinkButtonSave: function(){
      axios
      .get('public/my_entry.php?action=showlinkButtonSave&linkButtonAction=' + this.linkButtonAction + '&linkButtonName=' + this.linkButtonName)
      .then(response => {
        if (response.data){
          eventEmitter.$emit('reloadMainCard');
          $("#linkButton").modal('hide');
          
        }
      });
    }
  },
  created(){
    eventEmitter.$on('linkButtonShow', () => {
      axios
        .get('public/my_entry.php?action=showlinkButton')
        .then(response => {
          $('#sel').val(response.data.userLinkButtonAction);
          this.linkButtonName = response.data.userLinkButtonName;
        });
      $("#linkButton").modal('show');
    })
  }
}
</script>
