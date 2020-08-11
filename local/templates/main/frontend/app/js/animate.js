export default class Animate {
    constructor() {
        this.event();
    }

    init() {
        if ($('[data-page-slider-before]').length) {
            this.animateInit();
            this.animateHandler();
        }
    }

    animateInit() {
        $('.animate').css({
            transformScale: 0,
            opacity: 0
        });
    }

    animateHandler() {
        $('[data-animate="hero-logo"]').addClass('animated-show');
        $('[data-animate="hero-logo"]')[0].addEventListener('transitionend', function (e) {
            $('#heroElement1').addClass('animated-show')
        });
        $('#heroElement1')[0].addEventListener('transitionend', function (e) {
            $('#heroElement3').addClass('animated-show')
        });
        $('#heroElement3')[0].addEventListener('transitionend', function (e) {
            $('#heroElement2').addClass('animated-show')
        });
        $('#heroElement2')[0].addEventListener('transitionend', function (e) {
            $('[data-hero-scroll]').addClass('animated-show')
        });
    }

    event() {
        $(window).on('load', () => {
            this.init();
        });
    }
}