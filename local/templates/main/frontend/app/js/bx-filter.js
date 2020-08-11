export default class BxFilter {
    mobileFilter = '[data-mobile-filter]';
    mobileFilterOpen = '[data-mobile-filter-open]';
    mobileFilterClose = '[data-mobile-filter-close]';
    box = '[data-bx-filter-box]';
    row = '[data-bx-filter-row]';
    toggleRow = '[data-bx-filter-row-toggle]';

    constructor() {
        this.filterHide();
        this.media();
        this.events();
    }

    handlerRow($this) {
        let $row = $this.closest($(this.box)).find($(this.row));

        $row
            .toggleClass('is-active')
            .slideToggle(400);
    }

    openMobileFilter() {
        this.filterShow();
        if (!$(this.mobileFilter).hasClass('is-active')) {
            $('body').addClass('is-mobile-menu-open');
            $('.overlay').addClass('is-active');
            $(this.mobileFilter).addClass('is-active');
        }
    }

    closeMobileFilter() {
        if ($(this.mobileFilter).hasClass('is-active')) {
            $('body').removeClass('is-mobile-menu-open');
            $('.overlay').removeClass('is-active');
            $(this.mobileFilter).removeClass('is-active');
        }
    }

    media() {
        if ($(window).width() >= 1280) {
            $('[data-mobile="bx-filter"]').find($('[data-move="bx-filter"]')).appendTo('[data-desktop="bx-filter"]');
        }
        else {
            $('[data-desktop="bx-filter"]').find($('[data-move="bx-filter"]')).appendTo('[data-mobile="bx-filter"]');
        }

        if ($(window).width() <= 800) {
            $('.sorting-wrapper .sorting-select__label').text('Сортировка');
        }
        else {
            $('.sorting-wrapper .sorting-select__label').text('Сортировать по');
        }
    }

    filterHide() {
        $(this.mobileFilter).css({
            "opacity" : "0",
            "visibility" : "hidden"
        });
    }

    filterShow() {
        $(this.mobileFilter).css({
            "opacity" : "1",
            "visibility" : "visible"
        });
    }

    events() {
        let self = this;

        $(document).on('click', this.toggleRow, function (e) {
            e.preventDefault();
            self.handlerRow($(this));
        });
        $(document).on('click', this.mobileFilterOpen, function (e) {
            e.preventDefault();
            self.openMobileFilter($(this));
        });
        $(document).on('click', this.mobileFilterClose, function (e) {
            e.preventDefault();
            self.closeMobileFilter($(this));
        });
        $(document).on('click', '#set_filter', function() {
            self.closeMobileFilter();
        });
        $(document).on('click', '.overlay', function() {
            self.closeMobileFilter();
        });
        $(window).on('resize', () => {this.media()});
    }
}