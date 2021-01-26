// PostCss plugins
module.exports = {
    plugins: {
        'postcss-easy-import': {},
        // 'postcss-inline-svg': {},
        'autoprefixer': {
            browsers: ['last 2 versions'],
        },
        'postcss-mixins': {},
        'postcss-for': {},
        'postcss-nested': {},
        // 'postcss-pxtorem': {
        //     selectorBlackList: ['html'],
        // },
        'postcss-extend': {},
        'postcss-custom-media': {},
        // 'postcss-nesting': {},
        'postcss-css-variables': {},   // Включаем, если нужен IE 11
        'postcss-color-function': {},
        'postcss-flexbugs-fixes': {},
        'postcss-input-style': {},
        'postcss-object-fit-images': {},
        'postcss-gradient-transparency-fix': {},
    }
};