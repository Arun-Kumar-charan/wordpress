<?php
// Template Name:Product page
get_header();
?>
<section class="banner-wrap">
      <div class="inner-banner-content">
        <div class="banner-item">
          <div class="banner-img">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/products.jpg" alt="">
          </div>
          <div class="container banner-content">
            <div class="banner-content-wrapper">
              <h1>Products</h1>
            </div>
          </div>
        </div>
       
      </div>
</section>
<!--banner sction-->
<!--content sction-->
<main class="main-section">
  <section class="product-listing-sec common-padd">
    <div class="container">
      <div class="custom-heading text-center">
        <div class="hdng-top">
          <p>products</p>
        </div>
        <h2>Our products</h2>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-4">
          <div class="product-listing-sidebar">
            <div class="product-sidebar">
              <div class="dropdown">
                  <h4>Filter by price</h4>
                  <div class="dropdown-item-custom" id="range_1">
                  <input type="text" class="js-range-slider" id="js-range-slider" name="my_range" value="" />
                  </div>
                  <div class="dropdown-item-custom" id="range_2">
                  <input type="text" class="js-range-slider" id="js-range-slider_2" name="my_range" value="" />
                  </div>
              </div>
          </div>
            <div class="product-sidebar">
                <div class="dropdown">
                  <h4>Product categories</h4>
                  <div class="dropdown-item-custom">
                    <ul class="js-dropdown-list p-0 mb-0">
                    <?php
  $categories = get_terms(array(
    'taxonomy' => 'product_cat',
    'hide_empty' => true,
  ));

  foreach ($categories as $category) {
    //print_r($category);
    ?>
    <!-- echo '<button class="category-button"  data-category="' . $category->slug . '">' . $category->name . '</button>'; -->
    <li>
                        <div class="form-check">
                        <input type="checkbox" id="category-button_<?php echo $category->term_id ?>" class="category-button form-check-input catagory_wise" value="<?php echo $category->term_id ?>" id="option" data-category="<?php echo $category->slug ?>">
                          <label class="form-check-label" for="check-1"><?php echo $category->name ; ?></label>
                        </div>
                      </li>

    <?php
  }
  ?>
                     
                    
                      
                    </ul>
                    <!-- <div class="alles-btn">
                        <a href="">Alles verkaufen</a>
                    </div> -->
                  </div>
                </div>
              </div>
            
            
          </div>
        </div>
        <div class="col-lg-9 col-md-8">
          <div class="show-result">
            <p>Showing all results</p>
            <div class="input-group">
              <label class="input-group-addon" for="input-sort">Sort by</label>
              <select id="input-sort" class="form-select">
                <option selected="selected">selected</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="row" id="product-container">
            

               <div class="pagination _1">
                
               </div>

               <div class="pagination _2">
                
                </div>

            </div>
            <div class="custom-pagination ">
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center align-items-center">
 
                  <!-- <li class="page-item prev">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true"><img src="<?php echo get_template_directory_uri()?>/assets/images/left-expand.svg" alt=""></span>
                    </a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">4</a></li>
                  <li class="page-item next">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true"><img src="<?php echo get_template_directory_uri()?>/assets/images/right-expand.svg" alt=""></span>
                    </a>
                  </li> -->
                </ul>
              </nav>
            </div>
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