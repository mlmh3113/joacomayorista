<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/navigation';
import { Navigation } from 'swiper/modules';
import { ref } from 'vue';
import { useCarritoStore } from '@/stores/carritoStore';
import 'sweetalert2/dist/sweetalert2.min.css';
import Swal from "sweetalert2";

const props = defineProps({
    product: Object
});

const cantidad = ref(1);
const carritoStore = useCarritoStore(); // Instancia del store

const agregarAlCarrito = () => {
    carritoStore.agregarAlCarrito(props.product, cantidad.value);

    Swal.fire({
        icon: 'success',
        title: 'Agregado al carrito',
        showConfirmButton: false,
        timer: 1500
    })
    
    
};

// Convierte las imágenes de string a un array
const images = JSON.parse(props.product.images);

// Incluye la imagen principal en el array de imágenes
const allImages = [props.product.main_image, ...images];
</script>

<template>
    <Head title="Producto" />

    <MainLayout>

        <div class="w-full ">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 p-4">
                <div class="col-span-1">
                    <swiper
                        :modules="[Navigation]"
                        navigation
                        :spaceBetween="30"
                        :centeredSlides="true"
                        :loop="true"
                        class="mySwiper rounded-lg shadow-md overflow-hidden"
                    >
                        <swiper-slide v-for="(image, index) in allImages" :key="index">
                            <img class="w-full h-96 object-cover" :src="image" alt="Imagen del producto" />
                        </swiper-slide>
                    </swiper>
                </div>

                <div class="col-span-1 flex flex-col justify-between p-4 bg-white rounded-lg shadow-md">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 capitalize">{{ product.name }}</h1>
                        <p class="text-lg text-gray-600 mt-2">{{ product.description }}</p>
                        <span class="text-xl font-bold text-gray-900 mt-4">${{ product.price }}</span>
                        <p class="text-sm text-gray-500 mt-1">Color: {{ product.color }}</p>
                        <p class="text-sm text-gray-500 mt-1">Stock: {{ product.stock }}</p>
                        <p class="text-sm text-gray-500 mt-1">Características: {{ product.caracteristics }}</p>
                    </div>

                    <div>
                        <input type="number" min="1" max="10" class="w-full border-gray-300 rounded-lg" placeholder="Ingrese la cantidad" v-model="cantidad">
                    </div>

                    <div class="mt-4">
                        <button @click="agregarAlCarrito" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
                            Añadir al carrito
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </MainLayout>
</template>

<style scoped>
.mySwiper {
  width: 100%;
  height: 100%;
}
</style>
