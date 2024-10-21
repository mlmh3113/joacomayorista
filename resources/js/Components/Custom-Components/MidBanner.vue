<script setup>
import { defineProps, computed } from 'vue';

const props = defineProps({
  banner: Object
});

const defaultImage = "https://res.cloudinary.com/dkoocayxp/image/upload/v1728249073/Joaco%20Mayorista/daughter-closed-her-mother-s-eye_eiuskc.png";

const bannerImage = computed(() => {
  try {
    return props.banner.images ? JSON.parse(props.banner.images) : defaultImage;
  } catch (error) {
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
      🖉
    </a>
  </div>
</template>

<style scoped>
.banner-container {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.banner-image {
  width: 100%;
  height: auto;
  object-fit: cover;
}

@media (min-width: 768px) {
  .banner-image {
    max-width: 100%; /* Ocupará el 100% del contenedor en pantallas md y más grandes */
    max-height: none; /* Permite que la imagen crezca si es necesario */
  }
}

@media (min-width: 1280px) {
  .banner-container {
    max-width: 80rem; /* 7xl en Tailwind (80rem equivale a 1280px) */
    margin: 0 auto; /* Centra el contenedor */
  }
}

.edit-icon {
  position: absolute;
  top: 10px;
  right: 10px;
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  padding: 5px;
  border-radius: 50%;
  text-decoration: none;
}
</style>
