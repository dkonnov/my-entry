<template>
  <!-- Link Button -->
  <div class="modal fade" id="linkButton" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog form5" role="document">
      <div class="modal-content" style="background-color:transparent;box-shadow: none;">
        <div class="col-lg-8 col-md-6 ml-auto mr-auto">
          <div
            class="card card-signup"
            style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;"
          >
            <h2 class="card-title text-center">Кнопка связи</h2>
            <div class="row">
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <label>Действие при нажатии</label>
                    <select
                      v-model="action"
                      id="sel"
                      class="form-control"
                      data-style="btn btn-link"
                    >
                      <option value="notShow">Не отображать кнопку</option>
                      <option value="wa">Написать в WhatsApp</option>
                      <option value="tel">Позвонить по телефону</option>
                      <option value="email">Написать на электронную почту</option>
                    </select>
                    <small
                      class="form-text text-muted"
                    >Данные берутся из раздела "Соцсети и способы связи".</small>
                  </div>
                  <div class="form-group">
                    <label>Текст на кнопке</label>
                    <input type="text" v-model="name" class="form-control" />
                  </div>
                </form>

                <br />
                <center>
                  <button type="submit" class="btn btn-primary btn-round" @click="save">Сохранить</button>
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
import { http } from "./../http";
import { eventEmitter } from "./../main";

export default {
  name: "linkButton",
  data() {
    return {
      action: "",
      name: ""
    };
  },
  methods: {
    save: function() {
      http
        .get("showlinkButtonSave", {
          params: {
            action: this.action,
            name: this.name
          }
        })
        .then(response => {
          if (response.data) {
            eventEmitter.$emit("reloadMainCard");
            $("#linkButton").modal("hide");
          }
        });
    }
  },
  created() {
    eventEmitter.$on("linkButtonShow", () => {
      http.get("showlinkButton").then(response => {
        $("#sel").val(response.data.action);
        this.name = response.data.name;
        $("#sel").val(response.data.action);
      });
      $("#linkButton").modal("show");
    });
  }
};
</script>
