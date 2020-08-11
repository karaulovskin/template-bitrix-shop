export default class FileAttach {
    initer = '.js-attach';
    attacher = '.form-file__label';

    constructor() {
        this.events();
    }

    events () {
        var self = this;
        $(document).on('change', '.js-attach', function() {
            self.attach($(this));
        });
    }

    attach ($elem) {
        var value = $elem.val() || $elem.attr('placeholder');
        $elem.parent().find(this.attacher).text(this.basename(value));
    }

    basename (path) {
        return path.replace(/\\/g,'/').replace( /.*\//, '' );
    }
}
