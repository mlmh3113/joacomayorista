import { defineStore } from "pinia";

export const useImagesStore = defineStore("images", {
    state: () => ({
        images: [],
    }),
});