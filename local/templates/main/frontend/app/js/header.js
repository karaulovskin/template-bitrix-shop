export default class Header {
    header = '[data-header]';
    sticky = '[data-header-sticky]';
    burger = '[data-burger]';
    catalog = '[data-header-sticky-catalog]';

    constructor() {
        this.init();
        this.event();
    }

    init() {
        const $height = $(this.header).outerHeight();

        this.cloneElementsSticky();
        this.handlerMove();

        if ($(window).scrollTop() > $height + 100) {
            this.headerShow();
            this.headerFixed();
        } else {
            this.headerHide();
        }

        if ($(window).width() >= 1280) {
            $('[data-sticky="catalog"]').find($('[data-move="search"]')).appendTo('[data-sticky="search"]');
            this.headerHide();
        }
        else {
            $('[data-sticky="search"]').find($('[data-move="search"]')).appendTo('[data-sticky="catalog"]');
            this.headerShow();
        }
    }

    headerFixed() {
        const $height = $(this.header).outerHeight();

        if ($(window).scrollTop() > $height + 100) {
            $(this.sticky).addClass('header-sticky--fixed');
            this.headerShow();
        } else {
            $(this.sticky).removeClass('header-sticky--fixed');
            $(this.burger).removeClass('is-catalog-show');
            $(this.catalog).removeClass('is-show');
        }
    }

    headerHide() {
        $(this.sticky).css({
            "opacity" : "0",
            "visibility" : "hidden"
        });
    }

    headerShow() {
        $(this.sticky).css({
            "opacity" : "1",
            "visibility" : "visible"
        });
    }

    cloneElementsSticky() {
        $('[data-header="socials"]').find($('[data-move="socials"]')).clone().appendTo('[data-sticky="socials"]');
        $('[data-header="call"]').find($('[data-move="call"]')).clone().appendTo('[data-sticky="call"]');
        $('[data-header="phone"]').find($('[data-move="phone"]')).clone().appendTo('[data-sticky="phone"]');
        $('[data-header="logo"]').find($('[data-move="logo"]')).clone().appendTo('[data-sticky="logo"]');
        $('[data-header="search"]').find($('[data-move="search"]')).clone().appendTo('[data-sticky="search"]');
        $('[data-header="profile"]').find($('[data-move="profile"]')).clone().appendTo('[data-sticky="profile"]');
        $('[data-header="catalog"]').find($('[data-move="catalog"]')).clone().appendTo('[data-sticky="catalog"]');
    }

    catalogOpen() {
        if ($(window).width() >= 1280) {
            if (!$(this.burger).hasClass('is-catalog-show')) {
                $(this.burger).addClass('is-catalog-show');
                $(this.catalog).addClass('is-show');
            } else {
                $(this.burger).removeClass('is-catalog-show');
                $(this.catalog).removeClass('is-show');
            }
        } else {
            App.MobileMenu.openMenu();
        }
    }

    handlerMove() {
        if ($(window).width() >= 1280) {
            $('[data-sticky="catalog"]').find($('[data-move="search"]')).appendTo('[data-sticky="search"]');
            this.headerHide();
        }
        else {
            $('[data-sticky="search"]').find($('[data-move="search"]')).appendTo('[data-sticky="catalog"]');
            this.headerShow();
        }
    }

    event() {
        const self = this;

        $(window).on('resize', function() {
            self.handlerMove();
        });

        $(window).on('scroll', function() {
            self.headerFixed();
        });

        $(document).on('click', this.burger, function(e) {
            e.preventDefault();
            self.catalogOpen();
        });
    }
}