<?php 
//Template Name: Home page
get_header(); ?>



<!--header sction-->
<!--banner sction-->
<section class="banner-wrap">
      <div class="banner-slider">
      <?php if(have_rows('slider')):
          while(have_rows('slider')):the_row();?>
        <div class="banner-item">
        
          <div class="banner-img">
            <img src="<?php the_sub_field('slider_image');?>" alt="">
          </div>
          <div class="container banner-content">
            <div class="banner-content-wrapper">
              <h4><?php the_sub_field('title');?></h4>
              <h1><?php the_sub_field('description');?><span><?php the_sub_field('persgraph_slider');?></span></h1>
             
              
            </div>
          </div>
 
        </div>
        <?php 
endwhile;
endif; 
?>
      
      </div>
</section>
<!--banner sction-->

<!--content sction-->
<main class="main-section">
  <section class="our-story-sec common-padd">
    <div class="container">
      <div class="row align-items-center">
        <?php $wpabout_us=array(
          'post_type'=>'about_us',
        'post_status'=>'publish'
        );
        $about_usquery=new wp_query($wpabout_us);
        while($about_usquery->have_posts()){
$about_usquery->the_post();
$imagepath=wp_get_attachment_image_src(get_post_thumbnail_id(),'large');

        ?>

        <div class="col-lg-6">
          <div class="image-box">
              <img src="<?php echo $imagepath[0]?> " alt="">
            <div class="img-text">
              <h4>Authentic Korean</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="content-wrap">
            <div class="custom-heading">
              <div class="hdng-top">
                <p>ABOUT us</p>
              </div>
              <h2><?php the_title();?></h2>
            </div>
            <div class="about-content">
              <p><?php the_excerpt();?></p>
            </div>
            <a href="<?php echo the_permalink();?>" class="btn">Learn more</a>
            
            <div class="story-img">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/contact.jpg" alt="">
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <section class="product-section ">
    <div class="container">
      <div class="content-wrap text-center">
        <div class="product-heading-sec d-flex justify-content-between align-items-end">
          <div class="custom-heading text-start">
            <div class="hdng-top">
              <p>products</p>
            </div>
            <h2>Best products we offer</h2>
          </div>
          <button id="more_products" class="btn">View more</button>
        
        </div>
       
      </div>
      <div class="row"id="featured-products">
      
    
      </div>
    </div>
  </section>    
  <section class="contact common-padd">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="contact-form">
            <div class="custom-heading text-start">
              <div class="hdng-top">
                <p>contact us</p>
              </div>
              <h2>Feel free to contact us</h2>
            </div>
          
            <?php echo do_shortcode('[contact-form-7 id="9ecefb1" title="Contact form 1"]')?>
           
          </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-img">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/contact.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
</main>














<?php get_footer(); ?>