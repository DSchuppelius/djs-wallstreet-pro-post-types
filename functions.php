<?php
/*
 * Created on   : Fri Sep 16 2022
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : functions.php
 * License      : GNU General Public License v3 or later
 * License Uri  : http://www.gnu.org/licenses/gpl.html
 */

if (!defined('DJS_POSTTYPE_PLUGIN_DIR')) {
    define("DJS_POSTTYPE_PLUGIN", dirname(plugin_basename(__FILE__)));
    define("DJS_POSTTYPE_PLUGIN_DIR", plugin_dir_path(__FILE__));
    define("DJS_POSTTYPE_PLUGIN_DIR_URI", plugin_dir_url(__FILE__));
    define("DJS_POSTTYPE_PLUGIN_ASSETS_PATH", trailingslashit(DJS_POSTTYPE_PLUGIN_DIR . "assets"));
    define("DJS_POSTTYPE_PLUGIN_ASSETS_PATH_URI", trailingslashit(DJS_POSTTYPE_PLUGIN_DIR_URI . "assets"));
    define("DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH", trailingslashit(DJS_POSTTYPE_PLUGIN_DIR . "functions"));
} elseif (DJS_POSTTYPE_PLUGIN_DIR != plugin_dir_path(__FILE__)) {
    add_action('admin_notices', function() { echo "<div class='error'><p>" . sprintf(esc_html__("%s detected a conflict; please deactivate the plugin located in %s.", DJS_POSTTYPE_PLUGIN), DJS_POSTTYPE_PLUGIN, DJS_POSTTYPE_PLUGIN_DIR) . "</p></div>"; });
    return;
}

require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "plugin/plugin_base.php");
require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "plugin/plugin_setup.php");

require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "plugin/plugin_sanitizer.php");

require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "post-type/custom-post-types.php");
require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "taxonomies/taxonomies.php");
require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "meta-box/post-meta.php");

require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "customizer/plugin_customizer.php");
require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "customizer/customizer-controls.php");
require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "customizer/customizer-relationship.php");

require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "customizer/childs/customizer-team.php");
require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "customizer/childs/customizer-client.php");
require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "customizer/childs/customizer-layout.php");
require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "customizer/childs/customizer-slider.php");
require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "customizer/childs/customizer-feature.php");
require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "customizer/childs/customizer-partner.php");
require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "customizer/childs/customizer-project.php");
require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "customizer/childs/customizer-service.php");
require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "customizer/childs/customizer-testimonial.php");

require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "customizer/childs/customizer-post-type-slugs.php");

require_once(DJS_POSTTYPE_PLUGIN_FUNCTIONS_PATH . "scripts.php");
?>
