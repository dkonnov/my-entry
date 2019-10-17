<template>
  <!-- Background Modal -->
  <div class="modal fade" id="backgroundForm" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog form3" role="document">
      <div class="modal-content" style="background-color:transparent;box-shadow: none;">
        <div class="col-lg-8 col-md-6 ml-auto mr-auto">
          <div
            class="card card-signup"
            style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;"
          >
            <h2 class="card-title text-center">Фон</h2>
            <div class="card-body">
              <div class="row">
                <template v-for="index in 6">
                  <div
                    :id="'imgDiv'+index"
                    class="col-md-4"
                    @click="changeBackground(index)"
                    :key="index"
                  >
                    <div class="card card-plain">
                      <div class="card-header card-header-image">
                        <div class="card-header-image-bg"></div>
                        <img :id="'img' + index" src="img/animated-loading-bar.gif" />
                        <div :id="'img_s_' + index" class="colored-shadow" style="opacity: 1;"></div>
                      </div>
                    </div>
                  </div>
                </template>
              </div>
            </div>

            <center>
              <div width="100%" style="display: flex;align-items: center; justify-content: center;">
                <ul class="pagination nav nav-pills nav-pills-primary" role="tablist">
                  <template v-for="index in totalTabs">
                    <li
                      class="page-item"
                      :class="{'active': currentTab == index}"
                      @click="changeTab(index)"
                      :key="index"
                    >
                      <a
                        class="page-link"
                        data-toggle="tab"
                        :href="'#tab'+index"
                        role="tablist"
                        aria-expanded="true"
                      >{{index}}</a>
                    </li>
                  </template>
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
import { http } from "./../http";
import { eventEmitter } from "./../main";

export default {
  name: "backgroundForm",
  data() {
    return {
      currentTab: 1,
      totalTabs: 10,
      imgData: "",
      img6: false
    };
  },
  methods: {
    // ФОН
    changeBackground(value) {
      var url = document.getElementById("img" + value).src;
      var img = url.substr(url.lastIndexOf("/") + 1);
      document.getElementById("backgroundDiv").style.backgroundImage =
        "url('img/backgrounds/" + img + "')";
      http
        .get("changeBackground", {
          params: {
            img: img
          }
        })
        .then(response => {});
    },
    changeTab(value) {
      this.currentTab = value;
      http
        .get("getBackgrounds", {
          params: {
            page: value
          }
        })
        .then(response => {
          for (var i = 1; i <= 6; i++) {
            document.getElementById("img" + i).src =
              "img/animated-loading-bar.gif";
          }
          for (var i = 1; i <= 6; i++) {
            if (response.data[i - 1].img) {
              document.getElementById("imgDiv" + i).style.visibility =
                "visible";
              document.getElementById("img" + i).src =
                "img/backgrounds/" + response.data[i - 1].img;
              document.getElementById("img_s_" + i).style.backgroundImage =
                "url(img/backgrounds/" + response.data[i - 1].img + ")";
            } else {
              document.getElementById("imgDiv" + i).style.visibility = "hidden";
            }
          }
        });
    }
  },
  created() {
    eventEmitter.$on("showBackgroundForm", () => {
      http.get("totalTabs").then(response => {
        this.totalTabs = response.data;
      });
      $("#backgroundForm").modal("show");
      this.changeTab(1);
    });
  }
};
</script>

<style lang="sass" scoped>
.modal-dialog.form3
	max-width: 1300px
.pagination 
  .page-item.active
    a, span, .page-link:focus, span:focus
    	background-color: #9c27b0
	    border-color: #9c27b0
	    color: #fff
	    box-shadow: 0 4px 5px 0 rgba(156,39,176,.14),0 1px 10px 0 rgba(156,39,176,.12),0 2px 4px -1px rgba(156,39,176,.2)
  .page-item 
    span:hover, .page-link:hover 
	    background-color: rgb(243, 241, 241)
	    border-color: rgb(243, 241, 241)
</style>

