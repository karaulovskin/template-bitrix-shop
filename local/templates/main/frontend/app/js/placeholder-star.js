export default class PlaceholderStar {
    $inputs = $('input.input--required');
    constructor() {
        this.init();
        this.events();
    }

    init() {
        const self = this;

        this.$inputs.each(function () {
            let
                $this = $(this),
                placeholderText =  $this.attr('placeholder');

            $this.closest('label').append(`
                <div data-placeholder>
                    <div data-placeholder-label></div>
                    <div data-placeholder-star>*</div>
                </div>
            `);

            $this.attr('placeholder', '');
            $this.siblings('[data-placeholder]').find('[data-placeholder-label]').text(placeholderText);

            self.handler($this);

        });
    }

    handler($this) {
        if (!$this.val() == '') {
            $this.siblings('[data-placeholder]').hide();
        } else {
            $this.siblings('[data-placeholder]').show();
        }

    }

    events() {
        const
            self = this;

        $(this.$inputs).on('keyup', function() {
            self.handler($(this));
        });

    }
}