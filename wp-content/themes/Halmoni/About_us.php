<?php
//Template Name:About Us
get_header();
?>
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
        <h2>Our gallery</h2>Our gallery
      </div>
     
      <div class="row">
        <?php
      $rows = get_field('gallery',367);
      // print_r($rows);die();
//print_r('yes');
if ($rows) {

    foreach ($rows as $row) {
     
        $video = $row['uploads'];
        if (!empty($video)) {
          // Check if it's a video (you may need to modify this check based on your video URLs)
          $image_extension = pathinfo(parse_url($video, PHP_URL_PATH), PATHINFO_EXTENSION);
          $allowed_video_extensions = array('jpg', 'jpeg', 'png', 'gif');
          if (in_array( $image_extension, $allowed_video_extensions)) {
            ?>
             <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="gallery-item">
            <div class="img-wrap">
              <img src="<?php echo $video?>" alt="">
            </div>
          </div>
        </div>
            <?php
          }
      }

        if (!empty($video)) {
         
            // Check if it's a video (you may need to modify this check based on your video URLs)
            $video_extension = pathinfo(parse_url($video, PHP_URL_PATH), PATHINFO_EXTENSION);
            $allowed_video_extensions = array('mp4', 'webm', 'ogg');

            if (in_array($video_extension, $allowed_video_extensions)) {
             // echo $video;
              ?>
                <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="gallery-item">
            <div class="video-box">
              <div class="playpause">
                <span href="javascript:void(0);" class="btn-play"><img src="<?php echo get_template_directory_uri()?>/assets/images/play-icon.svg" alt=""></span>
              </div>
              <video class="video1" poster="<?php echo get_template_directory_uri()?>/assets/images/vdo-poster.jpg">
                <source src="<?php echo $video?>" type="video/mp4">
                Your browser does not support the video tag.
              </video>
          </div>
          </div>
        </div>
              <?php
            }
        }
    }

}
?>

       </div>
      <div class="load-more-btn text-center">
        <a href="#" class="btn">Load more</a>
      </div>
    </div>
  </section>
</main>
<!--content sction-->
<?php
get_footer();
?>