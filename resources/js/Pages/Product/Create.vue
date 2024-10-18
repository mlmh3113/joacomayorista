
<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";
import 'sweetalert2/dist/sweetalert2.min.css';
import Swal from "sweetalert2";

defineProps({
    categories: Array
});

const form = useForm({
    name: '',
    description: '',
    price: '',
    discount: 0,
    category_id: '',
    stock: '',
    color: '',
    caracteristics: '',
    main_image: '',
    images: [],
});

const widget = window.cloudinary.createUploadWidget({
    cloud_name: "dkoocayxp",
    uploadPreset: "aa0alktg",
    multiple: false,
}, (error, result) => {
    if (!error && result && result.event === "success") {
        console.log("Done! Here is the image info: ", result.info.secure_url);
        form.main_image = result.info.secure_url;
    } else {
        console.log(error);
    }
});

const multiWidget = window.cloudinary.createUploadWidget({
    cloud_name: "dkoocayxp",
    uploadPreset: "aa0alktg",
}, (error, result) => {
    if (!error && result && result.event === "success") {
        console.log("Done! Here is the image info: ", result.info.secure_url);
        form.images.push(result.info.secure_url);
    } else {
        console.log(error);
    }
});

function mainImage() {
    widget.open();
}

function multiImage() {
    multiWidget.open();
}

function submit() {
    form.post(route('product.store'), {
        onSuccess: () => {
            Swal.fire({
                    icon: 'success',
                    title: 'Producto creado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                }),
            form.reset('name', 'description', 'price', 'discount', 'category_id', 'stock', 'color', 'caracteristics', 'main_image', 'images');

        }
    });
}
</script>

<template>
    <Head title="Productos" />

    <MainLayout>
        <h1 class="text-2xl font-bold text-center my-8">Crear Producto</h1>

        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">

            <!-- Imagen Principal -->
            <div class="mb-6">
                <InputLabel for="main_image" value="Imagen Principal" />
                <div class="my-4 gap-4">
                                   <div v-if="form.main_image" class="my-4">
                    <img class="w-52 h-52 object-cover mx-auto rounded-full shadow-md" :src="form.main_image" alt="imagen_principal">
                </div>
                <button @click="mainImage" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition">Subir Imagen Principal</button> 
                </div>

            </div>

            <!-- Imágenes Secundarias -->
            <div class="mb-6">
                <InputLabel for="images" value="Imágenes Secundarias" />
                <div class="my-4 grid grid-cols-2 gap-4">
                    <div v-for="image in form.images" :key="image">
                        <img class="w-full h-52 object-cover rounded shadow-md" :src="image" alt="imagen_secundaria">
                    </div>
                </div>
                <button @click="multiImage" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 transition">Subir Imágenes Secundarias</button>
            </div>

            <!-- Formulario -->
            <form @submit.prevent="submit" enctype="multipart/form-data" class="space-y-6">
                
                <!-- Nombre del Producto -->
                <div>
                    <InputLabel for="name" value="Nombre del Producto" />
                    <TextInput id="name" type="text" class="mt-1 block w-full border-gray-300 rounded-lg" v-model="form.name" required />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <!-- Descripción -->
                <div>
                    <InputLabel for="description" value="Descripción" />
                    <TextArea id="description" class="mt-1 block w-full border-gray-300 rounded-lg" v-model="form.description" required />
                    <InputError class="mt-2" :message="form.errors.description" />
                </div>

                <!-- Precio -->
                <div>
                    <InputLabel for="price" value="Precio" />
                    <TextInput id="price" type="text" class="mt-1 block w-full border-gray-300 rounded-lg" v-model="form.price" required />
                    <InputError class="mt-2" :message="form.errors.price" />
                </div>

                       <!-- Descuento -->
                       <div>
                    <InputLabel for="discount" value="Descuento" />
                    <select v-model="form.discount" class="mt-1 block w-full border-gray-300 rounded-lg" required>
                        <option value="" disabled>Selecciona un descuento</option>
                        <option value="0">Sin Descuento</option>
                        <option value="10">10%</option>
                        <option value="20">20%</option>
                        <option value="35">35%</option>
                        <option value="50">2 x 1</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.discount" />
                </div>
                

                <!-- Categoría -->
                <div>
                    <InputLabel for="category_id" value="Categoría" />
                    <select v-model="form.category_id" class="mt-1 block w-full border-gray-300 rounded-lg">
                        <option disabled value="">Selecciona una categoría</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                </div>

                <!-- Stock -->
                <div>
                    <InputLabel for="stock" value="Stock" />
                    <select v-model="form.stock" class="mt-1 block w-full border-gray-300 rounded-lg">
                        <option disabled value="">Selecciona el stock</option>
                        <option value="Disponible">Disponible</option>
                        <option value="Agotado">Agotado</option>
                    </select>
                </div>

                <!-- Color -->
                <div>
                    <InputLabel for="color" value="Color" />
                    <TextInput id="color" type="text" class="mt-1 block w-full border-gray-300 rounded-lg" v-model="form.color" required />
                    <InputError class="mt-2" :message="form.errors.color" />
                </div>

                <!-- Características -->
                <div>
                    <InputLabel for="caracteristics" value="Características" />
                    <TextArea id="caracteristics" class="mt-1 block w-full border-gray-300 rounded-lg" v-model="form.caracteristics" required />
                    <InputError class="mt-2" :message="form.errors.caracteristics" />
                </div>

                <!-- Botón Enviar -->
                <div class="text-center">
                    <button type="submit" class="bg-green-500 text-white py-2 px-6 rounded-lg hover:bg-green-700 transition">Enviar</button>
                </div>
            </form>
        </div>
    </MainLayout>
</template>

<style scoped></style>
