<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
  <link rel="icon" type="image/png" href="img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    My Entry - Онлайн визитки бесплатно!
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  
  <!-- WOW JS -->
  <link rel="stylesheet" type="text/css" href="css/animate.min.css">
  <script src="js/wow.min.js"></script>
	<script>
    new WOW().init();
	</script> 
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
</script>

<!-- End Facebook Pixel Code -->
  <!--  Fonts and icons  -->
  <link href="fontawesome5/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  
  <!-- CSS Files -->
  <link href="css/material-kit.min.css" rel="stylesheet" />
  <link href="css/my-entry.css?t=<?php echo(microtime(true)); ?>" rel="stylesheet" />
 
</head>

<body class="login-page sidebar-collapse">
<div id="app">

  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate" style=" position: relative;">
        <a class="navbar-brand" href="http://my-entry.ru">
        <h4 class="card-title" style="color:white">My-Entry</h4></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
          </button>
      </div>

      <div id="main-nav" class="collapse navbar-collapse" v-if="mainnav">
        <ul class="navbar-nav ml-auto">
        
        <li class="dropdown nav-item" v-show="!buttonLogin"  style="margin-top: 22px;">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
            <i class="material-icons">gesture</i> Оформление
          </a>
          <div class="dropdown-menu dropdown-with-icons">
            <a href="#" class="dropdown-item" v-on:click="showUserAvatar()">
              <i class="material-icons">face</i> Аватар
            </a>
            <a href="#" class="dropdown-item" v-on:click="showUserInfo()">
              <i class="material-icons">list_alt</i> О себе
            </a>
            <a href="#" class="dropdown-item" v-on:click="showDesignForm()">
              <i class="material-icons">insert_photo</i> Фон
            </a>
            <a href="#" class="dropdown-item" v-on:click="showUserInfoSocial()">
              <i class="material-icons">recent_actors</i> Соцсети и способы связи
            </a>
            <a href="#" class="dropdown-item" v-on:click="showlinkButton()">
              <i class="material-icons">screen_share</i> Кнопка связи
            </a>
            <a href="#" class="dropdown-item" v-on:click="showAddServiceForm()">
              <i class="material-icons">playlist_add</i> Добавить услугу
            </a>
          </div>
        </li>
        
        <li class="nav-item" v-show="buttonLogin" style="margin-top: 22px;margin-right: 15px;margin-left: 15px;">
          <a class="btn btn-success btn-block btn-round" data-toggle="collapse" data-target=".navbar-collapse.show" href="#" v-on:click="showLoginForm()">
            <i class="material-icons">meeting_room</i> Вход</a>
        </li>

        <li class="dropdown nav-item" v-show="!buttonLogin"  style="margin-top: 22px;">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
            <i class="material-icons">face</i><b> {{ userName }} </b>
          </a>
          <div class="dropdown-menu dropdown-with-icons">
            <a href="#" class="dropdown-item" v-on:click="showQRCodeForm()">
            <i class="material-icons">code</i> QR-код и адрес</a>
            <a href="#" class="dropdown-item" v-on:click="changeLoginNameFormShow()">
            <i class="material-icons">code</i> Сменить адрес</a>
            <a href="#" class="dropdown-item" v-on:click="showZoneRu()">
            <i class="material-icons">language</i> Создать визитку в зоне RU</a>
            <a href="#" class="dropdown-item" v-on:click="logout()">
            <i class="material-icons">meeting_room</i> Выход </a>
          </div>
        </li>

        </ul>
      </div>
    </div>
  </nav>
  <div id="backgroundDiv" class="page-header header-filter" style="background-size: cover; background-position: top center;">
  
  <!-- Desktop -->   
  <div class="container wow fadeIn" data-wow-duration="2s" style="display: flex;  align-items: center; flex-direction: column;">
  
  <!-- Hollow Card -->   
  <div class="card" v-show="hollowCard" style="display: none;">
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
     

  <!-- Main Card -->                
 
    <div class="row" v-show="mainCard" style="display: none;">
  
      <div class="card card-profile" style="max-width: 500px">

        <div v-show="avatar" class="card-avatar wow fadeInDown" data-wow-duration="2s" data-wow-delay="1s"> 
          <a href="#" @click="showUserAvatarIfLogined()">
            <img src="img/placeholder.jpg" id="avatarimg" class="img-raised rounded-circle img-fluid">
          </a>
        </div>
        <div class="card-body">
          <div @click="showUserInfoIfLogined()">
            <h4 class="card-title wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s">{{ mainCardName }}</h4>
            <h6 class="card-category text-gray wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s">{{ mainСardSpecialization }}</h6>
          </div>
          
          <template v-for="userSocButton in userInfoSoc">
            <a class="btn btn-just-icon btn-link wow fadeInUp" data-wow-duration="2s" :data-wow-delay="userSocButton.delay" :href="userSocButton.href" target=new>
              <i :class="userSocButton.icon"></i>        
              <div class="ripple-container"></div>
            </a>
          </template>

          <div @click="showUserInfoIfLogined()">
            <p class="card-description wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">
                {{ mainCardAbout }}
            </p>  
          </div>
          <a v-show="linkButton" class="btn btn-info btn-round wow fadeIn" data-wow-duration="2s" data-wow-delay="2s" :href="linkButtonHref">{{ linkButtonName }}</a>

          <div id="accordion" role="tablist" aria-multiselectable="false" class="card-collapse">

          <template v-for="userService in userServices">
            <div class="card card-plain wow fadeInUp" data-wow-duration="1s" :data-wow-delay="userService.delay">
              <div class="card-header" role="tab" :id="userService.heading" style="padding-top: 0px;padding-right: 0px;">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" :href="userService.href" aria-expanded="flase" aria-controls="collapseOne" style="padding-left: 24px;">
                  {{ userService.name }} {{ userService.price }}
                  <i class="material-icons">keyboard_arrow_down</i>
                 </a>
              </div>

              <div :id="userService.collapse" class="collapse" role="tabpanel" :aria-labelledby="userService.heading">
                <div class="card-body wow fadeIn" data-wow-duration="2s" >
                  {{ userService.description }}

                  <div class="dropdown wow fadeIn" data-wow-duration="2s" data-wow-delay="1s" align=right style="margin-right: -4px;">
                    <!-- <button class="btn btn-primary btn-sm btn-round">Заказать</button> -->
                    <template v-if="ifLogined">
                    <button class="btn btn-secondary btn-fab btn-fab-mini btn-round" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="material-icons">more_horiz</i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#" @click="showAddServiceForm(userService.id)">Редактировать</a>
                      <a class="dropdown-item" href="#" @click="deleteService(userService.id)">Удалить</a>
                    </div>
                    </template>
                  </div>

    
                </div>
              </div>
            </div>
          </template>

<!-- <div class="row">
<div class="col-md-6">
          <div class="card card-product">
						<div class="card-header card-header-image">
							<a href="#pablo">
								<img class="img" src="card-product1.jpg">
							</a>
						<div class="colored-shadow" style='background-image: url("card-product1.jpg"); opacity: 1;'></div></div>
						<div class="card-body">
								<h6 class="card-category text-rose">популярно</h6>
								<h4 class="card-title">
									<a href="#pablo">Dolce &amp; Gabbana</a>
								</h4>
								<div class="card-description">
									Платье с флоральным принтом от Dolce &amp; Gabbana's. Настоящее итольянское качество.
								</div>

							</div>
						<div class="card-footer justify-content-between">
								<div class="price">
									<h4>1459 р.</h4>
								</div>
								<div class="stats">
									<button title="" class="btn btn-just-icon btn-link btn-rose" type="button" data-original-title="Saved to Wishlist" rel="tooltip">
										<i class="material-icons">favorite</i>
									</button>
								</div>
							</div>
						</div>

  


</div>
</div> -->



  </div>



        

      </div>
      
    
  </div>
  </div>
</div>
  <!-- End of Desktop --> 
  </div>

  <!-- Login Modal -->                
  <div class="modal fade" id="loginForm" tabindex="-1" role="dialog" aria-labelledby="loginForm" aria-hidden="false"> 
   <div class="modal-dialog" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;">
        <div class="col-lg-8 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="" action="">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Авторизация</h4>
                <div class="social-line"></div>
              </div>
              <p class="description text-center">Введите учетные данные</p>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input v-model="emailLogin" @input="emailLoginCheck" type="email" class="form-control" placeholder="Электронная почта ...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input v-model="password" type="password" class="form-control" placeholder="Пароль ...">
                </div>
              </div>
              <div class="footer text-center">
                <button v-show="loginOk" v-on:click="say()" type="button" class="btn btn-primary btn-round" data-toggle="modal">Вход</button>
                <button v-show="!loginOk" type="button" class="btn btn-primary btn-round" data-toggle="modal" disabled>Вход</button>
                <br>
                <a href="#" @click="showRegistrationForm()" class="btn btn-primary btn-link btn-wd">Регистрация</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

   <!-- Registration Modal -->   
   <div class="modal fade" id="registrationForm" tabindex="-1" role="dialog" aria-labelledby="registrationForm" aria-hidden="false"> 
   <div class="modal-dialog form2" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;">
          <div class="card card-login">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Регистрация</h4>
                <div class="social-line"></div>
              </div>
              <div class="card-body" style="padding-left: 50px;">
              <div class="row">
              <div class="col-md-6">
              <div class="info info-horizontal" stype="padding: 0px 0 30px;">
                  <div class="icon icon-primary">
                   <i class="material-icons">accessibility_new</i>
                  </div>
                  <div class="description">
                    <h4 class="info-title">Добро пожаловать</h4>
                    <p class="description">
                    Зарегистрируйтесь сейчас и используйте больше возможностей системы.
                    </p>
                  </div>
               
                  <div class="icon icon-rose">
                   <i class="material-icons">favorite_border</i>
                  </div>
                  <div class="description">
                    <h4 class="info-title">Это бесплатно</h4>
                    <p class="description">
                    Наш сервис для вас полностью бесплатен! Вы можете пользоваться всеми его функциями.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <form class="form2" method="" action="">
                <p class="description text-center">Введите учетные данные</p>
                <div class="card-body">

                <div class="input-group form-group label-floating has-success">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input v-model="nameRegistration" v-on:input="nameRegistrationCheck"  type="text" class="form-control" placeholder="Адрес (my-entry.ru\имя)">
                  <button v-show="nameRegistrationOk" class="form-control-feedback">
                    <i class="material-icons">done</i>
                  </button>  
                  <button v-show="!nameRegistrationOk" class="form-control-feedback" data-toggle="tooltip" data-placement="right" title="Имя страницы должно быть уникальным, начинаться с латинской буквы и может содержать только латинские буквы и цифры.">
                    <i class="material-icons">clear</i>
                  </button>  
                  
                </div>
                
                  <div class="input-group form-group label-floating has-success">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">mail</i>
                      </span>
                    </div>
                    <input v-model="emailRegistration" v-on:input="emailRegistrationCheck" type="email" class="form-control" placeholder="Электронная почта ...">
                    <button v-show="emailRegistrationOk" class="form-control-feedback">
                      <i class="material-icons">done</i>
                    </button>  
                    <button v-show="!emailRegistrationOk" class="form-control-feedback" data-toggle="tooltip" data-placement="right" title="Необходимо ввести адрес электронной почты, которого нет в системе. Возможны вы ранее уже регистрировались, попробуйте войти или восстановить пароль.">
                      <i class="material-icons">clear</i>
                    </button>
                  </div>

                  <div class="input-group form-group label-floating has-success">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input v-model="password" type="password" v-on:input="passwordCheck" class="form-control" placeholder="Пароль ...">
                    <button v-show="passwordOk" class="form-control-feedback">
                      <i class="material-icons">done</i>
                    </button>  
                    <button v-show="!passwordOk" class="form-control-feedback" data-toggle="tooltip" data-placement="right" title="Пароль дожен состоять минимум из 6 символов">
                      <i class="material-icons">clear</i>
                    </button>
                  </div>

                  <div class="input-group form-group label-floating has-success">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input v-model="password2" type="password"  v-on:input="password2Check" class="form-control" placeholder="Пароль еще раз ...">
                    <button v-show="password2Ok" class="form-control-feedback">
                      <i class="material-icons">done</i>
                    </button>
                    <button v-show="!password2Ok" class="form-control-feedback" data-toggle="tooltip" data-placement="right" title="Пароли не совпадают">
                      <i class="material-icons">clear</i>
                    </button>

                </div>
                <br>
                <center>
                  <button v-show="registrationOk" v-on:click="registration()" type="button" class="btn btn-primary btn-round" data-toggle="modal">Регистрация</button>
                  <button v-show="!registrationOk" type="button" class="btn btn-primary btn-round" data-toggle="modal" disabled>Регистрация</button>
                  <br>
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
    </div> 

    


  <!-- Background Modal -->                
  <div class="modal fade" id="designForm" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form3" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">Фон</h2>
				<div class="card-body">
          <div class="row">
            <div class="tab-content tab-space">
              <?php
                $count = 0;
                $page_count = 0;
                $dir = opendir('img/backgrounds');
                while($file = readdir($dir)){
                  if($file == '.' || $file == '..'){
                    } else {
                      if ($count == 0 && $page_count == 0){echo "<div class=\"tab-pane active\" id=\"link" . $page_count . "\" aria-expanded=\"true\"><div class=\"row\">";} 
                      if ($count == 0 && $page_count != 0) {echo "<div class=\"tab-pane\" id=\"link" . $page_count . "\" aria-expanded=\"false\"><div class=\"row\">";}
                      echo "
                      <div v-on:click=\"changeBackground('" . $file . "')\"  class=\"col-md-4\">
                      <div class=\"card card-plain\">
                        <div class=\"card-header card-header-image\">
                          <div class=\"card-header-image-bg\"></div>
                          <img src=\"img/backgrounds/" . $file . "\">
                          <div class=\"colored-shadow\" style='background-image: url(\"img/backgrounds/$file\"); opacity: 1;'></div>
                        </div>
                      </div>
                      </div>
                    ";
                    $count++;
                    if ($count == 6){
                      $count = 0;
                      echo "</div></div>";
                      $page_count++;
                    }
                    
                    } 
                  }
                  if ($count != 0){
                    echo "</div></div>";
                  }
                ?>
              </div>
            </div>
            </div>
            
            <center>
            <div width=100% style="display: flex;align-items: center; justify-content: center;">
            <ul class="pagination nav nav-pills nav-pills-primary" role="tablist">
              <li class="page-item"><a class="page-link  active" data-toggle="tab" href="#link0" role="tablist" aria-expanded="true">1<div class="ripple-container"></div></a></li>
              <li class="page-item"><a class="page-link" data-toggle="tab" href="#link1" role="tablist" aria-expanded="false">2</a></li>
              <li class="page-item"><a class="page-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">3</a></li>
              <li class="page-item"><a class="page-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false">4</a></li>
              <li class="page-item"><a class="page-link" data-toggle="tab" href="#link4" role="tablist" aria-expanded="false">5</a></li>
            </ul>
            </div>
            <a href="#" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
            </center>
            </div> 
          </div>
			</div>
		</div>
  </div>
   
<!-- Avatar -->                
<div class="modal fade" id="userAvatar" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form5" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">Аватар</h2>
          <div class="row">
          <div class="card-body">
          <center>
            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
              <div class="fileinput-new thumbnail img-circle img-raised">
                <img id="avatarimgform" src="img/placeholder.jpg">
              </div>
              <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div><br><br>
                <div>
                <span class="btn btn-raised btn-round btn-default btn-file">
                  <span class="fileinput-new">Добавить фото</span>
                  <span class="fileinput-exists">Заменить фото</span>
                  <input name="userfile" id="userfile" type="file" accept="image/jpeg" v-model="addAvatarSrc" @change="addAvatar"><div class="ripple-container"></div>
                </span>
                <a v-show="deleteAvatarButton" class="btn btn-info btn-round" @click="deleteAvatar()" href="#"><i class="fa fa-times"></i> Удалить</a>
              </div>
            </div>
          <a href="#" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
          </center>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Change Login Name -->                
<div class="modal fade" id="changeLoginNameForm" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form5" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">Сменить адрес</h2>
          <div class="row">
          <div class="card-body">
          <center>
            <p class="card-description">
              Вам не нравиться адрес вашей страницы, и вы хотите его сменить? В поле ниже вы можете подобрать новое имя!
            </p>  
            <div class="input-group form-group label-floating has-success">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons" style="margin-left: -15px;">face</i>
                    </span>
                  </div>
                  <input v-model="nameRegistration" v-on:input="nameRegistrationCheck" type="text" class="form-control" placeholder="Имя (my-entry.ru\имя)">
                  <button v-show="nameRegistrationOk" class="form-control-feedback">
                    <i class="material-icons" style="margin-top: 28px;">done</i>
                  </button>  
                  <button v-show="!nameRegistrationOk" class="form-control-feedback" data-toggle="tooltip" data-placement="right" title="Имя страницы должно быть уникальным, начинаться с латинской буквы и может содержать только латинские буквы и цифры.">
                    <i class="material-icons" style="margin-top: 28px;">clear</i>
                  </button>  
                  
                </div><br>
                <div v-show="nameRegistrationOk">Адрес вашей страницы будет:<br><b>http://my-entry.ru/{{ nameRegistration }}</b></div>
                <br>
                <button v-show="nameRegistrationOk" v-on:click="changeLoginNameFormSave()" type="button" class="btn btn-primary btn-round" data-toggle="modal">Сохранить</button>
                <button v-show="!nameRegistrationOk" type="button" class="btn btn-primary btn-round" data-toggle="modal" disabled>Сохранить</button>
                <br>
                <a href="#" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
          </center>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<!-- QR Code -->                
<div class="modal fade" id="QRCode" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form5" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">QR Code</h2>
          <div class="row">
          <div class="card-body">
          <center>
            <img width=150 id="QRCodeImg">
            <small id="emailHelp" class="form-text text-muted">Используйте QR код на ваших визитках, листовках и т.д. Ваши клиенты смогут переходить к вам на страницу просто наведя камеру смартфона на QR код. Сохранить код в виде картинки можно нажатием правой кнопкой мыши по нему или длительным удержанием пальца.</small>
            <br>
            Адрес вашей страницы:<br><b>{{ userPageURL }}</b>
            <br>
            <br>
            <a href="#" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
          </center>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Link Button -->                
<div class="modal fade" id="linkButton" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form5" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">Кнопка связи</h2>
          <div class="row">
          <div class="card-body">
          
          <form>
            <div class="form-group">
            <label>Действие при нажатии</label>
            <select v-model="linkButtonAction" id="sel" class="form-control" data-style="btn btn-link">
              <option value="notShow">Не отображать кнопку</option>
              <option value="wa">Написать в WhatsApp</option>
              <option value="tel">Позвонить по телефону</option>
              <option value="email">Написать на электронную почту</option>
            </select>
            <small class="form-text text-muted">Данные берутся из раздела "Соцсети и способы связи".</small>
            </div>
          <div class="form-group">
              <label>Текст на кнопке</label>
              <input type="text" v-model="linkButtonName" class="form-control">
          </div>
          <!-- <div class="form-check disabled">
          <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="" disabled  checked="checked">
            Взять данные из раздела "Соцсети и способы связи"
            <span class="form-check-sign">
              <span class="check"></span>
            </span>
          </label>
          </div> -->

        </form>

        <br>
        <center>
          <button type="submit" class="btn btn-primary btn-round" @click="showlinkButtonSave()">Сохранить</button>
          <a href="#" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
        </center>
        
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Add Service Form -->                
<div class="modal fade" id="addServiceForm" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form5" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">{{ addServiceWindowName }}</h2>
          <div class="row">
          <div class="card-body">
          <form>
          <div class="form-group">
              <label>Название услуги</label>
              <input type="text" v-model="addServiceFormName" v-on:input="addServiceFormNameCheck" class="form-control">
              <small id="emailHelp" class="form-text text-muted">Обязательное поле</small>
          </div>
          <div class="form-group">
              <label>Описание услуги</label>
              <textarea class="form-control" v-model="addServiceFormDescription" rows="4" placeholder=""></textarea>
              <small id="emailHelp" class="form-text text-muted">Опишите подробности оказываемой услуги</small>
          </div>
          <div class="form-group">
              <label>Стоимость</label>
              <input type="text" v-model="addServiceFormPrice" class="form-control">
          </div>
        </form>
        <br>
        <center>
          <button v-show="addServiceFormOk" type="submit" class="btn btn-primary btn-round" @click="addServiceFormSave()">{{ addServiceWindowButton }}</button>
          <button v-show="!addServiceFormOk" type="submit" class="btn btn-primary btn-round" disabled>{{ addServiceWindowButton }}</button>
          <a href="#" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
        </center>
        
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- User Info -->                
<div class="modal fade" id="userInfo" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form5" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">О себе</h2>
          <div class="row">
          <div class="card-body">
            <form>
            <div class="form-group">
              <label>Имя</label>
              <input type="text" v-model="userInfoName" class="form-control" aria-describedby="userInfoName" placeholder="Отображаемое имя ...">
            </div>

            <div class="form-group">
              <label>Специализация</label>
              <input type="text" v-model="userInfoSpecialization" class="form-control" aria-describedby="userInfoNameSpecialization" placeholder="Чем вы занимаетесь...">
              <small id="emailHelp" class="form-text text-muted">Ваша професиия или специализация. Например, "Web дизайнер", "Мастер депиляции", "Маркетолог".</small>
            </div>
  
            <div class="form-group">
              <label>О себе</label>
              <textarea class="form-control" v-model="userInfoAbout" rows="5" placeholder="Опишите чем вы занимаетесь, что предлагаете ..."></textarea>
            </div>

            <center>
              <button type="submit" class="btn btn-primary btn-round" @click="showUserInfoSave()">Сохранить</button>
              <a href="#pablo" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
            </center>
          </form>

        </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- User Info Social-->                
<div class="modal fade" id="userInfoSocial" tabindex="-1" role="dialog" aria-hidden="false"> 
  <div class="modal-dialog form4" role="document">
   <div class="modal-content" style="background-color:transparent;box-shadow: none;" >
     <div class="col-lg-8 col-md-6 ml-auto mr-auto">  
      <div class="card card-signup" style="padding-left: 15px;padding-right: 15px;padding-top: 15px;padding-bottom: 15px;">
				<h2 class="card-title text-center">Соцсети</h2>
          
          <div class="card-body">
          <form>
          <div class="row">
          
            <div class="col-md-6">
              
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text  userInfoSocial">
                    <i class="fab fab fa-instagram"></i>     
                  </span>
                </div>
                <input v-model="userInfoInstagram" type="text" class="form-control" placeholder="Профиль Instagram ...">
              </div>
              <div style="margin-top:-10px; margin-left:30px">
                <small id="emailHelp" class="form-text text-muted">Введите имя профиля Instagram без использования символа "@".</small>
              </div>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text userInfoSocial">
                    <i class="fab fab fa-whatsapp"></i>     
                  </span>
                </div>
                <input v-model="userInfoWhatsApp" type="text" class="form-control" placeholder="Номер телефона для WhatsApp ...">
              </div>
            
              <div class="input-group" style="margin-top: 0px;">
                 <div class="input-group-prepend">
                  <span class="input-group-text userInfoSocial">
                    <i class="fab fab fa-whatsapp wa-white"></i>     
                  </span>
                </div>
                <textarea class="form-control" v-model="userInfoWhatsAppText" rows="3" placeholder="Приветствие для WhatsApp ..."></textarea>
              </div>
              <div style="margin-top:-10px; margin-left:30px">
                <small id="emailHelp" class="form-text text-muted">Например, «Привет! Меня заинтересовал Ваш товар.»</small>
              </div>
            
            </div>
    
            <div class="col-md-6">

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text userInfoSocial">
                  <i class="fas fa-envelope"></i>   
                </span>
              </div>
              <input v-model="userInfoEMail" type="email" class="form-control" placeholder="Электронная почта ...">
            </div>
            <div style="margin-top:-10px; margin-left:30px">
              <small id="emailHelp" class="form-text text-muted">Укажите адрес электронной почты</small>
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text userInfoSocial">
                  <i class="fas fa-phone"></i>     
                </span>
              </div>
              <input v-model="userInfoPhone" type="email" class="form-control" placeholder="Телефон ...">
            </div>
            <div style="margin-top:-10px; margin-left:30px">
              <small id="emailHelp" class="form-text text-muted">Укажите номер телефона для связи</small>
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text userInfoSocial">
                  <i class="fab fa-facebook-square"></i>     
                </span>
              </div>
              <input v-model="userInfoFacebook" type="email" class="form-control" placeholder="Профиль Facebook ...">
            </div>
            <div style="margin-top:-10px; margin-left:30px">
              <small id="emailHelp" class="form-text text-muted">Укажите только имя пользовятеля, которое идет после адреса "facebook.com\"</small>
            </div>
  
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text userInfoSocial">
                  <i class="fab fa-vk"></i>     
                </span>
              </div>
              <input v-model="userInfoVK" type="email" class="form-control" placeholder="Профиль ВКонтакте ...">
            </div>
            <div style="margin-top:-10px; margin-left:30px">
              <small id="emailHelp" class="form-text text-muted">Укажите только имя пользовятеля, которое идет после адреса "vk.com\"</small>
            </div>
            
            </div>
            
          </form>

        </div>
          <center>
            <br>
            <button type="submit" class="btn btn-primary btn-round" @click="showUserInfoSocialSave()">Сохранить</button>
            <a href="#pablo" class="btn btn-primary btn-link btn-wd" data-dismiss="modal">Закрыть</a>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="modalWindow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
       <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Сообщение</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ errorMessage }}
       </div>
        <div class="modal-footer">
         <div v-show="sendPassword" v-on:click="sendPasswordF()"><button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Отправить пароль</button></div>
         <div v-show="toRegistration" v-on:click="showRegistrationForm()"><button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Регистрация</button></div>
         <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Закрыть</button>
         </div>
     </div>
    </div>
  </div>

    <footer class="footer">
      <div class="container" v-show="footer">
        <nav class="float-left">
      
        <a href="https://www.facebook.com/myentryru">
          <button class="btn btn-social btn-link">
            <i class="fa fa-facebook-square" style="color:white"></i>
          </button>
        </a>
        
        <a href="https://www.instagram.com/myentryru/">
          <button class="btn btn-social btn-link">
            <i class="fa fa-instagram" style="color:white"></i>
          </button>
        </a>
      
        </nav>
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script> 
          <a href="http://my-entry.ru/dima"> Д. Коннов</a>.
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="js/core/jquery.min.js" type="text/javascript"></script>
  <script src="js/core/popper.min.js" type="text/javascript"></script>
  <script src="js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="js/material-kit.min.js" type="text/javascript"></script>



<!-- VUE + Axiaos + My Entry -->
<script src="js/vue.js"></script>
<script src="js/axios.min.js"></script>
<script src="js/my-entry.js?t=<?php echo(microtime(true)); ?>"></script>

</div>


<!-- Yandex.Metrika counter -->
<!-- <script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(53446948, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/53446948" style="position:absolute; left:-9999px;" alt="" /></div></noscript> -->
<!-- /Yandex.Metrika counter -->

</body>

</html>