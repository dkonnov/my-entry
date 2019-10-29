<template>
  <div class="modal fade" id="addressFrom" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog form5" role="document">
      <div class="modal-content" style="background-color:transparent;box-shadow: none;">
        <div class="col-lg-8 col-md-6 ml-auto mr-auto">
          <div
            class="card card-signup"
            style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;"
          >
            <h2 class="card-title text-center">QR Code</h2>
            <div class="row">
              <div class="card-body">
                <center>
                  <img width="150" id="QRCodeImg" />
                  <small
                    id="emailHelp"
                    class="form-text text-muted"
                  >Используйте QR код на ваших визитках, листовках и т.д. Ваши клиенты смогут переходить к вам на страницу просто наведя камеру смартфона на QR код. Сохранить код в виде картинки можно нажатием правой кнопкой мыши по нему или длительным удержанием пальца.</small>
                  <br />Адрес вашей страницы:
                  <br />
                  <b>{{ userPageURL }}</b>
                  <br />
                  <br />
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
import { eventEmitter } from "./../main";

export default {
  name: "addressFrom",
  data() {
    return {
      userPageURL: ""
    };
  },
  created() {
    eventEmitter.$on("showAddressFrom", () => {
      document.getElementById("QRCodeImg").src =
        "https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=http://my-entry.ru/" +
        this.$store.state.currentUserName +
        "&chld=H&choe=UTF-8";
      this.userPageURL =
        "http://my-entry.ru/" + this.$store.state.currentUserName;
      $("#addressFrom").modal("show");
    });
  }
};
</script>

