import { ref, onMounted } from 'vue';
import axios from 'axios';

export const useCategoriesStore = () => {
  const categories = ref([]);
  const isLoading = ref(false);
  const isError = ref(null);

  const fetchCategories = async () => {
    isLoading.value = true;
    try {
      const response = await axios.get('/categories/json');
      categories.value = response.data;
    } catch (error) {
      isError.value = error;
    } finally {
      isLoading.value = false;
    }
  };

  onMounted(() => {
    fetchCategories();
  });

  return {
    categories,
    isLoading,
    isError,
  };
};
