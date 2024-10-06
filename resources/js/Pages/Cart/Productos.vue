<script setup>
import { useCarritoStore } from '@/stores/carritoStore';

const carritoStore = useCarritoStore();

</script>

<template>

<div class="text-center w-full bg-black py-2">
   <p class="text-white font-semibold">Carrito de Compras</p>
</div>



<table class="min-w-full border-collapse border border-gray-200">
                  <thead>
                     <tr>
                        <th class="border border-gray-200 p-2 text-left">Nombre</th>
                        <th class="border border-gray-200 p-2 text-left">Precio</th>
                        <th class="border border-gray-200 p-2 text-left">Cantidad</th>
                        <th class="border border-gray-200 p-2 text-left">Subtotal</th>
                        <th class="border border-gray-200 p-2 text-left">Eliminar</th>
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
                        <td class="border border-gray-200 text-center ">
                            <button @click="carritoStore.eliminarDelCarrito(producto.id)">
                              <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
</svg>

                            </button>
                        </td>
                     </tr>
                  </tbody>
               </table>



</template>

<style scoped>

</style>
