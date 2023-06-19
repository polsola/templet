jQuery(document).ready(function($) {
    // Hide all children categories except for the .current-cat ones
    var current_url = window.location.href;
    
    $('.sidebar .wc-block-product-categories-list a').each(function(index, item) {
      var item_url = $(item).attr('href');
      if( item_url == current_url ) {
            $(item).parent().parent().closest('.wc-block-product-categories-list-item').addClass('is-open');
            $(item).closest('.wc-block-product-categories-list').slideDown();
            return;
      }
    });
  
    // On parent category click, toggle visibility on their children
    $(".wc-block-product-categories-list .wc-block-product-categories-list-item > a").click(function(e) {
      $container = $(this).closest(".wc-block-product-categories-list-item");
      $current_children = $("> .wc-block-product-categories-list", $container).first();
      console.log($current_children.length);
      if( $current_children.length !== 0 ) {
          console.log('do not enter');
          if( $current_children.is(':hidden') ) {
              $(this).parent().addClass('is-open');
          } else {
          $(this).parent().removeClass('is-open');
          }
          $current_children.slideToggle();
          
          e.preventDefault();
      }
    });
  })