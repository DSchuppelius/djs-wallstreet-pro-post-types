<?php
/*
 * Created on   : Wed Jun 22 2022
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : customizer-slider.php
 * License      : GNU General Public License v3 or later
 * License Uri  : http://www.gnu.org/licenses/gpl.html
 */

class Plugin_Slider_Customizer extends Plugin_Customizer {

    public function __construct() {
        parent::__construct();
        $this->register_panel = true;
    }

    public function customize_register_panel($wp_customize) {
        //slider Section
        $wp_customize->add_panel("slider_setting", [
            "priority" => 500,
            "capability" => "edit_theme_options",
            "title" => esc_html__("Slider settings", DJS_POSTTYPE_PLUGIN),
        ]);
    }

    public function customize_register_section($wp_customize) {
        $wp_customize->add_section("slider_section_settings", [
            "title" => esc_html__("Slider settings", DJS_POSTTYPE_PLUGIN),
            "description" => "",
            "panel" => "slider_setting",
        ]);

        //Section For Desktop View
        $wp_customize->add_section("slider_desktop_section_settings", [
            "title" => esc_html__("Slider desktop view settings", DJS_POSTTYPE_PLUGIN),
            "description" => "",
            "panel" => "slider_setting",
        ]);

        //Section For Desktop View
        $wp_customize->add_section("slider_mobile_section_settings", [
            "title" => esc_html__("Slider mobile view settings", DJS_POSTTYPE_PLUGIN),
            "description" => "",
            "panel" => "slider_setting",
        ]);
    }

    public function customize_register_settings_and_controls($wp_customize) {
        //Hide slider
        $wp_customize->add_setting($this->theme_options_name . "[home_slider_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);

        $wp_customize->add_control($this->theme_options_name . "[home_slider_enabled]", [
            "label" => esc_html__("Enable home slider", DJS_POSTTYPE_PLUGIN),
            "section" => "slider_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[slidertype]", [
            "default" => "base",
            "type" => "option",
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[slidertype]", [
            "type" => "select",
            "label" => esc_html__("Select slidertype", DJS_POSTTYPE_PLUGIN),
            "section" => "slider_section_settings",
            "priority" => 190,
            "choices" => [
                "base" => esc_html__("Baseslider", DJS_POSTTYPE_PLUGIN),
                "revolution" => esc_html__("Revolution", DJS_POSTTYPE_PLUGIN),
            ],
        ]);
    
        //Slider name
        $wp_customize->add_setting($this->theme_options_name . "[revolutionslidername]", [
            "default" => "startslider",
            "type" => "option",
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[revolutionslidername]", [
            "type" => "textbox",
            "label" => esc_html__("Slidername", DJS_POSTTYPE_PLUGIN),
            "section" => "slider_section_settings",
        ]);
    
        //Slider animation
        $wp_customize->add_setting($this->theme_options_name . "[animation]", [
            "default" => "slide",
            "type" => "option",
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[animation]", [
            "type" => "select",
            "label" => esc_html__("Select slider animation", DJS_POSTTYPE_PLUGIN),
            "section" => "slider_section_settings",
            "priority" => 200,
            "choices" => [
                "slide" => esc_html__("Slide", DJS_POSTTYPE_PLUGIN),
                "fade" => esc_html__("Fade", DJS_POSTTYPE_PLUGIN),
            ],
        ]);
    
        //Slider animation
        $wp_customize->add_setting($this->theme_options_name . "[slide_direction]", [
            "default" => "horizontal",
            "type" => "option",
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[slide_direction]", [
            "type" => "select",
            "label" => esc_html__("Slide direction", DJS_POSTTYPE_PLUGIN),
            "section" => "slider_section_settings",
            "priority" => 250,
            "choices" => [
                "horizontal" => esc_html__("horizontal", DJS_POSTTYPE_PLUGIN),
                "vertical" => esc_html__("vertical", DJS_POSTTYPE_PLUGIN),
            ],
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[animationSpeed]", [
            "default" => "1500",
            "type" => "option",
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[animationSpeed]", [
            "type" => "select",
            "label" => esc_html__("Animation speed", DJS_POSTTYPE_PLUGIN),
            "section" => "slider_section_settings",
            "priority" => 300,
            "choices" => [
                "500" => "0.5",
                "1000" => "1.0",
                "1500" => "1.5",
                "2000" => "2.0",
                "2500" => "2.5",
                "3000" => "3.0",
                "3500" => "3.5",
                "4000" => "4.0",
                "4500" => "4.5",
                "5000" => "5.0",
                "5500" => "5.5",
            ],
        ]);
    
        // Slide show speed
        $wp_customize->add_setting($this->theme_options_name . "[slideshowSpeed]", [
            "default" => "2500",
            "type" => "option",
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[slideshowSpeed]", [
            "type" => "select",
            "label" => esc_html__("Slideshow speed", DJS_POSTTYPE_PLUGIN),
            "section" => "slider_section_settings",
            "priority" => 300,
            "choices" => [
                "500" => "0.5",
                "1000" => "1.0",
                "1500" => "1.5",
                "2000" => "2.0",
                "2500" => "2.5",
                "3000" => "3.0",
                "3500" => "3.5",
                "4000" => "4.0",
                "4500" => "4.5",
                "5000" => "5.0",
                "5500" => "5.5",
            ],
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[slideroundcorner]", [
            "default" => 100,
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[slideroundcorner]", [
            "label" => esc_html__("Round Corner Value", DJS_POSTTYPE_PLUGIN),
            "section" => "slider_section_settings",
            "type" => "number",
            "input_attrs" => [
                "min" => "1",
                "step" => "1",
                "max" => "1000",
            ],
            "priority" => 400,
            "sanitize_callback" => "sanitize_text_field",
        ]);    
    
        $wp_customize->add_setting($this->theme_options_name . "[home_slider_desktop_title_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[home_slider_desktop_title_enabled]", [
            "label" => esc_html__("Enable slider title", DJS_POSTTYPE_PLUGIN),
            "section" => "slider_desktop_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[home_slider_desktop_subtitle_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[home_slider_desktop_subtitle_enabled]", [
            "label" => esc_html__("Enable slider subtitle", DJS_POSTTYPE_PLUGIN),
            "section" => "slider_desktop_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[home_slider_desktop_desc_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[home_slider_desktop_desc_enabled]", [
            "label" => esc_html__("Enable slider description", DJS_POSTTYPE_PLUGIN),
            "section" => "slider_desktop_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[home_slider_desktop_button_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[home_slider_desktop_button_enabled]", [
            "label" => esc_html__("Call-to-Action button", DJS_POSTTYPE_PLUGIN),
            "section" => "slider_desktop_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);    
    
        $wp_customize->add_setting($this->theme_options_name . "[home_slider_mobile_title_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[home_slider_mobile_title_enabled]", [
            "label" => esc_html__("Enable slider title", DJS_POSTTYPE_PLUGIN),
            "section" => "slider_mobile_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[home_slider_mobile_subtitle_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[home_slider_mobile_subtitle_enabled]", [
            "label" => esc_html__("Enable slider subtitle", DJS_POSTTYPE_PLUGIN),
            "section" => "slider_mobile_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[home_slider_mobile_desc_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[home_slider_mobile_desc_enabled]", [
            "label" => esc_html__("Enable slider description", DJS_POSTTYPE_PLUGIN),
            "section" => "slider_mobile_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[home_slider_mobile_button_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[home_slider_mobile_button_enabled]", [
            "label" => esc_html__("Call-to-Action button", DJS_POSTTYPE_PLUGIN),
            "section" => "slider_mobile_section_settings",
            "type" => "checkbox",
            "priority" => 100,
        ]);
    
        $wp_customize->add_setting("slider", [
            "default" => "",
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_control(
            new WP_Slider_Customize_Control($wp_customize, "slider", [
                "section" => "slider_section_settings",
                "priority" => 500,
            ])
        );
    }
} ?>
