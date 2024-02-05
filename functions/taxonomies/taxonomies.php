<?php
/*
 * Created on   : Wed Jun 22 2022
 * Author       : Hari Maliya, Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : taxonomies.php
 * License      : GNU General Public License v3 or later
 * License Uri  : http://www.gnu.org/licenses/gpl.html
 */

function create_portfolio_taxonomy() {
    $current_setup = PostTypes_Plugin_Setup::instance();

    $default_tax_id = get_option("wallstreet_theme_default_term_id");
    $tag_id = isset($_POST["tag_ID"]) ? $_POST["tag_ID"] : null;

    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $slug = isset($_POST["slug"]) ? $_POST["slug"] : "";
    $description = isset($_POST["description"]) ? $_POST["description"] : "";

    register_taxonomy(PORTFOLIO_TAXONOMY, PORTFOLIO_POST_TYPE, [
        "hierarchical" => true,
        "show_in_nav_menus" => true,
        "rewrite" => ["slug" => $current_setup->get("wallstreet_products_category_slug")],
        "label" => esc_html__("Portfolio Categories", DJS_POSTTYPE_PLUGIN),
        "query_var" => true,
    ]);

    if(!empty($tag_id)) {
        //update category
        if (isset($_POST["action"]) && isset($_POST["taxonomy"])) {
            wp_update_term($tag_id, PORTFOLIO_TAXONOMY, [
                "name" => $name,
                "slug" => $slug,
                "description" => $description,
            ]);
        } 

        // Delete default category
        if (isset($_POST["action"])) {
            if ($tag_id == $default_tax_id && $_POST["action"] == "delete-tag") {
                delete_option("custom_texo_appointment");
            }
        }
    } else {
        $myterms = get_terms(PORTFOLIO_TAXONOMY, ["hide_empty" => false]);
        if (empty($myterms)) {
            $defaultterm = wp_insert_term("ALL", PORTFOLIO_TAXONOMY, [
                "description" => esc_html__("Default Category", DJS_POSTTYPE_PLUGIN),
                "slug" => esc_html__("All", DJS_POSTTYPE_PLUGIN),
            ]);
            update_option("wallstreet_theme_default_term_id", $defaultterm["term_id"]);
        }
    }
}
add_action("init", "create_portfolio_taxonomy");
?>
