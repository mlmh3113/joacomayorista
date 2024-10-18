<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted, defineProps } from 'vue';
import Slider from '@/Components/Custom-Components/Slider.vue';
import NewsLetter from '@/Components/Custom-Components/NewsLetter.vue';
import CategorySlider from '@/Components/Custom-Components/CategorySlider.vue';
import ProductCard from '@/Components/Custom-Components/ProductCard.vue';
import MidBanner from '@/Components/Custom-Components/MidBanner.vue';


onMounted(() => {
    initFlowbite();
});

// Definir las props del componente
const props = defineProps({
    products: Object,
    categories: Object,
    banner: Object
    
});
</script>

<template>
    <Head title="inicio" />
    <MainLayout>
        <Slider />

     

        <hr>

        <!-- Sección de Promociones -->
        <div v-if="products.some(product => product.discount !== '0')" class="flex flex-col justify-center items-center w-full my-5">
            <h2 class="text-3xl font-bold text-black dark:text-white">Promociones</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 my-5">
                <!-- Filtramos los productos que tienen promoción (discount !== '0') -->
                <ProductCard 
                  v-for="product in products.filter(product => product.discount !== '0')" 
                  :key="product.id" 
                  :product="product" 
                />
            </div>
        </div>

        <!-- Sección de Destacados -->
        <div v-if="products.some(product => product.discount === '0')" class="flex flex-col justify-center items-center w-full my-5">
            <h2 class="text-3xl font-bold text-black dark:text-white">Destacados</h2>
            <!-- Filtramos los productos sin descuento (discount === '0') -->
            <ProductCard 
              v-for="product in products.filter(product => product.discount === '0')" 
              :key="product.id" 
              :product="product" 
            />
        </div>


        <NewsLetter />
        <MidBanner :banner="banner" />
    </MainLayout>
</template>

<style scoped></style>
