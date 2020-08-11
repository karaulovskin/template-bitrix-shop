import baron from 'baron';

export default class Scrollbar {
    clipper = '[data-scrollbar]';
    scroller = '[data-scrollbar-scroller]';
    track = '[data-scrollbar-track]';
    bar = '[data-scrollbar-bar]';

    constructor() {
        this.init();
    }

    init() {
        const self = this;

        $(this.clipper).each(function () {
            $(this).append(`
                <div data-scrollbar-track>
                    <div data-scrollbar-bar></div>
                </div>
            `);

            baron({
                root: $(this)[0],
                scroller: $(this).find(self.scroller)[0],
                track: $(this).parent().find(self.track)[0],
                bar: $(this).parent().find(self.bar)[0],
            });
        });
    }
}