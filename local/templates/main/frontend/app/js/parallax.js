import Parallax from 'parallax-js'

export default class Parallaxxx {
    constructor() {
        // this.event();
    }

    init() {

        if(document.getElementById('stocksElement1')) {
            var scene = document.getElementById('stocksElement1');
            var parallaxInstance = new Parallax(scene);
        }
    }

    event() {
        if($("#stocksElement1").length) {
            $(window).on('load', () => { this.init(); });
        }
    }
}