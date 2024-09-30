<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head , router } from '@inertiajs/vue3';
import { ref , onMounted, computed } from 'vue';
import Productos from '@/Pages/Cart/Productos.vue';
import DatosDelComprador from '@/Pages/Cart/DatosDelComprador.vue';
import DomicilioDelComprador from '@/Pages/Cart/DomicilioDelComprador.vue';
import ResumenDeCompra from '@/Pages/Cart/ResumenDeCompra.vue';
import { useCarritoStore } from '@/stores/carritoStore';
import { useProcesoDeCompraStore } from '@/stores/procesoDeCompraStore';
import { useForm } from '@inertiajs/vue3';


const procesoDeCompraStore = useProcesoDeCompraStore();

const carritoStore = useCarritoStore();

onMounted(() => {
    carritoStore.obtenerProductos();
    
    
});

const totalCarrito = computed(() => carritoStore.obtenerTotalCarrito());


const paso = ref(1);

const nextStep = () => {
    if (paso.value !== 4) {
        paso.value++;
    }
};

const prevStep = () => {
    if (paso.value !== 1) { 
        paso.value--;
    }
};



</script>

<template>
<Head title="Carrito" />

<MainLayout>
    <h1>carrito</h1>   

    {{form}}

    
    <div>
        <Productos v-if="paso === 1" />
        <DatosDelComprador v-if="paso === 2" />
        <DomicilioDelComprador v-if="paso === 3" />
        <ResumenDeCompra v-if="paso === 4" />
        

    
        <div class="flex w-2/3 justify-between px-5 bg-white rounded-md mt-5 py-5 ">
        <button class="uppercase font-bold text-white bg-blue-500 rounded px-4 py-2 " :class="paso == 1 ? 'invisible' : ''  " @click="prevStep">Volver</button>

        <button v-if="paso < 4" class="uppercase font-bold text-white bg-blue-500 rounded px-4 py-2 "    @click="nextStep">Continuar</button>

        <button v-if="paso == 4" class="uppercase font-bold text-white bg-blue-500 rounded px-4 py-2 " @click="FinalizarCompra" >Finalizar compra</button>
    </div>

    </div>
</MainLayout>
</template>

<style scoped>
</style>
