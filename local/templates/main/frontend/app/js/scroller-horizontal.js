import baron from "baron";

export default class CityList {
    container = '[data-scrollbar-horizontal]';
    list = '[data-scrollbar-horizontal-clipper]';
    bar = '[data-scrollbar-bar-horizontal]';

    constructor() {
        this.init();
    }

    init() {
        let self = this;
        $(this.container).each(function () {
            $(this).append(`
                <div data-scrollbar-track-horizontal>
                    <div data-scrollbar-bar-horizontal></div>
                </div>
            `);

            baron({
                root: $(this)[0],
                scroller: $(this).find(self.list)[0],
                bar: $(this).find(self.bar)[0],
                direction: 'h',
                impact: 'clipper'
            });
        });
    }
}