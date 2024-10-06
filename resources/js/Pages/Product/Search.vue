<template>

    <Head title="Search" />

    <MainLayout>


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 my-5 ">

          
          <p v-if="products.length == 0">
            No se encontraron resultados
          </p>
          
            <ProductCard v-for="product in products" :key="product.id" :product="product">

            </ProductCard>

        </div>

    </MainLayout>
</template>
  
  <script setup>

    import MainLayout from '@/Layouts/MainLayout.vue';
    import { Head } from '@inertiajs/vue3';
    import ProductCard from '@/Components/Custom-Components/ProductCard.vue';

    defineProps({
      
      products: Object,
      categories : Object
    })

  </script>
  