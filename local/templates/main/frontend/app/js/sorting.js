export default class Sorting {
    select = '[data-sorting]';
    optionResult = '[data-sorting-value]';
    option = '[data-sorting-dropdown-option]';

    constructor() {
        this.events();
    }

    dropdownShow($this) {
        $this.toggleClass('is-show');
    }

    handler($this) {
        const val = $this.attr('data-sorting-dropdown-option');

        $this
            .closest('.sorting-dropdown-list__item')
            .addClass('current')
            .siblings()
            .removeClass('current');
        $(this.optionResult).text(val);
    }

    events() {
        const self = this;

        $(document).on('click', this.select, function (e) {
            // e.preventDefault();
            self.dropdownShow($(this));
        });
        $(document).on('click', this.option, function (e) {
            // e.preventDefault();
            self.handler($(this));
        });
    }
}