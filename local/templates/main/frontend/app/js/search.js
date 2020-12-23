export default class Search {
    container = '[data-search]';
    input = '[data-search-input]';
    tooltip = '[data-search-tooltip]';
    reset = '[data-search-reset]';
    toggle = '[data-search-toggle]';
    // btnMobileOpen = '[data-mobile-search]';

    constructor() {
        this.handlerMove();
        this.events();
    }

    tooltipToggle() {
        if ($(this.container).hasClass('active')) {
            $(this.container).addClass('is-show-tooltip');
        }

        if ($(this.input).val() === '') {
            $(this.container).removeClass('is-show-tooltip');
        }
    }

    ajax($this) {
        const self = this;
        const $reset = $this.closest('[data-search]').find('[data-search-reset]');
        const $tooltip = $this.closest('[data-search]').find('[data-search-tooltip]');

        if ($this.val()!='') {
            const q = $this.val();

            if ($(window).width() >= 1280) {
                $reset.show();
            }
            $tooltip.show();

            $.ajax({
                type: "POST",
                url: '/inc/ajax/tooltip.php',
                data: {'q':q},
                success: function(data){
                    $('[data-search-tooltip]').html(data);
                    $tooltip.show();
                    // self.checkedBasketLaded();
                }
            });
        } else {
            if ($(window).width() > 1280) {
                $reset.hide();
            }
            $tooltip.hide();
        }
    }

    tooltipClose(e) {
        const target = e.target;
        const search = $('[data-search]');

        if (search.hasClass('active') && !search.is(target) && search.has(target).length === 0) {
            search.removeClass('active is-show-tooltip');
            $(this.reset).hide();
            e.stopPropagation();
        }
    }

    resetSearch($this) {
        const $input = $this.closest(this.container).find($(this.input));
        const $reset = $this.closest('[data-search]').find('[data-search-reset]');
        const $tooltip = $this.closest(this.container).find($(this.tooltip));
        $input.focus();
        $tooltip.hide();
    }

    showSearch($this) {
        const $reset = $this.closest('[data-search]').find('[data-search-reset]');
        const $toggle = $this.closest('[data-search]').find('[data-search-toggle]');
        const $tooltip = $this.closest(this.container).find($(this.tooltip));

        if (!$(this.container).hasClass('is-show')) {
            $('html').addClass('search-is-show');
            $(this.container).addClass('is-show');
            $(this.input).val('');
            $reset.show();
            $toggle.hide();
            // $tooltip.hide();
        } else {
            $('html').removeClass('search-is-show');
            $(this.container).removeClass('is-show');
            $reset.hide();
            $toggle.show();
            $tooltip.hide();
        }
    }

    handlerMove() {
        if ($(window).width() >= 1280) {
            $('[data-mobile="search"]').find($('[data-move="search"]')).appendTo('[data-desktop="search"]');
        }
        else {
            $('[data-desktop="search"]').find($('[data-move="search"]')).appendTo('[data-mobile="search"]');
        }
    }

    // mobileSearchOpen() {
    //     $('.header-sticky__bottom').toggleClass('is-show');
    // }

    events() {
        const self = this;
        const returnedFunction = App.Debounce.init(this.ajax, 1000);

        $(window).on('resize', function() {
            self.handlerMove();
        });

        $('[data-search-input]').bind('click keyup focus', function(e){
            returnedFunction($(this));
        });

        $(document).on('click', function(e) {
            self.tooltipClose(e);
        });

        $(document).on('click', this.reset, function() {
            if ($(window).width() < 1280) {
                self.showSearch($(this));
            } else {
                self.resetSearch($(this));
            }
        });

        $(document).on('click', this.toggle, function(e) {
            if ($(window).width() < 1280) {
                e.preventDefault();
                self.showSearch($(this));
            }
        });

        // $(document).on('click', this.btnMobileOpen, function(e) {
        //     e.preventDefault();
        //     self.mobileSearchOpen();
        // });
    }
}