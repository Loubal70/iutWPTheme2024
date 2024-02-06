import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

export default function Testimonials() {
    return {
        swiperInstance: null,
        wrapper: null,

        init() {
            this.bind();
            this.start();
            this.watchResize();
        },

        bind() {
            this.wrapper = this.$el.querySelector('.swiper-wrapper');

            this.start = this.start.bind(this);
            this.watchResize = this.watchResize.bind(this);
            this.destroyInstance = this.destroyInstance.bind(this);
            this.initInstance = this.initInstance.bind(this);
        },

        start() {
            this.initInstance();
        },

        watchResize() {
            window.matchMedia('(min-width: 1024px)').addEventListener('change', (e) => {
                if (e.matches) {
                    this.destroyInstance();
                } else {
                    this.initInstance();
                }
            });
        },

        destroyInstance() {
            this.wrapper.removeAttribute('style');
            this.wrapper.classList.remove('swiper-wrapper');

            if (!this.swiperInstance) return;
            this.swiperInstance.destroy();
            this.swiperInstance = null;
        },

        initInstance() {
            this.wrapper.classList.add('swiper-wrapper');
            this.swiperInstance = new Swiper(this.$el, {
                slidesPerView: 2,
                spaceBetween: 10,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        }
    }
}
