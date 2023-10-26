<?php
// Template Name:Contact Us 
get_header();
?>
<!--banner sction-->
<section class="banner-wrap">
      <div class="inner-banner-content">
        <div class="banner-item">
          <div class="banner-img">
          <img src="<?php echo get_theme_value('Contact_us_page_banner'); ?>" alt="">
          </div>
          <div class="container banner-content">
            <div class="banner-content-wrapper">
              <h1>Contact us</h1>
            </div>
          </div>
        </div>
       
      </div>
</section>
<!--banner sction-->

<!--content sction-->
<main class="main-section">
  <section class="contact contact-pg common-padd">
    
    <div class="container">
      <div class="contact-info-wrap row align-items-center">
        <div class="col-lg-6">
          <div class="img-box" style="background-image: url(<?php echo get_template_directory_uri()?>/assets/images/contact-img.jpg);">
            <h2>Get in touch</h2>
            <div class="img-content ">
              <a href="#" class="contact-info d-flex align-items-center">
                <div class="icon">
                  <img src="<?php echo get_template_directory_uri()?>/assets/images/locate.svg" alt="">
                </div>
                <div class="info">
                  <h4>Locate us</h4>
                  <p>Lorem Ipsum Is Simply Dummy Text Of The Printing </p>
                </div>
              </a>
              <a href="#" class="contact-info d-flex align-items-center">
                <div class="icon">
                  <img src="<?php echo get_template_directory_uri()?>/assets/images/call-us.svg" alt="">
                </div>
                <div class="info">
                  <h4>Call us</h4>
                  <p>1234567890 </p>
                </div>
              </a>
              <a href="#" class="contact-info d-flex align-items-center">
                <div class="icon">
                  <img src="<?php echo get_template_directory_uri()?>/assets/images/mail-us.svg" alt="">
                </div>
                <div class="info">
                  <h4>Mail us</h4>
                  <p>info@halmoniskimchi.com</p>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-form">
            <div class="custom-heading text-start">
              <h2>Feel free to contact us</h2>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="9ecefb1" title="Contact form 1"]')?>

          </div>
        </div>
      </div>
    </div>
  </section>
  
</main>


<!--content sction-->
<?php
get_footer();
?>