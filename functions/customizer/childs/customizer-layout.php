<?php
/*
 * Created on   : Wed Jun 22 2022
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : customizer-layout.php
 * License      : GNU General Public License v3 or later
 * License Uri  : http://www.gnu.org/licenses/gpl.html
 */

class Plugin_Theme_Layout_Customizer extends Plugin_Theme_Customizer {

    public function __construct() {
        parent::__construct();
        $this->register_panel = true;
    }
    
    public function customize_register_panel($wp_customize) {
        $wp_customize->add_panel("wallstreet_layout_setting", [
            "priority" => 1000,
            "capability" => "edit_theme_options",
            "title" => esc_html__("Theme layout manager", DJS_POSTTYPE_PLUGIN),
        ]);
    }

    public function customize_register_section($wp_customize) {
        $wp_customize->add_section("wallstreet_layout_section", [
            "title" => esc_html__("Theme layout manager", DJS_POSTTYPE_PLUGIN),
            "panel" => "wallstreet_layout_setting",
        ]);
    }


    public function customize_register_settings_and_controls($wp_customize) {    
        $wp_customize->add_setting($this->theme_options_name . "[layout_manager]", [
            "default" => "",
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control(
            new WP_Layout_Customize_Control($wp_customize, $this->theme_options_name . "[layout_manager]", [
                "section" => "wallstreet_layout_section",
                "setting" => $this->theme_options_name . "[layout_manager]",
            ])
        );
    
        $wp_customize->add_setting($this->theme_options_name . "[front_page_data]", [
            "default" => "service,portfolio,team,testimonials,blog,features,client,partner",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control($this->theme_options_name . "[front_page_data]", [
            "label" => esc_html__("Enable", DJS_POSTTYPE_PLUGIN),
            "section" => "wallstreet_layout_section",
            "type" => "text",
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[layout_textbox_disable]", [
            "default" => "",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control($this->theme_options_name . "[layout_textbox_disable]", [
            "label" => esc_html__("Disable", DJS_POSTTYPE_PLUGIN),
            "section" => "wallstreet_layout_section",
            "type" => "text",
        ]);
    }
} ?>
