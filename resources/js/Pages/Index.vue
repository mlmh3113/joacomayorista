<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import Slider from '@/Components/Custom-Components/Slider.vue';
import NewsLetter from '@/Components/Custom-Components/NewsLetter.vue';
import CategorySlider from '@/Components/Custom-Components/CategorySlider.vue';
import ProductCard from '@/Components/Custom-Components/ProductCard.vue';
import MidBanner from '@/Components/Custom-Components/MidBanner.vue';

defineProps({
    products: Object,
    categories : Object
})

</script>

<template>
    <Head title="inicio" />
<MainLayout>
    <Slider/>

    <CategorySlider :categories="categories"/>

    <hr>




    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 my-5 ">

        <ProductCard v-for="product in products" :key="product.id" :product="product"/>

       

    </div>

    
    <NewsLetter/>

    <MidBanner/>



    
 </MainLayout>   
</template>

<style scoped>

</style>
