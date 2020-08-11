export default class Video {
    constructor() {
        this.findVideo();
    }

    findVideo() {
        let videos = document.querySelectorAll('[data-video]');

        for (let i = 0; i < videos.length; i++) {
            this.setupVideo(videos[i]);
        }
    }

    setupVideo(video) {
        var link = video.querySelector('[data-video-link]');
        var media = video.querySelector('[data-video-media]');
        var button = video.querySelector('[data-video-button]');
        var id = link.href;

        video.addEventListener('click', () => {
            var iframe = this.createIframe(id);

            link.remove();
            button.remove();
            video.appendChild(iframe);
        });

        link.removeAttribute('href');
        video.classList.add('video--enabled');
    }

    createIframe(id){
        let iframe = document.createElement('iframe');

        iframe.setAttribute('allowfullscreen', '');
        iframe.setAttribute('allow', 'autoplay');
        iframe.setAttribute('src', this.generateURL(id));
        iframe.classList.add('video__media');

        return iframe;
    }

    generateURL(id){
        console.log(id);
        let query = '?rel=0&showinfo=0&autoplay=1';
        return id + query;
    }
}