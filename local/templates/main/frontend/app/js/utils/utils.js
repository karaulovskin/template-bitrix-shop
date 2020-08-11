import Adaptive from './adaptive'
import ClassToggle from './classToggle'
import LazyLoad from './LazyLoad'
import {GetAttr} from './getAttr'
import {getCookie, setCookie} from './cookie'

export default class {
    LazyLoad = new LazyLoad();
    Adaptive = new Adaptive();
    ClassToggle = new ClassToggle();
    getAttr = GetAttr;
    getCookie = getCookie;
    setCookie = setCookie;

    declOfNum(number, titles) {
        let cases = [2, 0, 1, 1, 1, 2];
        return titles[ (number%100>4 && number%100<20)? 2 : cases[(number%10<5)?number%10:5] ];
    }
}