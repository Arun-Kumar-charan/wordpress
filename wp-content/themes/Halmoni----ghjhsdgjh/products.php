<?php
//Template Name: products page
get_header();
?>

<!--header sction-->
<!--banner sction-->

<section class="banner-wrap">

  <div class="inner-banner-content">
    <div class="banner-item">
      <div class="banner-img">
        <img src="<?php echo get_theme_value('product_page_banner'); ?>" alt="">
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

                <div class="dropdown-item-custom">
                  <input type="text" class="js-range-slider" name="my_range" value="" />
                </div>
              </div>
            </div>
            <div class="product-sidebar">
              <div class="dropdown">
                <h4>Product categories</h4>

                <div class="dropdown-item-custom">
                  <ul class="js-dropdown-list p-0 mb-0">


                    <?php
                    $categories = get_terms(
                      array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => true,
                      )
                    );

                    foreach ($categories as $category) {
                      ?>
                      <li>
                        <div class="form-check">

                          <label class="form-check-label"><input type="checkbox" class="category-button form-check-input"
                              id="search" name="progress" 
                              data-category="<?php echo $category->slug ?>" value="<?php echo $category->term_id ?>">
                            <?php echo $category->name; ?>
                          </label>


                        </div>
                      </li>

                      <?php
                    }
                    ?>


                  </ul>

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
                <option value="1" name="min_price" id="hidden_minimum_price">Minimum_price</option>
                <option value="2" name="max_price" id="hidden_maximum_price">maximum_price</option>

              </select>
            </div>
          </div>

          <div class="col-lg-12">
            
              <!-- AJAX will replace this content with filtered products -->
<!--         
            <div class="pagination">
                
               </div> -->
         
            <div class="row" id="filtered-products">

           


            </div>
            <div class="custom-pagination ">
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center align-items-center">
                  <!-- <li class="page-item prev">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true"><img
                          src="<?php// echo get_template_directory_uri() ?>/assets/images/left-expand.svg" alt=""></span>
                    </a>
                  </li> -->
                  <!-- <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">4</a></li> -->
                  <!-- <li class="page-item next">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true"><img
                          src="<?php //echo get_template_directory_uri() ?>/assets/images/right-expand.svg" alt=""></span>
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

<!--footer section-->
<?php get_footer(); ?>