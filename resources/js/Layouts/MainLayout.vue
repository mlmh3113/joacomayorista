<script setup>

import Footer from '@/Components/Custom-Components/Footer.vue';
import NavBar from '@/Components/Custom-Components/NavBar.vue';
import WhatsAppBtn from '@/Components/Custom-Components/WhatsAppBtn.vue';

</script>

<template>

<NavBar/>
<slot/>
<WhatsAppBtn/>
<Footer/>
</template>

<style scoped>

</style>
