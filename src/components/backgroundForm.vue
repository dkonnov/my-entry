<template>
  <!-- Background Modal -->
  <div
    class="modal fade"
    id="backgroundForm"
    tabindex="-1"
    role="dialog"
    aria-hidden="false"
  >
    <div class="modal-dialog" role="document">
      <div
        class="modal-content"
        style="background-color:transparent;box-shadow: none;"
      >
        <div class="col-lg-8 col-md-6 ml-auto mr-auto">
          <div
            class="card card-signup"
            style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;"
          >
            <h2 class="card-title text-center">Фон</h2>
            <div class="card-body">
              <div class="row">
                <template v-for="img in itemsOnPageArray">
                  <div
                    class="col-md-4"
                    :key="img"
                    @click="changeBackground(img.src)"
                  >
                    <div class="card card-plain">
                      <div class="card-header card-header-image">
                        <div class="card-header-image-bg"></div>

                        <div
                          v-if="img.src == currentBackground"
                          class="currentBackground"
                        ></div>

                        <div
                          v-if="img.src == currentBackground"
                          class="currentBackground2"
                        >
                          <i class="material-icons">done</i>
                        </div>

                        <img :src="'img/backgrounds/' + img.src" />
                        <div
                          class="colored-shadow"
                          style="opacity: 1;"
                          :style="
                            'background-image: url(img/backgrounds/' +
                              img.src +
                              ')'
                          "
                        ></div>
                      </div>
                    </div>
                  </div>
                </template>
              </div>
            </div>

            <center>
              <div
                width="100%"
                style="display: flex;align-items: center; justify-content: center;"
              >
                <ul
                  class="pagination nav nav-pills nav-pills-primary"
                  role="tablist"
                >
                  <template v-for="index in totalTabs">
                    <li
                      class="page-item"
                      :class="{ active: currentTab == index }"
                      :key="index"
                      @click="currentTab = index"
                    >
                      <a
                        class="page-link"
                        data-toggle="tab"
                        :href="'#tab' + index"
                        role="tablist"
                        aria-expanded="true"
                        >{{ index }}</a
                      >
                    </li>
                  </template>
                </ul>
              </div>
              <a
                href="#"
                class="btn btn-primary btn-link btn-wd"
                data-dismiss="modal"
                >Закрыть</a
              >
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import _ from "lodash";
import { http } from "./../http";
import { eventEmitter } from "./../main";

export default {
  name: "backgroundForm",
  data() {
    return {
      currentTab: 1,
      itemsOnPage: 6
    };
  },
  computed: {
    itemsOnPageArray: function() {
      return _.slice(
        this.$store.state.backgrounds,
        this.itemsOnPage * this.currentTab - this.itemsOnPage,
        this.itemsOnPage * this.currentTab
      );
    },
    currentBackground: function() {
      return this.$store.state.currentUser.background;
    },
    totalTabs: function() {
      return (
        Math.trunc(this.$store.state.backgrounds.length / this.itemsOnPage) + 1
      );
    }
  },
  methods: {
    changeBackground(value) {
      this.$store.dispatch("updateCurrentUser", {
        background: value
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
.currentBackground
  display: flex
  flex-flow: column
  height: 100%
  width: 100%
  position: absolute
  background-color: #9c27b0
  opacity: .5
  border-radius: 6px
.currentBackground2
  display: flex
  flex-flow: column
  height: 100%
  width: 100%
  opacity: 1
  text-align: center
  justify-content: center
  position: absolute
.material-icons
  font-size: 48px
.modal-dialog
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
