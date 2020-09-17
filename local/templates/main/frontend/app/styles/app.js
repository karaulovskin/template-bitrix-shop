/*Vendors*/
import 'normalize.css';
import 'animate.css'

require("./variables.css");
require("./styles.css");
require("./bx-filter.css");
require("./editor.css");
require("./fancybox.css");
require("./fonts.css");
require("./forms.css");
require("./grid.css");
require("./helpers.css");
require("./icons.css");
require("./lazy-load.css");
require("./media.css");
require("./search.css");

/*All components*/

function requireAll(requireContext) {
    return requireContext.keys().map(requireContext);
}
const modules = requireAll(require.context("./components", false, /.css$/));