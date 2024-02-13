<?php
/*
 * Created on   : Wed Jun 22 2022
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : customizer-testimonial.php
 * License      : GNU General Public License v3 or later
 * License Uri  : http://www.gnu.org/licenses/gpl.html
 */

class Plugin_Testimonial_Customizer extends Plugin_Customizer {

    public function __construct() {
        parent::__construct();
        $this->register_panel = true;
    }

    public function customize_register_panel($wp_customize) {
        //Home project Section
        $wp_customize->add_panel("wallstreet_test_setting", [
            "priority" => 750,
            "capability" => "edit_theme_options",
            "title" => esc_html__("Testimonial settings", DJS_POSTTYPE_PLUGIN),
        ]);	
    }

    public function customize_register_section($wp_customize) {
        $wp_customize->add_section("test_section_settings", [
            "title" => esc_html__("Home testimonial settings", DJS_POSTTYPE_PLUGIN),
            "description" => "",
            "panel" => "wallstreet_test_setting",
        ]);

        $wp_customize->add_section("test_section_back", [
            "title" => esc_html__("Background Image", DJS_POSTTYPE_PLUGIN),
            "description" => "",
            "panel" => "wallstreet_test_setting",
        ]);
    }

    public function customize_register_settings_and_controls($wp_customize) {        
        //Testimonial animation
        $wp_customize->add_setting($this->theme_options_name . "[testimonial_slide_type]", [
            "default" => "scroll",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[testimonial_slide_type]", [
            "type" => "select",
            "label" => esc_html__("Slide type variations", DJS_POSTTYPE_PLUGIN),
            "section" => "test_section_settings",
            "choices" => [
                "scroll" => esc_html__("scroll", DJS_POSTTYPE_PLUGIN),
                "fade" => esc_html__("fade", DJS_POSTTYPE_PLUGIN),
                "crossfade" => esc_html__("crossfade", DJS_POSTTYPE_PLUGIN),
                "cover-fade" => esc_html__("cover-fade", DJS_POSTTYPE_PLUGIN),
            ],
        ]);
    
        // Testimonial Design layout
        $wp_customize->add_setting($this->theme_options_name . "[testimonial_design_style]", [
            "default" => 1,
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[testimonial_design_style]", [
            "type" => "select",
            "label" => esc_html__("Testimonial design style", DJS_POSTTYPE_PLUGIN),
            "section" => "test_section_settings",
            "choices" => [
                1 => esc_html__("Style 1", DJS_POSTTYPE_PLUGIN),
                2 => esc_html__("Style 2", DJS_POSTTYPE_PLUGIN),
                3 => esc_html__("Style 3", DJS_POSTTYPE_PLUGIN),
                4 => esc_html__("Style 4", DJS_POSTTYPE_PLUGIN),
            ],
        ]);
    
        //Testimonial Scroll Items    
        $wp_customize->add_setting($this->theme_options_name . "[testimonial_scroll_items]", [
            "default" => "1",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[testimonial_scroll_items]", [
            "type" => "select",
            "label" => esc_html__("Scroll items", DJS_POSTTYPE_PLUGIN),
            "section" => "test_section_settings",
            "choices" => [1 => 1, 2 => 2, 3 => 3],
        ]);
    
        //Testimonial Animation speed
        $wp_customize->add_setting($this->theme_options_name . "[testimonial_scroll_duration]", [
            "default" => 1500,
            "type" => "option",
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[testimonial_scroll_duration]", [
            "type" => "select",
            "label" => esc_html__("Scroll duration", DJS_POSTTYPE_PLUGIN),
            "section" => "test_section_settings",
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
    
        //Testimonail Time out Duration
        $wp_customize->add_setting($this->theme_options_name . "[testimonial_timeout_duration]", [
            "default" => 2000,
            "type" => "option",
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[testimonial_timeout_duration]", [
            "type" => "select",
            "label" => esc_html__("Time out duration", DJS_POSTTYPE_PLUGIN),
            "section" => "test_section_settings",
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
    
        $wp_customize->add_setting("testimonial", [
            "default" => "",
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
        ]);

        $wp_customize->add_control(
            new WP_Testmonial_Customize_Control($wp_customize, "testimonial", [
                "section" => "test_section_settings",
                "priority" => 500,
            ])
        );
    
        // section background image
        $wp_customize->add_setting($this->theme_options_name . "[testimonial_background]", [
            "sanitize_callback" => "esc_url_raw",
            "type" => "option",
            "default" => DJS_POSTTYPE_PLUGIN_ASSETS_PATH_URI . "/images/testimonial-bg.jpg",
        ]);
    
        $wp_customize->add_control(
            new WP_Customize_Image_Control($wp_customize, $this->theme_options_name . "[testimonial_background]", [
                "label" => esc_html__("Image", DJS_POSTTYPE_PLUGIN),
                "section" => "test_section_back",
                "settings" => $this->theme_options_name . "[testimonial_background]",
            ])
        );
    }
} ?>
