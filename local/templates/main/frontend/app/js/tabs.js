export default class Tabs {
    container = '[data-tabs]';
    nav = '[data-tabs-nav]';
    navItem = '[data-tabs-nav-item]';
    navToggle = '[data-tabs-nav-toggle]';
    content = '[data-tabs-content]';
    contentItem = '[data-tabs-content-item]';

    constructor() {
        this.events();
    }

    handler($this) {
        let $tab = $this;
        let $container = $tab.closest(this.container);
        let $navItem = $tab.closest(this.navItem);
        let $contentItem = $container.find(this.contentItem);
        let $indx = $navItem.index();

        $contentItem.eq($indx)
            .add($navItem)
            .addClass('current')
            .siblings()
            .removeClass('current');

        if ($contentItem.eq($indx).find('.swiper-container').length) {
            $contentItem.eq($indx).find('.swiper-container')[0].swiper.update();
        }
    }

    events() {
        let self = this;

        $(document).on('click', this.navToggle, function(e) {
            e.preventDefault();
            self.handler($(this));
        });
    }
}