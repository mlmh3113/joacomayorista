<script setup>
import TopHeader from '@/Components/Custom-Components/TopHeader.vue';
import NavLink from '@/Components/NavLink.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { onMounted, computed } from 'vue';
import { useCarritoStore } from '@/stores/carritoStore'; 
import { useCategoriesStore } from '@/stores/categoriesStore';



// Acceder al store

const carritoStore = useCarritoStore(); 




onMounted(() => {
   carritoStore.obtenerProductos(); 
   initFlowbite();

});

const { categories, isLoading, isError } = useCategoriesStore();



const totalCantidad = computed(() => carritoStore.obtenerTotalCantidad());

const searchForm = useForm({
   search: ''
})


const buscar = () => {
   searchForm.get(route('product.search'));
}

</script>

<template>
   <TopHeader />





   <nav class="bg-teal-500 w-full">
      
      <div class="dark:bg-black grid grid-cols-4">
         <div class="col-span-1 flex justify-start items-center">
            <a :href="route('index')">
               <img src="../../../../public/JoacoLogo.svg" alt="">
            </a>
         </div>

         <div class="flex justify-center items-center w-full col-span-2">
            <form @submit.prevent="buscar" class="flex w-full items-center mx-auto justify-center">
               <label for="voice-search" class="sr-only">Search</label>
               <div class="relative w-full">
                  <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                     <i class="fa-regular fa-face-grin-wink text-gray-900"></i>
                  </div>
                  <input v-model="searchForm.search" type="text" id="voice-search"
                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                     placeholder="Busca tu producto..." required />
                  <button @click="buscar" type="button" class="absolute inset-y-0 end-0 flex items-center pe-3">
                     <i class="fa-solid fa-magnifying-glass text-gray-900"></i>
                  </button>
               </div>
            </form>
         </div>

         


         <div class="col-span-1 flex justify-end gap-5 items-center p-5 relative">


            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown-sesion" type="button">
               <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                  <path
                     d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
               </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdown-sesion"
               class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
               <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                  <li>
                     <a v-if="!$page.props.auth.user" :href="route('register')"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Crear
                        Cuenta</a>
                  </li>
                  <li>
                     <a v-if="!$page.props.auth.user" :href="route('login')"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Iniciar
                        Sesión</a>
                  </li>
                  <li>
                     <Link v-if="$page.props.auth.user" :href="route('logout')" method="post"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout
                     </Link>
                  </li>

               </ul>
            </div>







            <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button">
               <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                  <path
                     d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
               </svg>
               <span v-if="totalCantidad > 0"
                  class="absolute top-4 -right-1 bg-red-600 text-white text-xs rounded-full px-1 transform translate-y-[-50%]">
                  {{ totalCantidad }}
               </span>
            </button>
         </div>
      </div>

      <hr>

      <div class="w-full flex justify-center gap-5 items-center py-4">
         <Link :href="route('index')" class="hover:underline text-white">Inicio</Link>



         <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown-product"
            class="flex items-center text-white"
            type="button">Productos <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
               fill="none" viewBox="0 0 10 6">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 4 4 4-4" />
            </svg>
         </button>
         
         

         <!-- Dropdown menu -->
         <div id="dropdown-product"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
               <li v-for="category in categories" :key="category.id">
                  <Link :href="route('product.category', category.name)"
                     class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{
                  category.name }}</Link>

               </li>

            </ul>
         </div>




         <Link :href="route('contact')" class="hover:underline text-white">Contacto</Link>

        
         <Link v-if="$page.props.auth.isAdmin" :href="route('products')" class="hover:underline text-white">Crear Producto</Link>
         <Link v-if="$page.props.auth.isAdmin" :href="route('categories')" class="hover:underline text-white">Crear Categoria</Link>

        
      </div>

   </nav>


   <!-- Modal content -->
   <div id="default-modal" tabindex="-1" aria-hidden="true"
      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-2xl max-h-full">
         <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
               <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                  Mi Carrito
               </h3>
               <button type="button"
                  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                  data-modal-hide="default-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                  <span class="sr-only">Close modal</span>
               </button>
            </div>

            <div class="p-4 md:p-5 space-y-4">
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
                        <td class="border border-gray-200 p-2">${{ producto.precio * producto.cantidad }}</td>
                     </tr>

                  </tbody>


               </table>
               <div class="mt-5 flex justify-center items-end">
                  <a :href="route('cart.index')"
                     class="w-full flex justify-center items-center bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded mb-2">Finalizar
                     Compra</a>

               </div>

            </div>
         </div>
      </div>
   </div>

   
</template>

<style scoped>
.absolute {
   position: absolute;
}

.transform {
   transform: translate(-50%, -50%);
}
</style>
