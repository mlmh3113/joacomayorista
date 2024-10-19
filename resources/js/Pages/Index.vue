<template>
    <Head title="inicio" />
    <MainLayout>
        <div class="relative">
            <Slider />
            <!-- Texto superpuesto sobre el slider -->
            <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white bg-black bg-opacity-50 p-4">
                <h2 class="text-xl md:text-4xl font-bold uppercase mb-10 text-shadow">¡¡Oferta Semanal!!</h2>
                <p class="text-xs md:text-3xl font-semibold text-shadow">LLAVEROS X 10 UNIDADES $30.000 ( C/U $3000 )</p>
                <p class="text-xs md:text-3xl font-semibold text-teal-300 text-shadow">LLAVEROS X 20 UNIDADES $56.000 ( C/U $2800 )</p>
                <p class="text-xs md:text-3xl font-semibold text-blue-300 text-shadow">LLAVEROS X 50 UNIDADES $125.000 ( C/U $2500 ) ENVIO GRATIS A SUCURSAL</p>
                <p class="text-xs md:text-3xl font-semibold text-green-300 text-shadow">LLAVEROS X 100 UNIDADES $190.000 ( C/U $1900 ) ENVIO GRATIS A SUCURSAL</p>
            </div>
        </div>

        <hr>

        <!-- Sección de Promociones -->
        <div v-if="products.some(product => product.discount !== '0')" class="flex flex-col justify-center items-center w-full my-5">
            <h2 class="text-3xl font-bold text-black dark:text-white">Promociones</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 my-5">
                <ProductCard class="col-span-1"
                  v-for="product in products.filter(product => product.discount !== '0')" 
                  :key="product.id" 
                  :product="product" 
                />
            </div>
        </div>

        <!-- Sección de Destacados -->
        <div v-if="products.some(product => product.discount === '0')" class="flex flex-col justify-center items-center w-full my-5">
            <h2 class="text-3xl font-bold text-black dark:text-white">Destacados</h2>
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

<style scoped>
.absolute {
    z-index: 10; /* Asegúrate de que el texto esté en la parte superior */
}

/* Sombra de texto personalizada */
.text-shadow {
    text-shadow: 2px 2px 4px rgba(28, 12, 12, 0.845); /* Ajusta los valores según necesites */
}
</style>
