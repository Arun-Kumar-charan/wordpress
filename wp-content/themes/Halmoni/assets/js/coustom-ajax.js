
// =================================add to cart section in woocomerce========================================

  
jQuery(document).ready(function($) {
    // Listen for a click on the "Remove" button
    $(document.body).on('click', 'a.remove', function(e) {
        e.preventDefault();

        var remove_url = $(this).attr('href');
        var product_id = $(this).data('product_id');
        var product_key = $(this).data('product_key');

        // Perform AJAX request to remove the product from the cart
        $.ajax({
            type: 'POST',
            url: ajax_url, // WordPress AJAX URL
            data: {
                action: 'remove_cart_item', // Custom AJAX action
                product_key: product_key
            },
            success: function(response) {
                if (response.success) {
                    // Update the cart count in the header
                    $('#cart-count').text(response.cart_count);

                    // Redirect to the remove URL to update the cart display
                    window.location.href = remove_url;
                }
            }
        });
    });
});



//===========================================================Feature product view more===================
 
jQuery(document).ready(function($) {
    let page = 0;
  
    const postsContainer = $('#featured-products');
    const loadMoreButton = $('#more_products');
    const data = {
      'action': 'view_more_products',
      'page': page
      
  };
  
  $.ajax({
      url: ajax_params.ajax_url,
      type: 'POST',
      data: data,
      success: function(response) {
          if (response) {
            
              postsContainer.append(response);
          } else {
              loadMoreButton.hide();
          }
      }
  });
  
    loadMoreButton.on('click', function(e) {
    
        e.preventDefault();
      
        page++;
  
        const data = {
            'action': 'view_more_products',
            'page': page
        };
  
        $.ajax({
            url: ajax_params.ajax_url,
            type: 'POST',
            data: data,
            success: function(response) {
                if (response) {
                    postsContainer.append(response);
                }if(response==0) {
                    loadMoreButton.hide();
                }
            }
        });
    });
  });
  

  // ==================================lode more option For Recipes===================================
jQuery(document).ready(function($) {
    let page = 0;
    const postsContainer = $('#content-container');
    const loadMoreButton = $('#load-more-button');
    const data = {
      'action': 'load_more_posts',
      'page': page
  };
  
  $.ajax({
      url: ajax_url,
      type: 'POST',
      data: data,
      success: function(response) {
          if (response) {
              postsContainer.append(response);
          } else {
              loadMoreButton.hide();
          }
      }
  });
  
    loadMoreButton.on('click', function(e) {
      // console.log('123244');
        e.preventDefault();
       // console.log(page++);
        page++;
  
        const data = {
            'action': 'load_more_posts',
            'page': page
        };
  
        $.ajax({
            url: ajax_params.ajax_url,
            type: 'POST',
            data: data,
            success: function(response) {
                if (response) {
                    postsContainer.append(response);
                  } else {
                  
                  loadMoreButton.hide();
                }
            }
        });
    });
  });



  //===================================================gallery=================================================
 
