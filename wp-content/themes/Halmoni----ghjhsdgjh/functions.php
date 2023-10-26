<?php

/*****************************************
  Weaver's Web Functions & Definitions 
 *****************************************/
$functions_path = get_template_directory() . '/functions/';
// $post_type_path = get_template_directory().'/inc/post-types/';
/*--------------------------------------*/
/* Optional Panel Helper Functions
/*--------------------------------------*/
require_once($functions_path . 'admin-functions.php');
require_once($functions_path . 'admin-interface.php');
require_once($functions_path . 'theme-options.php');
function weaversweb_ftn_wp_enqueue_scripts()
{
	if (!is_admin()) {
		wp_enqueue_script('jquery');
		if (is_singular() and get_site_option('thread_comments')) {
			wp_print_scripts('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'weaversweb_ftn_wp_enqueue_scripts');
function weaversweb_ftn_get_option($name)
{
	$options = get_option('weaversweb_ftn_options');
	if (isset($options[$name]))
		return $options[$name];
}
function weaversweb_ftn_update_option($name, $value)
{
	$options = get_option('weaversweb_ftn_options');
	$options[$name] = $value;
	return update_option('weaversweb_ftn_options', $options);
}
function weaversweb_ftn_delete_option($name)
{
	$options = get_option('weaversweb_ftn_options');
	unset($options[$name]);
	return update_option('weaversweb_ftn_options', $options);
}
function get_theme_value($field)
{
	$field1 = weaversweb_ftn_get_option($field);
	if (!empty($field1)) {
		$field_val = $field1;

	}
	return $field_val;
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
if (!function_exists('weaversweb_theme_setup')):
	function weaversweb_theme_setup()
	{
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		register_nav_menus(
			array(
				'primary' => __('Primary Menu', 'weaversweb'),
				'secondary' => __('Secondary Menu', 'weaversweb'),
			)
		);

		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
	}
endif;
add_action('after_setup_theme', 'weaversweb_theme_setup');
function weaversweb_widgets_init()
{
	register_sidebar(
		array(
			'name' => __('Widget Area', 'weaversweb'),

			'id' => 'sidebar-1',

			'description' => __('Add widgets here to appear in your sidebar.', 'weaversweb'),

			'before_widget' => '<div id="%1$s" class="widget %2$s">',

			'after_widget' => '</div>',

			'before_title' => '<h2 class="widget-title">',

			'after_title' => '</h2>',
		)
	);

}
add_action('widgets_init', 'weaversweb_widgets_init');



function weaversweb_scripts()
{

	wp_enqueue_style('bootstrap.min.css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array());

	wp_enqueue_style('font-awesome-all.min.css', get_template_directory_uri() . '/assets/css/font-awesome-all.min.css', array());

	wp_enqueue_style('slick.css', get_template_directory_uri() . '/assets/css/slick.css', array());

	wp_enqueue_style('slick-theme.css', get_template_directory_uri() . '/assets/css/slick-theme.css', array());

	wp_enqueue_style('rangeSlider.min.css', get_template_directory_uri() . '/assets/css/ion.rangeSlider.min.css', array());




	wp_enqueue_style('custom.css', get_template_directory_uri() . '/assets/css/custom.css', array());
	wp_enqueue_style('style.css', get_template_directory_uri() . '/style.css', array());
	// Load the Internet Explorer specific script.

	global $wp_scripts;



	wp_enqueue_script('bootstrap.bundle.min.js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), time(), true);

	wp_enqueue_script('font-awesome-all.min.js', get_template_directory_uri() . '/assets/js/font-awesome-all.min.js', array('jquery'), time(), true);

	wp_enqueue_script('slick.js', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), time(), true);

	wp_enqueue_script('rangeSlider.min.css', get_template_directory_uri() . '/assets/js/ion.rangeSlider.min', array(), time(), true);

	wp_enqueue_script('custom.js', get_template_directory_uri() . '/assets/js/custom.js', array());
	wp_enqueue_script('custom-ajax-script.js', get_template_directory_uri() . '/assets/js/custom-ajax-script.js', array());
	// wp_localize_script('custom.js', 'ajax_url', admin_url('admin-ajax.php'));
	wp_localize_script('custom-ajax-script.js', 'ajax_params', array('ajax_url' => admin_url('admin-ajax.php')));
	// wp_localize_script('custom.js', 'wc_add_to_cart_params', array('ajax_url' => admin_url('admin-ajax.php')));
}






add_action('wp_enqueue_scripts', 'weaversweb_scripts');
add_action('wp_head', 'hook_javascript');
function hook_javascript()
{
	?>
	<script type="text/javascript">
		var ajaxurl = "<?php echo admin_url('admin-ajax.php') ?>";
	</script>
	<?php
}


// Body Class
// SVG format supporter
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
	$filetype = wp_check_filetype($filename, $mimes);
	return [
		'ext' => $filetype['ext'],
		'type' => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];

}, 10, 4);

function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
	echo '<style type="text/css">
		  .attachment-266x266, .thumbnail img {
			   width: 100% !important;
			   height: auto !important;
		  }
		  </style>';
}
add_action('admin_head', 'fix_svg');


// add_theme_support("woocommerce");
function mytheme_add_woocommerce_support()
{
	add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'mytheme_add_woocommerce_support');
add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns()
	{
		return 3; // 3 products per row
	}
}


// =====================remove breadcrumb=================

add_filter('woocommerce_before_main_content', 'remove_breadcrumbs');
function remove_breadcrumbs()
{
	if (!is_product()) {
		remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
	}
}

// ===============================remove titlte=================
add_filter('woocommerce_show_page_title', 'bbloomer_hide_shop_page_title');

function bbloomer_hide_shop_page_title($title)
{
	if (is_shop())
		$title = false;
	return $title;
}

// ===============================remove result_count=================

add_action('after_setup_theme', function () {
	remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
	remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
});

// ===============================remove catalog_ordering',=================

remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);


////////////////////////Sidebar Remove from Single page///////////////////
add_action('wp', 'my_remove_sidebar_product_pages');

function my_remove_sidebar_product_pages()
{

	if (is_product()) {

		remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

	}

}

//============================================================add to cart count=================================

add_filter('woocommerce_add_to_cart_fragments', 'add_to_cart_sign');
function add_to_cart_sign($fragments)
{
	ob_start();
	$items_count = WC()->cart->get_cart_contents_count();
	?>
	<span class="cart-item">
		<?php echo $items_count ? $items_count : '0'; ?>
	</span>
	<?php
	$fragments['.cart-item'] = ob_get_clean();

	return $fragments;


}
// AJAX handler to remove item from the cart and update cart count
add_action('wp_ajax_remove_cart_item', 'remove_cart_item_ajax');
add_action('wp_ajax_nopriv_remove_cart_item', 'remove_cart_item_ajax');

function remove_cart_item_ajax()
{
	$product_key = isset($_POST['product_key']) ? sanitize_text_field($_POST['product_key']) : '';

	// Remove the product from the cart
	WC()->cart->remove_cart_item($product_key);

	// Get the updated cart count
	$items_count = WC()->cart->get_cart_contents_count();

	wp_send_json(array('success' => true, 'cart_count' => $items_count));
	wp_die();
}


// =====================================Load More Option in woocommerce==================================================


// =====================================Load More Option in woocommerce==================================================
function load_more_posts()
{
	//print_r('yess');die();
	$page = $_POST['page'];
	//print_r($page);
	$posts_per_page = 6;
	$args = array(
		'post_type' => 'post',
		'orderby' => 'ID',
		'post_status' => 'publish',
		'order' => 'DESC',
		'posts_per_page' => $posts_per_page,
		'offset' => $page * $posts_per_page,
		// Calculate the offset based on page number
		'paged' => $page
	);

	$posts_query = new WP_Query($args);
	// echo'<pre>';
//  print_r($posts_query);die();

	if ($posts_query->have_posts()) {
		$i = 0;
		$a = 0;
		$b = 0;
		$c = 0;
		?>
	
			<?php
			while ($posts_query->have_posts()) {
				$posts_query->the_post();
				?>

				<?php
				if ($a == 0) {
					if ($b == 0) {


						?>

						<div class="col-lg-6 col-sm-12">
							<div class="gallery-item">
								<div class="img-wrap">


									<?php
									$imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

									?>

									<img src="<?php echo $imagepath[0] ?>" alt="">
									<div class="img-content">
										<h4>
											<?php the_title(); ?>
										</h4>
										<p>
											<?php the_excerpt(); ?> <a href="<?php echo the_permalink(); ?>">Read More..</a>
										</p>
									</div>
								</div>
							</div>
						</div>
						<?php

						$b++;
					} else if ($b == 1) {
						?>


							<div class="col-lg-3 col-md-6 col-sm-12">
								<div class="gallery-item">
									<div class="img-wrap">
										<?php
										$imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

										?>
										<img src="<?php echo $imagepath[0]; ?>" alt="">
										<div class="img-content">
											<h4>
											<?php the_title(); ?>
											</h4>
											<p>
											<?php the_excerpt(); ?><a href="<?php echo the_permalink(); ?>">Read More..</a>
											</p>
										</div>
									</div>
								</div>
							</div>
							<?php
							$b++;
					} else {
						?>

							<div class="col-lg-3 col-md-6 col-sm-12">
								<div class="gallery-item">
									<div class="img-wrap">
										<?php
										$imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

										?>
										<img src="<?php echo $imagepath[0] ?>" alt="">
										<div class="img-content">
											<h4>
											<?php the_title(); ?>
											</h4>
											<p>
											<?php the_excerpt(); ?><a href="<?php echo the_permalink(); ?>">Read More..</a>
											</p>
										</div>
									</div>
								</div>
							</div>
							<?php
							$b = 0;
							$a++;
					}

				} else {

					if ($c == 0) {
						?>

						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="gallery-item">
								<div class="img-wrap">
									<?php
									$imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

									?>
									<img src="<?php echo $imagepath[0] ?>" alt="">
									<div class="img-content">
										<h4>
											<?php the_title(); ?>
										</h4>
										<p>
											<?php the_excerpt(); ?><a href="<?php echo the_permalink(); ?>">Read More..</a>
										</p>
									</div>
								</div>
							</div>
						</div>
						<?php
						$c++;
					} else if ($c == 1) {
						?>

							<div class="col-lg-3 col-md-6 col-sm-12">
								<div class="gallery-item">
									<div class="img-wrap">
										<?php
										$imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

										?>
										<img src="<?php echo $imagepath[0] ?>" alt="">
										<div class="img-content">
											<h4>
											<?php the_title(); ?>
											</h4>
											<p>
											<?php the_excerpt(); ?> <a href="<?php echo the_permalink(); ?>">Read More..</a>
											</p>
										</div>
									</div>
								</div>
							</div>
							<?php
							$c++;
					} else {
						// console.log('bigg');
						?>
							<div class="col-lg-6 col-sm-12">
								<div class="gallery-item">
									<div class="img-wrap">
										<?php
										$imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

										?>
										<img src="<?php echo $imagepath[0] ?>" alt="">
										<div class="img-content">
											<h4>
											<?php the_title(); ?>
											</h4>
											<p>
											<?php the_excerpt(); ?> <a href="<?php echo the_permalink(); ?>">Read More..</a>
											</p>
										</div>
									</div>
								</div>
							</div>
							<?php
							$c = 0;
							$a = 0;
					}

				}

			}
			wp_reset_postdata();

			?>

	
		<?php
	} else {
		//echo 'No more posts.';
	}

	die();


}

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

//================================================================show all product when category not filter===============
function load_all_products() {
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
	
	<div class="col-xl-4 col-md-6">
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

		echo '<div class="custom-pagination ">
		<nav aria-label="Page navigation example">
		  <ul class="pagination justify-content-center align-items-center">';

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
	wp_send_json_error('No all  products found.');
}
	$output = ob_get_clean();
	wp_send_json_success($output);
	// wp_die();
	}
	add_action('wp_ajax_load_all_products', 'load_all_products');
	add_action('wp_ajax_nopriv_load_all_products', 'load_all_products');



//===================================================category wise data and price filter with pagination=============
// ==================================add catagory wise data for pagenationb in woocomerce=============================================
?>

<?php
function load_category_products()
{ ?>

	<?php
	//print_r('yesss');die();
	$category_id = $_POST['category_id'];
	//print_r($category_id);die();
	$page = intval($_POST['page']);
	$min_price = floatval($_POST['min_price']);
	$max_price = floatval($_POST['max_price']);


	$args = array(
		'post_type' => 'product',
		'posts_per_page' => 3,
		// Change as per your requirement
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

			<div class="col-xl-4 col-md-6">
				<a href="#" class="product-card">
					<div class="product-img-wrap">
						<?php
						if (has_post_thumbnail($products->post->ID)) {
							?>
							<?php echo get_the_post_thumbnail($products->post->ID, 'shop_catalog'); ?>
							<?php

						} else
							echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" width="65px" height="115px" />'; ?>

						<div class="card-img-overlay d-flex justify-content-center align-items-center">
							<div class="card-overlay-content">
								<h6 href="#" class="btn btn-invert">
									<?php echo woocommerce_template_loop_add_to_cart($products->post, $product); ?>
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
				</a>
			</div>


			<br>
			<?php

			// Display product information here
		}
		// Display pagination links
		$total_pages = $products->max_num_pages;

		echo '<div class="custom-pagination ">
		   <nav aria-label="Page navigation example">
			 <ul class="pagination justify-content-center align-items-center">';

		// Previous page
		if ($page > 1) {
			echo '<a href="#" class="page-item prev" data-category="' . $category_id . '" data-page="' . ($page - 1) . '">Previous</a>';
		}

		// Page numbers
		for ($i = 1; $i <= $total_pages; $i++) {
			echo '<a href="#" data-category="' . $category_id . '" data-page="' . $i . '">' . $i . '</a>';
		}

		// Next page
		if ($page < $total_pages) {
			echo '<a href="#" class="page-item next" data-category="' . $category_id . '" data-page="' . ($page + 1) . '">Next</a>';
		}

		echo '</div>';


	} else {
		echo "product not found";
	}


	$output = ob_get_clean();
	wp_send_json_success($output);
	wp_die();
}

add_action('wp_ajax_load_category_products', 'load_category_products');
add_action('wp_ajax_nopriv_load_category_products', 'load_category_products');




//========================================================archive product to single product page redirect============















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


//===============================================Gallery=======================================================

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





// function add_video_url_meta_box()
// {
// 	add_meta_box('video_url_meta_box', 'Featured Video URL', 'render_video_url_meta_box', 'Gallery', 'normal', 'high');
// }
// add_action('add_meta_boxes', 'add_video_url_meta_box');

// function render_video_url_meta_box($post)
// {
// 	$video_url = get_post_meta($post->ID, 'video_url', true);

// 	?>
<!-- // 	<label for="video_url">Video URL:</label>
// 	<input type="text" id="video_url" name="video_url" value="<?php //echo esc_url($video_url); ?>" size="60"> -->
// 	<?php
// }

// function save_video_url($post_id)
// {
// 	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
// 		return $post_id;
// 	if (isset($_POST['video_url'])) {
// 		update_post_meta($post_id, 'video_url', esc_url($_POST['video_url']));
// 	}
// }
// add_action('save_post', 'save_video_url');


$args = array(
    'post_type' => 'media_gallery',
    'posts_per_page' => -1, // Display all media items
);

$media_items = new WP_Query($args);

if ($media_items->have_posts()) {
    echo '<div class="custom-gallery">';
    while ($media_items->have_posts()) {
        $media_items->the_post();

        echo '<div class="media-item">';
        if (has_post_thumbnail()) {
            the_post_thumbnail();
        } else {
            the_content(); // Display video embed code
        }
        echo '</div>';
    }
    echo '</div>';
}

wp_reset_postdata();



//===================================================gallery function===============================================


function gallery_posts()
{
	$page = $_POST['page'];

	$args = array(
		'post_type' => array('Gallery'),
		'posts_per_page' => 6,
		'paged' => $page,
		'order' => 'ASC'
	);
   
	$custom_query = new WP_Query($args);

	if ($custom_query->have_posts()) {

			while ($custom_query->have_posts()) {
				$custom_query->the_post();


											
				$video_url = get_post_meta(get_the_ID(), 'video_url', true);
			print_r($video_url);
				if (!empty($video_url)) {
					
					echo '<div class="featured-video">';
					echo '<video controls><source src="' . esc_url($video_url) . '" type="video/mp4"></video>';
					echo '</div>';
				}
				


				if ($a == 0) {
					if ($b == 0) {

						if (has_post_thumbnail()) {

							$image_path = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');


							if ($image_path) {
								?>


								<div class="col-lg-3 col-md-6">
									<div class="gallery-item">
										<div class="img-wrap">
											<img src="<?php echo $image_path[0] ?>" alt="">
										</div>
									</div>
								</div>
								<?php
							}
						}

						$b++;
					} else if ($b == 1) {
						if (has_post_thumbnail()) {

							$image_path = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');

							if ($image_path) {
								?>


									<div class="col-lg-3 col-md-6">
										<div class="gallery-item">
											<div class="img-wrap">
												<img src="<?php echo $image_path[0] ?>" alt="">
											</div>
										</div>
									</div>
								<?php
							}
						}
						$b++;
					} else {
						$video_url = get_post_meta(get_the_ID(), 'video_url', true);
						if (!empty($video_url)) {


							echo '<div class="col-lg-6 col-md-6 col-sm-12">
  <div class="gallery-item">
  <div class="video-box">
  <div class="playpause">
    <span href="javascript:void(0);" class="btn-play"><img src="./images/play-icon.svg" alt=""></span>
     </div>
         <video class="video1" poster="./images/vdo-poster.jpg">
            <source src="' . esc_url($video_url) . '" type="video/mp4">
            Your browser does not support the video tag.
         </video>
       </div>
       </div>     </div>';

						}
						$b = 0;
						$a++;
					}

				} else {

					if ($c == 0) {
						$video_url = get_post_meta(get_the_ID(), 'video_url', true);
						if (!empty($video_url)) {


							echo '<div class="col-lg-6 col-md-6 col-sm-12">
          <div class="gallery-item">
            <div class="video-box">
              <div class="playpause">
                <span href="javascript:void(0);" class="btn-play"><img src="./images/play-icon.svg" alt=""></span>
              </div>
              <video class="video1" poster="./images/vdo-poster.jpg">
                <source src="' . esc_url($video_url) . '" type="video/mp4" type="video/mp4">
                Your browser does not support the video tag.
              </video>
          </div>
          </div>
        </div>';

						}
						$c++;
					} else if ($c == 1) {
						if (has_post_thumbnail()) {

							$image_path = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');

							if ($image_path) {
								?>

									<div class="col-lg-3 col-md-6">
										<div class="gallery-item">
											<div class="img-wrap">
												<img src="<?php echo $image_path[0] ?>" alt="">
											</div>
										</div>
									</div>
								<?php
							}
						}
						$c++;
					} else {
						if (has_post_thumbnail()) {

							$image_path = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');

							if ($image_path) {
								// console.log('bigg');
								?>
									<div class="col-lg-3 col-md-6">
										<div class="gallery-item">
											<div class="img-wrap">
												<img src="<?php echo $image_path[0] ?>" alt="">
											</div>
										</div>
									</div>
								<?php
							}
						}
						$c = 0;
						$a = 0;
					}

				}

			}
			wp_reset_postdata();
		

	} else {
		echo 'no photos and videos found';
	}

	die();
}




add_action('wp_ajax_gallery_posts', 'gallery_posts');
add_action('wp_ajax_nopriv_gallery_posts', 'gallery_posts');