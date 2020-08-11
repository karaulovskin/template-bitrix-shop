export default class Adaptive {
    breakpointsArray = ['mobile', 'tablet', 'desktop'];
    current = null;

    constructor() {
        this.checkCurrent();
        this.events();
    }

    mobile(width) {return width < 750}
    tablet(width) {return width > 750 && width < 1366}
    desktop(width) {return width > 1366}

    events() {
        $(window).on('resize', () => this.checkCurrent());
    }

    checkCurrent() {
        var self = this;
        this.breakpointsArray.forEach(function (item) {
            self[item](window.innerWidth) ? self.current = item : null
        });
    }
}
