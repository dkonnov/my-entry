<template>
<div class="modal fade" id="integrationForm" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">Интеграция</h2>
          
          <div class="card-body">
          <div class="row">
          <p class="card-description">
            <center>
              Для отслеживания статистики и повышения конверсии от ваших рекламных компаний, используйте интеграцию. Вставьте номера счетчиков, который вы используете.
            </center>
          </p> 

           <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text userInfoSocial">
                  <i class="fab fa-facebook-square"></i>     
                </span>
              </div>
              <input v-model="integrationPixel" type="number" class="form-control" placeholder="Facebook Pixel ...">
            </div>
            <div style="margin-top:-10px; margin-left:30px">
              <small id="emailHelp" class="form-text text-muted">Укажите код счетчика Facebook Pixel. Создать счетчик на страницк <a href="https://www.facebook.com/events_manager/" target=new>Facebook Events Manager</a></small>
            </div>

            </div>
        
          <center>
            <br>
            <button type="submit" class="btn btn-primary btn-round" @click="integrationFormSave()">Сохранить</button>
            <a href="#pablo" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</template>

<script>
import {http} from "./../http"
import {eventEmitter} from "./../main"

export default {
  name: 'integrationForm',
  data () {
    return {
      integrationPixel: '',
     }
  },
  methods: {
    integrationFormSave() {
      http.get('integrationFormSave', {
        params:{
          integrationPixel: this.integrationPixel
        }
      })
      .then(() => {
         $("#integrationForm").modal('hide'); 
      });
    }
  },
  created(){
    eventEmitter.$on('integrationFormShow', () => {
      axios
      .get('public/my_entry.php?action=integrationFormShow')
      .then(response => {
        this.integrationPixel = response.data.integrationPixel;
        $("#integrationForm").modal('show'); 
      });
    })
  }
}
</script>
