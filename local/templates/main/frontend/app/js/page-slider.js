import 'jquery-mousewheel';

export default class PageSlider {
    $page = $('html, body');
    toy = '[data-toy]';
    toyList = '[data-animate-toy-list]';
    toyItem = '[data-animate-toy-item="toy-item"]';
    sliderBefore = '[data-page-slider-before]';
    sliderAfter = '[data-page-slider-after]';
    anchor = '[data-hero-scroll]';
    slider = '[data-page-slider]';
    sliderContainer = '[data-page-slider-container]';
    section = '[data-page-slider-section]';
    sliderCounter = '[page-slider-counter]';
    sliderCounterValue = '[page-slider-counter-value]';
    position = 0;
    screen = 0;
    counter = 1;
    inscroll = false;
    percent = 25;

    constructor() {
        if ($(this.slider).length) {
            if($(window).width() > 1280) {
                this.events();
                this.init();
            }
        }
    }

    init() {
        this.enableLock();
        this.animateLoad();
        this.animateToyList();
        this.progressBarInit();
        this.progressBarInit(this.percent);
    }

    isInViewport(elem) {
        const bounding = elem.getBoundingClientRect();

        return (
            bounding.top >= 0 &&
            bounding.left >= 0 &&
            bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    enableLock() {
        if ($(window).scrollTop() < $(this.sliderAfter).offset().top) {
            $('body').addClass('overflow-hidden');
        }
        if ($(window).scrollTop() >= $(this.sliderAfter).offset().top) {
            $('body').removeClass('overflow-hidden');
        }
    }

    inscrollFalse() {
        this.inscroll = false;
    }

    handlerBefore(event) {
        if (!this.inscroll) {
            this.inscroll = true;
            if (event.deltaY < 0) {
                this.$page.animate({
                        scrollTop: $(this.slider).offset().top + "px"
                    },
                    {
                        duration: 700,
                        easing: ''
                    });
                return false
            }
        }
    }

    handlerAfter(event) {
        const $sectionCurrent = $(this.section).filter('.current');
        const $toy = $sectionCurrent.find($(this.toy));

        if ($(window).scrollTop() < $(this.sliderAfter).offset().top - 30) {
            if (!this.inscroll) {
                this.inscroll = true;
                if (event.deltaY > 0) {
                    $('body').addClass('overflow-hidden');
                    this.$page.animate({
                            scrollTop: $('#pageSlider').offset().top + "px"
                        },
                        {
                            duration: 700,
                            easing: ''
                        });
                    return false
                }
            }
        }
    }

    handler(event) {
        const self = this;
        const sectionCurrent = $(this.section).filter('.current');

        if (!this.inscroll) {
            this.inscroll = true;

            if (event.deltaY > 0) {
                if (sectionCurrent.prev().length) {
                    this.screen--;
                    this.counter--;
                } else {
                    this.$page.animate({
                            scrollTop: $(this.sliderBefore).offset().top - 221  + "px"
                        },
                        {
                            duration: 700,
                            easing: ''
                        });
                    return false
                }
            } else {
                if (sectionCurrent.next().length) {
                    this.screen++;
                    this.counter++;
                } else {
                    $('body').removeClass('overflow-hidden');
                    this.$page.animate({
                            scrollTop: $('#afterPageSlider').offset().top + "px"
                        },
                        {
                            duration: 700,
                            easing: ''
                        });
                    return false
                }
            }
        }

        this.slideCounter(this.counter);

        this.position = (-this.screen * 100) + '%';

        $(this.section)
            .eq(this.screen)
            .addClass('current')
            .siblings()
            .removeClass('current');
        $(this.sliderContainer).css('top', this.position);
        this.inscrollFalse();
    }

    scrollingAnchor(href) {
        this.$page.animate({
                scrollTop: $(href).offset().top + "px"
            },
            {
                duration: 700,
                easing: ''
            });
        return false;
    }

    animateLoad() {
        if (this.isInViewport($(this.toy)[0])) {
            this.animate();
        }
    }

    animate() {
        $('#toyElement1').addClass('animated-show');
        $('#toyElement1')[0].addEventListener('transitionend', function (e) {
            $('#toyElement2').addClass('animated-show');
        });
    }

    animateToyList() {
        let duration = 2000;
        if ($(this.toyItem).length) {
            if (this.isInViewport($(this.toyItem)[0])) {
                $(this.toyItem).each(function () {
                    const self = this;
                    duration += 300;
                    setTimeout(function () {
                        $(self).addClass('animated-show');
                    }, duration);
                });
            }
        }
    }

    slideCounter(counter) {
        let setProcent = counter * 25;
        $(this.sliderCounterValue).text(`0${counter}`);
        this.progressBarSet(setProcent);
    }

    progressBarInit(percent) {
        const circle = document.querySelector('.circle-counter__circle');
        const radius = circle.r.baseVal.value;
        const circumference = 2 * Math.PI * radius;
        const offset = circumference - percent / 100 * circumference;
        circle.style.strokeDasharray = `${circumference} ${circumference}`;

        setTimeout(function () {
            circle.style.opacity = 1;
            circle.style.strokeDashoffset = offset;
        }, 1000);
    }

    progressBarSet(percent) {
        const circle = document.querySelector('.circle-counter__circle');
        const radius = circle.r.baseVal.value;
        const circumference = 2 * Math.PI * radius;
        const offset = circumference - percent / 100 * circumference;

        circle.style.strokeDashoffset = offset;
    }

    events() {
        const self = this;

        $(document).on('mousewheel', this.sliderBefore, function(event) {
            self.handlerBefore(event);
        });

        $(document).on('mousewheel', this.sliderAfter, function(event) {
            self.handlerAfter(event);
        });

        $(document).on('mousewheel', this.slider, function(event) {
            self.handler(event);
        });

        $(document).on('click', this.anchor, function () {
            self.scrollingAnchor($(this).attr('href'));
        });
        //
        // $(this.sliderContainer)[0].addEventListener('transitionend', function (e) {
        //     self.inscrollFalse();
        // });
    }
}