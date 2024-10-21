<script setup>

</script>

<template>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-5 max-w-7xl mx-auto">
        <!-- Imagen 1 -->
        <div class="col-span-1 overflow-hidden mx-4 sm:mx-0 relative group"> <!-- margen lateral en móviles -->
            <a :href="route('product.category', 'billeteras')" class="block">
                <img 
                    src="https://res.cloudinary.com/dkoocayxp/image/upload/v1729546220/Joaco%20Mayorista/billeterasjiji_rvk0vm.jpg" 
                    alt="image1" 
                    class="w-full h-96 object-cover transition-transform duration-500 group-hover:scale-110 rounded-md"
                >
                <div class="absolute top-0 left-0 w-full p-4 text-center text-white transition-transform duration-500 group-hover:scale-110">
                    <span class="bg-teal-500 bg-opacity-70 px-2 py-1 rounded text-3xl font-semibold">Billeteras</span> <!-- Texto en la parte superior -->
                </div>
                <div class="absolute bottom-0 right-0 p-4 transition-transform duration-500 group-hover:scale-110">
                    <span class="bg-pink-400 bg-opacity-70 px-2 py-1 rounded text-2xl font-bold cursor-pointer hover:underline">
                        Ver más
                    </span>
                </div>
            </a>
        </div>
        <!-- Imagen 2 -->
        <div class="col-span-1 overflow-hidden mx-4 sm:mx-0 relative group"> <!-- margen lateral en móviles -->
            <a :href="route('product.category', 'llaveros')" class="block">
                <img 
                    src="https://res.cloudinary.com/dkoocayxp/image/upload/v1728427891/Joaco%20Mayorista/hwhmtj3wk7p413hxw0tl.jpg" 
                    alt="image2" 
                    class="w-full h-96 object-cover transition-transform duration-500 group-hover:scale-110 rounded-md"
                >
                <div class="absolute top-0 left-0 w-full p-4 text-center text-white transition-transform duration-500 group-hover:scale-110">
                    <span class="bg-teal-500 bg-opacity-70 px-2 py-1 rounded text-3xl font-semibold">Llaveros</span> <!-- Texto en la parte superior -->
                </div>
                <div class="absolute bottom-0 right-0 p-4 transition-transform duration-500 group-hover:scale-110">
                    <span class="bg-pink-400 bg-opacity-70 px-2 py-1 rounded text-2xl font-bold cursor-pointer hover:underline">
                        Ver más
                    </span>
                </div>
            </a>
        </div>
    </div>

</template>

<style scoped>
/* Se ha eliminado el efecto de oscurecimiento */
</style>
