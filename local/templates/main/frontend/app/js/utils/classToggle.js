export default class ClassToggle {
    block = '[data-class-toggle]';
    initer = '[data-class-toggle-initer]';
    closeSiblings = 'data-class-toggle-close-siblings';
    constructor() {
        this.events();
    }

    events() {
        let self = this;
        $(document).on('click', self.initer, function () {
            self.toggle($(this));
        });
    }

    toggle($item) {
        let self = this;
        let classString = self.initer.substring(1,self.initer.length - 1);
        let classToToggle = $item.attr(classString);

        if ($item.hasClass(classToToggle)) {
            this.close($item, classToToggle)
        } else {
            this.open($item, classToToggle)
        }

        if ($item.closest(this.block)[0].hasAttribute(this.closeSiblings)) {
            this.close($item.closest(this.block).siblings().find(this.initer), classToToggle)
        }

        $item.trigger('toggle::change')
    }

    close($item, classToToggle) {
        $item
            .removeClass(classToToggle)
            .closest(this.block)
            .removeClass(classToToggle)
        ;

        $item.trigger('toggle::closed')
    }

    open($item, classToToggle) {
        $item
            .addClass(classToToggle)
            .closest(this.block)
            .addClass(classToToggle)
        ;

        $item.trigger('toggle::opened')
    }
}
