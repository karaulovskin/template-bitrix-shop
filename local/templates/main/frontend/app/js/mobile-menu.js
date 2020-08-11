export default class MobileMenu {
    burger = '[data-mobile-burger]';
    section = '[data-mobile-section]';
    menu = '[data-mobile-menu]';
    menuList = '[data-mobile-menu-list]';
    menuItem = '[data-mobile-menu-item]';
    subMenuOpen = '[data-mobile-menu-sub-open]';
    buttonClose = '[data-mobile-menu-close]';
    buttonBack = '[data-mobile-menu-back]';
    buttonCatalogOpen = '[data-mobile-catalog-open]';

    constructor() {
        this.init();
        this.events();
    }

    init() {
        this.menuHide();
        this.cloneElementsMobileMenu();

        const mobileCatalog = $('[data-header="catalog"]')
            .find($('[data-move="catalog"]'))
            .clone()
            .appendTo('[data-mobile="catalog"]')
            .removeAttr('data-move')
            .attr('data-mobile-menu-list', '');

        const mobileCatalogItem = mobileCatalog
            .find($('.header-catalog-list__item'))
            .attr('data-mobile-menu-item', '');

        const mobileCatalogLink = mobileCatalogItem
            .find($('.header-catalog-list__link'));

        mobileCatalogLink.each(function(){
            if ($(this).siblings('.header-sub-catalog-list').length) {
                const cloneLink = $(this).clone();

                $(this).append(`
                    <button class="header-catalog-list__next arrow-next" data-mobile-menu-sub-open>
                        <svg class="i-icon arrow-next__icon">
                            <use xlink:href="#icon-arrow-next"></use>
                        </svg>
                    </button>
                `);

                $(this)
                    .siblings('.header-sub-catalog-list')
                    .prepend(`
                        <li class="header-sub-catalog-list__item"></li>
                    `);

                $(this)
                    .siblings('.header-sub-catalog-list')
                    .find('.header-sub-catalog-list__item')
                    .first()
                    .append(cloneLink);

            }
        });
    }

    cloneElementsMobileMenu() {
        $('[data-move="nav"]').clone().appendTo('[data-mobile="nav"]');
        $('[data-header]').find($('[data-location]')).clone().appendTo('[data-mobile="location"]');
        $('[data-header="phone"]').find($('[data-move="phone"]')).clone().appendTo('[data-mobile="call"]');
        $('[data-header="call"]').find($('[data-move="call"]')).clone().appendTo('[data-mobile="call"]');
    }

    openMenu() {
        this.menuShow();
        if (!$(this.menu).hasClass('is-active')) {
            $('body').addClass('is-mobile-menu-open');
            $('.overlay').addClass('is-active');
            $(this.menu).addClass('is-active');
        }
    }

    closeMenu() {
        let self = this;
        if ($(this.menu).hasClass('is-active')) {
            $('body').removeClass('is-mobile-menu-open');
            $('.overlay').removeClass('is-active');
            $(this.menu).removeClass('is-active');
            setTimeout(function() {
                self.closeCatalog();
                self.moveSectionRight();
            }, 800);
        }
    }

    moveSectionLeft() {
        $(this.section).addClass('move-left');
    }

    moveSectionRight() {
        $(this.section).removeClass('move-left');
    }

    openCatalog($this) {
        let self = this;
        let $item = $this.closest($(this.menuItem));

        if(!$(this.menuList).hasClass('is-hide')) {
            $(this.menuList).addClass('is-hide');
            $item.addClass('is-active');
            setTimeout(function() {
                $(self.buttonBack).addClass('is-active');
            }, 400);
        }
    }

    closeCatalog() {
        if($(this.menuList).hasClass('is-hide')) {
            $(this.menuItem).removeClass('is-active');
            $(this.menuList).removeClass('is-hide');
            $(this.buttonBack).removeClass('is-active');
        } else {
            this.moveSectionRight();
        }
    }

    menuHide() {
        $(this.menu).css({
            "opacity" : "0",
            "visibility" : "hidden"
        });
    }

    menuShow() {
        $(this.menu).css({
            "opacity" : "1",
            "visibility" : "visible"
        });
    }

    media() {
        if ($(window).width() < 1280) {
            this.menuShow();
        }
        else {
            this.menuHide();
        }
    }

    events() {
        let self = this;

        $(document).on('click', this.burger, function() {
            self.openMenu();
        });
        $(document).on('click', this.buttonClose, function() {
            self.closeMenu();
        });
        $(document).on('click', this.subMenuOpen, function(e) {
            e.preventDefault();
            self.openCatalog($(this));
        });
        $(document).on('click', this.buttonBack, function() {
            self.closeCatalog();
        });
        $(document).on('click', this.buttonCatalogOpen, function() {
            self.moveSectionLeft();
        });
        $(document).on('click', '.overlay', function() {
            self.closeMenu();
        });
        $(window).on('resize', () => {this.media();})
    }
}