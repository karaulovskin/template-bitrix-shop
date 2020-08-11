export default class CardAudio {
    buttonPlay = '[data-card-audio-play]';
    audio = '[data-card-audio]';

    constructor() {
        this.events();
    }

    handler($this) {
        const audio = $this.querySelector(this.audio);

        audio.play();
    }

    events() {
        const self = this;

        $(document).on('click', this.buttonPlay, function (e) {
            e.preventDefault();
            self.handler(this);
        });
    }
}