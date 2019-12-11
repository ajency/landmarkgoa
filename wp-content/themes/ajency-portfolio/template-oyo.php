<?php
/**
 * Template Name: Oyo
 */

 get_header();  ?>

<section class="p-0 full-screen-section">
  <nav class="bg-white text-center p-15 pt-6">
    <a href="<?php echo get_site_url(); ?>" class="">
      <img src="<?php echo get_template_directory_uri(); ?>/images/logo_new.png" width="250" height="auto" class="logo"/>
    </a>
  </nav>
  <div class="container p5 mb-0">
    <div class="row">
      <div class="col  offset-xl-2 col-xl-8 col12 text-center">
        <h1 class="display-4 font-weight-bold aj-home-title mb-md-0">Wholesome meals. Salad style.</h1>
        <p class="body-text small-laptop-text mb-32">Green Grain Bowl was born out of a desire to eat well. That's what we stand for.</p>
        <p class="body-text small-laptop-text">Fibre & grain. Greens, colourful vegetables & the occasional fruit. Some raw, some cooked. Local & seasonal. Something for a vegetarian & enough meat options. Tossed together in a bowl with a dressing that adds to the existing flavors. Bowls that put a smile on your face.</p>
      </div>
    </div>
  </div>
</section>
<section class="pt-3">
  <div class="text-center p-15 pt-0">
    <img src="<?php echo get_template_directory_uri(); ?>/images/Leaf_with_seperator@2x.png" class="img-fluid auto-width" alt="" title=""/>
  </div>
  <div class="container p5 pt-3">
    <div class="row">
      <div class="col  offset-xl-2 col-xl-8 col12 text-center">
        <h1 class="font-weight-bold d-block mobile-header mb-2 display-4 aj-home-title">our bowls</h1>
        <p class="body-text small-laptop-text mb-0">Wholesome, balanced and flavourful meals that will make you feel great.</p>
      </div>
    </div>
  </div>
</section>
<?php
$today = date('l F j Y');
$date = explode(' ',$today);
$week = $date[0];
?>
<section class="pt-0">
  <div class="product-section">
    <div class="container-1">
      <div class="row-1">
        <div class="col-lg-21">
        </div>
        <div class="col-xl-12">
          <h1 class="ft6 product-section__title mb-4 d-none">Products</h1>   
          <div class="row product-list">
            <?php $products = json_decode(file_get_contents(get_template_directory_uri() . '/products.json'), true)['products']; 
              foreach ($products as $key => $product) { ?>
              <div class="custom-col-3 col-lg-4 product-list-item p-lg-0 effect trigger<?php echo $key+1 ?>" id="product-<?php echo $product['product_id'] ?>">
                  <div class="product-wrapper <?php echo $product['class'] ?>">                    
                      <div class="product-image lg-w-50">
                          <div class="item">
                              <img class="lazy bg-image-animation" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" data-src="<?php echo $product['images'][0];?>" data-srcset="<?php echo $product['images'][0];?>"  alt="<?php echo $product['title'] ?>" title="<?php echo $product['title'] ?>">
                          </div>
                          <div class="item">
                            <img class="lazy bg-image-animation" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" data-src="<?php echo $product['images'][1];?>" data-srcset="<?php echo $product['images'][1];?>" alt="<?php echo $product['title'] ?>" title="<?php echo $product['title'] ?>">
                          </div>
                          <div class="item">
                              <img class="lazy bg-image-animation" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" data-src="<?php echo $product['images'][2];?>" data-srcset="<?php echo $product['images'][2];?>" alt="<?php echo $product['title'] ?>" title="<?php echo $product['title'] ?>">
                          </div>
                          <div class="item">
                              <img class="lazy bg-image-animation" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" data-src="<?php echo $product['images'][3];?>" data-srcset="<?php echo $product['images'][3];?>" alt="<?php echo $product['title'] ?>" title="<?php echo $product['title'] ?>">
                          </div>
                      </div>

                      <div class="product-info lg-w-50 pl-lg-2 normal-text d-none d-lg-block">                     
                          <div class="content-center">
                            <h3 class="mb-4 mb-lg-0 d-none d-lg-block font-weight-light type"><?php echo isset($product['mark_type']) ? $product['mark_type'] : ''; ?></h3>
                            <h3 class="product-title h1 ft6 mb-2 mb-lg-3 mt-lg-1 p-title"><?php echo $product['title'] ?></h3> 
                          </div>
                          <?php if(isset($product['availability']) && $product['availability'] == '' ){ ?>
                            <div class="product-availability  <?php echo $product['availability'] ? '' : 'coming_soon'; ?>"><h4 class="availability-text"><?php echo $product['availability'] ? 'Available on '.$product['date'] : 'Coming Soon'; ?></h4></div>
                          <?php } ?>
                      </div>

                      <?php if(isset($product['availability']) && $product['availability'] == '' ){ ?>
                        <div class="product-badge <?php echo $product['availability'] ? '' : 'coming_soon'; ?>"><?php echo $product['availability'] ? 'Available on '.$product['date'] : 'Coming Soon'; ?></div>
                      <?php } ?>
                      <div class="product-info lg-w-50 pl-lg-2 hover-text">
                          <h3 class="mb-4 mb-lg-0 d-none d-lg-block font-weight-light type"><?php echo isset($product['mark_type']) ? $product['mark_type'] : ''; ?></h3>
                          <h3 class="product-title h1 ft6 mb-2 mb-lg-3 mt-lg-1 p-title"><?php echo $product['title'] ?></h3>    
                          <div class="product-content">
                            <h4 class="product-excerpt font-weight- font-size-18 mt-0 mb-lg-0">
                                <?php echo $product['description'] ?>
                            </h4>
                            <div class="product-meta d-flex mt-lg-3">
                                <div class="product-price h1 ft6 mb-0">₹ <?php echo $product['default']['sale_price'] ?>
                                </div>
                                <?php                                
                                  if(isset($product['availability']) && $product['availability'] != '' ){
                                ?>
                                  <div class="react-add-to-cart-container" data-product_data='<?php echo json_encode($product); ?>'></div>                                                               
                                <?php } ?>                                                                
                            </div>
                          </div>
                      </div>
                  </div>      
              </div>
            <?php } ?>
          </div>
        </div>
      </div>   
    </div>
  </div>
</section>

<section>
  <div class="container p5">
    <div class="row">
      <div class="col  offset-xl-2 col-xl-8 col12">
        <h3 class="h1 ft6">Common Queries</h3>
        <p class="body-text">Things you should know about GGB</p>
        <div class="seperator">
        </div>
      <div class="accordion aj-faq" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
              <a class=" text-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h2 class="pt-2 pb-2 m-0 ">Is this a salad?</h2>
              </a>
          </div>

          <div id="collapseOne" class="collapse  " aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
            <p class="body-text">Wikipedia defines salad as "a dish consisting of a mixture of small pieces of food, usually vegetables or fruit."
            <br><br>So yes this is very much a salad. Our bowls are a combination of grain, protein and greens making them a complete meal. </p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">

            <a class=" text-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <h2 class="pt-2 pb-2 m-0 ">Is this 'diet' food?</h2>
              </a>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
              <p class="body-text">Each of our bowls are between 400 & 600 calories. This is a healthy meal where the calorie count is made up from protein, fat and carbohydrates.
              <br><br>It is definitely not a low calorie food that is often mistaken as 'healthy' eating.</p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">

              <a class=" text-link collapsed"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <h2 class="pt-2 pb-2 m-0 ">I am not a salad person. I want a filling meal. 
                  </h2>
              </a>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              <p class="body-text">We hear you. Give our bowls a try and you will agree that they are as filling as say a thali. </p>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</section>

<section class="p2">
  <div class="container slider-contanier">
    <div class="aj-team-member  d-flex">
      <div>
        <div class="row flex ">
          <div class="col-md-6">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" 
                class="lazy img-fluid bg-image-animation"
                data-src="https://1z3o6ca02l43rp0zb3y1b2e1-wpengine.netdna-ssl.com/wp-content/themes/ajency-portfolio/img/team/avanti-desktop.jpg"
                data-srcset="https://1z3o6ca02l43rp0zb3y1b2e1-wpengine.netdna-ssl.com/wp-content/themes/ajency-portfolio/img/team/avanti-desktop.jpg"
                data-sizes="(min-width: 768px) 42vw, 100vw">
          </div>
          <div class="col-md-5 offset-md-1">
            <div class="w-75 team-desc">
              <h5>Curating Recipes</h5>
              <h1 class="display-3">Avanti Hiremath</h1>
              <div class="black f-paragraph-small no-spacing"><h5 class="font-weight-light">On a mission to help everyone eat well</h5></div>
            </div>
          </div>
        </div>
      </div>

      <div>
        <div class="row">
          <div class="col-md-6">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                class="lazy img-fluid bg-image-animation"
                data-src="https://1z3o6ca02l43rp0zb3y1b2e1-wpengine.netdna-ssl.com/wp-content/themes/ajency-portfolio/img/team/anuj-desktop.jpg"
                data-srcset="https://1z3o6ca02l43rp0zb3y1b2e1-wpengine.netdna-ssl.com/wp-content/themes/ajency-portfolio/img/team/anuj-desktop.jpg"
                data-sizes="(min-width: 768px) 42vw, 100vw" alt="Anuj Khurana" class="img-fluid">
          </div>
          <div class="col-md-5 offset-md-1">
            <div class="w-75 team-desc">
                <h5>The tech in food tech</h5>
                <h1 class="display-3">Anuj Khurana</h1>
                <div class="black f-paragraph-small no-spacing"><h5 class="font-weight-light">Order management, delivery, operations</h5></div>
              </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- gps modal prompt -->
<div id="react-add-delivery-address-container"></div>

<!-- sign-in container -->
<div id="react-sign-in-container"></div>

<!-- verify-otp container -->
<div id="react-verify-otp-container"></div>

<!-- variant selection popup -->
<div id="react-variant-selection-modal"></div>

<div class="msg-container">

  <div id="success-failure-toast-container">

  </div>

    <div class="success toast d-flex justify-content-center">
      <span class="alert-info p-15 w-100 d-none" id="offline-toast">
        You are offline and may be viewing outdated content!
      </span>
    </div>

  <!-- View cart component -->
  <div id="react-view-cart-container" class="mt-lg-5 "></div>
</div>


<div class="cart-wrapper" id="root">
  <div class="cart-app-loader">
    Loading...
  </div>
</div>

<div class="backdrop"></div>

<div class="site-loader text-center p-5">
  <img src="<?php echo get_template_directory_uri(); ?>/images/GGB-logo.png" width="75px" class="mt-5"/> 
</div>

<div class="push p-15 d-none">
    <div class="push-note">
        <div class="push-row d-flex mb-3">
            <div class="push-img">
              <img src="<?php echo get_template_directory_uri(); ?>/images/GGB-logo.png" width="65"/> 
            </div>
            <div class="push-text pl-3">
                <h4 class="ft6">Get latest notifications from GGB</h4>
                <div>We'll send you latest updates. You can manage them any time from your browser settings.</div>
            </div>
        </div>   
        <div class="push-btns d-flex justify-content-end">
            <button class="btn btn-reset btn-inverted rounded-0 text-white mr-3 text-uppercase mw-120" href="#">No Thanks</button>
            <button class="btn btn-reset btn-primary rounded-0 text-white mw-120" href="#">Allow</button>
        </div>      
    </div>
</div>

<button id="cart-address-change-trigger" class="d-none"></button>

<div class="backdrop-wrap"></div>

<div class="lightbox-modal" id="lb-modal">
    <button class="close-lightbox-modal" id="close-modal"><i class="fas fa-times"></i></button>
    <div class="lightbox-content">
      <div class="lightbox-content-wrap">
        <picture>
        <source media="(min-width: 992px)" srcset="<?php echo get_template_directory_uri(); ?>/images/desktop_popup.jpg">
        <source media="(max-width: 991px)" srcset="<?php echo get_template_directory_uri(); ?>/images/mobile_popup.jpg">
        <img src="<?php echo get_template_directory_uri(); ?>/desktop_popup.jpg" alt="modal">
      </picture>
      </div>
    </div>
</div>

<script>
  function closenotication() {
    var element = document.getElementById("success-toast");
    var elementBtn = document.getElementById("success-toast-close-btn");
    element.classList.add("d-none");
    elementBtn.classList.add("d-none");
  }
  function closenoticationF() {
    var element = document.getElementById("failure-toast");
    var elementBtn = document.getElementById("failure-toast-close-btn");
    element.classList.add("d-none");
    elementBtn.classList.add("d-none");
  }
  setTimeout(function(){
      var lbmodal = document.getElementById("lb-modal");
      lbmodal.classList.add('open');
    },2000); 

  const ccf_button2 = document.getElementById("close-modal")
    ccf_button2.addEventListener('click', function(e) {		
      var lbmodal = document.getElementById("lb-modal");
      lbmodal.classList.remove('open');
  });
</script>

<?php get_footer(); ?>