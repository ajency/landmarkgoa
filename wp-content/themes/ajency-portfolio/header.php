<!doctype html>
<html lang="en">
  <head>
    <title><?php wp_title(); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <style type="text/css">
      *,:after,:before{box-sizing:border-box}html{font-family:sans-serif;line-height:1.15;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;-ms-overflow-style:scrollbar}@-ms-viewport{width:device-width}nav,section{display:block}body{margin:0;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol;font-size:.85rem;font-weight:400;line-height:1.5;color:#212529;text-align:left;background-color:#fff}h1,h3,h4{margin-top:0;margin-bottom:.5rem}p{margin-top:0;margin-bottom:1rem}a{color:#4aa751;text-decoration:none;background-color:transparent;-webkit-text-decoration-skip:objects}img{vertical-align:middle;border-style:none}button{border-radius:0}button{margin:0;font-family:inherit;font-size:inherit;line-height:inherit}button{overflow:visible}button{text-transform:none}button{-webkit-appearance:button}button::-moz-focus-inner{padding:0;border-style:none}::-webkit-file-upload-button{font:inherit;-webkit-appearance:button}.h1,h1,h3,h4{margin-bottom:.5rem;font-family:inherit;font-weight:500;line-height:1.2;color:inherit}.h1,h1{font-size:2.125rem}h3{font-size:1.375rem}h4{font-size:1.275rem}.display-4{font-weight:300;line-height:1.2}.display-4{font-size:3.5rem}.img-fluid{max-width:100%;height:auto}.container{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}@media (min-width:1200px){.container{max-width:1800px}}.row{display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px}.col,.col-xl-8{position:relative;width:100%;min-height:1px;padding-right:15px;padding-left:15px}.col{flex-basis:0;flex-grow:1;max-width:100%}@media (min-width:1200px){.col-xl-8{flex:0 0 66.66667%;max-width:66.66667%}.offset-xl-2{margin-left:16.66667%}}.btn{display:inline-block;font-weight:400;text-align:center;white-space:nowrap;vertical-align:middle;border:1px solid transparent;padding:.375rem .75rem;font-size:.85rem;line-height:1.5;border-radius:.25rem}.btn-primary{background-color:#4aa751;border-color:#4aa751}.fade:not(.show){opacity:0}.collapse:not(.show){display:none}.card-body{flex:1 1 auto;padding:1.25rem}.alert-info{color:#0c5460;background-color:#d1ecf1;border-color:#bee5eb}.alert-danger{color:#5a0905;background-color:#efcfce;border-color:#e8bcba}.modal{overflow:hidden}.modal{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1050;display:none;outline:0}.modal-dialog{position:relative;width:auto;margin:.5rem}.modal.fade .modal-dialog{transform:translateY(-25%)}.modal-content{position:relative;display:flex;flex-direction:column;width:100%;background-color:#fff;background-clip:padding-box;border:1px solid rgba(0,0,0,.2);border-radius:.2rem;outline:0}.modal-body{position:relative;flex:1 1 auto;padding:1rem}@media (min-width:576px){.modal-dialog{max-width:500px;margin:1.75rem auto}}.bg-white{background-color:#fff!important}.rounded-0{border-radius:0!important}.d-none{display:none!important}.d-inline-block{display:inline-block!important}.d-flex{display:flex!important}@media (min-width:992px){.d-lg-block{display:block!important}}.justify-content-end{justify-content:flex-end!important}.justify-content-center{justify-content:center!important}.position-relative{position:relative!important}.w-100{width:100%!important}.mb-2{margin-bottom:.5rem!important}.mr-3{margin-right:1rem!important}.mb-3{margin-bottom:1rem!important}.mb-4{margin-bottom:1.5rem!important}.mt-5{margin-top:3rem!important}.p-0{padding:0!important}.pr-2{padding-right:.5rem!important}.pl-3{padding-left:1rem!important}.p-5{padding:3rem!important}@media (min-width:768px){.mb-md-0{margin-bottom:0!important}}@media (min-width:992px){.mb-lg-0{margin-bottom:0!important}.mt-lg-1{margin-top:.25rem!important}.ml-lg-2{margin-left:.5rem!important}.mb-lg-3{margin-bottom:1rem!important}.mt-lg-5{margin-top:3rem!important}.pt-lg-2{padding-top:.5rem!important}.pb-lg-2{padding-bottom:.5rem!important}.pl-lg-2{padding-left:.5rem!important}}.text-center{text-align:center!important}@media (min-width:992px){.text-lg-center{text-align:center!important}}.text-uppercase{text-transform:uppercase!important}.font-weight-light{font-weight:300!important}.font-weight-bold{font-weight:700!important}.text-primary{color:#4aa751!important}.text-white{color:#fff!important}.location-icon{display:inline-block;background:#4aa751;color:#fff;width:25px;height:25px;text-align:center;padding:1px;border-radius:50%}.location-icon i{font-size:10px}#selected-location-address{position:absolute;right:15px;left:15px;top:100%;display:none}@media (min-width:992px){.delivery-location{position:relative}.delivery-location #selected-location-address{position:absolute;right:15px;left:30px;top:-10px;width:400px;z-index:1}}#selected-location-address{margin-top:5px}@media (max-width:991px){#selected-location-address:after{content:"";position:absolute;left:5px;top:-9px;width:0;height:0;clear:both;border-left:10px solid transparent;border-right:10px solid transparent;border-bottom:10px solid #eeefee}}@media (min-width:768px) and (max-width:991px){#selected-location-address:after{left:19px}}@media (min-width:992px){#selected-location-address{margin-top:0}}.number-edit{position:absolute;top:50%;right:15px;transform:translateY(-50%);color:#fff;background:#4aa751;padding:7px;border-radius:50%}.push{position:fixed;top:0;right:0;left:0;bottom:0;z-index:99999;background-color:rgba(0,0,0,.5)}.push-note{width:500px;margin:0 auto;background:#fff;padding:15px}@media (max-width:520px){.push-note{width:100%}}@media (min-width:992px) and (max-width:1400px){.logo{width:170px!important}}@media (min-width:768px) and (max-width:991px){.logo{width:110px!important;margin:0 auto}}@media (min-width:320px) and (max-width:767.98px){.logo{width:100px!important;margin:0 auto}}nav{width:100%;padding-bottom:16px}@media (min-width:992px) and (max-width:1400px){nav.bg-white{padding-top:50px!important}}@media (min-width:320px) and (max-width:767.98px){nav.bg-white{padding-top:50px!important}}@media (min-width:768px) and (max-width:991px){nav{padding-bottom:16px;z-index:999}}@media (min-width:320px) and (max-width:767.98px){nav{padding-bottom:16px;padding-top:50px!important;z-index:999}}.img-fluid{width:100%}.img-fluid.auto-width{width:auto}.aj-home-title{line-height:5rem}@media (min-width:320px) and (max-width:767.98px){.aj-home-title{font-size:1.6rem;line-height:2.7rem}}@media (min-width:992px) and (max-width:1399.98px){.aj-home-title{line-height:4rem;font-size:2.9rem}}#imagemodal .modal-content{background-color:transparent;border:0}#imagemodal .modal-content .modal-body{height:100%;padding:0}#imagemodal .modal-dialog{transform:translate(0)!important}body{overflow-x:hidden}body{font-family:Work Sans,sans-serif}.body-text{font-size:1.75rem;line-height:1.428}@media (min-width:992px) and (max-width:1400px){.body-text.small-laptop-text{font-size:1.2rem}}@media (max-width:767px){.body-text.small-laptop-text{font-size:1.2rem}}@media (min-width:320px) and (max-width:767.98px){.body-text{font-size:1.375rem}}.btn,.btn-reset{outline:0}.btn-reset{background:transparent;border:0;border-radius:0}.btn-primary{border:1px solid #47a748;background:#47a748;color:#fff;padding:11px;text-decoration:none;text-transform:uppercase}.btn-inverted{background:#c4c8c4;border-color:#c4c8c4}.msg-container{position:fixed;right:0;left:0;bottom:0;z-index:2}@media (max-width:991px){.msg-container #react-view-cart-container{width:100%}}@media (min-width:992px){.msg-container{bottom:40px;right:85px;left:auto;max-width:410px;width:100%}}.success.toast{background:#ecf6ec;color:#4aa751}@media (min-width:992px){.success.toast{font-size:18px;background:#fff;color:#000;max-width:320px;margin-left:auto}}.failure.toast{background:#ecf6ec}@media (min-width:992px){.failure.toast{font-size:18px;background:#fff;color:#000;max-width:320px;margin-left:auto}}.p-15{padding:15px}.close-img{position:absolute;right:-20px;top:-18px}@media (max-width:991px){.close-img{right:-7px}}.cart-wrapper{position:fixed;top:0;right:0;bottom:0;height:100%;z-index:1200;transform:translate(500px);width:410px;padding:0 0 52px;background:#fff}.cart-app-loader{display:flex;justify-content:center;align-items:center;height:100vh;font-size:16px;font-weight:500;text-transform:uppercase}@media (max-width:480px){.cart-wrapper{width:100%}}.ft6{font-weight:600}@media (min-width:992px) and (max-width:1399.98px){.container{max-width:1200px}}.p5{padding-left:4rem;padding-right:4rem}@media (min-width:320px) and (max-width:767.98px){.p5{padding-left:1rem;padding-right:1rem}}@media (min-width:768px) and (max-width:991.98px){.p5{padding-left:2rem;padding-right:2rem}}@media (min-width:768px) and (max-width:1199.98px){.p5{padding-left:2rem!important;padding-right:2rem!important}}@media (min-width:992px) and (max-width:1399.98px){.p5{padding-left:0;padding-right:0}}section{padding-top:6rem;padding-bottom:6rem}@media (min-width:320px) and (max-width:767.98px){section{padding-top:4rem;padding-bottom:4rem}}.pt-6{padding-top:60px}@media (min-width:992px){.lg-w-50{width:50%;float:left}}.backdrop{position:fixed;min-height:100%;width:100%;top:0;left:0;background:rgba(173,181,189,.6);z-index:1199;display:none}.backdrop-wrap{position:fixed;min-height:100%;width:100%;top:0;left:0;background:rgba(173,181,189,.6);z-index:9999;display:none}.vertical-align-middle{vertical-align:middle}.mw-120{min-width:120px}.pt-6{padding-top:6rem!important}.mb-32{margin-bottom:32px}.mb-29{margin-bottom:29px}.full-screen-section{min-height:calc(100vh - 361px)}.full-screen-section h1,.full-screen-section img,.full-screen-section p{-webkit-animation:fadein 2s;animation:fadein 2s}@media (min-width:992px) and (max-width:1400px){.full-screen-section{min-height:calc(100vh - 235px)}.full-screen-section .aj-home-title{font-size:40px!important}}@media (max-width:991px){.full-screen-section{min-height:calc(100vh - 211px)}}@media (max-width:767px){.full-screen-section{min-height:calc(100vh - 175px)}}.sb-shadow{box-shadow:0 0 12px 0 rgba(0,0,0,.2)}nav img{-webkit-animation:fadein 2s;animation:fadein 2s}@keyframes fadein{0%{opacity:0}to{opacity:1}}@-webkit-keyframes fadein{0%{opacity:0}to{opacity:1}}@media (max-width:767px){body{-webkit-overflow-scrolling:touch;-ms-scroll-snap-type:y mandatory;scroll-snap-type:y mandatory;scroll-padding:20px}body>div{scroll-snap-align:start;scroll-snap-stop:normal}}.product-image img{width:100%;height:auto;display:block;margin:0 auto;box-shadow:0 2px 6px 0 rgba(0,0,0,.3)}@media (min-width:992px){.product-image img{transform:scale(1.2)}}@media (min-width:992px){.product-info{position:absolute;left:0;width:100%}.product-info{z-index:2;padding-left:25px!important;padding-right:25px!important}.product-info.hover-text{bottom:-100%}}@media (min-width:992px) and (max-width:1199px){.product-info{padding-left:15px!important;padding-right:15px!important}}.product-title{margin-top:15px;margin-bottom:7.5px}.product-image .item{display:none}@media (min-width:992px){.product-info h3.type{font-size:18px}.product-info h3.p-title{font-size:25px}}@media (min-width:992px){.product-info{color:#fff}}.site-loader{max-width:410px;margin-left:auto;background-color:hsla(0,0%,100%,.8);font-size:15px;line-height:20px;position:fixed;top:0;right:0;left:auto;width:100%;height:100%;overflow-x:hidden;overflow-y:scroll;z-index:1202;display:none}@media (max-width:767px){.site-loader{max-width:100%}}
      .custom-modal{
        opacity:0;
        visibility:hidden;
      }
      @media (min-width: 992px) {
        .product-wrapper{
          min-height: 33vh;
        }
      }   
    </style>
    <!-- <script>

        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://ajency.in/wp-content/cache/caos-analytics/analytics.js','ga');
            window[ 'ga-disable-UA-121565233-2' ] = false;
        ga('create', 'UA-121565233-2',
        {
            'cookieName':   'caosLocalGa',
            'cookieDomain': 'ajency.in',
            'cookieExpires':'0',
        });
            ga('send', 'pageview');
    </script> -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500|Libre+Baskerville:400,400i" rel="stylesheet">  
    <link rel='icon' type='image/x-icon' href='<?php echo get_template_directory_uri(); ?>/images/favicon.png'/>
  </head>

  <body>

  <div class="d-none">
    <div class="delivery-location cursor-pointer d-inline-block pr-2 ml-lg-2 vertical-align-middle">
      <a href="javascript:void(0)" class="d-inline-block location-icon">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
      </a> 
      <div id="selected-location-address" class="font-weight-light">
      </div> 
    </div>              
    <div class="edit-location d-none text-primary vertical-align-middle">
      <a href="#" class="d-inline-block location-icon"><i class="fas fa-pencil-alt number-edit cursor-pointer"></i></a>  
    </div>
  </div>

  	<!-- <nav class="bg-white">
      <div class="container mt-3 p5 position-relative">
        <div class="row justify-content-between align-items-center">
            <div class="col-4 col-lg-3 position-static">
              <a href="<?php echo get_site_url(); ?>" class="d-none d-lg-inline-block vertical-align-middle">
                <img src="<?php echo get_template_directory_uri(); ?>/images/green_grain_bowl.jpg" width="120px" class="logo"/>
              </a>
              <div class="menu-toggle d-none d-lg-none mr-2 vertical-align-middle">
                <i class="fa fa-bars" aria-hidden="true"></i>
              </div>
              <div class="delivery-location cursor-pointer d-inline-block pr-2 ml-lg-2 vertical-align-middle">
                <a href="javascript:void(0)" class="d-inline-block location-icon">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                </a> 
                <div id="selected-location-address" class="font-weight-light">
                </div> 
              </div>              
              <div class="edit-location d-none text-primary vertical-align-middle">
                <a href="#" class="d-inline-block location-icon"><i class="fas fa-pencil-alt number-edit cursor-pointer"></i></a>  
              </div>
            </div>
            <div class="col-4 col-lg-6 text-center">
              <a href="<?php echo get_site_url(); ?>" class="d-block d-lg-none">
                <img src="<?php echo get_template_directory_uri(); ?>/images/green_grain_bowl.jpg" width="120px" class="logo"/>
              </a>
              <ul class="navbar-nav d-none">
                <li class="nav-item active">
                  <a class="nav-link" href="#our-bowl">Our Bowls</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#we-are-hiring">We're Hiring</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#footer">Contact Us</a>
                </li>
              </ul>
            </div>
            <div class="col-4 col-lg-3 text-right">
              <a href="mailto:talktous@ajency.in" class="h4 menu float-right m-0 d-none d-lg-block">talktous@ajency.in </a>
              <div class="cart-icon d-none d-lg-none">
                <a href="#">
                  <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                  <div class="cart-count">2</div>
                </a>
              </div>
            </div>
        </div>        
      </div>
    </nav> -->

<nav class="bg-white text-center p-15 pt-6">
  <a href="<?php echo get_site_url(); ?>" class="">
    <img src="<?php echo get_template_directory_uri(); ?>/images/logo_new.png" width="250" class="logo"/>
  </a>
</nav>