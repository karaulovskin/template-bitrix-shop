// import ScrollMagic from 'scrollmagic'
import Skrollr from 'skrollr'
import MobileDetect  from 'mobile-detect'

export default class PageSliderScrollMagic {
    pageSlider = '[data-page-slider]';

    constructor() {
        if ($('#pageSlider').length) {
            this.media();
            this.events();
            this.counterInit();
        }
    }

    media() {
        let md = new MobileDetect(window.navigator.userAgent);

        if (!md.mobile()) {
            $(this.pageSlider).removeClass('page-slider--mobile');
            this.init();
        } else {
            $(this.pageSlider).addClass('page-slider--mobile');
        }

        this.counterInit();
    }

    init() {
        const s = Skrollr.init({
            forceHeight: false,
            render: function(data) {

                //Log the current scroll position.
                // console.log(data.curTop);

                const circle = document.querySelector('.circle-counter__circle');
                const $circleValue = $('[page-slider-counter-value]');
                const offset = 182;

                if (data.curTop >= 1000 && data.curTop < 5900) {
                    const offset = data.curTop / 38 + 155;
                    circle.style.strokeDasharray = offset;
                }
                else if (data.curTop >= 5900) {
                    const offset = data.curTop / 18.8;
                    circle.style.strokeDasharray = offset;
                }

                if(data.curTop > 3000 && data.curTop <= 4600 ) {
                    $circleValue.text('02');
                }
                else if (data.curTop > 4600 && data.curTop <= 5900) {
                    $circleValue.text('03');
                }
                else if (data.curTop > 5900) {
                    $circleValue.text('04');
                }
                else {
                    $circleValue.text('01');
                }
            }
        });
    }

    counterInit() {
        if ($(window).width() > 480 ) {
            $('.circle-counter__circle').attr({
                cx: 30,
                cy: 30,
                r: 29
            })
        }
        else {
            $('.circle-counter__circle').attr({
                cx: 15,
                cy: 15,
                r: 14
            })
        }
    }

    events() {
        const self = this;

        $(window).on('resize', function() {
            self.media();
        });

    }
}