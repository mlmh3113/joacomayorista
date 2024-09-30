<script setup>
import { computed } from 'vue';
import { useCarritoStore } from '@/stores/carritoStore';
import { useProcesoDeCompraStore } from '@/stores/procesoDeCompraStore';

const carritoStore = useCarritoStore();
const procesoDeCompra = useProcesoDeCompraStore();

// Calcula el total de la compra
const totalCompra = computed(() => {
    return carritoStore.productos.reduce((total, producto) => {
        return total + producto.precio * producto.cantidad;
    }, 0);
});
</script>

<template>
    <div class="flex flex-col w-full max-w-2xl mx-auto p-5 bg-white rounded-md shadow-md">
        <h2 class="text-2xl font-bold mb-5">Resumen de Compra</h2>

        <h3 class="text-xl font-semibold mb-3">Datos del Comprador</h3>
        <p><strong>Nombre:</strong> {{ procesoDeCompra.getNombre() }}</p>
        <p><strong>Apellido:</strong> {{ procesoDeCompra.getApellido() }}</p>
        <p><strong>Email:</strong> {{ procesoDeCompra.getEmail() }}</p>
        <p><strong>Teléfono:</strong> {{ procesoDeCompra.getTelefono() }}</p>
        <p><strong>DNI:</strong> {{ procesoDeCompra.getDni() }}</p>

        <h3 class="text-xl font-semibold mt-5 mb-3">Datos de Domicilio</h3>
        <p><strong>Dirección:</strong> {{ procesoDeCompra.getDireccion() }}</p>
        <p><strong>Localidad:</strong> {{ procesoDeCompra.getLocalidad() }}</p>
        <p><strong>Provincia:</strong> {{ procesoDeCompra.getProvincia() }}</p>
        <p><strong>Código Postal:</strong> {{ procesoDeCompra.getCodigoPostal() }}</p>

        <h3 class="text-xl font-semibold mt-5 mb-3">Productos en el Carrito</h3>
        <table class="min-w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border border-gray-200 p-2 text-left">Nombre</th>
                    <th class="border border-gray-200 p-2 text-left">Precio</th>
                    <th class="border border-gray-200 p-2 text-left">Cantidad</th>
                    <th class="border border-gray-200 p-2 text-left">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="producto in carritoStore.productos" :key="producto.id">
                    <td class="border border-gray-200 p-2 capitalize">{{ producto.nombre }}</td>
                    <td class="border border-gray-200 p-2">${{ producto.precio }}</td>
                    <td class="border border-gray-200 p-2">{{ producto.cantidad }}</td>
                    <td class="border border-gray-200 p-2">${{ (producto.precio * producto.cantidad).toFixed(2) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-5">
            <h3 class="text-xl font-semibold">Total: ${{ totalCompra.toFixed(2) }}</h3>
        </div>
    </div>
</template>

<style scoped>
</style>
