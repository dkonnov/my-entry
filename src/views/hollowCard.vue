<template>
<div class="card"> 
<div class="card-body">
  <div class="row">
  <div class="col-md-6">
  <div class="info info-horizontal" stype="padding: 0px 0 30px;">
    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="1s"> 
      <div class="icon icon-primary">
        <i class="material-icons">accessibility_new</i>
      </div>
      <div class="description">
        <h4 class="info-title">Онлайн визитки бесплатно</h4>
        <p class="description">
          Создайте вашу онлайн визитку за несколько минут. Добавляйте ссылку на нее в Instagram, на визитки и т.д. Это значительно улучшит взаимодействие с вашими клиентами. Кроме того, <b>это бесплатно</b>.
        </p>
      </div>
    </div>
         
    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="2s"> 
      <div class="icon icon-rose">
        <i class="material-icons">gesture</i>
      </div>
      <div class="description">
        <h4 class="info-title">Все необходимое</h4>
        <p class="description">
          Добавьте ссылки на ваши социальные сети, аватар, фон, необходимые кнопки, описание услуг, товаров или просто вашей неповторимой личности.
        </p>
      </div>
    </div>

    <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="3s"> 
      <div class="icon icon-rose">
        <i class="material-icons">phonelink</i>
      </div>
      <div class="description">
        <h4 class="info-title">На всех устройствах</h4>
        <p class="description">
          Ваша страница, будет выглядеть хорошо на всех устройствах! Как на больших мониторах, так и на маленьких смартфонах.
        </p>
      </div>
    </div>
    <br>
    <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="4s">
      <center>
        <a class="btn btn-info btn-round" @click="showRegistrationForm()" href="#">Создать страницу</a>
      </center>
    </div>
  </div>
</div>

<div class="col-md-6">
<div class="card card-raised card-carousel">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" style="height:100%">
      <img class="d-block w-100 h-100" src="img/slides/slide1.jpg" alt="Первый слайд">
      <div class="carousel-caption d-none d-md-block">
        <h4>
          <i class="material-icons">contacts</i>
          Бесплатные онлайн-визитки, которые смотрятся красиво на любом устройстве
        </h4>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-100" src="img/slides/slide2.jpg" alt="Второй слайд">
      <div class="carousel-caption d-none d-md-block">
        <h4>
          <i class="material-icons">call</i>
          Все популярные способы связи
        </h4>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-100" src="img/slides/slide3.jpg" alt="Третий слайд">
      <div class="carousel-caption d-none d-md-block">
        <h4>
          <i class="material-icons">panorama</i>
          Большой выбор красивых фонов
        </h4>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 h-100" src="img/slides/slide4.jpg" alt="Четвертый слайд">
      <div class="carousel-caption d-none d-md-block">
        <h4>
          <i class="material-icons">phone_iphone</i>
          Свой короткий адрес и QR код
        </h4>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
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
  name: 'hollowCard',
  data () {
    return {
    //  hollowCard: true
     }
  },
  methods: {
    showRegistrationForm() {
      eventEmitter.$emit('showRegistrationForm');
    }
  },
  beforeMount(){ 
    axios
      .get('public/my_entry.php?action=getRandomBackground')
      .then(response => {
        document.getElementById("backgroundDiv").style.backgroundImage='url(\'img/backgrounds/'+response.data+'\')';
      })
  }
}
</script>
