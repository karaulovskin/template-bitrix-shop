export default class Anchor {
    constructor() {
        this.events();
    }

    handler(href) {
        const $page = $('html, body');

        $page.animate({
            scrollTop: $(href).offset().top + "px"
        },
        {
            duration: 700,
            easing: ''
        });
        return false;
    }

    events() {
        const self = this;

        $(document).on('click', 'a[data-anchor][href*="#"]', function () {
            self.handler($(this).attr('href'));
        })
    }
}