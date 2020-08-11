import { Swiper, Navigation, Pagination } from 'swiper/dist/js/swiper.esm.js'
import 'swiper/dist/css/swiper.min.css'

Swiper.use([Navigation, Pagination]);

export default class Sliders {
    constructor() {
        let self = this;

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

        this.sliderNew = [
            {
                'selector': '#sliderNew .swiper-container',
                'options': {
                    slideVisibleClass : 'swiper-slide-visible',
                    slidesPerView: 4,
                    spaceBetween: 30,
                    slidesPerGroup: 4,
                    speed: 700,
                    loop: true,
                    pagination: {
                        el: '#sliderNew .swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '#sliderNew .swiper-button-next',
                        prevEl: '#sliderNew .swiper-button-prev',
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

        this.sliderSmall = [
            {
                'selector': '#sliderSmall .swiper-container',
                'options': {
                    slideVisibleClass : 'swiper-slide-visible',
                    slidesPerView: 6,
                    spaceBetween: 30,
                    slidesPerGroup: 6,
                    speed: 700,
                    loop: true,
                    pagination: {
                        el: '#sliderSmall .swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '#sliderSmall .swiper-button-next',
                        prevEl: '#sliderSmall .swiper-button-prev',
                    },
                    breakpoints: {
                        800: {
                            slidesPerView: 2,
                            slidesPerGroup: 2,
                            spaceBetween: 15
                        },
                        1200: {
                            slidesPerView: 4,
                            slidesPerGroup: 4,
                            spaceBetween: 20
                        },
                    }
                }
            }
        ];

        this.sliderCard = [
            {
                'selector': '#sliderCard .swiper-container',
                'options': {
                    slideVisibleClass : 'swiper-slide-visible',
                    slidesPerView: 1,
                    spaceBetween: 0,
                    speed: 700,
                    loop: true,
                    pagination: {
                        el: '#sliderCard .swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '#sliderCard .swiper-button-next',
                        prevEl: '#sliderCard .swiper-button-prev',
                    },
                    breakpoints: {
                        750: {

                        },
                        1200: {

                        },
                    }
                }
            }
        ];

        this.slidersTabs = [
            {
                'selector': '.tabs-nav.swiper-container',
                'options': {
                    slidesPerView: 'auto',
                    freeMode: true,
                    centeredSlides: false,
                    spaceBetween: 26
                }
            }
        ];

        this.slidersNavAlphabet = [
            {
                'selector': '.nav-alphabet-nav.swiper-container',
                'options': {
                    slidesPerView: 'auto',
                    freeMode: true,
                    centeredSlides: false,
                    spaceBetween: 18
                }
            }
        ];



        this.slidersToy1 = [
            {
                'selector': '#pageSlide1 .toy-list-wrapper.swiper-container',
                'options': {
                    slidesPerView: 'auto',
                    freeMode: true,
                    centeredSlides: false,
                    spaceBetween: 5
                }
            }
        ];

        this.slidersToy2 = [
            {
                'selector': '#pageSlide2 .toy-list-wrapper.swiper-container',
                'options': {
                    slidesPerView: 'auto',
                    freeMode: true,
                    centeredSlides: false,
                    spaceBetween: 5
                }
            }
        ];

        this.slidersToy3 = [
            {
                'selector': '#pageSlide3 .toy-list-wrapper.swiper-container',
                'options': {
                    slidesPerView: 'auto',
                    freeMode: true,
                    centeredSlides: false,
                    spaceBetween: 5
                }
            }
        ];

        this.init();
        this.events();
    }

    init() {
        this.sliderHit.forEach(function (slider) {
            if ($(slider.selector).find($('.swiper-slide')).length > 4) {
                new Slider(slider.selector, slider.options)
            } else {
                $(slider.selector).closest('.slider-catalog').find('.slider-catalog__head').addClass('slider-catalog__head--nav-hide');
            }
        });

        this.sliderNew.forEach(function (slider) {
            if ($(slider.selector).find($('.swiper-slide')).length > 4) {
                new Slider(slider.selector, slider.options)
            } else {
                $(slider.selector).closest('.slider-catalog').find('.slider-catalog__head').addClass('slider-catalog__head--nav-hide');
            }
        });

        this.sliderSmall.forEach(function (slider) {
            if ($(slider.selector).find($('.swiper-slide')).length > 6) {
                new Slider(slider.selector, slider.options)
            } else {
                $(slider.selector).closest('.slider-catalog').find('.slider-catalog__head').addClass('slider-catalog__head--nav-hide');
            }
        });

        this.sliderCard.forEach(function (slider) {
            if ($(slider.selector).find($('.swiper-slide')).length > 1) {
                new Slider(slider.selector, slider.options)
            } else {
                $(slider.selector).closest('.slider-card').find('.slider-card__content').addClass('slider-card__content--nav-hide');
            }
        });

        this.slidersTabs.forEach(function (slider) {
            if ($(window).width() < 800) {
                new Slider(slider.selector, slider.options);
            }
        });

        this.slidersNavAlphabet.forEach(function (slider) {
            if ($(window).width() <= 1080) {
                new Slider(slider.selector, slider.options);
            }
        });

        this.slidersToy3.forEach(function (slider) {
            if ($(window).width() < 800) {
                new Slider(slider.selector, slider.options);
            }
        });

        this.slidersTabsInit();
        this.slidersNavAlphabetInit();
        this.slidersToyInit();
    }

    media() {
        this.slidersTabsInit();
        this.slidersNavAlphabetInit();
        this.slidersToyInit();
    }

    slidersTabsInit() {
        if ($(window).width() <= 800) {
            if (!$('[data-mobile-slider]').hasClass('swiper-container')) {
                $('[data-mobile-slider]').addClass('swiper-container');
                $('[data-mobile-slider-list]').addClass('swiper-wrapper');
                $('[data-mobile-slider-item]').addClass('swiper-slide');
                this.slidersTabs.forEach(function (slider) {
                    new Slider(slider.selector, slider.options);
                });
            }
        } else {
            if ($('[data-mobile-slider]').hasClass('swiper-container')) {
                $('[data-mobile-slider]')[0].swiper.destroy();
                $('[data-mobile-slider]').removeClass('swiper-container');
                $('[data-mobile-slider-list]').removeClass('swiper-wrapper');
                $('[data-mobile-slider-item]').removeClass('swiper-slide');
            }
        }
    }

    slidersNavAlphabetInit() {
        if ($(window).width() <= 1080) {
            if (!$('.nav-alphabet-nav').hasClass('swiper-container')) {
                $('.nav-alphabet-nav').addClass('swiper-container');
                $('.nav-alphabet-list').addClass('swiper-wrapper');
                $('.nav-alphabet-list__item').addClass('swiper-slide');
                this.slidersNavAlphabet.forEach(function (slider) {
                    new Slider(slider.selector, slider.options);
                });
            }
        } else {
            if ($('.nav-alphabet-nav').hasClass('swiper-container')) {
                $('.nav-alphabet-nav')[0].swiper.destroy();
                $('.nav-alphabet-nav').removeClass('swiper-container');
                $('.nav-alphabet-list').removeClass('swiper-wrapper');
                $('.nav-alphabet-list__item').removeClass('swiper-slide');
            }
        }
    }

    slidersToyInit() {
        let $slider = $('#pageSlide3 .toy + .toy-list-wrapper');
        if ($(window).width() <= 900) {
            if (!$slider.hasClass('swiper-container')) {
                $slider.addClass('swiper-container');
                $slider.find('.toy-list').addClass('swiper-wrapper');
                $slider.find('.toy-list__item').addClass('swiper-slide');
                this.slidersToy3.forEach(function (slider) {
                    new Slider(slider.selector, slider.options);
                });
            }
        } else {
            if ($slider.hasClass('swiper-container')) {
                $slider[0].swiper.destroy();
                $slider.removeClass('swiper-container');
                $slider('.toy-list').removeClass('swiper-wrapper');
                $slider('.toy-list__item').removeClass('swiper-slide');
            }
        }

        if ($(window).width() <= 380) {
            if (!$('#pageSlide1 .toy-list-wrapper').hasClass('swiper-container')) {
                $('#pageSlide1 .toy-list-wrapper').addClass('swiper-container');
                $('#pageSlide1 .toy-list').addClass('swiper-wrapper');
                $('#pageSlide1 .toy-list__item').addClass('swiper-slide');
                this.slidersToy1.forEach(function (slider) {
                    new Slider(slider.selector, slider.options);
                });
            }
            if (!$('#pageSlide2 .toy-list-wrapper').hasClass('swiper-container')) {
                $('#pageSlide2 .toy-list-wrapper').addClass('swiper-container');
                $('#pageSlide2 .toy-list').addClass('swiper-wrapper');
                $('#pageSlide2 .toy-list__item').addClass('swiper-slide');
                this.slidersToy2.forEach(function (slider) {
                    new Slider(slider.selector, slider.options);
                });
            }
        } else {
            if ($('#pageSlide1 .toy-list-wrapper').hasClass('swiper-container')) {
                $('#pageSlide1 .toy-list-wrapper')[0].swiper.destroy();
                $('#pageSlide1 .toy-list-wrapper').removeClass('swiper-container');
                $('#pageSlide1 .toy-list').removeClass('swiper-wrapper');
                $('#pageSlide1 .toy-list__item').removeClass('swiper-slide');
            }
            if ($('#pageSlide2 .toy-list-wrapper').hasClass('swiper-container')) {
                $('#pageSlide2 .toy-list-wrapper')[0].swiper.destroy();
                $('#pageSlide2 .toy-list-wrapper').removeClass('swiper-container');
                $('#pageSlide2 .toy-list').removeClass('swiper-wrapper');
                $('#pageSlide2 .toy-list__item').removeClass('swiper-slide');
            }
        }
    }

    events() {
        let self = this;

        $(window).on('resize', function () {
            self.media();
        })
    }
}

export class Slider {
    constructor(selector, options) {
        new Swiper(selector, options);
    }
}