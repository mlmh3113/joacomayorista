<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { ref, onMounted, computed } from 'vue';
import Productos from '@/Pages/Cart/Productos.vue';
import DatosDelComprador from '@/Pages/Cart/DatosDelComprador.vue';
import DomicilioDelComprador from '@/Pages/Cart/DomicilioDelComprador.vue';
import ResumenDeCompra from '@/Pages/Cart/ResumenDeCompra.vue';
import { useCarritoStore } from '@/stores/carritoStore';
import { useProcesoDeCompraStore } from '@/stores/procesoDeCompraStore';
import { useForm } from '@inertiajs/vue3';

import 'sweetalert2/dist/sweetalert2.min.css';
import Swal from "sweetalert2";




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

const FinalizarCompra = () => {
    // Obtiene los datos del comprador
    const compraData = {
        ...procesoDeCompraStore.getCompra(), // Asegúrate de que esto incluya nombre, apellido, dni, etc.
        envio: procesoDeCompraStore.getCostoEnvio(),
        total: totalCarrito.value + procesoDeCompraStore.getCostoEnvio(), // Incluye el total de la compra
        descuento: procesoDeCompraStore.getTotalDescuentos(),
        productos: carritoStore.productos.map(producto => ({
            id: producto.id, // ID del producto
            cantidad: producto.cantidad, // Cantidad del producto en el carrito
            precio: producto.precio // Precio del producto
        }))
    };

    // Mostrar la alerta de confirmación
    Swal.fire({
        title: '¿Estás seguro de que deseas finalizar la compra?',
        text: 'No podrás deshacer esta acción',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, finalizar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, envía los datos al servidor
            router.post(route('compra.store', compraData));

            // Mostrar una alerta de éxito
            Swal.fire({
                title: 'Compra finalizada',
                text: 'Tu compra se ha realizado con éxito. En minutos reecibiras un mensaje de confirmación',
                icon: 'success',
                timer: 4000
            });
        }
    });
};





</script>

<template>

    <Head title="Carrito" />

    <MainLayout>
        




        <div class="w-full md:w-2/3 mx-auto my-10">
            <Productos v-if="paso === 1" />
            <DatosDelComprador v-if="paso === 2" />
            <DomicilioDelComprador v-if="paso === 3" />
            <ResumenDeCompra v-if="paso === 4" />



            <div class="flex w-full md:w-2/3 justify-between px-5 bg-white rounded-md mt-5 py-5 mx-auto ">
                <button class="uppercase font-bold text-white bg-blue-500 rounded px-4 py-2 "
                    :class="paso == 1 ? 'invisible' : ''" @click="prevStep">Volver</button>

                <button v-if="paso < 4" class="uppercase font-bold text-white bg-blue-500 rounded px-4 py-2 "
                    @click="nextStep">Continuar</button>

                <button v-if="paso == 4" class="uppercase font-bold text-white bg-blue-500 rounded px-4 py-2 "
                    @click="FinalizarCompra">Finalizar compra</button>
            </div>

        </div>
    </MainLayout>
</template>

<style scoped></style>
