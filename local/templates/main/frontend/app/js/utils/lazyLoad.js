import 'intersection-observer'
import lozad from 'lozad'

export default class LazyLoad {
    observer;

    constructor() {
        this.init();
    }
    init() {
        this.observer = lozad('[data-src], [data-background-image]', {
            loaded: function(el) {
                const img = new Image();
                img.src = el.hasAttribute('data-background-image') ? el.getAttribute('data-background-image') : el.getAttribute('data-src');
                img.onload = function () {
                    el.classList.add('lazy-loaded');
                };
                img.onerror = function () {
                    el.classList.add('lazy-error');
                };
            }
        });
        this.observer.observe();
    }
}