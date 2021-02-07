/////// Polyfill
import './polyfills/polyfill';

//////////////////////////
// IMPORT CSS
//////////////////////////

/////// LIBRARIES CSS
import 'bootstrap/dist/css/bootstrap-grid.css';
import 'swiper/css/swiper.css';
/////// MAIN CSS
import '../css/style.sass';


//////////////////////////
// IMPORT LIBRARIES JS
//////////////////////////

// GSAP
import gsap from "gsap";
import { TweenMax, TimelineMax, Power2, Linear, Back} from "gsap/all";
gsap.registerPlugin(TweenMax, TimelineMax, Power2, Linear, Back);

//swiper
import Swiper from "swiper";


//////////////////////////
// General functions
//////////////////////////

// Media query
function getViewport() {
  let windowWidth = window.innerWidth;
  let direction = window.innerWidth < 768 ? true : false;
  return direction;
}


//////////////////////////
// CLASS BLOCKS
//////////////////////////

// Lazy load
class LazyLoad {
  constructor() {
    this.lazyBg = document.querySelectorAll('.js-lazy-bg');
    this.lazyImages = document.querySelectorAll('.js-lazy-image');

    this.start();
  }
  start() {

    if (this.lazyImages.length > 0) {
      const images = Array.from(this.lazyImages);

      const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const image = entry.target;
                image.src = image.dataset.src;
                image.onload = () => image.previousElementSibling.remove();
                imageObserver.unobserve(image);
            }
        });
      });

      images.forEach(img => imageObserver.observe(img));
    }

    if (this.lazyBg.length > 0) {
      const bgs = Array.from(this.lazyBg);

      const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const bg = entry.target;
                const image = document.createElement('img'); 
                image.src = bg.dataset.src;
                image.onload = () => bg.classList.add('loaded');
                imageObserver.unobserve(bg);
            }
        });
      });

      bgs.forEach(bg => imageObserver.observe(bg));
    }


  }
}

// Header
class Header {
  constructor(){
    this.toggleMenu = this.toggleMenu.bind(this);
    this.accesibilityInit = this.accesibilityInit.bind(this);

    this.state = {
      menuActive: false,
      subMenuActive: false,
    }
    this.headerContainer = document.querySelector('#header');
    this.start();
  }
  start(){
    if (this.headerContainer) {
      // Sticky container
      this.stickyContainer = this.headerContainer.querySelector('.header-fix');
      // Responsive menu
      this.menuButton = this.headerContainer.querySelector('#button__menu');
      this.mainMenu = this.headerContainer.querySelector('#main__menu');
      this.socialMobile = this.headerContainer.querySelector('.header__movilmenu--footer');
      // Sub menu system
      this.menuItems = this.headerContainer.querySelectorAll(
        ".header__nav > .menu-item"
      );
      this.subMenuContainer = this.headerContainer.querySelectorAll(
        ".header__nav > .menu-item-has-children"
      );
      this.subMenuContainerL2 = this.headerContainer.querySelectorAll(
        ".header__nav > .menu-item-has-children"
      );
      // Sticky menu
      this.stickyTransparent();

      this.searchButton = this.headerContainer.querySelector('.header__rightMenu--search');
      // Accesibility
      // const desktop = window.matchMedia("(min-width: 768px)");
      // this.closeAcc = document.querySelector('.acc-close-menu');
      // this.links = this.headerContainer.querySelectorAll('.menu-item a');
      // this.accesibilityInit(desktop);
      // desktop.addListener(this.accesibilityInit);

      // Listeners
      this.menuButton.addEventListener('click', this.toggleMenu);
      // this.closeAcc.addEventListener('click', this.toggleMenu)
      for (let i = 0; i < this.subMenuContainer.length; i++) {
        const item = this.subMenuContainer[i];
        item.addEventListener('mouseenter', (e) => this.subMenuToggle(e));
        item.addEventListener('mouseleave', (e) => this.subMenuToggle(e));
      }
      for (let index = 0; index < this.subMenuContainerL2.length; index++) {
        const item = this.subMenuContainerL2[index];
        item.addEventListener('click', (e) => this.subMenuToggle(e));
      }

      // Submenus init
      if (this.subMenuContainer.length > 0) {
        this.subMenuToggle(this.subMenuContainer);
      }
      if (this.subMenuContainerL2.length > 0) {
        // this.subMenuToggle(this.subMenuContainerL2);
      }

      // Search bar function
      if (this.searchButton) {
        
        this.searchButton.addEventListener('click', e => {
          e.preventDefault();
          const panel = this.searchButton.previousElementSibling;
          if (!this.searchButton.classList.contains('active')) {
            this.searchButton.classList.add('active');
            panel.style.maxHeight = panel.scrollHeight + 'px';
            // this.searchButton.nextElementSibling.style.display = 'block';
          } else {
            this.searchButton.classList.remove('active');
            panel.style.maxHeight = null;

            // this.searchButton.nextElementSibling.style.display = 'none';
          }
        });

      }
    }
  }
  toggleMenu(){
    if (this.state.menuActive === false) {

      this.menuButton.classList.add('is-active');
      this.mainMenu.classList.add('is-active');
      this.headerContainer.classList.add('is-active');
      document.body.classList.add('hidde-overlay');
      // this.accesibilityInit({matches: true});

      this.mainMenu.style.display = 'block';

      TweenMax.to(this.mainMenu, .3 , {
        delay: .2,
        ease: Power2.easeInOut,
        x: 0,
      });
      TweenMax.to(this.socialMobile, .8, {
        delay: .2,
        opacity: 1,
      });
      TweenMax.to(this.menuItems, .8 , {
        delay: .2,
        opacity: 1,
      });

      setTimeout(() => {
        this.state.menuActive = true
      }, 800);
    } else {
      this.menuButton.classList.remove('is-active');
      this.mainMenu.classList.remove('is-active');
      this.headerContainer.classList.remove('is-active');
      document.body.classList.remove('hidde-overlay');
      // this.accesibilityInit({matches: false});

      TweenMax.to(this.menuItems, 0, {
        opacity: 0,
        onComplete: () => {
          TweenMax.set(this.menuItems, {clearProps:"all"});
        },
      });

      
      TweenMax.to(this.mainMenu, .3 , {
        delay: .1,
        x: '-80vw',
        onComplete: () => {
          TweenMax.set(this.mainMenu, {clearProps:"all"});
        },
      });
      TweenMax.to(this.socialMobile, .3, {
        opacity: 0,
        onComplete: () => {
          TweenMax.set(this.overlayMenu, {clearProps:"all"});
        },
      });

      setTimeout(() => {
        this.state.menuActive = false
      }, 400);
    }
  }
  subMenuToggle(submenus) {
    for (let i = 0; i < submenus.length; i++) {

      const submenu = submenus[i];
      
        // Click event
      // submenu.addEventListener('click', (e) => {
      //     const submenuChild = e.target.querySelector('.sub-menu');
      //     if (submenuChild.style.maxHeight) {
      //         e.target.classList.remove('open');
      //         submenuChild.style.maxHeight = null
      //     } else {
      //         e.target.classList.add('open');
      //         submenuChild.style.maxHeight = submenuChild.scrollHeight + "px"
      //     }
      // });

      // Hover event
      submenu.addEventListener('mouseenter', (e) => {
          const submenuChild = e.target.querySelector('.sub-menu');
          e.target.classList.add('open');
          submenuChild.style.maxHeight = submenuChild.scrollHeight + "px"
      })
      submenu.addEventListener('mouseleave', (e) => {
          const submenuChild = e.target.querySelector('.sub-menu');
          e.target.classList.remove('open');
          submenuChild.style.maxHeight = null
      });

      // Focus event
      submenu.addEventListener('focus', (e) => {
          const submenuChild = e.target.querySelector('.sub-menu');
          e.target.classList.add('open');
          submenuChild.style.maxHeight = submenuChild.scrollHeight + "px"
      });
    }
  }
  stickyTransparent(){

    window.onscroll = () => {
      const trigger = 100;
      if (window.pageYOffset > trigger - (this.headerContainer.offsetHeight / 2) ) {
        this.headerContainer.classList.add('is-sticky');
      } else {
        this.headerContainer.classList.remove('is-sticky');
      }
    }

  }
  accesibilityInit(querie){
    if (querie.matches) {
      this.search.tabIndex = 0
      this.closeAcc.tabIndex = 0
      for (let i = 0; i < this.links.length; i++) {
        const link = this.links[i];
        link.tabIndex = 0
      }
    } else {
      this.search.tabIndex = -1
      this.closeAcc.tabIndex = -1
      for (let i = 0; i < this.links.length; i++) {
        const link = this.links[i];
        link.tabIndex = -1
      }
    }
  }
}

// Sliders
class Sliders {
  constructor() {
    this.headerSlide = document.querySelectorAll('.js-header-slide');
    this.productSlide = document.querySelectorAll('.js-product-slide');
    this.largeSlide = document.querySelectorAll('.js-slide-large')
    this.start();
  }
  start() {
    if (this.headerSlide.length > 0) {

      for (let i = 0; i < this.headerSlide.length; i++) {
        const slide = this.headerSlide[i];
        

        const slides = slide.querySelectorAll('.sliderHero__swiper--item');
        const arrow_prev = slide.querySelector('.swiper-button-prev');
        const arrow_next = slide.querySelector('.swiper-button-next');
  
        arrow_prev.classList.add('js-header-slide-prev');
        arrow_next.classList.add('js-header-slide-next');

        let config = {
          init: false,
          lazy: true,
          // Optional parameters
          loop: true,
          // Navigation arrows
          navigation: {
            nextEl: '.js-header-slide-next',
            prevEl: '.js-header-slide-prev',
          },
        };

        if (slide.dataset.autoplay) {
          config.autoplay = {delay:slide.dataset.autoplay};
        }

        if (slides.length <= 1) {
          config.init = false;
          arrow_prev.style.display = 'none';
          arrow_next.style.display = 'none';
        };
        
        const headerSwiper = new Swiper(this.headerSlide, config);

        headerSwiper.on('init', () => {
          const content = headerSwiper.slides[headerSwiper.activeIndex].querySelectorAll('.js-header-slide-anim');
          if (content) {
            gsap.to(content, .5,{
              delay:.5,
              opacity:1,
              y: 0,
              ease: Back.easeOut.config(4),
              stagger: .1
            });
          }

        });
        headerSwiper.on('slideChange', () => {
          const prevSlide = headerSwiper.slides[headerSwiper.previousIndex] ? headerSwiper.slides[headerSwiper.previousIndex].querySelectorAll('.js-header-slide-anim') : null;
          const content = headerSwiper.slides[headerSwiper.activeIndex] ? headerSwiper.slides[headerSwiper.activeIndex].querySelectorAll('.js-header-slide-anim') : null;

          if (prevSlide) {
            gsap.to(prevSlide, 0,{
              clearProps:"all",
            });
          }
          if (content) {
            gsap.to(content, .5,{
              delay:.5,
              opacity:1,
              y: 0,
              ease: Back.easeOut.config(4),
              stagger: .1
            });
          }

        });

        headerSwiper.init();

      }


    }
    if (this.productSlide.length > 0) {
      
      for (let i = 0; i < this.productSlide.length; i++) {
        const slide = this.productSlide[i];
        
        // Arrows
        const arrow_prev = slide.parentElement.querySelector('.js-product-slide-prev');
        const arrow_next = slide.parentElement.querySelector('.js-product-slide-next');
        // Pagination
        const pagination = slide.parentElement.querySelector('.js-product-slide-pagination');

        arrow_prev.classList.add(`js-product-slide-prev-${i}`);
        arrow_next.classList.add(`js-product-slide-next-${i}`);
        pagination.classList.add(`js-product-slide-pagination-${i}`);


        var headerSwiper = new Swiper(slide, {
          // Optional parameters
          loop: true,
          lazy: true,
          observer: true,
          observeParents: true,
          // If we need pagination
          pagination: {
            el: `.js-product-slide-pagination-${i}`,
          },
          // Navigation arrows
          navigation: {
            nextEl: `.js-product-slide-next-${i}`,
            prevEl: `.js-product-slide-prev-${i}`,
          },
          // Responsive
          breakpoints: {
            // when window width is >= 640px
            992: {
              slidesPerView: 2,
              spaceBetween: 10
            },
            1200: {
              slidesPerView: 3,
              spaceBetween: 10
            }
          }
        })
      }
    }
    if (this.largeSlide.length > 0) {

      for (let i = 0; i < this.largeSlide.length; i++) {
        const slide = this.largeSlide[i];
        const next_arrow = slide.querySelector('.swiper-button-next');
        const prev_arrow = slide.querySelector('.swiper-button-prev');
        const pagination = slide.querySelector('.swiper-pagination');

        prev_arrow.classList.add(`js-slide-large-prev-${i}`);
        next_arrow.classList.add(`js-slide-large-next-${i}`);
        pagination.classList.add(`js-slide-large-pagination-${i}`);



        let config = {
          slidesPerView: 1,
          spaceBetween: 10,
          pagination: {
            el: `.js-slide-large-pagination-${i}`,
          },
          navigation: {
            nextEl: `.js-slide-large-next-${i}`,
            prevEl: `.js-slide-large-prev-${i}`,
          },
          breakpoints: {
            768: {
              slidesPerView: 2,
              spaceBetween: 30            
            },
            992: {
              slidesPerView: 3,
              spaceBetween: 30            
            }
          }

        };
        
        if (slide.dataset.delay) {
          config.autoplay = {
            delay: slide.dataset.delay,
          }
        };
        
        const swiper_slide = new Swiper(slide, config);

      }

    }
  }
}

// Product tabs
class ProductTabs {
  constructor(){
    this.CONTAINER = document.querySelectorAll('.js-product-tabs');
    this.start();
  }
  start() {
    if (this.CONTAINER.length > 0) {

      const showSlide = (tab, slides) => {
        for (let i = 0; i < slides.length; i++) {
          const slide = slides[i];
          slide.classList.remove('active');
          if (tab.dataset.type === slide.dataset.type) {
            slide.classList.add('active');
          }
        }
      };
      const resetActive = (tabs) => {
        for (let i = 0; i < tabs.length; i++) {
          const tab = tabs[i];
          tab.classList.remove('active');
        }
      };

      for (let i = 0; i < this.CONTAINER.length; i++) {

        const container = this.CONTAINER[i];
        
        const tabs = container.querySelectorAll('.js-products-tabs-tab');
        const slides = container.querySelectorAll('.js-products-tabs-slide');

        // Init Active
        tabs[0].classList.add('active');
        slides[0].classList.add('active');

        for (let i = 0; i < tabs.length; i++) {
          const tab = tabs[i];
          
          tab.addEventListener('click', e => {
            e.preventDefault();

            if (!tab.classList.contains('active')) {
              resetActive(tabs);
              tab.classList.add('active');
              showSlide(tab, slides);
            }

          });
        }
      }

    }
  }
}

// Accordion
class Accordion {
  constructor() {
    this.CONTAINER = document.querySelector('.js-accordion');
    this.start();
  }
  start() {

    if (this.CONTAINER) {
      
      const accordions = this.CONTAINER.querySelectorAll('.tabsBlock__container--button');

      for (let i = 0; i < accordions.length; i++) {
        const accordion = accordions[i];
        const panel = accordion.nextElementSibling;

        accordion.addEventListener('click', e => {

          accordion.classList.toggle('active');
          if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
          } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
          } 

        });
      }

    }

  }
}

// Animations
class Animations {
  constructor() {
    this.fadeInStagger = document.querySelectorAll('.js-anim-fadeIn-stagger');
    this.start();
  }

  start() {

    if (this.fadeInStagger.length > 0) {
      
      let options = {
        threshold: .3,
      };
      if (getViewport()) {
        options.threshold = .05;
      }

      for (let i = 0; i < this.fadeInStagger.length; i++) {
        const container = this.fadeInStagger[i];
        const items = container.querySelectorAll('.js-anim-fadeIn-stagger-item')
        let shown = false;

        const scrollObserver = (entries, observer) => {
          entries.forEach((entry) => {
            if (entry.intersectionRatio > 0 && !shown) {
              shown = true;
              gsap.to(items, .5,{
                delay:.1,
                opacity:1,
                y: 0,
                ease: Back.easeOut.config(4),
                stagger: .2
              });
            }
          });
        };

        let observer = new IntersectionObserver(scrollObserver, options);
        observer.observe(container);

      }

    }

  }
}


////////////////////
// Run apps
////////////////////
document.addEventListener('DOMContentLoaded', function () {
  var lazy = new LazyLoad();
  var header = new Header();
  var slide = new Sliders();
  var product = new ProductTabs();
  var accordion = new Accordion();
  var animations = new Animations();
});

////////////////////
// Import components
////////////////////





////////////////////
// Copyright
////////////////////
window.SayMyName = function () {
  console.log(`%c
                                                        
                MADE WITH TOO MUCH SKILLS:              
                                                        
                                                        
       333333    666    00000  PPPPPP  MM    MM IIIII   
          3333  66     00   00 PP   PP MMM  MMM  III    
         3333  666666  00   00 PPPPPP  MM MM MM  III    
           333 66   66 00   00 PP      MM    MM  III    
       333333   66666   00000  PP      MM    MM IIIII   
                                                        
                                                        
                    https://360pmi.com/                 
`, 'background: #e8404b; color: white');
}

////////////////////
// IE Detecter
////////////////////

/* Sample function that returns boolean in case the browser is Internet Explorer*/

const isIE = () => {
  var ua = navigator.userAgent;
  /* MSIE used to detect old browsers and Trident used to newer ones*/
  var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;
  
  return is_ie; 
}
const checkIeCookie = (name) => {
  var dc = document.cookie;
  var prefix = name + "=";
  var begin = dc.indexOf("; " + prefix);
  if (begin == -1) {
      begin = dc.indexOf(prefix);
      if (begin != 0) return null;
  }
  else
  {
      begin += 2;
      var end = document.cookie.indexOf(";", begin);
      if (end == -1) {
      end = dc.length;
      }
  }
  // because unescape has been deprecated, replaced with decodeURI
  //return unescape(dc.substring(begin + prefix.length, end));
  return decodeURI(dc.substring(begin + prefix.length, end));
}

/* Create an alert to show if the browser is IE or not */
if (isIE() && !checkIeCookie('ie_cookie')){

    const container = document.createElement('div');
    container.classList.add('ie-notification');

    container.innerHTML = `
      <p>Your web browser (Internet Explorer) is out of date. Please update your browser for more security, speed, and for the best experience on this site.</p>
      <div>
      <div>
        <a href="https://browsehappy.com/" target="_blank">Update my browser</a>
        <button class="ignore-update">Ignore</button>
      </div>
    `
    document.body.appendChild(container);

    const ignoreUpdate = document.querySelector('.ignore-update');
    ignoreUpdate.addEventListener('click', (e) => {
      var d = new Date();
        
      d.setTime(d.getTime() + (1*60*60*1000));
      var expires = "expires="+ d.toUTCString();
      document.cookie = "ie_cookie" + "=" + 1 + ";" + expires + ";path=/";
      container.style.display = 'none';
    });
}


////////////////////
// Keyboard focus
////////////////////

function keyboardFocus (e) {
  if (e.keyCode === 9) { // Tab key
    document.documentElement.classList.add('keyboard-focus');
  }

  document.removeEventListener('keydown', keyboardFocus, false);
}

document.documentElement.classList.remove('no-js');
document.addEventListener('keydown', keyboardFocus, false);

