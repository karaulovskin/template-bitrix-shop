export default class mobileSlider {
    container = '[data-mobile-slider]';
    list = '[data-mobile-slider-list]';
    item = '[data-mobile-slider-item]';
    resize = true;

    constructor() {
        // this.init();
        // this.events();
    }

    init() {
        this.resizeHandler();
    }

    resizeHandler() {
        if($(window).width() < 800) {
            this.addClass();
        }
        else {
            this.removeClass();
        }
    }

    addClass() {
        if(this.resize) {
            $(this.container).addClass('swiper-container');
            $(this.list).addClass('swiper-wrapper');
            $(this.item).addClass('swiper-slide');
        }
    }

    removeClass() {
        if(this.resize) {
            $(this.container).removeClass('swiper-container');
            $(this.list).removeClass('swiper-wrapper');
            $(this.item).removeClass('swiper-slide');
        }
    }



    events() {
        const self = this;

        $(window).on('resize', () => {
            self.resizeHandler();
        })
    }
}