<?php
/*
 * Created on   : Sun Sep 29 2022
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : customizer-relationship.php
 * License      : GNU General Public License v3 or later
 * License Uri  : http://www.gnu.org/licenses/gpl.html
 */

abstract class Plugin_Relationship_Customizer extends Plugin_Customizer {
    protected string $name;

    public function __construct() {
        parent::__construct();
        $this->register_panel = true;
    }

    abstract protected function get_title();
    abstract protected function get_description();
    abstract protected function get_section_title();

    abstract protected function add_button_relationships($wp_customize);


    public function customize_register_panel($wp_customize) {
        $wp_customize->add_panel($this->name . "_setting", [
            "priority" => 800,
            "capability" => "edit_theme_options",
            "title" => $this->get_section_title(),
        ]);
    }

    public function customize_register_section($wp_customize) {
        $wp_customize->add_section($this->name . "_section_settings", [
            "title" => esc_html__("Section Heading", DJS_POSTTYPE_PLUGIN),
            "description" => "",
            "panel" => $this->name . "_setting",
        ]);

        $wp_customize->add_section($this->name . "_picture_settings", [
            "title" => esc_html__("Picture Settings", DJS_POSTTYPE_PLUGIN),
            "description" => "",
            "panel" => $this->name . "_setting",
        ]);
    }

    public function customize_register_settings_and_controls($wp_customize) {
        $wp_customize->add_setting($this->theme_options_name . "[home_" . $this->name . "_title]", [
            "default" => $this->get_title(),
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control($this->theme_options_name . "[home_" . $this->name . "_title]", [
            "label" => esc_html__("Title", DJS_POSTTYPE_PLUGIN),
            "section" => $this->name . "_section_settings",
            "type" => "text",
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[home_" . $this->name . "_description]", [
            "default" => $this->get_description(),
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[home_" . $this->name . "_description]", [
            "label" => esc_html__("Description", DJS_POSTTYPE_PLUGIN),
            "section" => $this->name . "_section_settings",
            "type" => "textarea",
        ]);

        $wp_customize->add_setting($this->name, [
            "default" => "",
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
        ]);

        $this->add_button_relationships($wp_customize);

        $wp_customize->add_setting($this->theme_options_name . "[" . $this->name . "_pictureheight]", [
            "default" => 100,
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[" . $this->name . "_pictureheight]", [
            "label" => esc_html__("Max Pictureheight", DJS_POSTTYPE_PLUGIN),
            "section" => $this->name . "_picture_settings",
            "type" => "number",
            "input_attrs" => [
                "min" => "50",
                "step" => "1",
                "max" => "200",
            ],
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[" . $this->name . "_padding_tb]", [
            "default" => 30,
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[" . $this->name . "_padding_tb]", [
            "label" => esc_html__("Top/Bottom Padding", DJS_POSTTYPE_PLUGIN),
            "section" => $this->name . "_picture_settings",
            "type" => "number",
            "input_attrs" => [
                "min" => "0",
                "step" => "1",
                "max" => "100",
            ],
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[" . $this->name . "_padding_lr]", [
            "default" => 30,
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[" . $this->name . "_padding_lr]", [
            "label" => esc_html__("Left/Right Padding", DJS_POSTTYPE_PLUGIN),
            "section" => $this->name . "_picture_settings",
            "type" => "number",
            "input_attrs" => [
                "min" => "0",
                "step" => "1",
                "max" => "100",
            ],
            "sanitize_callback" => "sanitize_text_field",
        ]);
    }
}
