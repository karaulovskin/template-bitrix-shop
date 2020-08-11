export default class Basket {
    constructor() {
        this.events();
    }

    handler($this) {
        const idProduct = $this.attr('data-rel');
        $('.nogoods').val(idProduct);
    }

    events() {
        const self = this;

        $(document).on('click', '[data-modal-open]', function (e) {
            e.preventDefault();
            self.handler($(this));
        });
    }
}