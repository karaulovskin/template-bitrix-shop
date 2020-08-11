export default class NavAlphabet {
    constructor() {
        this.events();
    }

    handler() {
        if($(window).width() > 1080) {

        }
        else {

        }
    }

    events() {
        const self = this;

        $(window).on('resize', () => {this.handler()})
    }

}