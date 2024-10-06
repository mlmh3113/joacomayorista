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
    <div class="flex flex-col w-full max-w-md mx-auto justify-center items-center rounded-md py-10 px-5 bg-white shadow-md shadow-gray-500">
        <h2 class="text-xl font-semibold mb-5 text-center">Datos del Domicilio</h2>
        
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
    <select
        @change="procesoDeCompra.setProvincia($event.target.value)"
        id="provincia"
        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        required
    >
        <option value="" disabled selected>Selecciona una provincia</option>
        <option value="Buenos Aires">Buenos Aires</option>
        <option value="Catamarca">Catamarca</option>
        <option value="Chaco">Chaco</option>
        <option value="Chubut">Chubut</option>
        <option value="Córdoba">Córdoba</option>
        <option value="Corrientes">Corrientes</option>
        <option value="Entre Ríos">Entre Ríos</option>
        <option value="Formosa">Formosa</option>
        <option value="Jujuy">Jujuy</option>
        <option value="La Pampa">La Pampa</option>
        <option value="La Rioja">La Rioja</option>
        <option value="Mendoza">Mendoza</option>
        <option value="Misiones">Misiones</option>
        <option value="Neuquén">Neuquén</option>
        <option value="Río Negro">Río Negro</option>
        <option value="Salta">Salta</option>
        <option value="San Juan">San Juan</option>
        <option value="San Luis">San Luis</option>
        <option value="Santa Cruz">Santa Cruz</option>
        <option value="Santa Fe">Santa Fe</option>
        <option value="Santiago del Estero">Santiago del Estero</option>
        <option value="Tierra del Fuego">Tierra del Fuego</option>
        <option value="Tucumán">Tucumán</option>
    </select>
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
