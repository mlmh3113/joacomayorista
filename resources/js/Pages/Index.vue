<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import Slider from '@/Components/Custom-Components/Slider.vue';
import NewsLetter from '@/Components/Custom-Components/NewsLetter.vue';
import CategorySlider from '@/Components/Custom-Components/CategorySlider.vue';
import ProductCard from '@/Components/Custom-Components/ProductCard.vue';
import MidBanner from '@/Components/Custom-Components/MidBanner.vue';
import Banner from '@/Components/Custom-Components/Banner.vue';

onMounted(() => {
    initFlowbite();
})

defineProps({
    products: Object,
    categories : Object
})



</script>

<template>
    <Head title="inicio" />
<MainLayout>
    <Slider/>



    <hr>



<div class="flex flex-col  justify-center items-center w-full my-5">

    <h2 class="text-3xl font-bold text-black dark:text-white">Destacados</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 my-5 ">



        <ProductCard v-for="product in products" :key="product.id" :product="product"/>

    </div>
    
    </div>


    <div class="flex justify-center items-center w-full bg-gray-500">
     <Banner/>     
    </div>
  

    
    <NewsLetter/>

    <MidBanner/>



    
 </MainLayout>   
</template>

<style scoped>

</style>
