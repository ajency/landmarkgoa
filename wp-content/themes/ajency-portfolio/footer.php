<div class="spacer-200">
</div>

<footer id="footer">
    <section class="footer-section">
        <div class="container p5">
            <div class="row">
                <div class="col-xl-2 contact-us">
                </div>
                <div class="col-xl-8">
                    <div class="row no-gutters">
                        <div class="col-md-4 contact-details">
                            <h4 class="font-weight-light">
                                <a class=" d-block h4 font-weight-light" href="tel:09975931402" onclick="ga('send', 'event', 'telephone', 'CallNow', 'tel:09975931402');">
                                    +91 7770004258
                                </a>
                            </h4>
                            <h4 class="font-weight-light">
                                <a class="d-block h4 font-weight-light" href="mailto:talktous@ajency.in" onclick="ga('send', 'event', 'footerid', 'Contact', 'Footer - talktous@ajency.in');">
                                    avantih@greengrainbowl.com
                                </a>
                                <!-- <br/>
                                <span class="h5">
                                    Career Opportunities:
                                </span>
                                <a class=" d-block h4 font-weight-light" href="mailto:workwithus@ajency.in">
                                    workwithus@ajency.in
                                </a> -->
                            </h4>
                        </div>
                        <div class="col-md-5 mt-5 mt-md-0 contact-details">
                            <h4 class="font-weight-light w-75">
                                Green Grain Bowl Kitchen, 1st floor Panjim convention center, Mala. 
                                <a class=" font-weight-light h5 " href="//shorturl.at/fgpq1" target="_blank">
                                    (Map)
                                </a>
                            </h4>
                        </div>
                        <div class="col-md-3 mt-5 mt-md-0 contact-details-1">
                            <h4 class="font-weight-light">
                                <a class="d-block h4 font-weight-light" href="https://www.instagram.com/greengrainbowl/">
                                    Instagram
                                </a>
                            </h4>
                            <!-- <h4 class="font-weight-light">
                                <a class="d-block h4 font-weight-light" href="https://www.linkedin.com/company/ajency-in">
                                    Linkedin
                                </a>
                            </h4> -->
                        </div>
                    </div>
                    <div class="mt-5">
                        (C) Green Grain Bowl 2019 All Right Reserved
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="..." aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>

<?php
    $build_location = "/site";
    if (is_front_page()) $build_location = "/site";
    else if (is_page_template('template-oyo.php')) $build_location = "/oyo";
    else if (is_page_template('template-oyofourth.php')) $build_location = "/oyofourth";
    else if (is_page_template('template-oyofifth.php')) $build_location = "/oyofifth";
    $app_url = APP_URL . $build_location;
    $json_path = JSON_PATH . $build_location;
    $site_url = get_site_url();
    $js_json = json_decode(file_get_contents($json_path.'/react_component_file_hash.json?time='.current_time('timestamp')), true);
    $css_json = json_decode(file_get_contents($json_path.'/cart_app_css_file_hash.json?time='.current_time('timestamp')), true);
    // $show_pn = SHOW_PN;
    $show_pn = true;
    
 if (!is_page_template('archive.php') && !is_singular('post') && !is_page_template('template-blogs.php') && !is_page_template('template-fullwidth.php') ) { ?>
    <noscript id="deferred-styles">
        <link href="<?php echo get_template_directory_uri(); ?>/css/custom_20.min.css" rel="stylesheet" type="text/css"/>
        <!-- <link href="<?php echo get_bloginfo('url');  ?>/wp-content/themes/ajency-portfolio/style.css" rel="stylesheet" type="text/css"/> -->
         <!--<link href="<?php echo get_template_directory_uri(); ?>/css/zoom.css" rel="stylesheet" type="text/css"/>-->
        <!--  <link rel="stylesheet" type="text/css" href="http://filamentgroup.github.io/enlarge/src/enlarge.css">-->
    </noscript>
    <script>
        var loadDeferredStyles = function() {
            var addStylesNode = document.getElementById("deferred-styles");
            var replacement = document.createElement("div");
            replacement.innerHTML = addStylesNode.textContent;
            document.body.appendChild(replacement)
            addStylesNode.parentElement.removeChild(addStylesNode);
          };
          var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
              window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
          if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
          else window.addEventListener('load', loadDeferredStyles);
          var react_js_file_hashes = <?php echo json_encode($js_json); ?>;
          var react_css_file_hashes = <?php echo json_encode($css_json); ?>;
          var app_url = "<?php echo $app_url; ?>";
          var show_pn = "<?php echo $show_pn; ?>";
          var site_url = "<?php echo $site_url?>";
          console.log(site_url);
          console.log("show push notifications ==>", true);
    </script>
<?php } ?>
<link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" rel="stylesheet"/>
<?php if (!is_page_template('template-fullwidth.php')) { ?>
     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<?php } ?>
<script type="text/javascript">
    window.lazySizesConfig = window.lazySizesConfig || {};
      lazySizesConfig.loadMode = 3;
</script>

<script src="<?php echo get_template_directory_uri(); ?>/js/combine.js" type="text/javascript">
</script>

<script>
    // init controller
    var controller = new ScrollMagic.Controller();
    var controller2 = new ScrollMagic.Controller();
</script>

<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap-notify.min.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js?_16" type="text/javascript">
</script>

<script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-auth.js"></script>
<!-- <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-messaging.js"></script> -->
<script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-firestore.js"></script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
<!-- <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script> -->
<!-- <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script> -->
<script src="<?php echo $app_url; ?>/firebase-functions.js?_1" type="text/javascript"></script>
<!-- <script src="<?php echo $app_url; ?>/view-cart.<?php echo $js_json['view-cart'];?>.js" type="text/javascript" defer></script>
<script src="<?php echo $app_url; ?>/variant-selection-popup.<?php echo $js_json['variant-selection-popup'];?>.js" type="text/javascript" defer></script>
<script src="<?php echo $app_url; ?>/add-to-cart.<?php echo $js_json['add-to-cart'];?>.js" type="text/javascript" defer></script>
<script src="<?php echo $app_url; ?>/delivery-address-slider.<?php echo $js_json['delivery-address-slider'];?>.js" type="text/javascript" defer></script>
<script src="<?php echo $app_url; ?>/sign-in.<?php echo $js_json['sign-in'];?>.js" type="text/javascript" defer></script>
<script src="<?php echo $app_url; ?>/verify-otp.<?php echo $js_json['verify-otp'];?>.js" type="text/javascript" defer></script> -->
<script src="<?php echo $app_url; ?>/react-components.<?php echo $js_json['react-components'];?>.js" type="text/javascript"></script>

<script type="text/javascript">
    
</script>


<script>
      if ('serviceWorker' in navigator ) {
        window.addEventListener('load', function() {
            let sw = '/service-worker.js';
            if(window.location.host == 'localhost:8888'){
                sw = '/greengrainbowl' + sw;
            }
            navigator.serviceWorker.register(sw).then(function(registration) {
                // Registration was successful
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
                // messaging.useServiceWorker(registration);
            }, function(err) {
                // registration failed :(
                console.log('ServiceWorker registration failed: ', err);
            });
        });
    }

    $(document).ready(function(){
        setTimeout(function(){
            $('html,body').addClass('hide-scroll');
            $('#lb-modal').addClass('open');
        });
        $('#close-modal').click(function(){
            $('html,body').removeClass('hide-scroll');
            $('#lb-modal').removeClass('open');
        });
    });
</script>
    </body>
</html>
