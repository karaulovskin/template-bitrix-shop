import ScrollMagic from 'scrollmagic'

export default class SlideUp {
    btn = '[data-slide-up]';

    constructor() {
        this.events();
        this.showHandler();
    }

    handler() {
        const $page = $('html, body');

        $page.animate({
                scrollTop: $page.offset().top + "px"
            },
            {
                duration: 700,
                easing: ''
            });
        return false;
    }

    showHandler() {
        if ($(window).scrollTop() > screen.height) {
            $('.slide-up').addClass('show-in');
        }
        else {
            $('.slide-up').removeClass('show-in');
        }
    }

    events() {
        const self = this;

        $(window).on('scroll', function () {
            self.showHandler();
        });

        $(document).on('click', this.btn, function(e) {
            e.preventDefault();
            self.handler();
        });
    }
}