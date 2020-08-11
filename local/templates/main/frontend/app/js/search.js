import classToggle from "./utils/classToggle";

export default class Search {
    btnMobileOpen = '[data-mobile-search]';
    constructor() {
        this.events();
    }

    tooltipToggle() {
        if ($('[data-search]').hasClass('active')) {
            $('[data-search]').addClass('is-show-tooltip');
        }

        if ($('[data-search-input]').val() === '') {
            $('[data-search]').removeClass('is-show-tooltip');
        }
    }

    ajax($this) {
        const self = this;
        const tooltip = $this.closest('[data-search]').find('[data-search-tooltip]');

        if ($this.val()!='') {
            const q = $this.val();

            tooltip.show();

            $.ajax({
                type: "POST",
                url: '/local/inc/ajax/tooltip.php',
                data: {'q':q},
                success: function(data){
                    $('[data-search-tooltip]').html(data);
                    tooltip.show();
                    self.checkedBasketLaded();
                }
            });
        } else {
            tooltip.hide();
        }
    }

    tooltipClose(e) {
        const target = e.target;
        const search = $('[data-search]');

        if (search.hasClass('active') && !search.is(target) && search.has(target).length === 0) {
            search.removeClass('active is-show-tooltip');
            e.stopPropagation();
        }
    }

    mobileSearchOpen() {
        $('.header-sticky__bottom').toggleClass('is-show');
    }

    events() {
        const self = this;

        $('[data-search-input]').bind('click keyup focus', function(e){
            self.ajax($(this));
        });

        $(document).on('click', function(e) {
            self.tooltipClose(e);
        });

        $(document).on('click', this.btnMobileOpen, function(e) {
            e.preventDefault();
            self.mobileSearchOpen();
        });
    }
}