function menu_open() {
  jQuery(".main-menu").css({ "transform": "translateX(0)" })
}
function menu_close() {
  jQuery(".main-menu").css({ "transform": "translateX(320px)" })
}

jQuery(window).scroll(function () {
  if (jQuery(window).scrollTop() >= 100) {
    jQuery('header').addClass('fixed');
  }
  else {
    jQuery('header').removeClass('fixed');
  }
});
jQuery(document).ready(function () {
  jQuery('.banner-slider').slick({
    dots: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 1700,
    arrows: true,
    responsive: [

      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
          arrows: false,
          dots: true
        }
      }
    ]
  });
  
  jQuery('.js-link').on('click', function (e) {
    e.preventDefault();
    jQuery(this).parent().next('.dropdown-item-custom').slideToggle(200);
    jQuery(this).toggleClass('active');
  });
  // jQuery(".js-range-slider").ionRangeSlider({
  //   type: "double",
  //   min: 0,
  //   max: 1000,
  //   from: 30,
  //   to: 100,
  //   grid: false,
  //   prefix: "$"
  // });
  jQuery('.main-menu li a').on('click', function () {
    //alert("ssss");
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        jQuery('html, body').animate({
          scrollTop: (target.offset().top - 64)
        }, 1000);
        return false;
      }
    }
  });
  if (jQuery(window).width() < 1199) {
    jQuery("header li.menu-item-has-children").append('<div tabindex="0" role="button" class="dropdown-icon-menu"></div>');
    jQuery(".main-menu.mobile-menu .sub-menu").hide();
    jQuery("header .sub-menu").hide();
    jQuery(document).on('click', '.dropdown-icon-menu', function () {
      jQuery(this).prev(".sub-menu").slideToggle();
      jQuery(this).toggleClass('active');
    });
  }
  jQuery('.playpause').click(function (){
    if(jQuery(this).next(".video1").get(0).paused){
          jQuery(this).next(".video1").get(0).play();
          jQuery(this).fadeOut();
          jQuery(this).next(".video1").prop("controls",true); 
          }/*else{
            jQuery(this).children("#video1").get(0).pause();
            jQuery(this).children(".playpause").fadeIn();
          }*/
  });
//   jQuery(".js-range-slider").ionRangeSlider({
//     type: "double",
//     min: 0,
//     max: 1000,
//     from: 30,
//     to: 100,
//     grid: false,
//     prefix: "â‚¬"
//   });
});

// jQuery('.video1').parent().click(function () {
//   if(jQuery(this).children(".video1").get(0).paused){
//     jQuery(this).children(".video1").get(0).play();
//     jQuery(this).children(".playpause").fadeOut();
//     jQuery(this).children(".video1").prop("controls",true); 
//     }/*else{
//       jQuery(this).children("#video1").get(0).pause();
//       jQuery(this).children(".playpause").fadeIn();
//     }*/
// });





 




//  ================================================custome code for catagory wise data show =============================================

jQuery(document).ready(function ($){
 

window.onload = function() {
  var checkboxes = document.querySelectorAll('.catagory_wise');
  var anyChecked = false;

  checkboxes.forEach(function(checkbox) {
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









 // var checkboxValue;  // Declare the variable in the global scope
// updateCheckboxValue(0);
//   $(".category-button").change(function() {
//     // Update the global variable when the checkbox value changes
//     updateCheckboxValue($(this).val());

//     // Log the value to the console
//     // console.log('Changed checkbox value: ' + checkboxValue);
//   });


// Function to update the global checkboxValue variable
// function updateCheckboxValue(value) {
  // checkboxValue = value;
  // console.log(checkboxValue )
 
  // if(checkboxValue==0){
    show_all();
     function show_all(){
      if($('.catagory_wise').is(':checked')){
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
                 action: 'load_category_products',
                 page: page,
                 min_price: min_price,
                 max_price: max_price,
             },
             success: function (response) {
                 // Display the fetched products
                //  console.log(response.data);
                 $('#product-container').html(response.data);
                //  var page = $(this).data('page');
                 // Update current page
                 currentPage = page;
   
                 // Update pagination links based on the response
                 $('.pagination_1').html(response.pagination);
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




  




// ======================================show product catagory wise=================================================








  // Listen for checkbox change event
  $('.category-button').change(function() {
   
      if ($(this).is(':checked')) {
          // Checkbox is checked, retrieve the term ID
          var termId = $(this).val();
           console.log('Checkbox with term ID ' + termId + ' is checked.');
        // console.log(termId);

        

               
if(termId>0){
//  console.log('yes iserted');
    $('#range_2').show();
    $('#range_1').hide();
  var checkboxes = document.querySelectorAll('.catagory_wise');

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
        console.log('catagory wise');
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

  // Handle checkbox click event
  // $('.category-button').change(function () {
  //     loadProducts(termId, 1, minPrice, maxPrice);
  // });

  // Handle pagination click event
  $(document).on('click', '.pagination a', function (e) {
      if (e.cancelable) {
          e.preventDefault();
      }

     
      let page = $(this).data('page');
      loadProducts(termId, page, minPrice, maxPrice);
  });

  function loadProducts(termId, page, min_price, max_price) {
    // console.log(termId);
      $.ajax({
          url: ajax_params.ajax_url,
          type: 'POST',
          data: {
              action: 'load_category_products_wise',
              category_id: termId,
              page: page,
              min_price: min_price,
              max_price: max_price,
          },
        
          success: function (response) {
              // Display the fetched products
              // console.log(response);
              $('#product-container').html(response.data);
                // if(response.data=='No products found.'){
                // var val= $('#category-button').val();
                // console.log(val);
                //  if(val>0){
                //   console.log('my name is sourav');
                //   show_all();
                //  }
                // }
              // Update current page
              currentPage = page;

              // Update pagination links based on the response
              $('.pagination_2').html(response.pagination);
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
//     url: ajax_url,
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





