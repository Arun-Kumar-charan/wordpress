//=====================================================cart count============================================
jQuery(document).ready(function($)
 {
    // Listen for a click on the "Remove" button
    $(document.body).on('click', 'a.remove', function(e) {
        e.preventDefault();

        var remove_url = $(this).attr('href');
        var product_id = $(this).data('product_id');
        var product_key = $(this).data('product_key');

        // Perform AJAX request to remove the product from the cart
        $.ajax({
            type: 'POST',
            url:ajax_params.ajax_url, // WordPress AJAX URL
            data: {
                action: 'remove_cart_item', // Custom AJAX action
                product_key: product_key
            },
            success: function(response) {
                if (response.success) {
                    // Update the cart count in the header
                    $('.cart-item').text(response.cart_count);

                    // Redirect to the remove URL to update the cart display
                    window.location.href = remove_url;
                }
            }
        });
    });
});


//=============================================================show all product=================================

jQuery(document).ready(function ($){
 

    window.onload = function() {
      var checkboxes = document.querySelectorAll('#search');
      var anyChecked = false;
    
      checkboxes.forEach(function(checkbox)
     {
          if (checkbox.checked) {
              anyChecked = true;
              return;  // Exit the loop early if any checkbox is checked
          }
      });
    
      if (anyChecked) {
          console.log('At least one checkbox is checked.');
      } else {
          console.log('No checkboxes are checked.');
      }
    };
    
        show_all();
         function show_all(){
          if($('#search').is(':checked')){
            console.log('checked');
          }else{
            console.log('not');
          }
          $('#range_1').show();
          $('#range_2').hide();
          let currentPage = 1;
         let minPrice = 0;
          let maxPrice = 1000; // Set your maximum price
          loadProducts_1(1, minPrice, maxPrice);
         // Initialize the range slider
         $(".js-range-slider").ionRangeSlider({
             type: "double",
             min: 0,
             max: maxPrice,
             from: minPrice,
             to: maxPrice,
             onFinish: function (data) {
                 minPrice = data.from;
                 maxPrice = data.to;
                 loadProducts_1(1, minPrice, maxPrice);
             },
         });
      
         // Handle pagination click event
         $(document).on('click', '.pagination a', function (e) {
             if (e.cancelable) {
                 e.preventDefault();
             }
       
            //  let category_id = ermId;
             let page = $(this).data('page');
             loadProducts_1(page, minPrice, maxPrice);
         });
       
         function loadProducts_1(page, min_price, max_price) {
          console.log('all product');
             $.ajax({
                 url: ajax_params.ajax_url,
                 type: 'POST',
                 data: {
                     action: 'load_all_products',
                     page: page,
                     min_price: min_price,
                     max_price: max_price,
                 },
                 success: function (response) {
                     // Display the fetched products
                    //  console.log(response.data);
                     $('#filtered-products').html(response.data);
                    //  var page = $(this).data('page');
                     // Update current page
                     currentPage = page;
       
                     // Update pagination links based on the response
                     $('.custom-pagination').html(response.pagination);
                     updateActivePage();
                 },
                 error: function (error) {
                     console.log(error.responseText);
                 },
             });
         }
       
         // Handle "Next Page" and "Previous Page"
         $(document).on('click', '.next-page', function (e) {
          if (e.cancelable) {
              e.preventDefault();
          }
    
          if (currentPage < ajax_params.max_pages) {
              loadProducts_1(currentPage + 1, minPrice, maxPrice);
          }
      });
    
      $(document).on('click', '.prev-page', function (e) {
          if (e.cancelable) {
              e.preventDefault();
          }
    
          if (currentPage > 1) {
              loadProducts_1( currentPage - 1, minPrice, maxPrice);
          }
      });
         // Update the active page link
         function updateActivePage() {
             $('.pagination a').removeClass('active');
             $('.pagination a[data-page="' + currentPage + '"]').addClass('active');
         }
      }
    // }
    
// });




////===================================================category wise data and price filter with pagination Jquery=============


// Listen for checkbox change event
$('#search').change(function() {
   
    if ($(this).is(':checked')) {
        // Checkbox is checked, retrieve the term ID
        var termId = $(this).val();
         console.log('Checkbox with term ID ' + termId + ' is checked.');
      console.log(termId);

      

             
if(termId>0){

  $('#range_2').show();
  $('#range_1').hide();
var checkboxes = document.querySelectorAll('#search');

      // Add an event listener to each checkbox
      checkboxes.forEach(function(checkbox)

{

          checkbox.addEventListener('change', function () {
           
              // Uncheck all other checkboxes
              checkboxes.forEach(function(otherCheckbox) {
               
                  if (otherCheckbox !== checkbox) {
                 
                      otherCheckbox.checked = false;
                      
                  }
              });
          });
      });
      let currentPage = 1;
      let minPrice = 0;
      let maxPrice = 1000; // Set your maximum price
      loadProducts(termId, currentPage , minPrice, maxPrice);
      console.log('search');
// Initialize the range slider
$(".js-range-slider_2").ionRangeSlider({
    type: "double",
    min: 0,
    max: maxPrice,
    from: minPrice,
    to: maxPrice,
    onFinish: function (data) {
        minPrice = data.from;
        maxPrice = data.to;
        loadProducts(termId, 1, minPrice, maxPrice);
    },
});



// Handle pagination click event
$(document).on('click', '.pagination a', function (e) {
    if (e.cancelable) {
        e.preventDefault();
    }

   
    let page = $(this).data('page');
    loadProducts(termId, page, minPrice, maxPrice);
});

function loadProducts(termId, page, min_price, max_price) {
  console.log(termId);
    $.ajax({
        url: ajax_params.ajax_url,
        type: 'POST',
        data: {
            action: 'load_category_products',
            category_id: termId,
            page: page,
            min_price: min_price,
            max_price: max_price,
        },
      
        success: function (response) {
          
            $('#filtered-products').html(response.data);
          
            currentPage = page;

            // Update pagination links based on the response
            $('.custom-pagination').html(response.pagination);
            updateActivePage();
        },
        error: function (error) {
            console.log(error.responseText);
        },
    });
}

// Handle "Next Page" and "Previous Page"
$(document).on('click', '.next-page', function (e) {
    if (e.cancelable) {
        e.preventDefault();
    }

    if (currentPage < ajax_params.max_pages) {
        loadProducts(termId, currentPage + 1, minPrice, maxPrice);
    }
});

$(document).on('click', '.prev-page', function (e) {
    if (e.cancelable) {
        e.preventDefault();
    }

    if (currentPage > 1) {
        loadProducts(termId, currentPage - 1, minPrice, maxPrice);
    }
});

// Update the active page link
function updateActivePage() {
    $('.pagination a').removeClass('active');
    $('.pagination a[data-page="' + currentPage + '"]').addClass('active');
}
}
}else{
show_all();
}
});
});


//===============================================================single product page redirect=============================





//===========================================================================================================
// jQuery(document).ready(function ($){
 

//     window.onload = function() {
//       var checkboxes = document.querySelectorAll('#search');
//       var anyChecked = false;
    
//       checkboxes.forEach(function(checkbox)
//      {
//           if (checkbox.checked) {
//               anyChecked = true;
//               return;  // Exit the loop early if any checkbox is checked
//           }
//       });
    
//       if (anyChecked) {
//           console.log('At least one checkbox is checked.');
//       } else {
//           console.log('No checkboxes are checked.');
//       }
//     };
    
//         show_all();
//          function show_all(){
//           if($('#search').is(':checked')){
//             console.log('checked');
//           }else{
//             console.log('not');
//           }
//           $('#range_1').show();
//           $('#range_2').hide();
//           let currentPage = 1;
//          let minPrice = 0;
//           let maxPrice = 1000; // Set your maximum price
//           loadProducts_1(1, minPrice, maxPrice);
//          // Initialize the range slider
//          $(".js-range-slider").ionRangeSlider({
//              type: "double",
//              min: 0,
//              max: maxPrice,
//              from: minPrice,
//              to: maxPrice,
//              onFinish: function (data) {
//                  minPrice = data.from;
//                  maxPrice = data.to;
//                  loadProducts_1(1, minPrice, maxPrice);
//              },
//          });
      
//          // Handle pagination click event
//          $(document).on('click', '.pagination a', function (e) {
//              if (e.cancelable) {
//                  e.preventDefault();
//              }
       
//             //  let category_id = ermId;
//              let page = $(this).data('page');
//              loadProducts_1(page, minPrice, maxPrice);
//          });
       
//          function loadProducts_1(page, min_price, max_price) {
//           console.log('all product');
//              $.ajax({
//                  url: ajax_params.ajax_url,
//                  type: 'POST',
//                  data: {
//                      action: 'load_all_products',
//                      page: page,
//                      min_price: min_price,
//                      max_price: max_price,
//                  },
//                  success: function (response) {
//                      // Display the fetched products
//                     //  console.log(response.data);
//                      $('#filtered-products').html(response.data);
//                     //  var page = $(this).data('page');
//                      // Update current page
//                      currentPage = page;
       
//                      // Update pagination links based on the response
//                      $('.custom-pagination').html(response.pagination);
//                      updateActivePage();
//                  },
//                  error: function (error) {
//                      console.log(error.responseText);
//                  },
//              });
//          }
       
//          // Handle "Next Page" and "Previous Page"
//          $(document).on('click', '.next-page', function (e) {
//           if (e.cancelable) {
//               e.preventDefault();
//           }
    
//           if (currentPage < ajax_params.max_pages) {
//               loadProducts_1(currentPage + 1, minPrice, maxPrice);
//           }
//       });
    
//       $(document).on('click', '.prev-page', function (e) {
//           if (e.cancelable) {
//               e.preventDefault();
//           }
    
//           if (currentPage > 1) {
//               loadProducts_1( currentPage - 1, minPrice, maxPrice);
//           }
//       });
//          // Update the active page link
//          function updateActivePage() {
//              $('.pagination a').removeClass('active');
//              $('.pagination a[data-page="' + currentPage + '"]').addClass('active');
//          }
//       }
//     // }
    
// // });




// ////===================================================category wise data and price filter with pagination Jquery=============


// // Listen for checkbox change event
// $('#search').change(function() {
   
//     if ($(this).is(':checked')) {
//         // Checkbox is checked, retrieve the term ID
//         var termId = $(this).val();
//          console.log('Checkbox with term ID ' + termId + ' is checked.');
//       // console.log(termId);

      

             
// if(termId>0){

//   $('#range_2').show();
//   $('#range_1').hide();
// var checkboxes = document.querySelectorAll('#search');

//       // Add an event listener to each checkbox
//       checkboxes.forEach(function(checkbox)

// {

//           checkbox.addEventListener('change', function () {
           
//               // Uncheck all other checkboxes
//               checkboxes.forEach(function(otherCheckbox) {
               
//                   if (otherCheckbox !== checkbox) {
                 
//                       otherCheckbox.checked = false;
                      
//                   }
//               });
//           });
//       });
//       let currentPage = 1;
//       let minPrice = 0;
//       let maxPrice = 1000; // Set your maximum price
//       loadProducts(termId, currentPage , minPrice, maxPrice);
//       console.log('search');
// // Initialize the range slider
// $(".js-range-slider_2").ionRangeSlider({
//     type: "double",
//     min: 0,
//     max: maxPrice,
//     from: minPrice,
//     to: maxPrice,
//     onFinish: function (data) {
//         minPrice = data.from;
//         maxPrice = data.to;
//         loadProducts(termId, 1, minPrice, maxPrice);
//     },
// });



// // Handle pagination click event
// $(document).on('click', '.pagination a', function (e) {
//     if (e.cancelable) {
//         e.preventDefault();
//     }

   
//     let page = $(this).data('page');
//     loadProducts(termId, page, minPrice, maxPrice);
// });

// function loadProducts(termId, page, min_price, max_price) {
//   // console.log(termId);
//     $.ajax({
//         url: ajax_params.ajax_url,
//         type: 'POST',
//         data: {
//             action: 'load_category_products',
//             category_id: termId,
//             page: page,
//             min_price: min_price,
//             max_price: max_price,
//         },
      
//         success: function (response) {
          
//             $('#filtered-products').html(response.data);
          
//             currentPage = page;

//             // Update pagination links based on the response
//             $('.custom-pagination').html(response.pagination);
//             updateActivePage();
//         },
//         error: function (error) {
//             console.log(error.responseText);
//         },
//     });
// }

// // Handle "Next Page" and "Previous Page"
// $(document).on('click', '.next-page', function (e) {
//     if (e.cancelable) {
//         e.preventDefault();
//     }

//     if (currentPage < ajax_params.max_pages) {
//         loadProducts(termId, currentPage + 1, minPrice, maxPrice);
//     }
// });

// $(document).on('click', '.prev-page', function (e) {
//     if (e.cancelable) {
//         e.preventDefault();
//     }

//     if (currentPage > 1) {
//         loadProducts(termId, currentPage - 1, minPrice, maxPrice);
//     }
// });

// // Update the active page link
// function updateActivePage() {
//     $('.pagination a').removeClass('active');
//     $('.pagination a[data-page="' + currentPage + '"]').addClass('active');
// }
// }
// }else{
// show_all();
// }
// });
// });

// ==================================lode more option===================================
// jQuery(document).ready(function($) {
// let page = 0;
// const postsContainer = $('#content-container');
// const loadMoreButton = $('#load-more-button');
// const data = {
//   'action': 'load_more_posts',
//   'page': page
// };

// $.ajax({
//   url:ajax_params.ajax_url,
//   type: 'POST',
//   data: data,
//   success: function(response) {
//       if (response) {
//           postsContainer.append(response);
//       } else {
//           loadMoreButton.hide();
//       }
//   }
// });

// loadMoreButton.on('click', function(e) {
//   // console.log('123244');
//     e.preventDefault();
//    // console.log(page++);
//     page++;

//     const data = {
//         'action': 'load_more_posts',
//         'page': page
//     };

//     $.ajax({
//         url: ajax_params.ajax_url,
//         type: 'POST',
//         data: data,
//         success: function(response) {
//             if (response) {
//                 postsContainer.append(response);
//               } else {
              
//               loadMoreButton.hide();
//             }
//         }
//     });
// });
// });

// ==================================lode more option===================================
// jQuery(document).ready(function($) {
//   let page = 0;
//   const postsContainer = $('#content-container');
//   const loadMoreButton = $('#load-more-button');
//   const data = {
//     'action': 'load_more_posts',
//     'page': page
// };

// $.ajax({
//     url: ajax_params.ajax_url,
//     type: 'POST',
//     data: data,
//     success: function(response) {
//         if (response) {
//             postsContainer.append(response);
//         } else {
//             loadMoreButton.hide();
//         }
//     }
// });

//   loadMoreButton.on('click', function(e) {
//     // console.log('123244');
//       e.preventDefault();
//      // console.log(page++);
//       page++;

//       const data = {
//           'action': 'load_more_posts',
//           'page': page
//       };

//       $.ajax({
//           url: ajax_params.ajax_url,
//           type: 'POST',
//           data: data,
//           success: function(response) {
//               if (response) {
//                   postsContainer.append(response);
//                 } else {
                
//                 loadMoreButton.hide();
//               }
//           }
//       });
//   });
// });



  //=============================================================load More js recepie==================================================



  jQuery(document).ready(function($) {
    let page = 0;
    const postsContainer = $('#content-container');
    const loadMoreButton = $('#load-more-button');
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
            console.log(response);
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
                } if(response==0){
                    loadMoreButton.hide();
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


//==========================================================Gallery=================================================

jQuery(document).ready(function($) {
    let page = 0;
    const postsContainer = $('#gallery-container');
    const loadMoreButton = $('#load-more-button-gallery');
    const data = {
      'action': 'gallery_posts',
      'page': page
  };
  
  $.ajax({
      url: ajax_params.ajax_url,
      type: 'POST',
      data: data,
      success: function(response) {
          if (response) {
            console.log(response);
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
            'action': 'gallery_posts',
            'page': page
        };
  
        $.ajax({
            url: ajax_params.ajax_url,
            type: 'POST',
            data: data,
            success: function(response) {
                if (response) {
                    postsContainer.append(response);
                }if(response==0){
                    loadMoreButton.hide();
                }
            }
        });
    });
  });