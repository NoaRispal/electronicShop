import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

const productsSwiper = new Swiper(".productsSwiper", {
    slidesPerView: 2,
    spaceBetween: 20,
    slidesPerGroup: 1,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    breakpoints: {
      640: { slidesPerView: 2 },
      768: { slidesPerView: 3 },
      1024: { slidesPerView: 4 },
    }
  });

  const categoriesSwiper = new Swiper(".categoriesSwiper", {
    slidesPerView: 5,
    spaceBetween: 20,
    slidesPerGroup: 1,
    loop: false,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

    breakpoints: {
      640: { slidesPerView: 5 },
      768: { slidesPerView: 6 },
      1024: { slidesPerView: 7 },
    }
  });