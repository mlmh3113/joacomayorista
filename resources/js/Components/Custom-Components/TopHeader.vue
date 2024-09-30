<script setup>
import {ref, onMounted} from 'vue';

const text = [
'Compra minima $20mil. ENVIO GRATIS EN COMPRAS SUPERIORES a $130mil',
    'Telefono +569 1234 5678',
    'Mail 0uYp0@example.com',
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
