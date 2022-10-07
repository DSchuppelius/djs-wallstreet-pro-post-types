<?php
/*
 * Created on   : Fri Sep 16 2022
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : scripts.php
 * License      : GNU General Public License v3 or later
 * License Uri  : http://www.gnu.org/licenses/gpl.html
 */

function plugin_posttype_custom_enqueue_css() {
    global $pagenow;

    if (in_array($pagenow, ["post.php", "post-new.php", "page-new.php", "page.php"])) {
        wp_enqueue_style("post-type_meta-box-css",  DJS_POSTTYPE_PLUGIN_ASSETS_PATH_URI . "css/admin/meta-box.css");
    }

    wp_enqueue_style("drag-drop",                   DJS_POSTTYPE_PLUGIN_ASSETS_PATH_URI . "customizer/drag-drop.css");
}
add_action("admin_print_styles", "plugin_posttype_custom_enqueue_css", 10);
?>
