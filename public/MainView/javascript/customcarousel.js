$(function() {
    $('.owl-testimonial').owlCarousel({
      loop:true,
      margin:10,
      autoplay:true,
      dots:true,
      nav:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
              nav:false,
              loop:true
          },
          600:{
              items:1,
              nav:false,
              loop:true
          },
          1000:{
              items:1,
              nav:false,
              loop:true,
          }
      }
  })
                // owlCarousel Client
                $('.owl-client').owlCarousel({
                    loop:true,
                    margin:10,
                    autoplay:true,
                    autoplayTimeout:1000,
                    autoplayHoverPause:true,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:2,
                            nav:true,
                            nav:false
                        },
                        600:{
                            items:3,
                            nav:false,
                            loop:true
                        },
                        1000:{
                            items:5,
                            nav:false,
                            loop:true
                        }
                    }
                })



});