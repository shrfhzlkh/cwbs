(function ($) {
    "use strict";
    
    // loader
    var loader = function () {
        setTimeout(function () {
            if ($('#loader').length > 0) {
                $('#loader').removeClass('show');
            }
        }, 1);
    };
    loader();
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });
    
    
    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 90) {
            $('.nav-bar').addClass('nav-sticky');
            $('.carousel, .page-header').css("margin-top", "73px");
        } else {
            $('.nav-bar').removeClass('nav-sticky');
            $('.carousel, .page-header').css("margin-top", "0");
        }
    });
    
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });

    
    // Main carousel
    $(".carousel .owl-carousel").owlCarousel({
        autoplay: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        items: 1,
        smartSpeed: 300,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ]
    });

    
    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Testimonials carousel
    $(".testimonials-carousel").owlCarousel({
        center: true,
        autoplay: true,
        smartSpeed: 2000,
        dots: true,
        loop: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });
    
    
    // Related post carousel
    $(".related-slider").owlCarousel({
        autoplay: true,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            }
        }
    });
    
    //payment
    var stripe = Stripe('pk_test_iO0OmHJjHiksR0HjyoUOSMNS0017Q3B9xA');
    var elements = stripe.elements();
    var style = {
        base: {
          // Add your base input styles here. For example:
          padding: '10px 12px',
          color: '#32325d',
          fontSize: '16px',
        },
      };
      
      // Create an instance of the fpxBank Element.
      var fpxBank = elements.create(
        'fpxBank',
        {
          style: style,
          accountHolderType: 'individual',
        }
      );
      
      // Add an instance of the fpxBank Element into the container with id `fpx-bank-element`.
      fpxBank.mount('#fpx-bank-element');

      var form = document.getElementById('payment-form');

    form.addEventListener('submit', function(event) {
    event.preventDefault();

    var fpxButton = document.getElementById('fpx-button');
    var clientSecret = fpxButton.dataset.secret;
    stripe.confirmFpxPayment(clientSecret, {
        payment_method: {
        fpx: fpxBank,
        },
        // Return URL where the customer should be redirected after the authorization
        return_url: `${window.location.href}`,
    }).then((result) => {
        if (result.error) {
        // Inform the customer that there was an error.
        var errorElement = document.getElementById('error-message');
        errorElement.textContent = result.error.message;
        }
    });
    });
})(jQuery);

