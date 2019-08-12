<template>
  <!-- Background Modal -->                
  <div class="modal fade" id="backgroundForm" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form3" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">Фон</h2>
				<div class="card-body">
          <div class="row">
            <div class="tab-content tab-space">
            
            <div class="tab-pane active" id="link0" aria-expanded="true">
              <div class="row">
                images
              </div>
            </div>

              </div>
            </div>
            </div>
            
            <center>
            <div width=100% style="display: flex;align-items: center; justify-content: center;">
            <ul class="pagination nav nav-pills nav-pills-primary" role="tablist">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link active" data-toggle="tab" href="#link0" role="tablist" aria-expanded="true">1</a></li>
              <li class="page-item"><a class="page-link" data-toggle="tab" href="#link1" role="tablist" aria-expanded="false">2</a></li>
              <li class="page-item"><a class="page-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">3</a></li>
              <li class="page-item"><a class="page-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false">4</a></li>
              <li class="page-item"><a class="page-link" data-toggle="tab" href="#link4" role="tablist" aria-expanded="false">5</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
            </div>
            <a href="#" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
            </center>
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
  name: 'backgroundForm',
  data () {
    return {

    }
  },
  methods:{

  },
  created() {
    eventEmitter.$on('showBackgroundForm', () => {
      $("#backgroundForm").modal('show');
    })
  }
}
</script>

<style scoped>
.pagination > .page-item.active > a, 
.pagination > .page-item > span, 
.pagination > .page-item > .page-link:focus, 
.pagination > .page-item > .page-link:hover, 
.pagination > .page-item > span:focus, 
.pagination > .page-item > span:hover {
	background-color: #9c27b0;
	border-color: #9c27b0;
	color: #fff;
	box-shadow: 0 4px 5px 0 rgba(156,39,176,.14),0 1px 10px 0 rgba(156,39,176,.12),0 2px 4px -1px rgba(156,39,176,.2);
}

</style>