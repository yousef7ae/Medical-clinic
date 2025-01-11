    $(".our-btn").click(function(){
		$(".our-btn").toggleClass("close");
		    $(".overlaymnu .our-btn").fadeIn();
            $("body").addClass("overflow-hidden");
            $(".navbar-collapse").css("right", "0");
	});
    $(".overlaymnu .our-btn").click(function(){
            $("body").removeClass("overflow-hidden");
            $(".navbar-collapse").css("right", "-100%");
            $(".overlaymnu .our-btn").toggle();
        });

   // mobile nav menu click hide menu
    if($(window).innerWidth() <= 751) {
        $("header .nav-link.text-dark").click(function () {
            $("header").find(".overlaymnu .our-btn").click();
        s});
    };



$(document).ready(function(){
    $("#loader-wrapper").fadeOut(2000);

                // counter box js
                var a = 0;
                $(window).scroll(function () {
                    var oTop = $(".counter-box").offset().top - window.innerHeight;
                    if (a == 0 && $(window).scrollTop() > oTop) {
                        $(".counter").each(function () {
                            var $this = $(this),
                                countTo = $this.attr("data-number");
                            $({
                                countNum: $this.text()
                            }).animate(
                                {
                                    countNum: countTo
                                },

                                {
                                    duration: 900,
                                    easing: "swing",
                                    step: function () {
                                        //$this.text(Math.ceil(this.countNum));
                                        $this.text(
                                            Math.ceil(this.countNum).toLocaleString("en")
                                        );
                                    },
                                    complete: function () {
                                        $this.text(
                                            Math.ceil(this.countNum).toLocaleString("en")
                                        );
                                        //alert('finished');
                                    }
                                }
                            );
                        });
                        a = 1;
                    }
                });

});

    $(function () {
      'use strict';
      $(window).scroll(function () {
          var nav = $('header')
          var nav2 = $('header')
          if ($(window).scrollTop() >= ( nav.height() + nav2.height() )+10 ) {
              nav.addClass('header-top')
          }else{
              nav.removeClass('header-top')
          }
          if (document.getElementById('wpadminbar')) {
            $(".fixed-top").css({"top": "10px "});
          }
      })
  });


  /**
   * Easy on scroll event listener
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  $(".loade").fadeOut("slow");

    $('#slider').owlCarousel({
        loop: false,
        rtl:true,
        //animateOut: 'fadeOut',
        margin: 0,
        autoHeight:true,
        nav: true,
        navText:['<i class="fa-solid fa-chevron-left fa-2x text-white shadow rounded-0 p-2"></i>','<i class="fa-solid fa-chevron-right fa-2x text-white shadow rounded-0 p-2"></i>'],
        dots: false,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        items: 1,
    });



$('#partners').owlCarousel({
    loop: true,
    rtl:true,
    margin: 15,
    autoHeight:true,
    nav: true,
    navText:['<i class="fa-solid fa-chevron-left fa-2x text-white shadow rounded-0 p-2"></i>','<i class="fa-solid fa-chevron-right fa-2x text-white shadow rounded-0 p-2"></i>'],
    dots: false,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsive:{
                0:{
                    items:2
                },
                380:{
                    items:2
                },
                768:{
                    items:2
                },
                991:{
                    items:3
                },
                1272:{
                    items:4
                }
            }
    });

$('#partners3').owlCarousel({
    loop: true,
    rtl:true,
    margin: 15,
    autoHeight:true,
    nav: true,
    navText:['<i class="fa-solid fa-chevron-left fa-2x text-white shadow rounded-0 p-2"></i>','<i class="fa-solid fa-chevron-right fa-2x text-white shadow rounded-0 p-2"></i>'],
    dots: false,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsive:{
                0:{
                    items:2
                },
                380:{
                    items:2
                },
                768:{
                    items:2
                },
                991:{
                    items:3
                },
                1272:{
                    items:4
                }
            }
    });

  // end osama


(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }
$(document).ready(function(){
    // height header
    $('.height-header').css("height",$("header").height()+"px");

});
  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }


  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Header fixed top on scroll
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    let headerOffset = selectHeader.offsetTop
    let nextElement = selectHeader.nextElementSibling
    const headerFixed = () => {
      if ((headerOffset - window.scrollY) <= 0) {
        selectHeader.classList.add('fixed-top')
        nextElement.classList.add('scrolled-offset')
      } else {
        selectHeader.classList.remove('fixed-top')
        nextElement.classList.remove('scrolled-offset')
      }
    }
    window.addEventListener('load', headerFixed)
    onscroll(document, headerFixed)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }


  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });


  /**
   * Animation on scroll
   */
  // window.addEventListener('load', () => {
  // });
    AOS.init({
      disable: 'mobile',
      duration: 1000,
      // easing: 'ease-in-out',
      once: true,
      // mirror: false,
    })

})()

    var a = 0;
$(window).scroll(function () {
    var oTop = $(".counter-box").offset().top - window.innerHeight;
    if (a == 0 && $(window).scrollTop() > oTop) {
        $(".counter").each(function () {
            var $this = $(this),
                countTo = $this.attr("data-number");
            $({
                countNum: $this.text()
            }).animate(
                {
                    countNum: countTo
                },

                {
                    duration: 5000,
                    easing: "swing",
                    step: function () {
                        //$this.text(Math.ceil(this.countNum));
                        $this.text(
                            Math.ceil(this.countNum).toLocaleString("en")
                        );
                    },
                    complete: function () {
                        $this.text(
                            Math.ceil(this.countNum).toLocaleString("en")
                        );
                        //alert('finished');
                    }
                }
            );
        });
        a = 1;
    }
});

