export default class Media {
    constructor() {
        this.handler();
        this.events();
    }

    handler() {
        if ($(window).width() <= 1200) {
            $('[data-desktop="sub-directory"]').find($('[data-move="sub-directory"]')).appendTo('[data-mobile="sub-directory"]');
        }
        else {
            $('[data-mobile="sub-directory"]').find($('[data-move="sub-directory"]')).appendTo('[data-desktop="sub-directory"]');
        }
    }

    events() {
        const self = this;

        $(window).on('resize', function () {
            self.handler();
        });
    }
}