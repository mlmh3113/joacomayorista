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
      <swiper-slide><img class="w-full h-56 md:h-96 object-cover " src="https://res.cloudinary.com/dkoocayxp/image/upload/v1729350545/Joaco%20Mayorista/llaveros_ujzfzk.jpg" alt=""></swiper-slide>
      <swiper-slide><img class="w-full h-56 md:h-96 object-cover " src="https://res.cloudinary.com/dkoocayxp/image/upload/v1729352364/Joaco%20Mayorista/billetera2_fhriy4.jpg" alt=""></swiper-slide>
      <swiper-slide><img class="w-full h-56 md:h-96 object-cover " src="https://res.cloudinary.com/dkoocayxp/image/upload/v1729352397/Joaco%20Mayorista/billetera_v8kklq.jpg" alt=""></swiper-slide>

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
  