import Alpine from '../../node_modules/alpinejs/dist/module.esm.js';
import Testimonials from "./components/testimonials.js";

window.addEventListener('DOMContentLoaded', () => {
    window.Alpine = Alpine;

    Alpine.data('Testimonials', Testimonials);

    Alpine.start();
});
