<script setup>
import { useCategoriesStore } from '@/stores/categoriesStore';

import { Link } from '@inertiajs/vue3';

const { categories, isLoading, isError } = useCategoriesStore();

</script>

<template>

  
  <div class="w-full bg-black text-white">
    <!-- Contenedor principal del footer -->
    <div class="flex flex-col lg:flex-row justify-around items-center py-6 space-y-6 lg:space-y-0">

      <!-- Logo de la tienda -->
      <div class="flex justify-start items-center">
        <a :href="route('index')">
          <img class="w-48 h-24" src="../../../../public/JoacoLogo.svg" alt="Logo de Joaco Mayorista">
        </a>
      </div>

      <!-- Sección de Categorías -->
      <div class="text-center">
        <h2 class="text-xl font-semibold mb-2">Categorías</h2>
        <ul>
          <li v-for="category in categories" :key="category.id">
            <Link :href="route('product.category', category.name)"
                     class="block px-4 py-2 capitalize">{{
                  category.name }}</Link>
          </li>
        </ul>
      </div>

      <!-- Sección de Contacto -->
      <div class="text-center">
        <h2 class="text-xl font-semibold mb-2">Contacto</h2>
        <p>Email: joaco.mayorista.tienda@gmail.com</p>
        <p>Teléfono: 541155061985</p>
      </div>

      <!-- Sección de Redes Sociales -->
      <div class="text-center">
        <h2 class="text-xl font-semibold mb-2">Redes Sociales</h2>
        <ul class="flex space-x-4">
          <li><a href="https://www.facebook.com/search/top?q=tienda%20joaco%20mayorista" class="hover:underline" target="_blank">Facebook</a></li>
          <li><a href="#" class="hover:underline">Instagram</a></li>
          <li><a href="#" class="hover:underline">Twitter</a></li>
        </ul>
      </div>
    </div>

    <!-- Línea divisoria -->
    <hr class="border-t border-gray-700">

    <!-- Copyright y enlace de desarrollo -->
    <div class="text-center w-full py-4">
      <p>Copyright © 2024 Joaco Mayorista - Desarrollado por 
        <a href="https://nvnwebdesing.com" class="underline text-purple-500 hover:text-purple-400" target="_blank">NVN Web Design</a>
      </p>
    </div>
  </div>
</template>

<style scoped>
</style>
