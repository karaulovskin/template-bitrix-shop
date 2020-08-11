if(window.location.hash) window.setTimeout(() => { window.scrollTo(0, 0); }, 1);

function requireAll(r) {
    r.keys().forEach(r);
}

requireAll(require.context('./icons', true, /\.svg$/));

// Load plugins
import 'jquery'
import IMask from 'imask'

import svg4everybody from 'svg4everybody'
window.svg4everybody = svg4everybody;

import objectFitImages from 'object-fit-images'
window.objectFitImages = objectFitImages;

import imagesLoaded from 'imagesloaded'
window.imagesLoaded = imagesLoaded;

// load modules
import Utils from'./js/utils/utils'
import SvgUse from'./js/svgUse'
import Forms from'./js/forms/forms'
import Modals from'./js/modals'
import Map from'./js/map'
import MapObject from'./js/map-object'
import Video from'./js/video'
import Sliders from'./js/sliders'
import PageSliderScrollMagic from'./js/page-slider-scroll-magic'
import PageSlider from'./js/page-slider'
import Anchor from'./js/anchor'
import Header from'./js/header'
import Scrollbar from'./js/scrollbar'
import CityList from'./js/scroller-horizontal'
import Animate from'./js/animate'
import Location from'./js/location'
import Search from'./js/search'
import Player from'./js/player'
import PlaceholderStar from './js/placeholder-star'
import Basket from './js/basket'
import PictureHover from './js/picture-hover'
import BxFilter from './js/bx-filter'
import Sorting from './js/sorting'
import Tabs from './js/tabs'
import CardAudio from './js/card-audio'
import Parallaxxx from './js/parallax'
import MobileMenu from './js/mobile-menu'
import SlideUp from './js/slide-up'
import mobileSlider from './js/mobile-slider'
import Media from './js/media'
import NavAlphabet from './js/nav-alphabet'
import Placeholder from './js/placeholder'

// Load styles
import './styles/app.js';

// Run components

window.App = {
    debug: false,
    lang: 'ru'
};

if (window.SITE_LANG) {
    App.lang = window.SITE_LANG;
}

if (App.debug) {
    console.log('Debug: ' + App.debug);
    console.log('Lang: ' + App.lang);
}

document.addEventListener('DOMContentLoaded', function() {
    objectFitImages();

    if('ontouchstart' in window || navigator.maxTouchPoints) $(document.body).addClass("touch");

    App.Utils = new Utils();
    App.Forms = new Forms();
    App.SvgUse = new SvgUse();
    App.Modals = new Modals();
    // App.Map = new Map();
    App.MapObject = new MapObject();
    App.Video = new Video();
    App.Sliders = new Sliders();
    // App.PageSlider = new PageSlider();
    App.PageSliderScrollMagic = new PageSliderScrollMagic();
    // App.Anchor = new Anchor();
    App.Header = new Header();
    // App.Scrollbar = new Scrollbar();
    App.CityList = new CityList();
    // App.Animate = new Animate();
    App.Location = new Location();
    App.Search = new Search();
    App.Player = new Player();
    // App.PlaceholderStar = new PlaceholderStar();
    App.Basket = new Basket();
    App.PictureHover = new PictureHover();
    App.BxFilter = new BxFilter();
    App.Sorting = new Sorting();
    App.Tabs = new Tabs();
    App.CardAudio = new CardAudio();
    // App.Parallaxxx = new Parallaxxx();
    App.MobileMenu = new MobileMenu();
    App.SlideUp = new SlideUp();
    App.mobileSlider = new mobileSlider();
    App.Media = new Media();
    App.NavAlphabet = new NavAlphabet();
    App.Placeholder = new Placeholder();

    $('[data-inputmask]').each(function () {
        IMask($(this)[0], {mask: "0 (000) 000-0000"});
    });

    $('[data-inputmask-inn]').each(function () {
        IMask($(this)[0], {mask: "0000000000"});
    });

    // prevent copying

    $('.no-select').on('selectstart', false);

    $(".no-select img").on('mousedown', false);
});