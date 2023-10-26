<!--footer section-->
<footer>
    <div class="container">
      <div class="ftr-top common-padd">
        <div class="row">
          <div class="subs-content-wrap col-lg-12">
            <div class="row">
              <div class="col-lg-7 col-md-12">
                <div class="subscribe-content">

                  <h2>Subscribe to newsletter</h2>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                </div>
              </div>
              <div class="col-lg-5 col-md-12">
              <?php echo do_shortcode('[contact-form-7 id="1a17e05" title="Footer contact Mail"]');?>

              </div>
            </div>
          </div>
          
          <div class="row common-padd-md">
            <div class="col-lg-4 col-md-6">
              <div class="ftr-col">
                <h3>Quick links</h3>
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Products</a></li>
                  <li><a href="#">Receipes</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="ftr-col">
                <h3>Get in touch</h3>
                <ul class="ftr-col-info">
                  <li><a href=""><div class="col-icon"><img src="<?php echo get_template_directory_uri();?>/assets/images/location-white.svg" alt=""></div>Lorem Ipsum Is Simply Dummy Text </a></li>
                  <li><a href=""><div class="col-icon"><img src="<?php echo get_template_directory_uri();?>/assets/images/phone-white.svg" alt=""></div>1234567890</a></li>
                  <li><a href=""><div class="col-icon"><img src="<?php echo get_template_directory_uri();?>/assets/images/mail-white.svg" alt=""></div> info@halmoniskimchi.com</a></li> 
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              
              <div class="ftr-social">
                <h3>About</h3>
                <p>Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry.</p>
                <ul>
                  <li><a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/facebook-black.png" alt=""></a></li>
                  <li><a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/instagram-black.png " alt=""></a></li>
                  <li><a href="#"><img src="<?php echo get_template_directory_uri();?>/assets/images/twitter-black.png" alt=""></a></li>
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ftr-btm">
      <div class="container">
        <div class="copyright">
            <ul class="social-links">
              <li><p>© 2022 Halmonis Authentic Korean</p></li>
              <li><a href="#">Privacy & Policy</a></li>
              <li><a href="#">Terms & Conditions</a></li>
            </ul>
        </div>
      </div>
    </div>
</footer>
<!--footer section-->
</body>
</html>



  <script>
jQuery(document).ready(function($){
    var timeoutMinus;
  jQuery('body').on('click', '.minus', function (e) {
    var $input = jQuery(this).parent().find('input.qty');
    var val = parseInt($input.val());
    var step = $input.attr('step');
    step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
    if (val > 1) {
        $input.val(val - step).change();
    }

   if( timeoutMinus != undefined ) {
            clearTimeout(timeoutMinus)
        }
        timeoutMinus = setTimeout(function(){
            $('[name="update_cart"]').trigger('click');
        }, ); 
});
var timeoutPlus;
jQuery('body').one().on('click', '.plus', function (e) {
    var $input = jQuery(this).parent().find('input.qty');
    var val = parseInt($input.val());
    var step = $input.attr('step');
    step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
    $input.val(val + step).change();

    if( timeoutPlus != undefined ) {
            clearTimeout(timeoutPlus)
        }
        timeoutPlus = setTimeout(function(){
          jQuery('[name="update_cart"]').trigger('click');
        }, ); 
});

var timeoutInput;
    jQuery('div.woocommerce').on('change', 'input.qty', function(){
        if( timeoutInput != undefined ) {
            clearTimeout(timeoutInput)
        }
        timeoutInput = setTimeout(function(){
          jQuery('[name="update_cart"]').trigger('click');
        }, );
    });

});
</script>

<script src="js/function.js"></script>

<?php wp_footer(); ?>

</body>

</html>
