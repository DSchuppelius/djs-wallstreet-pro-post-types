<?php
/*
 * Created on   : Wed Jun 22 2022
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : plugin_setup_data.php
 * License      : GNU General Public License v3 or later
 * License Uri  : http://www.gnu.org/licenses/gpl.html
 */

class PostTypes_Plugin_Setup extends Plugin_Setup {
    // @return plugin|null
    public static function instance() {
        // Store the instance locally to avoid private static replication
        static $instance = null;

        // Only run these methods if they haven't been ran previously
        if (null === $instance) {
            $instance = new PostTypes_Plugin_Setup();
            $instance->load_current_setup();
        }

        // Always return the instance
        return $instance;
    }

    protected function get_initial_setup() {
        return [
            // Slider
            "home_slider_enabled" => true,
            "slidertype" => "base",
            "revolutionslidername" => "startslider",
            "animation" => "slide",
            "animationSpeed" => "1500",
            "slide_direction" => "horizontal",
            "slideshowSpeed" => "2500",
            "slideroundcorner" => "100",
            "home_slider_desktop_title_enabled" => true,
            "home_slider_desktop_subtitle_enabled" => true,
            "home_slider_desktop_desc_enabled" => true,
            "home_slider_desktop_button_enabled" => true,

            "home_slider_mobile_title_enabled" => true,
            "home_slider_mobile_subtitle_enabled" => true,
            "home_slider_mobile_desc_enabled" => true,
            "home_slider_mobile_button_enabled" => true,

            // About
            "about_team_section_show_hide" => true,
            "about_callout_section_show_hide" => true,
            "about_team_title" => "Our great team",
            "about_team_description" => "We offer great services to our clients",

            // Service
            "other_service_section_enabled" => true,
            "service_list" => 3,
            "service_variation" => 1,
            "service_title" => "Our Services",
            "service_description" => "We offer great services to our clients",
            "other_service_title" => "Other services",
            "other_service_description" => "We offer great services to our clients",
            "service_hover_change_effect" => true,
            "service_middle_extrapadding" => false,

            // Portfolio
            "view_all_projects_btn_enabled" => true,
            "portfolio_homepage_item_layouts" => "single-items",
            "portfolio_homepage_column_layouts" => 3,
            "portfolio_list" => 4,
            "portfolio_title" => "Featured portfolio",
            "portfolio_description" => "Most popular of our works.",
            "related_portfolio_title" => "Related projects",
            "related_portfolio_description" => "We offer great services to our clients",
            "two_thre_four_col_port_tem_title" => "Our Portfolio",
            "two_thre_four_col_port_tem_desc" => "Most popular of our works",
            "portfolio_numbers_on_templates" => 4,
            "portfolio_numbers_for_templates_category" => 8,
            "portfolio_more_text" => "View All Projects",
            "portfolio_more_link" => "",
            "portfolio_more_link_target" => false,
            "related_portfolio_project_hide_show" => true,

            // Taxonomy Archive Portfolio
            "taxonomy_portfolio_list" => 2,
            "wallstreet_products_category_slug" => "portfolio-categories",
            "wallstreet_taxonomy_title" => "Featured portfolio",
            "wallstreet_taxonomy_desc" => "Most popular of our works.",

            // Theme Features
            "theme_feature_enabled" => true,
            "theme_feature_image" => DJS_POSTTYPE_PLUGIN_ASSETS_PATH_URI . "/images/desk-image.png",
            "feature_image_link" => "#",
            "image_link_target" => true,
            "theme_feature_title" => "Core features of theme",
            "theme_first_feature_icon" => "fa-sliders",
            "theme_first_title" => "Incredibly flexible",
            "theme_first_description" => "Perspiciatis unde omnis iste natus error sit voluptaem omnis iste.",
            "theme_second_feature_icon" => "fa-paper-plane-o",
            "theme_second_title" => "Incredibly flexible",
            "theme_second_description" => "Perspiciatis unde omnis iste natus error sit voluptaem omnis iste.",
            "theme_third_feature_icon" => "fa-bolt",
            "theme_third_title" => "Incredibly flexible",
            "theme_third_description" => "Perspiciatis unde omnis iste natus error sit voluptaem omnis iste.",
            "theme_feature_background" => DJS_POSTTYPE_PLUGIN_ASSETS_PATH_URI . "/images/tweet-bg.jpg",
            "theme_feature_background_fixed" => false,

            // Client
            "client_list" => "",
            "total_client" => "",
            "home_client_title" => "Our Clients",
            "home_client_description" => "Have a look at our clients we are growing their business and they are going up in the market by beating their competitors.",
            "client_pictureheight" => 100,
            "client_padding_tb" => 30,
            "client_padding_lr" => 30,

            // Partner
            "partner_list" => "",
            "total_partner" => "",
            "home_partner_title" => "Our Partners",
            "home_partner_description" => "Take a look at our partners. With their help, we expand your company and leave your competitors behind.",
            "partner_pictureheight" => 100,
            "partner_padding_tb" => 30,
            "partner_padding_lr" => 30,

            // Home Team Section
            "team_design_style" => 1,
            "team_design_layout_style" => 4,
            "home_team_title" => "The Team",
            "home_team_description" => "Meet Our Experts",

            // Team Template Section
            "team_template_team_section_show_hide" => true,
            "team_template_feature_section_show_hide" => true,
            "team_template_client_section_show_hide" => true,

            // Testimonial template section
            "testimonial_template_cta_section_show_hide" => true,
            "testimonial_cta_title" => "Why choose us",
            "testimonial_cta_description" => "We offer great services to our clients",
            "testimonial_template_testimonial_section_show_hide" => true,
            "testimonial_template_client_section_show_hide" => true,

            "head_one_team" => "Meet our",
            "head_two_team" => "Great team",
            "related_project_heading" => "Related projects",

            // Front page
            "front_page_data" => "service,portfolio,team,testimonials,blog,features,client,partner",

            // Slug
            "slider_slug" => "slider",
            "service_slug" => "service",
            "team_slug" => "team",
            "portfolio_slug" => "portfolio",
            "client_slug" => "client",
            "partner_slug" => "partner",
            "testimonial_slug" => "testimonial",

            // Testimonial Settings
            "testimonial_slide_type" => "scroll",
            "testimonial_design_style" => 1,
            "testimonial_scroll_items" => "1",
            "testimonial_timeout_duration" => "2000",
            "testimonial_scroll_duration" => "1500",
            "testimonial_background" => DJS_POSTTYPE_PLUGIN_ASSETS_PATH_URI . "/images/testimonial-bg.jpg",
        ];
    }

    protected function get_translated_setup() {
        return [
            // About
            "about_team_title" => __("Our great team", DJS_POSTTYPE_PLUGIN),
            "about_team_description" => __("We offer great services to our clients", DJS_POSTTYPE_PLUGIN),

            // Service
            "service_title" => __("Our Services", DJS_POSTTYPE_PLUGIN),
            "service_description" => __("We offer great services to our clients", DJS_POSTTYPE_PLUGIN),
            "other_service_title" => __("Other services", DJS_POSTTYPE_PLUGIN),
            "other_service_description" => __("We offer great services to our clients", DJS_POSTTYPE_PLUGIN),

            // Portfolio
            "portfolio_title" => __("Featured portfolio", DJS_POSTTYPE_PLUGIN),
            "portfolio_description" => __("Most popular of our works.", DJS_POSTTYPE_PLUGIN),
            "related_portfolio_title" => __("Related projects", DJS_POSTTYPE_PLUGIN),
            "related_portfolio_description" => __("We offer great services to our clients", DJS_POSTTYPE_PLUGIN),
            "two_thre_four_col_port_tem_title" => __("Our Portfolio", DJS_POSTTYPE_PLUGIN),
            "two_thre_four_col_port_tem_desc" => __("Most popular of our works", DJS_POSTTYPE_PLUGIN),
            "portfolio_more_text" => __("View All Projects", DJS_POSTTYPE_PLUGIN),
            // Taxonomy Archive Portfolio
            "wallstreet_taxonomy_title" => __("Featured portfolio", DJS_POSTTYPE_PLUGIN),
            "wallstreet_taxonomy_desc" => __("Most popular of our works.", DJS_POSTTYPE_PLUGIN),

            // Theme Features
            "theme_feature_title" => __("Core features of theme", DJS_POSTTYPE_PLUGIN),
            "theme_first_title" => __("Incredibly flexible", DJS_POSTTYPE_PLUGIN),
            "theme_second_title" => __("Incredibly flexible", DJS_POSTTYPE_PLUGIN),
            "theme_third_title" => __("Incredibly flexible", DJS_POSTTYPE_PLUGIN),
            "theme_feature_background" => DJS_POSTTYPE_PLUGIN_ASSETS_PATH_URI . "/images/tweet-bg.jpg",

            // Client
            "home_client_title" => __("Our Clients", DJS_POSTTYPE_PLUGIN),
            "home_client_description" => __("Have a look at our clients we are growing their business and they are going up in the market by beating their competitors.", DJS_POSTTYPE_PLUGIN),

            // Partner
            "home_partner_title" => __("Our Partners", DJS_POSTTYPE_PLUGIN),
            "home_partner_description" => __("Take a look at our partners. With their help, we expand your company and leave your competitors behind.", DJS_POSTTYPE_PLUGIN),

            // Home Team Section
            "home_team_title" => __("The Team", DJS_POSTTYPE_PLUGIN),
            "home_team_description" => __("Meet Our Experts", DJS_POSTTYPE_PLUGIN),

            // Testimonial template section
            "testimonial_cta_title" => __("Why choose us", DJS_POSTTYPE_PLUGIN),
            "testimonial_cta_description" => __("We offer great services to our clients", DJS_POSTTYPE_PLUGIN),

            "head_one_team" => __("Meet our", DJS_POSTTYPE_PLUGIN),
            "head_two_team" => __("Great team", DJS_POSTTYPE_PLUGIN),
            "related_project_heading" => __("Related projects", DJS_POSTTYPE_PLUGIN),
        ];
    }
}
?>