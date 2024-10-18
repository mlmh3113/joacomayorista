<script setup>
import { defineProps, computed } from 'vue';

const props = defineProps({
  banner: Object
});

// Constante para la imagen por defecto
const defaultImage = "https://res.cloudinary.com/dkoocayxp/image/upload/v1728249073/Joaco%20Mayorista/daughter-closed-her-mother-s-eye_eiuskc.png";

// Computed para procesar la imagen del banner y remover las comillas escapadas si existen
const bannerImage = computed(() => {
  // Intentamos parsear el campo 'images' si es una cadena escapada
  try {
    return props.banner.images ? JSON.parse(props.banner.images) : defaultImage;
  } catch (error) {
    // Si falla el parseo, simplemente usamos el valor tal cual o la imagen por defecto
    return props.banner.images || defaultImage;
  }
});
</script>

<template>
  <div class="banner-container">
  
    <!-- Renderizamos el banner recibido -->
    <img
      :src="bannerImage"
      alt="Banner"
      class="banner-image"
    />

    <!-- Icono de editar, visible solo si $page.props.auth.user existe -->
    <a v-if="$page.props.auth.user" :href="route('banner.edit')" class="edit-icon">
      🖉 <!-- Puedes cambiar este icono por cualquier otro o usar una librería de iconos -->
    </a>
  </div>
</template>

<style scoped>
.banner-container {
  position: relative; /* Necesario para posicionar el ícono sobre la imagen */
  width: 100%;
  overflow: hidden; /* Asegura que no haya desbordamiento */
}

.banner-image {
  width: 100%;
  height: auto; /* Mantiene la proporción */
  max-height: 300px; /* Ajusta la altura máxima según lo necesario */
  object-fit: cover; /* Cubre el contenedor sin distorsionar la imagen */
}

.edit-icon {
  position: absolute; /* Posiciona el ícono en relación con el contenedor */
  top: 10px; /* Ajusta la posición según sea necesario */
  right: 10px;
  background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
  color: white;
  padding: 5px;
  border-radius: 50%;
  text-decoration: none;
}
</style>
