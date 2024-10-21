<template>
    <Head title="inicio" />
    <MainLayout>
        <div class="relative">
            <Slider />
            <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white bg-black bg-opacity-50 p-4">
                <h2 class="text-xl md:text-4xl font-bold uppercase mb-10 text-shadow">¡¡Oferta Semanal!!</h2>
                <p class="text-xs md:text-3xl font-semibold text-shadow">LLAVEROS X 10 UNIDADES $30.000 ( C/U $3000 )</p>
                <p class="text-xs md:text-3xl font-semibold text-teal-300 text-shadow">LLAVEROS X 20 UNIDADES $56.000 ( C/U $2800 )</p>
                <p class="text-xs md:text-3xl font-semibold text-blue-300 text-shadow">LLAVEROS X 50 UNIDADES $125.000 ( C/U $2500 ) ENVIO GRATIS A SUCURSAL</p>
                <p class="text-xs md:text-3xl font-semibold text-green-300 text-shadow">LLAVEROS X 100 UNIDADES $190.000 ( C/U $1900 ) ENVIO GRATIS A SUCURSAL</p>
            </div>
        </div>

        <hr class="my-5" />

        <div>
            <Banner />
        </div>

        <hr />

        <div>
            <ImageSelect />
        </div>

        <div v-if="products.some(product => product.discount !== '0')" class="flex flex-col justify-center items-center w-full my-5">
            <h2 class="text-3xl font-bold text-black dark:text-white">Promociones</h2>
            <div class="flex items-center justify-between relative w-full max-w-7xl px-4 my-5">
                <button @click="scrollLeft('promo')" class="arrow-button">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="flex space-x-4 overflow-x-auto" ref="promoCarousel">
                    <ProductCard
                        v-for="product in products.filter(product => product.discount !== '0')"
                        :key="product.id"
                        :product="product"
                        class="w-64 flex-shrink-0"
                    />
                </div>
                <button @click="scrollRight('promo')" class="arrow-button">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div v-if="products.some(product => product.discount === '0')" class="flex flex-col justify-center items-center w-full my-5">
            <h2 class="text-3xl font-bold text-black dark:text-white">Destacados</h2>
            <div class="flex items-center justify-between relative w-full max-w-7xl px-4 my-5">
                <button @click="scrollLeft('featured')" class="arrow-button">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="flex space-x-4 overflow-x-auto" ref="featuredCarousel">
                    <ProductCard
                        v-for="product in products.filter(product => product.discount === '0')"
                        :key="product.id"
                        :product="product"
                        class="w-64 flex-shrink-0"
                    />
                </div>
                <button @click="scrollRight('featured')" class="arrow-button">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <NewsLetter />
        <MidBanner :banner="banner" />
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted, defineProps, ref } from 'vue';
import Slider from '@/Components/Custom-Components/Slider.vue';
import NewsLetter from '@/Components/Custom-Components/NewsLetter.vue';
import ProductCard from '@/Components/Custom-Components/ProductCard.vue';
import MidBanner from '@/Components/Custom-Components/MidBanner.vue';
import ImageSelect from '@/Components/Custom-Components/ImageSelect.vue';
import Banner from '@/Components/Custom-Components/Banner.vue';

const props = defineProps({
    products: Object,
    categories: Object,
    banner: Object
});

const promoCarousel = ref(null);
const featuredCarousel = ref(null);

const scrollLeft = (type) => {
    const carousel = type === 'promo' ? promoCarousel.value : featuredCarousel.value;
    carousel.scrollBy({
        left: -carousel.clientWidth,
        behavior: 'smooth'
    });
};

const scrollRight = (type) => {
    const carousel = type === 'promo' ? promoCarousel.value : featuredCarousel.value;
    carousel.scrollBy({
        left: carousel.clientWidth,
        behavior: 'smooth'
    });
};

onMounted(() => {
    initFlowbite();
});
</script>

<style scoped>
.absolute {
    z-index: 10;
}

.text-shadow {
    text-shadow: 2px 2px 4px rgba(28, 12, 12, 0.845);
}

.arrow-button {
    width: 30px; /* Tamaño del botón */
    height: 30px; /* Tamaño del botón */
    background-color: rgba(255, 255, 255, 0.6); /* Fondo con opacidad */
    border: none;
    border-radius: 50%; /* Botón redondeado */
    cursor: pointer;
    font-size: 18px; /* Tamaño del icono de flecha */
    z-index: 10; /* Asegúrate de que estén por encima de otros elementos */
    transition: background-color 0.3s ease; /* Transición suave para hover */
}

.arrow-button:hover {
    background-color: rgba(255, 255, 255, 0.8); /* Color al pasar el mouse */
}

.flex::-webkit-scrollbar {
    display: none; /* Oculta la barra de desplazamiento */
}
</style>
