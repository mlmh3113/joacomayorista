import { defineStore } from "pinia";

export const useBannerStore = defineStore("banner", {
    state: () => ({
        banner: null,
    }),
    actions: {
        setBanner(banner) {
            this.banner = banner;
        },
    },
});