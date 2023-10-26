<?php
//Template Name: About_us page
get_header();
?>
<!--header sction-->
<!--banner sction-->
<section class="banner-wrap">
      <div class="inner-banner-content">
        <div class="banner-item">
          <div class="banner-img">
            <img src="<?php echo get_theme_value('About_us_banner'); ?>" alt="">
          </div>
          <div class="container banner-content">
            <div class="banner-content-wrapper">
              <h1>About us</h1>
            </div>
          </div>
        </div>
       
      </div>
</section>
<!--banner sction-->

<!--content sction-->
<main class="main-section">
  <section class="about-pg our-story-sec common-padd">
    
    <div class="container">
      <div class="row align-items-center">
      <?php $wpour_story=array(
          'post_type'=>'our_story',
          'posts_per_page' => 1,
        'post_status'=>'publish'
        );
        $our_storyquery=new wp_query($wpour_story);
        while($our_storyquery->have_posts()){
$our_storyquery->the_post();
$imagepath=wp_get_attachment_image_src(get_post_thumbnail_id(),'large');

        ?>
        <div class="col-lg-6">
          <div class="image-box">
            
              <img src="<?php echo $imagepath[0]?> " alt="">
           
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
           
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <section class="vision common-padd">
    <div class="container">
      <div class="row">
      <?php $wpOur_vision=array(
          'post_type'=>'our_vision',
          'posts_per_page' => 3,
        'post_status'=>'publish'
        
        );
        $Our_visionquery=new wp_query($wpOur_vision);
        while($Our_visionquery->have_posts()){
$Our_visionquery->the_post();
$imagepath=wp_get_attachment_image_src(get_post_thumbnail_id(),'large');

        ?>
        <div class="col-lg-6">
          <div class="content-wrap">
            <div class="custom-heading">
              
              <h2><?php the_title();?></h2>
            </div>
            <div class="about-content">
              <p><?php the_excerpt();?></p>
            </div>
            <a href="<?php echo the_permalink();?>" class="btn">Learn more</a>
           
          </div>
        </div>
        <div class="col-lg-6">
          <div class="image-box">
            
            <img src="<?php echo $imagepath[0]?> " alt="">
         
        </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <section class="gallery common-padd">
    <div class="container">
      <div class="custom-heading text-center">
        <div class="hdng-top">
          <p>gallery</p>
        </div>
        <h2>Our gallery</h2>
      
 
   
 </div>

 <div class="row" id="gallery-container">



   <!-- Display your initial posts here -->

      </div>
     

      <div class="load-more-btn text-center">
      <button id="load-more-button-gallery" class='btn'>Load More</button>
      </div>
    </div>
  </section>
</main>
<!--content sction-->

<!--footer section-->
<?php get_footer();?>