<?php get_header(); ?>

<style type="text/css">
  .cart-wrapper{
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    height: 100%;
    z-index: 1200;
    padding: 0;
    transform: translate(500px, 0px);
    transition: all 0.3s ease;
    width: 410px;
    padding-bottom: 52px;
    background: #fff;
  }
  .cart-wrapper.active{
    transform: translate(0,0);
  }

  .cursor-pointer{
    cursor: pointer;
  }

  .gbb-original-price{
    font-size: 80%;
    text-decoration: line-through;
    font-weight: 400;
    margin-left: 5px;
    margin-right: 5px;
  }

  .gbb-discount {
    font-size: 80%;
    font-weight: 400;
  }

  .cart-app-loader{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    font-size: 16px;
    font-weight: 500;
    text-transform: uppercase;
  }

  .saved-address-item {
    white-space: normal;
    text-align: left;
  }

  @media (max-width: 480px){
    .cart-wrapper{
      width: 100%;
    }
  }

  .custom-modal {
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
    background-color: rgba(0, 0, 0, 0.5);
    opacity: 0;
    visibility: hidden;
    transform: scale(1.1);
    transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
}
</style>


<div class="spacer py-5"></div>
<!-- Selected Location -->

<section>
  <div class="container p5">
    <div class="row">
      <div class="col  offset-xl-2 col-xl-8 col12">
        <p class="body-text">
          We <strong class="font-weight-bold h1">design</strong> and <strong class="font-weight-bold h1">code websites </strong> for online stores, real estate projects, hotels, company or product websites, blog and others. Sites we build are buzzword and <strong class="font-weight-bold h1">SEO compliant</strong>, and <strong class="font-weight-bold h1">load under 4 seconds</strong>.</p>
      </div>
    </div>
  </div>
  <div>
  </div>
</section>



<section>
  <div class="product-section pt-3">
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
                              <img src="<?php echo $product['images'][0];?>"  alt="<?php echo $product['title'] ?>" title="<?php echo $product['title'] ?>">
                          </div>
                          <div class="item">
                            <img src="<?php echo $product['images'][1];?>" alt="<?php echo $product['title'] ?>" title="<?php echo $product['title'] ?>">
                          </div>
                          <div class="item">
                              <img src="<?php echo $product['images'][2];?>" alt="<?php echo $product['title'] ?>" title="<?php echo $product['title'] ?>">
                          </div>
                          <div class="item">
                              <img src="<?php echo $product['images'][3];?>" alt="<?php echo $product['title'] ?>" title="<?php echo $product['title'] ?>">
                          </div>
                      </div>
                      <div class="product-info lg-w-50 pl-lg-2">
                          <h3 class="mb-4 mb-lg-0 d-none d-lg-block font-weight-light type">Veg</h3>
                          <h3 class="product-title h1 ft6 mb-2 mb-lg-3 mt-lg-1 p-title"><?php echo $product['title'] ?></h3>    
                          <div class="product-content">
                            <h4 class="product-excerpt font-weight-light font-size-18 mt-0">
                                <?php echo $product['description'] ?>
                            </h4>
                            <div class="product-meta d-flex mt-lg-5">
                                <div class="product-price h1 ft6 mb-0">₹ <?php echo $product['default']['sale_price'] ?>
                                </div>
                                
                              <!--  <a href="#" class="btn-add-to-cart btn-add-to-cart-desktop text-primary border-radius-4 border-white text-decoration-none m-0 font-size-25 ft6" title="Add Noodle Salad Bowl to cart">
                                Add to cart  
                                </a> -->

                                <div class="react-add-to-cart-container" data-product_data='<?php echo json_encode($product); ?>'></div>
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

<section class="p2">
<div class="container slider-contanier ">

      <div class="aj-team-member  d-flex">

        <div >
          <div class="row ">
            <div class="col-md-6">


                  <img src="https://1z3o6ca02l43rp0zb3y1b2e1-wpengine.netdna-ssl.com/wp-content/themes/ajency-portfolio/img/team/anuj-desktop.jpg"
                  class="lazyload blur-up img-fluid"
                  data-srcset="https://1z3o6ca02l43rp0zb3y1b2e1-wpengine.netdna-ssl.com/wp-content/themes/ajency-portfolio/img/team/anuj-desktop.jpg"
                  data-sizes="(min-width: 768px) 42vw, 100vw" alt="Anuj Khurana" class="img-fluid">
            </div>
             <div class="col-md-5 offset-md-1">
               <div class="w-75 team-desc">
                  <h5>CEO/Co-founder</h5>
                  <h1 class="display-3">Anuj Khurana</h1>
                   <div class="black f-paragraph-small no-spacing"><h5 class="font-weight-light">13+ years of Digital experience.</h5></div>
                </div>
            </div>
          </div>
        </div>

        <div class="align-items-center">
          <div class="row flex ">
            <div class="col-md-6">


                  <img src="https://1z3o6ca02l43rp0zb3y1b2e1-wpengine.netdna-ssl.com/wp-content/themes/ajency-portfolio/img/team/nutan-desktop.jpg"
                  class="lazyload blur-up img-fluid"
                  data-srcset="https://1z3o6ca02l43rp0zb3y1b2e1-wpengine.netdna-ssl.com/wp-content/themes/ajency-portfolio/img/team/nutan-desktop.jpg"
                  data-sizes="(min-width: 768px) 42vw, 100vw" alt="Avanti Hiremath" class="img-fluid">
            </div>
            <div class="col-md-5 offset-md-1">
              <div class="w-75 team-desc">
                <h5>Engineering Manager</h5>
                <h1 class="display-3">Nutan Kamat</h1>
                <div class="black f-paragraph-small no-spacing"><h5 class="font-weight-light">6+ years.</h5></div>
              </div>
            </div>
          </div>
        </div>

        <div >
          <div class="row">
            <div class="col-md-6">
              <img src="https://1z3o6ca02l43rp0zb3y1b2e1-wpengine.netdna-ssl.com/wp-content/themes/ajency-portfolio/img/team/robiul-desktop.jpg"
                  class="lazyload blur-up img-fluid"
                  data-srcset="https://1z3o6ca02l43rp0zb3y1b2e1-wpengine.netdna-ssl.com/wp-content/themes/ajency-portfolio/img/team/robiul-desktop.jpg"
                  data-sizes="(min-width: 768px) 42vw, 100vw" alt="Avanti Hiremath" class="img-fluid">
            </div>
            <div class="col-md-5 offset-md-1">
              <div class="w-75 team-desc">
                <h5>Engineering Manager
</h5>
                <h1 class="display-3">Robiul Hoque</h1>
                <div class="black f-paragraph-small no-spacing"><h5 class="font-weight-light">8+ years.</h5></div>
              </div>
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
      <p class="body-text">To help you decide if we are the right fit for you.</p>
      <div class="seperator">
      </div>
    <div class="accordion aj-faq" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
        <a class=" text-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
       <h2 class="pt-2 pb-2 m-0 ">What technologies & frameworks do you work on?</h2>
        </a>
    </div>

    <div id="collapseOne" class="collapse  " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
       <p class="body-text">We have active projects in JAVA, PHP, Django, Angular, Node.js, ElasticSearch, Wordpress, Firebase, Ionicframework, AWS, Lambda, Celery.
       <br><br>In the past, we have been able to build teams around new technologies fairly quickly. For Weddingz.in, we built a 15-people Django team in 6 months.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">

       <a class=" text-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         <h2 class="pt-2 pb-2 m-0 ">Ideal software developer. Myth vs Reality</h2>
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <p class="body-text">A well rounded software developer should be able to understand business requirements, translate it into system design and then write quality code to deliver usable and bug free features. At the same time, she needs to have good communication skills, especially in a remote + multi team setup.
        <br><br>We have struggled with finding all these skills in a single developer (or training them for this). Hence we prefer to have a team engagement which rounds up all the above rather than provide individual developers on hire.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">

        <a class=" text-link collapsed"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <h2 class="pt-2 pb-2 m-0 ">How does the application development engagement model work?
            </h2>
        </a>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        <p class="body-text">Application development projects are fixed scope and cost projects. They begin with a discovery phase (1-4 weeks) where we prepare a detailed scope document and project plan. Post signoff, this then becomes the basis for a 3 to 6 month application development project. This works great for building a minimum viable product, test a new idea or build a largely independent module in your existing product.</p>
      </div>
    </div>
  </div>
    <div class="card">
    <div class="card-header" id="headingFour">

        <a class=" text-link collapsed"  data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            <h2 class="pt-2 pb-2 m-0 ">How does the dedicated team engagement model work?</h2>
        </a>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
        <p class="body-text">Product development is an ongoing process and after the initial pilot, it requires a dedicated team. A well rounded team needs skills across development, front-end, project management and QA. Depending on the nature and scale of the project, the team that we put together will have a mix of dedicated and shared members.</p>
      </div>
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

<div class="msg-container">
  <!-- Add to cart error  -->
  <div class="failure toast d-flex justify-content-center">
    <span class="alert-danger p-15 w-100 d-none" id="failure-toast">
      Add to cart failed
    </span>
  </div>

  <!-- Add to cart error  -->
  <div class="success toast d-flex justify-content-center">
    <span class="alert-success p-15 w-100 d-none" id="success-toast">
      Successfully added to cart
    </span>
  </div>

  <!-- Offline toast  -->
  <div class="success toast d-flex justify-content-center">
    <span class="alert-info p-15 w-100 d-none" id="offline-toast">
      You are offline and may be viewing outdated content!
    </span>
  </div>

  <!-- View cart component -->
  <div id="react-view-cart-container" style="width: 100%"></div>
</div>


<div class="cart-wrapper" id="root">
  <div class="cart-app-loader">
    Loading...
  </div>
</div>

<div class="backdrop"></div>

<div class="site-loader text-center p-5">
  <img src="<?php echo get_template_directory_uri(); ?>/images/green_grain_bowl.jpg" width="75px" class="mt-5"/> 
</div>

<button id="cart-address-change-trigger" class="d-none"></button>

<div class="backdrop-wrap"></div>

<?php get_footer(); ?>