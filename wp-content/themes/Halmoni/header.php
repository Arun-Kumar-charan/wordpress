
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="preload" href="<?php echo get_template_directory_uri() ?>/fonts/AkiraExpanded-SuperBold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!--header sction-->
<header>
  <div class="main-header">
    <div class="container header-row">
      <div class="logo">
      <?php $getimage=get_theme_value('driverite_header_logo')?>
        <a href="index.html"><img src="<?php echo $getimage ?>" alt=""></a>
      </div>
      <div class="hdr-rt-wrap">
        <div class="hdr-rt">
          <div class="main-menu">
            <div class="nav_close" onclick="menu_close()">
              <i class="far fa-times-circle"></i>
            </div>
            <ul>
            <?php wp_nav_menu(array('theme_location'=>'primary',
             
                  ))?>
            

          </div>
          <ul class="hid-icons">
           
          <li>
    <a href="<?php echo wc_get_page_permalink('myaccount'); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.svg" alt="My Account">
    </a>
</li>

            <li>
  <a href="<?php echo wc_get_cart_url(); ?>">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cart.svg" alt="">
    <span id="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
  </a>
</li>

             <li><a href=""><img src="<?php echo get_template_directory_uri();?>/assets/images/search.svg" alt=""></a></li>
          </ul>
          <div onclick="menu_open()" class="nav_btn">
            <i class="fas fa-bars"></i>
          </div>
        </div>
        <div class="hdr-rt-log-reg desktop">
          <ul>
           
          <li>
    <a href="<?php echo wc_get_page_permalink('myaccount'); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/user.svg" alt="My Account">
    </a>
</li>

             
            <li>
    <a href="<?php echo wc_get_cart_url();?>" class="">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cart.svg" alt="">
        <span class="cart_item" id="cart-item-count"><?php echo WC()->cart->get_cart_contents_count();?></span>
    </a>
</li>


             <li><a href=""><img src="<?php echo get_template_directory_uri();?>/assets/images/search.svg" alt=""></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
<!--header sction-->



<script>

jQuery(document).ready(function() {
	jQuery(".search-box-field").click(function() {
	   jQuery(".search-box").toggle();
     jQuery(this).toggleClass("active-search")
	 });
});

</script>
