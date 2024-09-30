<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { onMounted, nextTick } from 'vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";

const props = defineProps({
    categories: Array,
    product: Object // Asegúrate de que este prop esté pasando correctamente
});

const form = useForm({
    name: '',
    description: '',
    price: '',
    category_id: '',
    stock: '',
    color: '',
    caracteristics: '',
    main_image: '',
    images: [],
});

// Método para cargar los datos del producto al editar
onMounted(() => {
    console.log("Componente montado");
    console.log(props.product); // Verifica el objeto `product`

    if (props.product) {
        form.name = props.product.name;
        form.description = props.product.description;
        form.price = props.product.price;
        form.category_id = props.product.category_id;
        form.stock = props.product.stock;
        form.color = props.product.color;
        form.caracteristics = props.product.caracteristics;
        form.main_image = props.product.main_image;

        // Asegúrate de que `images` sea un arreglo
        try {
            form.images = JSON.parse(props.product.images);
        } catch (e) {
            console.error("Error al parsear images:", e);
            form.images = []; // Inicializa como un arreglo vacío si hay error
        }

        nextTick(() => {
            console.log("Datos cargados en el formulario");
        });
    } else {
        console.error("El producto no se ha cargado correctamente");
    }
});

// Cloudinary widgets
const widget = window.cloudinary.createUploadWidget({
    cloud_name: "dkoocayxp",
    uploadPreset: "aa0alktg",
    multiple: false,
}, (error, result) => {
    if (!error && result && result.event === "success") {
        form.main_image = result.info.secure_url;
    }
});

const multiWidget = window.cloudinary.createUploadWidget({
    cloud_name: "dkoocayxp",
    uploadPreset: "aa0alktg",
}, (error, result) => {
    if (!error && result && result.event === "success") {
        form.images.push(result.info.secure_url);
    }
});

function mainImage() {
    widget.open();
}

function multiImage() {
    multiWidget.open();
}

function submit() {
    form.put(route('product.update', props.product.id)); // Cambia a PUT y envía la ID del producto
}
</script>

<template>
    <Head title="Editar Producto" />
    <MainLayout>
        <h1>Editar Producto</h1>
        <div>
            <div>
                <div v-if="form.main_image">
                    <img class="w-52 h-52" :src="form.main_image" alt="imagen_principal">
                </div>
                <InputLabel for="main_image" value="Imagen Principal" />
                <button @click="mainImage()">Imagen Principal</button>
            </div>
            <div>
                <div v-if="form.images.length">
                    <div v-for="image in form.images" :key="image">
                        <img class="w-52 h-52" :src="image" alt="imagen_secundaria">
                    </div>
                </div>
                <InputLabel for="images" value="Imágenes Secundarias" />
                <button @click="multiImage()">Imágenes Secundarias</button>
            </div>
            <form @submit.prevent="submit" enctype="multipart/form-data">
                <div>
                    <InputLabel for="name" value="Nombre del Producto" />
                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div>
                    <InputLabel for="description" value="Descripción" />
                    <TextArea id="description" class="mt-1 block w-full" v-model="form.description" required />
                    <InputError class="mt-2" :message="form.errors.description" />
                </div>
                <div>
                    <InputLabel for="price" value="Precio" />
                    <TextInput id="price" type="text" class="mt-1 block w-full" v-model="form.price" required />
                    <InputError class="mt-2" :message="form.errors.price" />
                </div>
                <div>
                    <select required v-model="form.category_id">
                        <option disabled value="">Selecciona una categoría</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                </div>
                <div>
                    <select v-model="form.stock">
                        <option disabled value="">Stock</option>
                        <option value="Disponible">Disponible</option>
                        <option value="Agotado">Agotado</option>
                    </select>
                </div>
                <div>
                    <InputLabel for="color" value="Color" />
                    <TextInput id="color" type="text" class="mt-1 block w-full" v-model="form.color" required />
                    <InputError class="mt-2" :message="form.errors.color" />
                </div>
                <div>
                    <InputLabel for="caracteristics" value="Características" />
                    <TextArea id="caracteristics" class="mt-1 block w-full" v-model="form.caracteristics" required />
                    <InputError class="mt-2" :message="form.errors.caracteristics" />
                </div>
                <div>
                    <button type="submit">Actualizar</button>
                </div>
            </form>
        </div>
    </MainLayout>
</template>

<style scoped></style>

