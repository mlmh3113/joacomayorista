<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head , router  } from '@inertiajs/vue3';

defineProps({
    products: {
        type: Object,
    },

    categories: {
        type: Object,
    }
})

function deleteProduct(id) {
    router.delete(route('product.delete', id));
}
</script>

<template>
    <Head title="Productos" />

    <MainLayout>
        <!-- Título de la página -->
        <h1 class="text-3xl font-bold text-center my-8">Listado de Productos</h1>

        <!-- Botón para agregar un nuevo producto -->
        <div class="mb-6 text-center">
            <a :href="route('product.create')">
                <button class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition">
                    + Nuevo Producto
                </button>
            </a>
        </div>

        <!-- Tabla de productos -->
        <div class="overflow-x-auto shadow-lg rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <!-- Encabezados de la tabla -->
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Nombre del producto</th>
                        <th class="px-6 py-3">Imagen</th>
                        <th class="px-6 py-3">Color</th>
                        <th class="px-6 py-3">Stock</th>
                        <th class="px-6 py-3">Categorías</th>
                        <th class="px-6 py-3">Precio</th>
                        <th class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>

                <!-- Cuerpo de la tabla -->
                <tbody>
                    <tr v-for="product in products" :key="product.id" class="border-b odd:bg-white even:bg-gray-50 dark:bg-gray-900 dark:border-gray-700 dark:text-white">
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ product.name }}
                        </td>
                        <td class="px-6 py-4">
                            <img class="w-16 h-16 object-cover rounded-md" :src="product.main_image" alt="Imagen del producto">
                        </td>
                        <td class="px-6 py-4">
                            {{ product.color }}
                        </td>
                        <td class="px-6 py-4">
                            {{ product.stock }}
                        </td>
                        <td class="px-6 py-4">
                            {{ product.categories.map(category => category.name).join(', ') }}
                        </td>
                        <td class="px-6 py-4">
                            ${{ product.price }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-4 items-center">
                                <a :href="route('product.edit', product.id)" class="text-blue-600 hover:underline">
                                    Editar
                                </a>
                                <button @click="deleteProduct(product.id)" class="text-red-600 hover:underline">
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </MainLayout>
</template>

<style scoped></style>
