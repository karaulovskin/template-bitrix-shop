export default class Placeholder {
    constructor() {
        this.init();
        this.events();
    }

    init() {
        let $inputs = $('.label .input');

        $inputs.each(function() {
            let $this = $(this);
            if(!$this.val() == '') {
                $this.closest('.label').addClass('not-empty');
            }
            else {
                $this.closest('.label').removeClass('not-empty');
            }
        });
        this.bxHandler();
    }

    handler($this) {
        if(!$this.val() == '') {
            $this.closest('.label').addClass('not-empty');
        }
        else {
            $this.closest('.label').removeClass('not-empty');
        }
    }

    bxHandler() {
        const $input = $('input.bx-ui-sls-fake');

        $input.attr('placeholder', '');
        this.handler($input);
    }

    events() {
        const self = this;

        $(document).on('change', '.label .input', function () {
            self.handler($(this));
        });

        $(document).on('change', 'input.bx-ui-sls-fake', function () {
            self.handler($(this));
        });
    }
}