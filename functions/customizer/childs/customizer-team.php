<?php
/*
 * Created on   : Wed Jun 22 2022
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : customizer-team.php
 * License      : GNU General Public License v3 or later
 * License Uri  : http://www.gnu.org/licenses/gpl.html
 */

class Plugin_Theme_Team_Customizer extends Plugin_Theme_Customizer {

    public function __construct() {
        parent::__construct();
        $this->register_panel = true;
    }

    public function customize_register_panel($wp_customize) {
        //Home project Section
        $wp_customize->add_panel("team_setting", [
            "priority" => 699,
            "capability" => "edit_theme_options",
            "title" => esc_html__("Team settings", DJS_POSTTYPE_PLUGIN),
        ]);
    }

    public function customize_register_section($wp_customize) {
        $wp_customize->add_section("team_section_settings", [
            "title" => esc_html__("Homepage team settings", DJS_POSTTYPE_PLUGIN),
            "description" => "",
            "panel" => "team_setting",
        ]);
    }

    public function customize_register_settings_and_controls($wp_customize) {  
        // hometeam Design layout
        $wp_customize->add_setting($this->theme_options_name . "[team_design_style]", [
            "default" => 1,
            "type" => "option",
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[team_design_style]", [
            "type" => "select",
            "label" => esc_html__("Team design style", DJS_POSTTYPE_PLUGIN),
            "section" => "team_section_settings",
            "choices" => [
                1 => esc_html__("Style 1", DJS_POSTTYPE_PLUGIN),
                2 => esc_html__("Style 2", DJS_POSTTYPE_PLUGIN),
                3 => esc_html__("Style 3", DJS_POSTTYPE_PLUGIN),
                4 => esc_html__("Style 4", DJS_POSTTYPE_PLUGIN),
            ],
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[team_design_layout_style]", [
            "default" => 4,
            "type" => "option",
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[team_design_layout_style]", [
            "type" => "select",
            "label" => esc_html__("Team design style", DJS_POSTTYPE_PLUGIN),
            "section" => "team_section_settings",
            "choices" => [
                6 => esc_html__("2 Column Layout", DJS_POSTTYPE_PLUGIN),
                4 => esc_html__("3 Column Layout", DJS_POSTTYPE_PLUGIN),
                3 => esc_html__("4 Column Layout", DJS_POSTTYPE_PLUGIN),
            ],
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[home_team_title]", [
            "default" => esc_html__("The Team", DJS_POSTTYPE_PLUGIN),
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[home_team_title]", [
            "label" => esc_html__("Title", DJS_POSTTYPE_PLUGIN),
            "section" => "team_section_settings",
            "type" => "text",
            "priority" => 100,
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[home_team_description]", [
            "default" => esc_html__("Meet Our Experts", DJS_POSTTYPE_PLUGIN),
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[home_team_description]", [
            "label" => esc_html__("Description", DJS_POSTTYPE_PLUGIN),
            "section" => "team_section_settings",
            "type" => "text",
            "sanitize_callback" => "sanitize_text_field",
            "priority" => 200,
        ]);
    }
} ?>
