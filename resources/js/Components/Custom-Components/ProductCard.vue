<script setup>
defineProps({
    product: Object
})
</script>

<template>
    <a v-if="product.stock === 'Disponible'" :href="route('product.show', product.id)">
        <div class="flex justify-center items-center py-8">
            <!-- Contenedor de la tarjeta del producto -->
            <div class="w-64 bg-white shadow-lg rounded-lg overflow-hidden relative">
                <!-- Icono de descuento (solo se muestra si tiene descuento) -->
                <div v-if="product.discount > 0" class="absolute top-2 right-2 bg-red-500 text-white text-sm font-bold px-2 py-1 rounded animate-pulse">
                    <!-- Mostrar "2 x 1" si el descuento es del 50%, de lo contrario mostrar el porcentaje -->
                    <span v-if="product.discount == 50">2 x 1</span>
                    <span v-else>{{ product.discount }}% OFF</span>
                </div>

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
                        <p v-if="product.discount > 0" class="text-xl line-through text-gray-900 dark:text-white">${{ parseFloat(product.price) }}</p>
                        <p class="text-xl font-bold text-gray-800 animate-pulse">${{ (parseFloat(product.price)*(100-product.discount)/100)  }}</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
</template>

<style scoped>
@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1); /* Crece un poco más en el centro de la animación */
    }
}

.animate-pulse {
    animation: pulse 1.5s infinite; /* Animación que dura 1.5 segundos y se repite infinitamente */
}
</style>
