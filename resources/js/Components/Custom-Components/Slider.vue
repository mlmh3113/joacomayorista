<template>
    <swiper
       :scrollbar="{
      hide: true,
    }"
      :spaceBetween="30"
      :centeredSlides="true"
      :loop="true"
      :autoplay="{
        delay: 2500,
        disableOnInteraction: false,
        
      }"
  
      :navigation="false"
      :modules="modules"
      class="mySwiper"
    >
      <swiper-slide><img class="w-full h-56 md:h-96 object-cover " src="https://res.cloudinary.com/dkoocayxp/image/upload/v1728227139/Joaco%20Mayorista/watch-wrist-hand-leaf_hbert9.png" alt=""></swiper-slide>
      <swiper-slide><img class="w-full h-56 md:h-96 object-cover " src="https://res.cloudinary.com/dkoocayxp/image/upload/v1728227132/Joaco%20Mayorista/wallet-leather-bag-bag-the-money_f6evsf.png" alt=""></swiper-slide>
      <swiper-slide><img class="w-full h-56 md:h-96 object-cover " src="https://res.cloudinary.com/dkoocayxp/image/upload/v1728227597/Joaco%20Mayorista/love-heart-key-red-love-hd-wallp_hs0f4p.png" alt=""></swiper-slide>

    </swiper>
  </template>
  <script>
    // Import Swiper Vue.js components
    import { Swiper, SwiperSlide } from 'swiper/vue';
  
    // Import Swiper styles
    import 'swiper/css';
  
    import 'swiper/css/pagination';
    import 'swiper/css/navigation';
  

  
    // import required modules
    import { Autoplay, Pagination, Navigation } from 'swiper/modules';
  
    export default {
      components: {
        Swiper,
        SwiperSlide,
      },
      setup() {
        return {
          modules: [Autoplay, Pagination, Navigation],
        };
      },
    };
  </script>

  <style scoped>

  .swiper-pagination-bullet {
    background-color: white;
  }

</style>
  