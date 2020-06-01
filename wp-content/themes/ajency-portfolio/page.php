<?php get_header();  ?>

<section class="post-content">
	<div class="container p5">
	  	<div class="row">
		    <div class="col col12">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php the_content(); ?>

					<?php endwhile; ?>
				<?php endif; ?>

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

  <!-- Add to cart error  -->
  <!-- <div class="failure toast d-flex justify-content-center position-relative">
    <span class="alert-danger p-15 pt-lg-2 pb-lg-2 w-100 d-none position-relative" id="failure-toast">
      Add to cart failed
    </span>
    <button id="failure-toast-close-btn" class="btn-reset close-img d-none" onclick="closenoticationF()"><i class="sprite sprite-close_btn"></i></button>
  </div> -->

  <!-- Add to cart success  -->
  <!-- <div class="success toast d-flex justify-content-center sb-shadow mt-lg-5 position-relative">
    <span class="p-15 pt-lg-2 pb-lg-2 w-100 d-none position-relative text-lg-center" id="success-toast">
      Item successfully added to cart
    </span>
    <button id="success-toast-close-btn" class="btn-reset close-img d-none" onclick="closenotication()"><i class="sprite sprite-close_btn"></i></button>
  </div> -->

   <!-- Offline toast  -->
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
</script>
<?php get_footer(); ?>