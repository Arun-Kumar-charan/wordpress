<?php
//Template Name:Receipes page
get_header();
?>
<!--banner sction-->
<section class="banner-wrap">
      <div class="inner-banner-content">
        <div class="banner-item">
          <div class="banner-img">
            <img src="<?php echo get_template_directory_uri()?>/assets/images/recipes.jpg" alt="">
          </div>
          <div class="container banner-content">
            <div class="banner-content-wrapper">
              <h1>Recipes</h1>
            </div>
          </div>
        </div>
       
      </div>
</section>
<!--banner sction-->

<!--content sction-->
<main class="main-section">
  <section class="recipes-content our-story-sec common-padd">
    
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="image-box">
            
              <img src="<?php echo get_template_directory_uri()?>/assets/images/recipe-img.jpg" alt="">
           
          </div>
        </div>
        <div class="col-lg-6">
          <div class="content-wrap">
            <div class="custom-heading">
              <div class="hdng-top">
                <p>recipes</p>
              </div>
              <h2>Our recipes</h2>
            </div>
            <div class="about-content">
              <p>Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industry's Standard Dummy Text Ever Since The 1500S, When An Unknown Printer Took A Galley Of Type And Scrambled It To Make A Type Specimen Book. It Has Survived Not Only Five Centuries. </p>
              <h3>Ingredients</h3>
              <ul>
                <li>Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry.</li>
                <li>Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry.</li>
                <li>Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry.</li>
              </ul>
            </div>
            
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="nutri-info-wrap">
    <div class="container">
      <div class="nutri-content d-flex">
        <div class="nutri-heading">
          <h3>Nutritional Information</h3>
        </div>
        <div class="elements">
          <div class="item">
            <h5>200g</h5>
            <p>Fat</p>
          </div>
          <div class="item">
            <h5>200g</h5>
            <p>Fat</p>
          </div>
          <div class="item">
            <h5>200g</h5>
            <p>Fat</p>
          </div>
          <div class="item"> <a href="#" class="btn">Load more</a>
            <h5>200g</h5>
            <p>Fat</p>
          </div>
          <div class="item">
            <h5>200g</h5>
            <p>Fat</p>
          </div>
          <div class="item">
            <h5>200g</h5>
            <p>Fat</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="recipe-pg gallery common-padd">
    <div class="container">
      <div class="custom-heading text-center">
        <h2>So many Kimchi recipes</h2>
      </div>

      <div id="content-container">
    <!-- Display your initial posts here -->
</div>
   
      </div>
      <div class="load-more-btn text-center">
      <button id="load-more-button" class='btn'>Load More</button>
      </div>
    </div>
  </section>
</main>
<!--content sction-->
<?php
get_footer();
?>