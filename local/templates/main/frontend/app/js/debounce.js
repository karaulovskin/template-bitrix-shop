export default class Debounce {
    constructor() {
        this.init();
    }

    init(func, wait, immediate) {
        let timeout;

        // Эта функция выполняется, когда событие DOM вызвано.
        return function executedFunction() {
            // Сохраняем контекст this и любые параметры,
            // переданные в executedFunction.
            const context = this;
            const args = arguments;

            // Функция, вызываемая по истечению времени debounce.
            const later = function() {
                // Нулевой timeout, чтобы указать, что debounce закончилась.
                timeout = null;

                // Вызываем функцию, если immediate !== true,
                // то есть, мы вызываем функцию в конце, после wait времени.
                if (!immediate) func.apply(context, args);
            };

            // Определяем, следует ли нам вызывать функцию в начале.
            const callNow = immediate && !timeout;

            // clearTimeout сбрасывает ожидание при каждом выполнении функции.
            // Это шаг, который предотвращает выполнение функции.
            clearTimeout(timeout);

            // Перезапускаем период ожидания debounce.
            // setTimeout возвращает истинное значение / truthy value
            // (оно отличается в web и node)
            timeout = setTimeout(later, wait);

            // Вызываем функцию в начале, если immediate === true
            if (callNow) func.apply(context, args);
        };
    }
}