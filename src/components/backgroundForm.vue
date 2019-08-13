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
                images1
              </div>
            </div>
            <div class="tab-pane" id="link1" aria-expanded="true">
              <div class="row">
                images2
              </div>
            </div>

              </div>
            </div>
            </div>
            
            <center>
            <div width=100% style="display: flex;align-items: center; justify-content: center;">
            <ul class="pagination nav nav-pills nav-pills-primary" role="tablist">
              <li class="page-item" :class="{ 'active': currentTab == 0 }" @click="currentTab = 0"><a class="page-link" data-toggle="tab" href="#link0" role="tablist" aria-expanded="true">1</a></li>
              <li class="page-item" :class="{ 'active': currentTab == 1 }" @click="currentTab = 1"><a class="page-link" data-toggle="tab" href="#link1" role="tablist" aria-expanded="false">2</a></li>
              <li class="page-item" :class="{ 'active': currentTab == 2 }" @click="currentTab = 2"><a class="page-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">3</a></li>
              <li class="page-item" :class="{ 'active': currentTab == 3 }" @click="currentTab = 3"><a class="page-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false">4</a></li>
              <li class="page-item" :class="{ 'active': currentTab == 4 }" @click="currentTab = 4"><a class="page-link" data-toggle="tab" href="#link4" role="tablist" aria-expanded="false">5</a></li>
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
      currentTab: 0
    }
  },
  methods:{
  
  },
  created() {
    eventEmitter.$on('showBackgroundForm', () => {
      $("#backgroundForm").modal('show');
      this.currentTab = 0;
    })
  }
}
</script>

<style lang="sass" scoped>
.pagination 
  .page-item.active
    a, 
    span, 
    .page-link:focus, 
    span:focus
    	background-color: #9c27b0
	    border-color: #9c27b0
	    color: #fff
	    box-shadow: 0 4px 5px 0 rgba(156,39,176,.14),0 1px 10px 0 rgba(156,39,176,.12),0 2px 4px -1px rgba(156,39,176,.2)
  .page-item 
    span:hover, .page-link:hover 
	    background-color: rgb(243, 241, 241)
	    border-color: rgb(243, 241, 241)
</style>

