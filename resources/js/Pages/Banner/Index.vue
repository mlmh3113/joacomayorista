<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import 'sweetalert2/dist/sweetalert2.min.css';
import Swal from "sweetalert2";
import InputLabel from "@/Components/InputLabel.vue";


const form = useForm({
    images: [],
});

// Abrir el widget de Cloudinary para cargar imágenes
function mainImage() {
    widget.open();
}

// Configuración del widget de Cloudinary
const widget = window.cloudinary.createUploadWidget({
    cloud_name: "dkoocayxp",
    uploadPreset: "aa0alktg",
    multiple: false,
}, (error, result) => {
    if (!error && result && result.event === "success") {
        console.log("Done! Here is the image info: ", result.info.secure_url);
        form.images = result.info.secure_url;
    } else {
        console.log(error);
    }
});

// Función para enviar el formulario con las URLs de las imágenes
function submitForm() {
    form.post(route('banner.store')); // Reemplaza con la ruta correcta
}
</script>

<template>
    <Head title="Banner Edit" />

    <MainLayout>
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">

            <!-- Imágenes -->
            <div class="mb-6">
                <InputLabel for="images" value="Imágenes Secundarias" />
                <div class="my-4 grid grid-cols-2 gap-4">
                   
                    <!-- <div v-for="image in form.images" :key="image">
                        <img class="w-full h-52 object-cover rounded shadow-md" :src="image" alt="imagen_secundaria">
                    </div> -->
                </div>
                <!-- Botón para abrir el widget de Cloudinary -->
                <button @click="mainImage" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                    Subir Imágen
                </button>
            </div>

            <!-- Botón para enviar el formulario con las URLs de las imágenes -->
            <button @click="submitForm" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700 transition">
                Guardar Imágen
            </button>

        </div>
    </MainLayout>
</template>

<style scoped>
/* Añade estilos si es necesario */
</style>
