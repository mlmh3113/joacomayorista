import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import VueSweetalert2 from 'vue-sweetalert2';
import { createPinia } from 'pinia'; // Importa Pinia

const appName = import.meta.env.VITE_APP_NAME || 'Joaco Mayorista';

createInertiaApp({
    title: (title) => `${title} - Joaco Mayorista`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const pinia = createPinia(); // Crea una instancia de Pinia

        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(pinia) // Registra Pinia
            .use(ZiggyVue)
            .use(VueSweetalert2)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
