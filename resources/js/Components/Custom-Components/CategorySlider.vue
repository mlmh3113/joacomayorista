<template>
  <swiper
    :slidesPerView="3"
    :breakpoints="{
      '640': {
        slidesPerView: 5,
        spaceBetween: 30,
      },
      '768': {
        slidesPerView: 6,
        spaceBetween: 30,
      },
      '1024': {
        slidesPerView: 8,
        spaceBetween: 30,
      },
    }"
    :spaceBetween="30"
    :pagination="{
      clickable: true,
    }"
    :navigation="false"
    class="mySwiper"
  >
    <swiper-slide>
      <img class="w-full my-5 object-cover rounded-full aspect-square shadow-md shadow-gray-500 hover:cursor-pointer" src="../../../../public/images/billetera1.png" alt="">
      <p class="text-center text-sm -mt-5 uppercase font-bold text-gray-800">billeteras</p>
    </swiper-slide>
    <swiper-slide>
      <img class="w-full my-5 object-cover rounded-full aspect-square shadow-md shadow-gray-500 hover:cursor-pointer" src="../../../../public/images/billetera1.png" alt="">
      <p class="text-center text-sm -mt-5 uppercase font-bold text-gray-800">relojes</p>
    </swiper-slide>
    <swiper-slide>
      <img class="w-full my-5 object-cover rounded-full aspect-square shadow-md shadow-gray-500 hover:cursor-pointer" src="../../../../public/images/billetera1.png" alt="">
      <p class="text-center text-sm -mt-5 uppercase font-bold text-gray-800">llaveros</p>
    </swiper-slide>
    <swiper-slide>
      <img class="w-full my-5 object-cover rounded-full aspect-square shadow-md shadow-gray-500 hover:cursor-pointer" src="../../../../public/images/billetera1.png" alt="">
      <p class="text-center text-sm -mt-5 uppercase font-bold text-gray-800">carteras</p>
    </swiper-slide>
    <swiper-slide>
      <img class="w-full my-5 object-cover rounded-full aspect-square shadow-md shadow-gray-500 hover:cursor-pointer" src="../../../../public/images/billetera1.png" alt="">
      <p class="text-center text-sm -mt-5 uppercase font-bold text-gray-800">billetera</p>
    </swiper-slide>
    <!-- Repite las demás swiper-slide según sea necesario -->
  </swiper>
</template>

<script setup>
  // Import Swiper Vue.js components
  import { Swiper, SwiperSlide } from 'swiper/vue';

  defineProps({
    categories: Object
  })
  
  // Import Swiper styles
  import 'swiper/css';
  import 'swiper/css/pagination';
  
  // Import required modules
  import { Pagination } from 'swiper/modules';
  
  const modules = [Pagination];
</script>
