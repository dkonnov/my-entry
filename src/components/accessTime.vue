<template>
<div class="modal fade" id="accessTime" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form5" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">Рабочее время</h2>
        <div class="row">
          <div class="card-body">
            <center>



 


<table class="table">
    <thead>
        <tr>
            <th class="text-center"></th>
            <th>Время работы</th>
            <th>Перерыв</th>
            <th class="text-right">Рабочий</th>
        </tr>
    </thead>
    <tbody>
        <template v-for="index in 7">
        <tr :key="index">
            <td class="text-center">{{ dayOfWeek[index-1] }}</td>
            <td width=200>
                 <div class="row">
                    <div class="col-md-6">
                        <input :id="'id_timepicker1_'+ index" v-model="s_date" type="text" class="form-control datetimepicker">
                    </div>
                   
                    <div class="col-md-6">
                        <input v-show="'timepicker2_'+ index" :id="'id_timepicker2_'+ index" v-model="s_date" type="text" class="form-control datetimepicker">
                    </div>
                 </div>
            </td>
             <td width=200>
                 <div class="row">
                    <div class="col-md-6">
                        <input :id="'id_timepicker3_'+ index" v-model="s_date" type="text" class="form-control datetimepicker">
                    </div>
    
                    <div class="col-md-6">
                        <input :id="'id_timepicker4_'+ index" v-model="s_date" type="text" class="form-control datetimepicker">
                    </div>
                 </div>
            </td>
            <td class="td-actions text-right">
                <div class="togglebutton" @click=hideDay(index)><label><input :id="'id_togle_'+ index" type="checkbox" checked=""><span class="toggle"></span></label></div>
            </td>
        </tr>
        </template>
    </tbody>
</table>

           
              <a href="#" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
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
  name: 'accessTime',
  data () {
    return {
      dayOfWeek: ['ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ', 'ВС']
    }
  },
    methods: {
      hideDay(value){
        if (document.getElementById('id_togle_' + value).checked == false){
          document.getElementById('id_timepicker1_' + value).style.visibility = 'hidden';
          document.getElementById('id_timepicker2_' + value).style.visibility = 'hidden';
          document.getElementById('id_timepicker3_' + value).style.visibility = 'hidden';
          document.getElementById('id_timepicker4_' + value).style.visibility = 'hidden';
        } else {
          document.getElementById('id_timepicker1_' + value).style.visibility = 'visible';
          document.getElementById('id_timepicker2_' + value).style.visibility = 'visible';
          document.getElementById('id_timepicker3_' + value).style.visibility = 'visible';
          document.getElementById('id_timepicker4_' + value).style.visibility = 'visible';
        }
      }
    },
  created() {
    eventEmitter.$on('showAccessTime', () => {
        $("#accessTime").modal('show');
    });
  },
   mounted(){
     
    var piker = $('.datetimepicker').datetimepicker({
      format: 'LT',
      locale: 'ru',
      stepping: 15,
      showClose: true,
      toolbarPlacement: 'bottom',
      icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-check'
        }
    });
   }
}
</script>

<style lang="sass" scoped>
.modal-dialog
	max-width: 1000px
</style>