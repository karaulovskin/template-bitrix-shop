export default class SvgUse {
    constructor() {
        this.init();
    }
    init() {
        ( function( window, document )
        {

            let file = location.hostname === "localhost" || location.hostname === "127.0.0.1"
                ? './icons.svg'
                : '/local/templates/main/frontend/assets/icons.svg'
                // : '/bitrix/templates/main/icons.svg'
            ;

            const revision = window.INLINE_SVG_REVISION || false;

            if (window.SITE_TEMPLATE_PATH) file = `${SITE_TEMPLATE_PATH}/frontend/assets/icons.svg?revision=${revision ? revision : 0}`;

            if( !document.createElementNS || !document.createElementNS( 'http://www.w3.org/2000/svg', 'svg' ).createSVGRect )
                return true;

            var isLocalStorage = 'localStorage' in window && window[ 'localStorage' ] !== null,
                request,
                data,
                insertIT = function()
                {
                    var g = document.createElement('div');
                    g.id = 'svg-sprite';
                    g.className = 'hidden';
                    document.body.appendChild(g);
                    document.getElementById('svg-sprite').insertAdjacentHTML( 'afterbegin', data );
                    svg4everybody({
                        polyfill: true // polyfill <use> elements for External Content
                    });
                },
                insert = function()
                {
                    if( document.body ) insertIT();
                    else document.addEventListener( 'DOMContentLoaded', insertIT );
                };

            /*
            if( isLocalStorage && localStorage.getItem( 'inlineSVGrev' ) == revision )
            {
                data = localStorage.getItem( 'inlineSVGdata' );
                if( data )
                {
                    insert();
                    return true;
                }
            }
            */

            try
            {
                request = new XMLHttpRequest();
                request.open( 'GET', file, true );
                request.onload = function()
                {
                    if( request.status >= 200 && request.status < 400 )
                    {
                        data = request.responseText;
                        insert();
                        if( isLocalStorage )
                        {
                            localStorage.setItem( 'inlineSVGdata',  data );
                            localStorage.setItem( 'inlineSVGrev',   revision );
                        }
                    }
                };
                request.send();
            }
            catch( e ){}

        }( window, document ) );
    }
};
