<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import { useProcesoDeCompraStore } from '@/stores/procesoDeCompraStore';

const procesoDeCompra = useProcesoDeCompraStore();

const form = useForm({
    direccion: '',
    localidad: '',
    provincia: '',
    codigoPostal: '',
});

onMounted(() => {
    form.reset('direccion', 'localidad', 'provincia', 'codigoPostal');
    form.direccion = procesoDeCompra.getDireccion();
    form.localidad = procesoDeCompra.getLocalidad();
    form.provincia = procesoDeCompra.getProvincia();
    form.codigoPostal = procesoDeCompra.getCodigoPostal();
});

// Función para manejar el envío del formulario
const submitForm = () => {
    form.post('/ruta/a/tu/api'); // Cambia esto por la ruta correcta para manejar el envío
};

</script>

<template>
<div class="flex flex-col w-2/3 justify-center items-center rounded-md py-10 px-5 bg-white shadow-md shadow-gray-500">
    <h2 class="text-xl font-semibold mb-5">Datos del Domicilio</h2>
    
    <form @submit.prevent="submitForm" class="w-full">
        <div class="mb-4">
            <InputLabel for="direccion" value="Dirección" />
            <TextInput
                @change="procesoDeCompra.setDireccion(form.direccion)"
                id="direccion" 
                type="text" 
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                v-model="form.direccion" 
                required 
                autocomplete="off" 
            />
            <InputError class="mt-2" :message="form.errors.direccion" />
        </div>
        
        <div class="mb-4">
            <InputLabel for="localidad" value="Localidad" />
            <TextInput 
                @change="procesoDeCompra.setLocalidad(form.localidad)" 
                id="localidad" 
                type="text" 
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                v-model="form.localidad" 
                required  
                autocomplete="off"
            />
            <InputError class="mt-2" :message="form.errors.localidad" />
        </div>

        <div class="mb-4">
            <InputLabel for="provincia" value="Provincia" />
            <TextInput
                @change="procesoDeCompra.setProvincia(form.provincia)"
                id="provincia" 
                type="text" 
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                v-model="form.provincia" 
                required  
                autocomplete="off"
            />
            <InputError class="mt-2" :message="form.errors.provincia" />
        </div>

        <div class="mb-4">
            <InputLabel for="codigoPostal" value="Código Postal" />
            <TextInput
                @change="procesoDeCompra.setCodigoPostal(form.codigoPostal)"
                id="codigoPostal" 
                type="text" 
                class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                v-model="form.codigoPostal" 
                required 
                autocomplete="off"
            />
            <InputError class="mt-2" :message="form.errors.codigoPostal" />
        </div>

        <!-- <PrimaryButton class="mt-4 w-full py-2 bg-blue-500 text-white font-bold rounded-md hover:bg-blue-700 transition">
            Continuar
        </PrimaryButton> -->
    </form> 
</div>
</template>

<style scoped>
</style>
