<script setup>

</script>

<template>

    <div class="w-full bg-black text-white flex flex-col text-center px-2 items-center">

        <div class="flex flex-col items-center max-w-7xl mx-auto py-10 gap-2">
                  <h2 class="uppercase text-white font-thin">NewsLetter</h2>
        <h3 class="text-white font-bold text-3xl">Recibi todas las ofertas</h3>
        <h4 class="text-white font-semibold text-sm">¿Quieres recibir nuestras ofertas? ¡Registrate ya mismo y comenzá a disfrutarlas!</h4>

        <div class=" flex justify-center items-center w-full">

            <form class="flex w-full items-center mx-auto justify-center">
                <label for="voice-search" class="sr-only">Search</label>
                <div class="relative md:w-1/2 w-full ">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <i class="fa-regular fa-envelope text-gray-800"></i>
                    </div>
                    <input type="text" id="voice-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Email" required />
                    <button type="button" class="absolute inset-y-0 end-0 flex items-center pe-3">
                        <i class="fa-solid fa-arrow-right text-gray-800"></i>
                    </button>
                </div>

            </form>

        </div>  
        </div>


    </div>


</template>

<style scoped></style>
