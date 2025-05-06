<?php
/*
Plugin Name: DJS-Wallstreet-Pro Post-Types
Plugin URI: https://github.com/DSchuppelius/djs-wallstreet-pro-post-types
Update URI: https://github.com/DSchuppelius/djs-wallstreet-pro-post-types/releases/latest/
Description: Adds Post-Types to DJS-Wallstreet-Pro
Version: 1.0.0
Author: Daniel Joerg Schuppelius
Author URI: https://schuppelius.org
License: GNU General Public License v3 or later
License URI: http://www.gnu.org/licenses/gpl.html
Text Domain: djs-wallstreet-pro-post-types
Domain Path: /languages/
Requires Plugins: djs-wallstreet-pro-core
*/
defined('ABSPATH') or die('Hm, Are you ok?');

require_once "functions.php";

if (!class_exists('DJS_Wallstreet_Pro_PostTypes') && class_exists('DJS_Base')) {
    final class DJS_Wallstreet_Pro_PostTypes extends DJS_Base{
        private static $instance = null;

        private $customizers;

        // @return plugin|null
        public static function instance() {
            // Only run these methods if they haven't been ran previously
            if (null === static::$instance) {
                static::$instance = new DJS_Wallstreet_Pro_PostTypes();
                static::$instance->setup_globals();
                static::$instance->includes();
                static::$instance->setup_actions();

                add_action('plugins_loaded', [static::$instance, 'load_plugin_textdomain']);
            }

            // Always return the instance
            return static::$instance;
        }

        public function taxonomies_paged_function($query) {
            if (!is_admin() && $query->is_main_query() && is_tax(PORTFOLIO_TAXONOMY)) {
                $current_setup = PostTypes_Plugin_Setup::instance();
                $tax_page = $current_setup->get("portfolio_numbers_for_templates_category");
                $paged = get_query_var("paged") ? get_query_var("paged") : 1;
                $query->set("posts_per_page", $tax_page);
                $query->set("paged", $paged);
            }
        }

        public function mfields_set_default_object_terms($post_id, $post) {
            if ("publish" == $post->post_status && $post->post_type == PORTFOLIO_POST_TYPE) {
                $taxonomies = get_object_taxonomies($post->post_type, "object");
                foreach ($taxonomies as $taxonomy) {
                    $terms = wp_get_post_terms($post_id, $taxonomy->name);
                    $myid = get_option("wallstreet_theme_default_term_id");
                    $a = get_term_by("id", $myid, PORTFOLIO_TAXONOMY);
                    if (empty($terms)) {
                        wp_set_object_terms($post_id, $a->slug, $taxonomy->name);
                    }
                }
            }
        }

        protected function setup_globals() {
            parent::setup_globals();
            /** Versions **********************************************************/
            $this->version = '1.0.0';
            $this->db_version = 'none';
        }

        private function includes() {
        }

        private function setup_actions() {
            $this->customizers["team"] = new Plugin_Team_Customizer();
            $this->customizers["layout"] = new Plugin_Layout_Customizer();
            $this->customizers["client"] = new Plugin_Relationship_Client_Customizer();
            $this->customizers["slider"] = new Plugin_Slider_Customizer();
            $this->customizers["partner"] = new Plugin_Relationship_Partner_Customizer();
            $this->customizers["feature"] = new Plugin_Feature_Customizer();
            $this->customizers["project"] = new Plugin_Project_Customizer();
            $this->customizers["service"] = new Plugin_Service_Customizer();
            $this->customizers["testimonial"] = new Plugin_Testimonial_Customizer();

            $this->customizers["slugs"] = new Plugin_Post_Type_Slugs_Customizer();

            foreach($this->customizers as $customizer){
                $customizer->register();
            }
        }
    }

    function djs_wallstreet_pro_posttypes() {
        $instance = DJS_Wallstreet_Pro_PostTypes::instance();

        add_action("pre_get_posts", [$instance, "taxonomies_paged_function"]);
        add_action("save_post", [$instance, "mfields_set_default_object_terms"], 100, 2);

        return $instance;
    }

    if (defined('DJS_Wallstreet_Pro_PostTypes_LATE_LOAD')) {
        add_action('plugins_loaded', 'djs_wallstreet_pro_posttypes', (int)DJS_Wallstreet_Pro_PostTypes_LATE_LOAD);
    } else {
        djs_wallstreet_pro_posttypes();
    }
}