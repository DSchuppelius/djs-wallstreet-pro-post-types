<?php
/*
 * Created on   : Wed Jun 22 2022
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : client.php
 * License      : GNU General Public License v3 or later
 * License Uri  : http://www.gnu.org/licenses/gpl.html
 */
function partner_type() {
    $current_setup = PostTypes_Plugin_Setup::instance();

    register_post_type(PARTNER_POST_TYPE, [
        "labels" => [
            "name" => esc_html__("Partner", DJS_POSTTYPE_PLUGIN),
            "add_new" => esc_html__("Add New", DJS_POSTTYPE_PLUGIN),
            "add_new_item" => esc_html__("Add New Partner", DJS_POSTTYPE_PLUGIN),
            "edit_item" => esc_html__("Add New", DJS_POSTTYPE_PLUGIN),
            "new_item" => esc_html__("New Link", DJS_POSTTYPE_PLUGIN),
            "all_items" => esc_html__("All Partner", DJS_POSTTYPE_PLUGIN),
            "view_item" => esc_html__("View Link", DJS_POSTTYPE_PLUGIN),
            "search_items" => esc_html__("Search Links", DJS_POSTTYPE_PLUGIN),
            "not_found" => esc_html__("No Links found", DJS_POSTTYPE_PLUGIN),
            "not_found_in_trash" => esc_html__("No Links found in Trash", DJS_POSTTYPE_PLUGIN),
        ],
        "supports" => ["title", "thumbnail"],
        "show_in" => true,
        "public" => true,
        "menu_position" => 20,
        "rewrite" => ["slug" => $current_setup->get("partner_slug")],
        "public" => true,
        "menu_icon" => DJS_POSTTYPE_PLUGIN_ASSETS_PATH_URI . "/images/partner.png",
    ]);
}
add_action("init", "partner_type");
