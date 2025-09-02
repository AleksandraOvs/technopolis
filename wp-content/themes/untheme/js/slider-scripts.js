new Swiper('.hero-slider', {
  slidesPerView: 1,
  // loop: true,
  pagination: {
    el: '.slider-pagination',
    clickable: true,
  },
  // navigation: {
  //     nextEl: '.hero-button-next',
  //     prevEl: '.hero-button-prev',
  //     lockClass: 'hide'
  // },
});

const portfolioSwiper = new Swiper('.project__slider', {
  slidesPerView: 1,
  spaceBetween: 40,
  loop: true,
  //loop: true,
  //effect: 'fade',
  grabCursor: true,
  pagination: {
    el: '.slider-pagination',
    clickable: true,
  },
  breakpoints: {
    1024: {
      slidesPerView: 3,
      loop: false,

    },
    576: {
      slidesPerView: 2,
      spaceBetween: 20,
    }
  }

});

new Swiper('.gallery-slider', {
  slidesPerView: 1, // один слайд = 1 группа (4 изображения)
  spaceBetween: 30,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev'
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true
  }
});

const swiperTestim = new Swiper('.testimonials-slider', {
  slidesPerView: 1,
  navigation: {
    nextEl: '.slider-testim-next',
    prevEl: '.slider-testim-prev',
  },
  //loop: true,
});

const projectSwiper = new Swiper('.projects-slider', {
  slidesPerView: 1,
  spaceBetween: 20,
  // navigation: {
  //   nextEl: '.slider-testim-next',
  //   prevEl: '.slider-testim-prev',
  // },
  loop: true,
  breakpoints: {
    1024: {
      slidesPerView: 3,
      loop: false,

    },
    576: {
      slidesPerView: 2,
      spaceBetween: 20,
    }
  }
});
