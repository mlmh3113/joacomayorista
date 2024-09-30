<script setup>
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
          <li><a href="#" class="hover:underline">Categoría 1</a></li>
          <li><a href="#" class="hover:underline">Categoría 2</a></li>
          <li><a href="#" class="hover:underline">Categoría 3</a></li>
        </ul>
      </div>

      <!-- Sección de Contacto -->
      <div class="text-center">
        <h2 class="text-xl font-semibold mb-2">Contacto</h2>
        <p>Email: contacto@joacomayorista.com</p>
        <p>Teléfono: +123 456 7890</p>
      </div>

      <!-- Sección de Redes Sociales -->
      <div class="text-center">
        <h2 class="text-xl font-semibold mb-2">Redes Sociales</h2>
        <ul class="flex space-x-4">
          <li><a href="#" class="hover:underline">Facebook</a></li>
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
