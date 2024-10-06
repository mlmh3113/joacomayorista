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
    name: '',
    surname: '',
    dni: '',
    email: '',
    phone: '',
});

onMounted(() => {
    form.reset('name', 'surname', 'dni', 'email', 'phone');
    form.name = procesoDeCompra.getNombre();
    form.surname = procesoDeCompra.getApellido();
    form.dni = procesoDeCompra.getDni();
    form.email = procesoDeCompra.getEmail();
    form.phone = procesoDeCompra.getTelefono();
});

// Función para manejar el envío del formulario
const submitForm = () => {
    form.post('/ruta/a/tu/api'); // Cambia esto por la ruta correcta para manejar el envío
};
</script>
<template>
    <div class="flex flex-col w-full sm:w-4/5 lg:w-2/3 justify-center items-center rounded-md py-8 px-4 sm:px-10 bg-white shadow-md shadow-gray-500">
      <h2 class="text-xl font-semibold mb-5">Datos del Comprador</h2>
      
      <form @submit.prevent="submitForm" class="w-full">
        <div class="mb-4">
          <InputLabel for="name" value="Nombre" />
          <TextInput
            @change="procesoDeCompra.setNombre(form.name)"
            id="name" 
            type="text" 
            class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            v-model="form.name" 
            required 
            autofocus 
            autocomplete="off" 
          />
          <InputError class="mt-2" :message="form.errors.name" />
        </div>
        
        <div class="mb-4">
          <InputLabel for="surname" value="Apellido" />
          <TextInput 
            @change="procesoDeCompra.setApellido(form.surname)" 
            id="surname" 
            type="text" 
            class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            v-model="form.surname" 
            required  
            autocomplete="off"
          />
          <InputError class="mt-2" :message="form.errors.surname" />
        </div>
  
        <div class="mb-4">
          <InputLabel for="dni" value="DNI" />
          <TextInput
            @change="procesoDeCompra.setDni(form.dni)"
            id="dni" 
            type="text" 
            class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            v-model="form.dni" 
            required  
            autocomplete="off"
          />
          <InputError class="mt-2" :message="form.errors.dni" />
        </div>
  
        <div class="mb-4">
          <InputLabel for="email" value="Email" />
          <TextInput
            @change="procesoDeCompra.setEmail(form.email)"
            id="email" 
            type="email" 
            class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            v-model="form.email" 
            required 
            autocomplete="off"
          />
          <InputError class="mt-2" :message="form.errors.email" />
        </div>
  
        <div class="mb-4">
          <InputLabel for="phone" value="Teléfono" />
          <TextInput
            @change="procesoDeCompra.setTelefono(form.phone)"
            id="phone" 
            type="text" 
            class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            v-model="form.phone" 
            required 
            autocomplete="off"
          />
          <InputError class="mt-2" :message="form.errors.phone" />
        </div>

        <!-- <PrimaryButton class="mt-4 w-full py-2 bg-blue-500 text-white font-bold rounded-md hover:bg-blue-700 transition">
            Continuar
        </PrimaryButton> -->
    </form> 
</div>
</template>

<style scoped>
</style>
