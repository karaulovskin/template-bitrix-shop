import { Swiper, Navigation, Pagination } from 'swiper/dist/js/swiper.esm.js'
import 'swiper/dist/css/swiper.min.css'

Swiper.use([Navigation, Pagination]);

export default class Sliders {
    constructor() {
        this.sliderHit = [
            {
                'selector': '#sliderHit .swiper-container',
                'options': {
                    slidesPerView: 4,
                    spaceBetween: 30,
                    slidesPerGroup: 4,
                    speed: 700,
                    loop: true,
                    pagination: {
                        el: '#sliderHit .swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '#sliderHit .swiper-button-next',
                        prevEl: '#sliderHit .swiper-button-prev',
                    },
                    breakpoints: {
                        800: {
                            slidesPerView: 2,
                            slidesPerGroup: 2,
                            spaceBetween: 15
                        },
                        1200: {
                            slidesPerView: 3,
                            slidesPerGroup: 3,
                            spaceBetween: 20
                        },
                    }
                }
            }
        ];

        this.init();
    }

    init() {
        this.sliderHit.forEach(function (slider) {
            if ($(slider.selector).find($('.swiper-slide')).length > 4) {
                new Slider(slider.selector, slider.options)
            } else {
                $(slider.selector).closest('.slider-catalog').find('.slider-catalog__head').addClass('slider-catalog__head--nav-hide');
            }
        });
    }
}

export class Slider {
    constructor(selector, options) {
        new Swiper(selector, options);
    }
}