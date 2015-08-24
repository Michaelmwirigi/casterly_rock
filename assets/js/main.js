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

    $('.login_form')
      .modal('attach events', '.login_btn', 'show')
    ;

    $('.signup_form')
      .modal('attach events', '.signup_btn', 'show')
    ;

    $('.full_cart')
      .modal('attach events', '.edit_cart', 'show')
    ;

    $('.ui.dropdown')
      .dropdown({
        direction: 'upward'
      })
    ;
    $('.ui.admin.dropdown')
      .dropdown({
        direction: 'downward'
      })
    ;

    $('.ui.sticky')
      .sticky({
        context: '.column2'
      })
    ;


    // create sidebar and attach to menu open
    $('.cart_sidebar')
      .sidebar('setting', 'transition', 'overlay')
      .sidebar('attach events', '.cart_button')
    ;

    $('.actual_signup_form')
      .form({
        on: 'blur',
        fields: {
          match: {
            identifier  : 'con_password',
            rules: [
              {
                type   : 'match[password]',
                prompt : 'Please put the same value in both fields'
              }
            ]
          }
        }
      })
    ;


  })
;