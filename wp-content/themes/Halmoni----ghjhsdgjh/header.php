<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="preload" href="<?php echo get_template_directory_uri() ?>/fonts/AkiraExpanded-SuperBold.woff2" as="font"
    type="font/woff2" crossorigin="anonymous">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php //echo get_template_directory_uri() 
  ?>

  <!--header sction-->


  <!--header sction-->
  <header>
    <div class="main-header">
      <div class="container header-row">
        <div class="logo">
          <a href="<?php echo site_url(); ?>"><img src="<?php echo get_theme_value('driverite_header_logo'); ?>"
              alt=""></a>
        </div>
        <div class="hdr-rt-wrap">
          <div class="hdr-rt">
            <div class="main-menu">
              <div class="nav_close" onclick="menu_close()">
                <i class="far fa-times-circle"></i>
              </div>
              <ul>
                <?php
                wp_nav_menu(array('theme_location' => 'primary'));
                ?>
              </ul>
            </div>
            <ul class="hid-icons">
            <li>
            <?php if (class_exists('Woocommerce')) :?>
                            <?php if(is_user_logged_in()):?>
                            <div class="account-icon"><a href="<?php echo get_permalink(get_option("woocommerce_myaccount_page_id")); ?>" class=""><img src="<?php echo get_template_directory_uri();?>/assets/images/user.svg" alt="" /> </a></div>
                            <div class="account-icon"><a class="btn btn-danger" href="<?php echo wp_logout_url(get_option("woocommerce_myaccount_page_id")); ?>" class="">Logout</a></div>
                            <?php else :?>
                                <div class="account-icon"><a href="<?php echo get_permalink(get_option("woocommerce_myaccount_page_id")); ?>" class="">Sign up</a></div>
                            <?php endif;?>
                     <?php endif;?></li>

                 



              <!-- <li><a href=""><img src="<?php //echo get_template_directory_uri() ?>/assets/images/user.svg" alt=""></a>
              </li> -->
              <?php $items_count = WC()->cart->get_cart_contents_count(); ?>
              <li><a href="<?php echo site_url(); ?>/cart/"><img
                    src="<?php echo get_template_directory_uri() ?>/assets/images/cart.svg" alt=""> <span
                    class="cart-item">
                    <?php echo $items_count ? $items_count : '0'; ?>
                  </span></a></li>
              <li><a href=""><img src="<?php echo get_template_directory_uri() ?>/assets/images/search.svg" alt=""></a>
              

            </li>
            </ul>
            <div onclick="menu_open()" class="nav_btn">
              <i class="fas fa-bars"></i>
            </div>
          </div>
          <div class="hdr-rt-log-reg desktop">
            <ul>

            <li>
            <?php if (class_exists('Woocommerce')) :?>
                            <?php if(is_user_logged_in()):?>
                            <div class="account-icon"><a href="<?php echo get_permalink(get_option("woocommerce_myaccount_page_id")); ?>" class=""><img src="<?php echo get_template_directory_uri();?>/assets/images/user.svg" alt="" /> </a></div>
                            <div class="account-icon"><a class="btn btn-danger" href="<?php echo wp_logout_url(get_option("woocommerce_myaccount_page_id")); ?>" class="">Logout</a></div>
                            <?php else :?>
                                <div class="account-icon"><a href="<?php echo get_permalink(get_option("woocommerce_myaccount_page_id")); ?>" class="">Sign up</a></div>
                            <?php endif;?>
                     <?php endif;?></li>
              <?php $items_count = WC()->cart->get_cart_contents_count(); ?>
              <li><a href="<?php echo site_url(); ?>/cart/"><img
                    src="<?php echo get_template_directory_uri() ?>/assets/images/cart.svg" alt=""> <span
                    class="cart-item">
                    <?php echo $items_count ? $items_count : '0'; ?>
                  </span></a></li>
              <li><a href=""><img src="<?php echo get_template_directory_uri() ?>/assets/images/search.svg" alt=""></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--header sction-->
  <script>

    jQuery(document).ready(function () {
      jQuery(".search-box-field").click(function () {
        jQuery(".search-box").toggle();
        jQuery(this).toggleClass("active-search")
      });
    });

  </script>