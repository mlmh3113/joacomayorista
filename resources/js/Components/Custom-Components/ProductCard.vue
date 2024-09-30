<script setup>

defineProps({
    product: Object
})




</script>

<template>


    <a :href="route('product.show', product.id)">
    <div class="flex justify-center items-center py-8">
            <!-- Contenedor de la tarjeta del producto -->
            <div class="max-w-sm bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- Imagen principal del producto -->
                <img class="w-full h-64 object-cover" :src="product.main_image" alt="Imagen del producto" />

                <!-- Información del producto -->
                <div class="p-4">
                    <!-- Nombre del producto -->
                    <h2 class="text-xl font-semibold text-gray-800 capitalize">{{ product.name }}</h2>
                    
                    <!-- Categoría del producto -->
                    <p class="text-gray-600 mt-2">
                        Categoría: 
                        <span v-for="category in product.categories" :key="category.id" class="text-blue-500 capitalize">
                            {{ category.name }}
                        </span>
                    </p>
                    


                    <!-- Stock -->
                    <p class="mt-2 text-green-600" v-if="product.stock === 'Disponible'">
                        Stock: Disponible
                    </p>
                    <p class="mt-2 text-red-600" v-else>
                        Stock: Agotado
                    </p>

                        <!-- Precio del producto -->
                    <div class="flex items-center justify-between mt-4">
                        <p class="text-xl line-through text-gray-900 dark:text-white">${{ (parseFloat(product.price) * 1.25).toFixed(2) }}</p>
                        <p class="text-xl font-bold text-gray-800">${{ (parseFloat(product.price)).toFixed(2) }}</p>
                    </div>


                </div>

            

            </div>
        </div>
</a>
        



</template>

<style scoped>

</style>
