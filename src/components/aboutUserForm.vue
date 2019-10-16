<template>
<div class="modal fade" id="aboutUserForm" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form5" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">О себе</h2>
        <div class="row">
          <div class="card-body">
            <form @submit.prevent="save">

            <div class="form-group" :class="{'has-danger': $v.name.$error}">
              <label>Имя</label>
              <input type="text" v-model="name" id="name" @input="$v.name.$touch" class="form-control" aria-describedby="name" placeholder="Отображаемое имя ...">
            </div>

            <div class="form-group">
              <label>Специализация</label>
              <input type="text" v-model="specialization" class="form-control" aria-describedby="specialization" placeholder="Чем вы занимаетесь...">
              <small id="emailHelp" class="form-text text-muted">Ваша професиия или специализация. Например, "Web дизайнер", "Мастер депиляции", "Маркетолог".</small>
            </div>
  
            <div class="form-group">
              <label>О себе</label>
              <textarea class="form-control" v-model="about" rows="5" placeholder="Опишите чем вы занимаетесь, что предлагаете ..."></textarea>
            </div>

            <center>
              <button type="submit" class="btn btn-primary btn-round" :disabled="$v.$invalid">Сохранить</button>
              <a href="#" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
            </center>
            
            </form>
          </div>
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
import {required} from "vuelidate/lib/validators/"

export default {
  name: 'aboutUserForm',
  data () {
    return {
      name: '',
      specialization: '',
      about: ''
    }
  },
  validations: {
    name: {
      required
    }
  },
  methods:{
    save() {
      http.get('showUserInfoSave', {
        params:{
          name: this.name,
          specialization: this.specialization,
          about: this.about
        }
      })
      .then(() => {
        eventEmitter.$emit('reloadMainCard');
        $("#aboutUserForm").modal('hide');
      });
    },
  },
  created() {
    eventEmitter.$on('showAboutUserForm', () => {
      http.get('showUserInfo')
      .then(response => {
        this.name = response.data.name;
        this.specialization = response.data.specialization;
        this.about = response.data.about;
        $("#aboutUserForm").modal('show');
      });
    })
  }
}
</script>

