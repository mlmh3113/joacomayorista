<script setup>
import { useCarritoStore } from '@/stores/carritoStore';

const carritoStore = useCarritoStore();

</script>

<template>

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
                        <td class="border border-gray-200 p-2">
                            <input class="w-full" step="1" type="number" min="1" v-model="producto.cantidad" @change="carritoStore.actualizarCarrito(producto.id, producto.cantidad)">
                        </td>
                        <td class="border border-gray-200 p-2">${{ producto.precio * producto.cantidad }}</td>
                     </tr>
                  </tbody>
               </table>



</template>

<style scoped>

</style>
