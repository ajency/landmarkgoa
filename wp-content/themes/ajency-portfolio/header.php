<!doctype html>
<html lang="en">
  <head>
     <title><?php wp_title(); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    
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
    <link href="<?php echo get_template_directory_uri(); ?>/css/custom.css" rel="stylesheet" type="text/css"/>

    <?php wp_head(); ?>
  </head>

  <body>

  	<nav class="bg-white">
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
    </nav>