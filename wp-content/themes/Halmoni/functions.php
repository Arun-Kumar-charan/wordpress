<?php

/*****************************************
* Weaver's Web Functions & Definitions *
*****************************************/
$functions_path = get_template_directory().'/functions/';
// $post_type_path = get_template_directory().'/inc/post-types/';
/*--------------------------------------*/
/* Optional Panel Helper Functions
/*--------------------------------------*/
require_once($functions_path.'admin-functions.php');
require_once($functions_path.'admin-interface.php');
require_once($functions_path.'theme-options.php');
function weaversweb_ftn_wp_enqueue_scripts(){
    if(!is_admin()){
        wp_enqueue_script('jquery');
        if(is_singular()and get_site_option('thread_comments')){
            wp_print_scripts('comment-reply');
			}
		}
	}
add_action('wp_enqueue_scripts','weaversweb_ftn_wp_enqueue_scripts');
function weaversweb_ftn_get_option($name){
    $options = get_option('weaversweb_ftn_options');
    if(isset($options[$name]))
        return $options[$name];
	}
function weaversweb_ftn_update_option($name, $value){
    $options = get_option('weaversweb_ftn_options');
    $options[$name] = $value;
    return update_option('weaversweb_ftn_options', $options);
	}
function weaversweb_ftn_delete_option($name){
    $options = get_option('weaversweb_ftn_options');
    unset($options[$name]);
    return update_option('weaversweb_ftn_options', $options);
	}
function get_theme_value($field){
	$field1 = weaversweb_ftn_get_option($field);
	if(!empty($field1)){
		$field_val = $field1;

		}
	return	$field_val;
	}
/*--------------------------------------*/
/* Post Type Helper Functions
/*--------------------------------------*/

// require_once($post_type_path.'testimonials.php');
// require_once($post_type_path.'teams.php');
// require_once($post_type_path.'projects.php');
// require_once($post_type_path.'perks.php');

/*--------------------------------------*/
/* Theme Helper Functions
/*--------------------------------------*/
if(!function_exists('weaversweb_theme_setup')):
	function weaversweb_theme_setup(){
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		register_nav_menus(array(
			'primary' => __('Primary Menu','weaversweb'),
			'secondary'  => __('Secondary Menu','weaversweb'),
			
			));

		add_theme_support('html5',array('search-form','comment-form','comment-list','gallery','caption'));
		}
	endif;
add_action('after_setup_theme','weaversweb_theme_setup');
function weaversweb_widgets_init(){
	register_sidebar(array(
		'name'          => __('Widget Area','weaversweb'),

		'id'            => 'sidebar-1',

		'description'   => __('Add widgets here to appear in your sidebar.','weaversweb'),

		'before_widget' => '<div id="%1$s" class="widget %2$s">',

		'after_widget'  => '</div>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',
		));

	}
add_action('widgets_init','weaversweb_widgets_init');




function weaversweb_scripts(){
	
	wp_enqueue_style('bootstrap.min.css',get_template_directory_uri().'/assets/css/bootstrap.min.css',array());

	wp_enqueue_style('font-awesome-all.min.css',get_template_directory_uri().'/assets/css/font-awesome-all.min.css',array());

	wp_enqueue_style('slick.css',get_template_directory_uri().'/assets/css/slick.css',array());

	wp_enqueue_style('slick-theme.css',get_template_directory_uri().'/assets/css/slick-theme.css',array());

	wp_enqueue_style('rangeSlider.min.css',get_template_directory_uri().'/assets/css/ion.rangeSlider.min.css',array());


	

   	wp_enqueue_style('custom.css',get_template_directory_uri().'/assets/css/custom.css',array());
	   wp_enqueue_style('style.css',get_template_directory_uri().'/style.css',array());
	// Load the Internet Explorer specific script.

	global $wp_scripts;

	

    wp_enqueue_script('bootstrap.bundle.min.js',get_template_directory_uri().'assets/js/bootstrap.bundle.min.js',array('jquery'),time(),true);

	wp_enqueue_script('font-awesome-all.min.js',get_template_directory_uri().'/assets/js/font-awesome-all.min.js',array('jquery'),time(),true);

	wp_enqueue_script('slick.js',get_template_directory_uri().'/assets/js/slick.js',array('jquery'),time(),true);

	wp_enqueue_script('rangeSlider.min.css',get_template_directory_uri().'/assets/js/ion.rangeSlider.min',array(),time(),true);
	
	wp_enqueue_script('custom.js',get_template_directory_uri().'/assets/js/custom.js',array());

	wp_enqueue_script('coustom-ajax.js', get_template_directory_uri() . '/assets/js/coustom-ajax.js', array());
	// wp_localize_script('custom.js', 'ajax_url', admin_url('admin-ajax.php'));
	wp_localize_script('coustom-ajax.js', 'ajax_params', array('ajax_url' => admin_url('admin-ajax.php')));
	
	wp_localize_script('custom.js', 'ajax_url', admin_url('admin-ajax.php'));
	wp_localize_script('custom.js', 'ajax_params', array('ajax_url' => admin_url('admin-ajax.php')));
	wp_localize_script('custom.js', 'wc_add_to_cart_params', array('ajax_url' => admin_url('admin-ajax.php')));

}


	

    
	
add_action('wp_enqueue_scripts','weaversweb_scripts');
add_action('wp_head','hook_javascript');
function hook_javascript() {
?>
<script type="text/javascript">
	var ajaxurl = "<?php echo admin_url('admin-ajax.php')  ?>";
</script>
<?php 
}


// Body Class
// =======================================post type thame support==========================================

add_action('init', 'wpdocs_custom_init');

/**
 * Add excerpt support to pages
 */
function wpdocs_custom_init() {
	add_post_type_support( 'page', 'excerpt' );
}

//  ================================Thame support code in woocommerce====================================
function mytheme_add_woocommerce_support() {
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// ===========================================remove sidebar in woocommerce===============================================

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


//======================================================Home page feature product view more==============================

function view_more_products()
{
	$page = $_POST['page'];
	$posts_per_page = 4;
	$args1 = array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_visibility',
				'field' => 'name',
				'terms' => 'featured',
			),
		),
		'posts_per_page' => $posts_per_page,
		'offset' => $page * $posts_per_page,

		'paged' => $page,
	);

	$FeaProduct_query = new WP_Query($args1);
	while ($FeaProduct_query->have_posts()):
		$FeaProduct_query->the_post();
		global $product; ?>
		<div class="col-lg-3 col-md-6">
			<a href="#" class="product-card">
				<div class="product-img-wrap">
					<?php
					if (has_post_thumbnail($FeaProduct_query->post->ID)) {
						?>
						<?php echo get_the_post_thumbnail($FeaProduct_query->post->ID, 'shop_catalog'); ?>
						<?php

					} else
						echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" width="65px" height="115px" />'; ?>
					<div class="card-img-overlay d-flex justify-content-center align-items-center">

						<div class="card-overlay-content">
							<h6 href="#" class="btn btn-invert">
								<?php echo woocommerce_template_loop_add_to_cart($FeaProduct_query->post, $product); ?>
							</h6>
							<h6 href="#" class="btn">Buy now</h6>
						</div>
					</div>
					<div class="quantity">
						<p>Net wet 125g</p>
					</div>
				</div>
				<div class="product-content text-center">
					<h4>
						<?php the_title(); ?>
					</h4>
					<p>
						<?php the_excerpt(); ?>
					</p>
					<h5>
						<?php echo $product->get_price_html(); ?>
					</h5>
				</div>



		</div>
	<?php
	endwhile;
	wp_reset_query();

}
add_action('wp_ajax_view_more_products', 'view_more_products');
add_action('wp_ajax_nopriv_view_more_products', 'view_more_products');

  

// ==================================add data for pagenationb in woocomerce=============================================
function load_category_products() {
	//print_r('yesss');die();
	// $category_id = $_POST['category_id'];
	//print_r($category_id);die();
	$page = intval($_POST['page']);
	$min_price = floatval($_POST['min_price']);
	$max_price = floatval($_POST['max_price']);
	
	$args = array(
	'post_type' => 'product', // Specifies the post type as 'product' (assumed to be a custom post type for products)
	'posts_per_page' => 6, // Fetch all products
	'paged' => $page, // Specifies the current page number
	'meta_query' => array( // Specifies a meta query (in this case, filtering by product price)
	array(
	'key' => '_price', // Specifies the meta key to match (assuming '_price' holds the product price)
	'value' => array($min_price, $max_price), // Specifies the price range to filter products by
	'type' => 'numeric', // Specifies the type of the value (numeric in this case)
	'compare' => 'BETWEEN', // Specifies the comparison operation (between the given values)
	),
	),
	);
	
	$products = new WP_Query($args);
	
	//print_r($products);die();
	
	if ($products->have_posts()) {
	ob_start();
	while ($products->have_posts()) {
	$products->the_post();
	global $product; 
	
	?>
	
	<div class="col-lg-3 col-md-6">
	<a href="#" class="product-card">
	<div class="product-img-wrap">
	<?php 
	if ( has_post_thumbnail( $products->post->ID ) ) 
	echo get_the_post_thumbnail( $products->post->ID, 'shop_catalog' ); 
	else 
	echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" />'; 
	?>
	<div class="card-img-overlay d-flex justify-content-center align-items-center">
	<div class="card-overlay-content">
	<h6 href="#" class="btn btn-invert"><?php woocommerce_template_loop_add_to_cart( $products->post, $product )?></h6>
	<h6 href="#" class="btn">Buy Now</h6>
	</div>
	</div>
	</div>
	<div class="product-content text-center">
	<h4><?php the_title()?></h4>
	<?php global $post; ?>
	<p><?php echo wp_trim_words($post->post_excerpt) ?></p>
	<h5><?php echo $product->get_price_html(); ?></h5>
	</div>
	</a>
	</div>
	<?php 
	?>
	<br>
	<?php // Display product information here
	}
	    // Display pagination links
		$total_pages =  $products->max_num_pages;

		echo '<div class="pagination">';

		// Previous page
		if ($page > 1) {
			echo '<a href="#" class="prev-page" data-category="' . $total_pages. '" data-page="' . ($page - 1) . '">Previous</a>';
		}

		// Page numbers
		for ($i = 1; $i <= $total_pages; $i++) {
			echo '<a href="#" data-category="' . $total_pages. '" data-page="' . $i . '">' . $i . '</a>';
		}

		// Next page
		if ($page < $total_pages) {
			echo '<a href="#" class="next-page" data-category="' . $total_pages . '" data-page="' . ($page + 1) . '">Next</a>';
		}

		echo '</div>';

	 
  }  else {
	wp_send_json_error('No products found all product.');
}
	$output = ob_get_clean();
	wp_send_json_success($output);
	// wp_die();
	}
	add_action('wp_ajax_load_category_products', 'load_category_products');
	add_action('wp_ajax_nopriv_load_category_products', 'load_category_products');
	


// =====================================show product catagory wise=======================================================
function load_category_products_wise() {
	//print_r('yesss');die();
    $category_id = $_POST['category_id'];
	//print_r($category_id);die();
    $page = intval($_POST['page']);
	$min_price = floatval($_POST['min_price']);
    $max_price = floatval($_POST['max_price']);


    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 4, // Change as per your requirement
        'paged' => $page,
        'tax_query' => array(
			array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $category_id,
            ),
        ),
		'meta_query' => array(
            array(
                'key' => '_price',
                'value' => array($min_price, $max_price),
                'type' => 'numeric',
                'compare' => 'BETWEEN',
            ),
        ),
    );
    

    $products = new WP_Query($args);

	//print_r($products);die();

    if ($products->have_posts()) {
        ob_start();
		
        while ($products->have_posts()) {
			
          $products->the_post();
		  global $product; 

?>

		  <div class="col-lg-3 col-md-6">
          <a href="#" class="product-card">
            <div class="product-img-wrap">
            <?php 
                if ( has_post_thumbnail( $products->post->ID ) ) 
                    echo get_the_post_thumbnail( $products->post->ID, 'shop_catalog' ); 
                else 
                    echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder"  />'; 
            ?>
             
            
              <div class="card-img-overlay d-flex justify-content-center align-items-center">
                <div class="card-overlay-content">
                  <h6 href="#" class="btn btn-invert"><?php  woocommerce_template_loop_add_to_cart( $products->post, $product )?></h6>
                  <h6 href="#" class="btn">Buy Now</h6>
                </div>
              </div>
            </div>
            <div class="product-content text-center">
              <h4><?php the_title()?></h4>
              <?php global $post; ?>
              <p><?php echo wp_trim_words($post->post_excerpt)  ?></p>
              <h5><?php echo $product->get_price_html(); ?></h5>
            </div>
          </a>
        </div>
        <?php 
		 ?>
		 <br>
		 <?php
		  
           
        }
		   // Display pagination links
		   $total_pages =  $products->max_num_pages;

		   echo '<div class="pagination">';
   
		   // Previous page
		   if ($page > 1) {
			   echo '<a href="#" class="prev-page" data-category="' . $category_id . '" data-page="' . ($page - 1) . '">Previous</a>';
		   }
   
		   // Page numbers
		   for ($i = 1; $i <= $total_pages; $i++) {
			   echo '<a href="#" data-category="' . $category_id . '" data-page="' . $i . '">' . $i . '</a>';
		   }
   
		   // Next page
		   if ($page < $total_pages) {
			   echo '<a href="#" class="next-page" data-category="' . $category_id . '" data-page="' . ($page + 1) . '">Next</a>';
		   }
   
		   echo '</div>';

        
     } 
	 else {
        wp_send_json_error('No products found catagory wise.');
    }
	$output = ob_get_clean();
	wp_send_json_success($output);
    wp_die();
}
add_action('wp_ajax_load_category_products_wise', 'load_category_products_wise');
add_action('wp_ajax_nopriv_load_category_products_wise', 'load_category_products_wise');


// =====================================Load More Option in woocommerce Recipes==================================================
function load_more_posts() {
    $page = $_POST['page'];
	// print_r($page);
	$posts_per_page = 6; 
	$args = array(
		'post_type' => 'post',
		'orderby' => 'ID',
		'post_status' => 'publish',
		'order' => 'DESC',
		'posts_per_page' => $posts_per_page,
		'offset' => $page * $posts_per_page, // Calculate the offset based on page number
		'paged' => $page,
		'tax_query' => array(
			array(
				'taxonomy' => 'product_type', // Change 'product_type' to the actual taxonomy name for products
				'field' => 'slug',
				'terms' => 'product', // Change 'product' to the actual term for products
				'operator' => 'NOT IN'
			)
		)
	);

    $posts_query = new WP_Query($args);
// echo'<pre>';
//  print_r($posts_query);die();

    if ($posts_query->have_posts()) {
		$i = 0;
		$a=0;
		$b=0;
		$c=0;
		?>
		<div class="row">
			<?php
        while ($posts_query->have_posts()) {
            $posts_query->the_post();
			?>
			
				<?php
			  if($a==0){
		if($b==0){

	   
		  ?>
	  
	<div class="col-lg-6 col-sm-12">
	  <div class="gallery-item">
		<div class="img-wrap">
	
		
		<?php 
		$imagepath=wp_get_attachment_image_src(get_post_thumbnail_id(),'large'); 
	
		 ?>
	 
		  <img src="<?php echo $imagepath[0]?>" alt="">
		  <div class="img-content">
			<h4><?php  the_title();?></h4>
			<p>Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industrys Standard Dummy Text Ever Since The 1500S, <a href="#">Read More..</a></p>
		  </div>
	   </div>
	  </div>
	</div> 
	<?php
	
	  $b++; 
	}
	   else if($b==1){
		?>

	
		 <div class="col-lg-3 col-md-6 col-sm-12">
		<div class="gallery-item">
		  <div class="img-wrap">
			<img src="<?php echo get_template_directory_uri()?>/assets/images/img1.jpg" alt="">
			<div class="img-content">
			  <h4><?php  the_title();?></h4>
			  <p>Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry.<a href="#">Read More..</a></p>
			</div>
		  </div>
		</div>
	  </div>
	  <?php
		$b++; }
	   else{
		?>
		
		 <div class="col-lg-3 col-md-6 col-sm-12">
		<div class="gallery-item">
		  <div class="img-wrap">
			<img src="<?php echo get_template_directory_uri()?>/assets/images/img1.jpg" alt="">
			<div class="img-content">
			  <h4><?php  the_title();?></h4>
			  <p>Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry.<a href="#">Read More..</a></p>
			</div>
		  </div>
		</div>
	  </div>
	  <?php
		$b=0;
		$a++;
	   }
	   
	  }
	  
	  else{
	   
		if($c==0){
		  ?>
	  
		<div class="col-lg-3 col-md-6 col-sm-12">
	  <div class="gallery-item">
		<div class="img-wrap">
		  <img src="<?php echo get_template_directory_uri()?>/assets/images/img1.jpg" alt="">
		  <div class="img-content">
			<h4><?php  the_title();?></h4>
			<p>Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry.<a href="#">Read More..</a></p>
		  </div>
		</div>
	  </div>
	</div>
	<?php
	  $c++; }
	   else if($c==1){
		?>
	 
		<div class="col-lg-3 col-md-6 col-sm-12">
		<div class="gallery-item">
		  <div class="img-wrap">
			<img src="<?php echo get_template_directory_uri()?>/assets/images/img1.jpg" alt="">
			<div class="img-content">
			  <h4><?php  the_title();?></h4>
			  <p>Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry.<a href="#">Read More..</a></p>
			</div>
		  </div>
		</div>
	  </div>
	  <?php
		$c++; }
	   else{
		// console.log('bigg');
		?>
		 <div class="col-lg-6 col-sm-12">
	  <div class="gallery-item">
		<div class="img-wrap">
		  <img src="<?php echo get_template_directory_uri()?>/assets/images/img5.jpg" alt="">
		  <div class="img-content">
			<h4><?php  the_title();?></h4>
			<p>Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industrys Standard Dummy Text Ever Since The 1500S, <a href="#">Read More..</a></p>
		  </div>
	   </div>
	  </div>
	</div>
	<?php
		$c=0;
		$a=0;
	   }
	   
	  }
	  
	}
	  wp_reset_postdata();
	
	?>
			<?php
        
            // Display your post content
            // echo  '<div>' . get_the_title() . '</div>';
      

        wp_reset_postdata();
		?>
		</div>
		<?php
    } 

    die();

	
}

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');


// ===================================add to cart section=============================================
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
<span class="cart_item"><?php echo WC()->cart->get_cart_contents_count();?></span>
    <?php

    $fragments['span.cart_item'] = ob_get_clean();

    return $fragments;
}


// AJAX handler to remove item from the cart and update cart count
add_action('wp_ajax_remove_cart_item', 'remove_cart_item_ajax');
add_action('wp_ajax_nopriv_remove_cart_item', 'remove_cart_item_ajax');

function remove_cart_item_ajax() {
    $product_key = isset($_POST['product_key']) ? sanitize_text_field($_POST['product_key']) : '';

    // Remove the product from the cart
    WC()->cart->remove_cart_item($product_key);

    // Get the updated cart count
    $cart_count = WC()->cart->get_cart_contents_count();

    wp_send_json(array('success' => true, 'cart_count' => $cart_count));
    wp_die();
}



//=================================================================Gallery=====================================

function custom_post_types()
{
// Custom post type for Photos
	register_post_type(
		'Gallery',
		array(
			'labels' => array(
				'name' => 'Gallery',
				'singular_name' => 'Gallery'
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'thumbnail'),
		)
	);
}
add_action('init', 'custom_post_types');


//===================================================gallery data fetch=======================================