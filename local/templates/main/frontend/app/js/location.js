export default class Location {
    container = '[data-location]';
    modals = '[data-modal-location]';
    modalConfirm = '[data-modal-location="confirm"]';
    modalSelect = '[data-modal-location="select"]';
    buttonOpenConfirm = '[data-location-confirm-open]';
    buttonOpenSelect = '[data-location-select-open]';
    buttonClose = '[data-modal-location-close]';

    constructor() {
        this.events();
    }

    openModalConfirm($this) {
        const $container = $this.closest($(this.container));
        const $modalConfirm = $container.find($(this.modalConfirm));
        const $modalSelect = $container.find($(this.modalSelect));

        if (!$modalConfirm.hasClass('is-show')) {
            $container.addClass('is-show');
            $modalConfirm.addClass('is-show').show();
        } else {
            $container.removeClass('is-show');
            $modalConfirm.removeClass('is-show').hide();
        }
        if ($modalSelect.hasClass('is-show')) {
            $modalSelect.removeClass('is-show').hide();
        }
    }

    openModalSelect($this) {
        const $container = $this.closest($(this.container));
        const $modalConfirm = $container.find($(this.modalConfirm));
        const $modalSelect = $container.find($(this.modalSelect));

        $modalConfirm.removeClass('is-show').hide();

        if (!$modalSelect.hasClass('is-show')) {
            $modalSelect.addClass('is-show').show();
        } else {
            $modalSelect.removeClass('is-show').hide();
        }
    }

    closeModalButton($this) {
        $(this.container).removeClass('is-show');
        const modal = $this.closest($(this.modals));
        modal.removeClass('is-show');
        modal.hide();
    }

    closeModal(e) {
        const target = e.target;

        if ($(this.modals).hasClass('is-show') && !$(this.buttonOpenConfirm).is(target) && $(this.buttonOpenConfirm).closest($(this.container)).has(target).length === 0) {
            $(this.modals).removeClass('is-show');
            $(this.modals).hide();
        }
    }

    ajax($this) {
        const self = this;

        if ($this.val()!='') {
            const q = $this.val();

            $.ajax({
                type: "POST",
                url: '/local/inc/ajax/location.php',
                data: {'q':q},
                success: function(data){
                    $('[data-location-list]').html(data);
                }
            });
        }
    }

    events() {
        const self = this;

        $(document).on('click', this.buttonOpenConfirm, function (e) {
            e.preventDefault();
            self.openModalConfirm($(this));
        });
        $(document).on('click', this.buttonOpenSelect, function (e) {
            e.preventDefault();
            self.openModalSelect($(this));
        });
        $(document).on('click', this.buttonClose, function (e) {
            e.preventDefault();
            self.closeModalButton($(this));
        });
        // $(document).on('click', function (e) {
        //     e.preventDefault();
        //     self.closeModal(e);
        // });
        $('[data-location-search]').bind('click keyup focus', function(e){
            self.ajax($(this));
        });
    }
}