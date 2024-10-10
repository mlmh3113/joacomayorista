import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { createPinia } from 'pinia'; // Importa Pinia
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css'

const appName = import.meta.env.VITE_APP_NAME || 'Joaco Mayorista';

createInertiaApp({
    title: (title) => `${title} - Joaco Mayorista`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const pinia = createPinia(); // Crea una instancia de Pinia

        const app = createApp({ render: () => h(App, props) })
            .use(plugin)       // Registra el plugin de Inertia
            .use(pinia)       // Registra Pinia
            .use(ZiggyVue)    // Registra Ziggy
            .use(VueSweetalert2); // Registra Sweetalert2

        app.mount(el); // Monta la aplicación
    },
    progress: {
        color: '#4B5563',
    },
});
