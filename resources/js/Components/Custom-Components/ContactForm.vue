<template>
    <div class="flex flex-col gap-5 md:grid md:grid-cols-2 md:space-x-5 min-w-full bg-[#22143D] py-10 mb-20 mt-10 relative ">

        <div class="absolute w-full h-full bg-gradient-to-b from-[#34D6E2] to-[#412775]  -z-10 -top-5 -left-5   " >

        </div>
        <div class="flex flex-col justify-center place-items-start md:col-span-1 text-start gap-3 ">
            <h1 class="text-3xl font-bold text-[#34D6E2]">¿Listo para tener un sitio web que marca la diferencia?</h1>
            <p class="text-white text-2xl ">Dejanos tu mensaje a través del formulario</p>
        </div>
        <div class="flex flex-col px-5 md:col-span-1">
               <form @submit.prevent="submit">
                
        <div>
            

            <TextInput
            
                id="name"
                type="text"
                class="mt-1 block w-full "
                v-model="form.name"
                required
              
                autocomplete="name"
                placeholder="Nombre completo"
            />

            <InputError class="mt-2" :message="form.errors.name" />
        </div>
        <div>
           

            <TextInput
                id="email"
                type="text"
                class="mt-1 block w-full"
                v-model="form.email"
                required
                autocomplete="email" 
                placeholder="Correo electronico"  
            />

            <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div class=" mt-2">
            

            <TextInput
                id="phone"
                type="text"
                class="mt-1 block w-full"
                v-model="form.phone"
                required  
                autocomplete="phone"
                placeholder="Numero de Whatsapp"
            />

            <InputError class="mt-2" :message="form.errors.phone" />
        </div>
        <div class=" mt-2">
           

            <TextArea
                id="msg"
                class="mt-1 block w-full"
                v-model="form.msg"
                required
                rows="5"
                autocomplete="msg"
                name="msg"
                placeholder="Dejanos tu mensaje"
            />


            <InputError class="mt-2" :message="form.errors.msg" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button
                class="text-white uppercase py-2 px-6 border-2 border-[#34D6E2] font-bold hover:-translate-y-1 hover:scale-110 duration-500 ease-in-out hover:text-[#34D6E2] hover:border-white">
                Enviar
            </button>
        </div>
        </form>
        </div>
    </div>

   

    
 

</template>

<script setup>

import InputError from '@/Components/InputError.vue';

import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue'; 
import { useForm } from '@inertiajs/vue3';

import 'sweetalert2/dist/sweetalert2.min.css';
import Swal from "sweetalert2";


const form = useForm({
    name: '',
    email: '',
    phone: '',
    msg: ''  
});

const submit = () => {
    form.post(route('contact.store',form), {
        onSuccess: () => {
            Swal.fire({
                
                icon: 'success',
                title: 'Tu mensaje ha sido enviado',
                showConfirmButton: false,
                timer: 1500
            }),
            form.reset('name', 'email', 'phone', 'msg')
        }
    });
};


</script>

