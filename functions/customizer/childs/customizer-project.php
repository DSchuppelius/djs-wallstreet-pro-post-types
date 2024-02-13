<?php
/*
 * Created on   : Wed Jun 22 2022
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : customizer-project.php
 * License      : GNU General Public License v3 or later
 * License Uri  : http://www.gnu.org/licenses/gpl.html
 */

class Plugin_Project_Customizer extends Plugin_Customizer {
    
    public function __construct() {
        parent::__construct();
        $this->register_panel = true;
    }

    public function customize_register_panel($wp_customize) {
        $wp_customize->add_panel("project_setting", [
            "priority" => 250,
            "capability" => "edit_theme_options",
            "title" => esc_html__("Project settings", DJS_POSTTYPE_PLUGIN),
        ]);        
    }

    public function customize_register_section($wp_customize) {
        $wp_customize->add_section("project_section_settings", [
            "title" => esc_html__("Homepage project settings", DJS_POSTTYPE_PLUGIN),
            "panel" => "project_setting",
            "description" => ""
        ]);
    }

    public function customize_register_settings_and_controls($wp_customize) {    
        //Column Layout
        $wp_customize->add_setting($this->theme_options_name . "[portfolio_homepage_column_layouts]", [
            "default" => 3,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[portfolio_homepage_column_layouts]", [
            "type" => "radio",
            "label" => esc_html__("Portfolio Column layout section", DJS_POSTTYPE_PLUGIN),
            "section" => "project_section_settings",
            "choices" => [
                3 => "4 Column Layout",
                4 => "3 Column Layout",
                6 => "2 Column Layout",
            ],
        ]);
    
        //Item Layout
        $wp_customize->add_setting($this->theme_options_name . "[portfolio_homepage_item_layouts]", [
            "default" => "single-items",
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[portfolio_homepage_item_layouts]", [
            "type" => "radio",
            "label" => esc_html__("Portfolio item layout section", DJS_POSTTYPE_PLUGIN),
            "section" => "project_section_settings",
            "choices" => [
                "clover-items" => esc_html__("Clover (Only for 4 Column Layout)", DJS_POSTTYPE_PLUGIN),
                "block-items" => esc_html__("Block", DJS_POSTTYPE_PLUGIN),
                "single-items" => esc_html__("Single", DJS_POSTTYPE_PLUGIN),
            ],
        ]);
    
        // Number of Portfolio section
        $wp_customize->add_setting($this->theme_options_name . "[portfolio_list]", [
            "default" => 4,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[portfolio_list]", [
            "type" => "number",
            "label" => esc_html__("Number of portfolio on portfolio section", DJS_POSTTYPE_PLUGIN),
            "section" => "project_section_settings",
            "input_attrs" => [
                "min" => "1",
                "step" => "1",
                "max" => "24",
            ],
        ]);
    
        //Project Title
        $wp_customize->add_setting($this->theme_options_name . "[portfolio_title]", [
            "default" => esc_html__("Featured portfolio", DJS_POSTTYPE_PLUGIN),
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[portfolio_title]", [
            "label" => esc_html__("Title", DJS_POSTTYPE_PLUGIN),
            "section" => "project_section_settings",
            "type" => "text",
        ]);
    
        //Project Description
        $wp_customize->add_setting($this->theme_options_name . "[portfolio_description]", [
            "default" => esc_html__("Most popular of our works.", DJS_POSTTYPE_PLUGIN),
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[portfolio_description]", [
            "label" => esc_html__("Description", DJS_POSTTYPE_PLUGIN),
            "section" => "project_section_settings",
            "type" => "text",
        ]);
    
        //View all portfolio Button Link
        $wp_customize->add_setting($this->theme_options_name . "[view_all_projects_btn_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[view_all_projects_btn_enabled]", [
            "label" => esc_html__("Enable view all portfolios button", DJS_POSTTYPE_PLUGIN),
            "section" => "project_section_settings",
            "type" => "checkbox",
        ]);
    
        //Project Project Button text
        $wp_customize->add_setting($this->theme_options_name . "[portfolio_more_text]", [
            "default" => esc_html__("View All Projects", DJS_POSTTYPE_PLUGIN),
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[portfolio_more_text]", [
            "label" => esc_html__("Button Text", DJS_POSTTYPE_PLUGIN),
            "section" => "project_section_settings",
            "type" => "text",
        ]);
    
        //View all portfolio Button Link
        $wp_customize->add_setting($this->theme_options_name . "[portfolio_more_link]", [
            "default" => "#",
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_url",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[portfolio_more_link]", [
            "label" => esc_html__("Button Link", DJS_POSTTYPE_PLUGIN),
            "section" => "project_section_settings",
            "type" => "text",
        ]);
    
        //View all portfolio Button Link
        $wp_customize->add_setting($this->theme_options_name . "[portfolio_more_link_target]", [
            "default" => false,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
            "description" => "Open link in a new window/tab",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[portfolio_more_link_target]", [
            "label" => esc_html__("Open link in new tab", DJS_POSTTYPE_PLUGIN),
            "section" => "project_section_settings",
            "type" => "checkbox",
        ]);
    
        $wp_customize->add_setting("project", [
            "default" => "",
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_control(
            new WP_Project_Customize_Control($wp_customize, "project", [
                "section" => "project_section_settings",
            ])
        );
    }
} ?>
