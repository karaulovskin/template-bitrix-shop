/*Vendors*/
import 'normalize.css';
import 'animate.css'

require("./variables.css");
require("./media.css");
require("./helpers.css");
require("./grid.css");
require("./icons.css");
require("./styles.css");
require("./fonts.css");
require("./forms.css");
require("./fancybox.css");
require("./lazy-load.css");
require("./swiper.css");
require("./icon-info-list.css");
require("./search.css");
require("./price.css");
require("./placeholder-star.css");
require("./bx-filter.css");
require("./picture-hover.css");
require("./editor.css");
require("./scrollbar.css");
require("./bx-search-order.css");
require("./bx-sbb-empty-cart.css");
require("./page-slider-scroll-magic.css");
require("./ymaps.css");

/*All components*/

function requireAll(requireContext) {
    return requireContext.keys().map(requireContext);
}
const modules = requireAll(require.context("./components", false, /.css$/));