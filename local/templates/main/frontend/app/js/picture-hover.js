export default class PictureHover {
    constructor() {
        this.events();
    }

    handler($this) {
        $this.toggleClass('is-hover');
    }

    events() {
        const self = this;

        $('[data-picture-hover]').hover(
            function(){
                self.handler($(this));
            },
            function(){
                self.handler($(this));
            });
    }
}