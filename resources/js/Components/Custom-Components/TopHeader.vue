<script setup>
import {ref, onMounted} from 'vue';

const text = [
'Compra minima $20.000',
    'Telefono +541155061985',
    'Mail joaco.mayorista.tienda@gmail.com',
    'Envios a todos el pais',
    '¡¡Gracias por tu visita a nuestra tienda!!'
]

const textToShow = ref(text[0]);
const index = ref(0);
const interval = 3000;


onMounted(() => {
    changeText();
    setInterval(changeText, interval);
});

const changeText = () => {
        index.value = (index.value + 1) % text.length;
        textToShow.value = text[index.value];
}  


</script>

<template>

    <div class="text-center w-full bg-black py-2">
    <p class="text-white font-semibold ">{{ textToShow }}</p>
    </div>

</template>

<style scoped>

</style>
