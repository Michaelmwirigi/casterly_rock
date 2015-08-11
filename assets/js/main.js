$(document).ready(function() {

    // fix menu when passed
    $('.masthead')
      .visibility({
        once: false,
        onBottomPassed: function() {
          $('.fixed.menu').transition('fade in');
        },
        onBottomPassedReverse: function() {
          $('.fixed.menu').transition('fade out');
        }
      })
    ;

    // create sidebar and attach to menu open
    $('.cart_sidebar')
      .sidebar('setting', 'transition', 'overlay')
      .sidebar('attach events', '.cart_button')
    ;

  })
;