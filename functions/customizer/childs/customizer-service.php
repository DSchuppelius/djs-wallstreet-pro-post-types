<?php
/*
 * Created on   : Wed Jun 22 2022
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : customizer-service.php
 * License      : GNU General Public License v3 or later
 * License Uri  : http://www.gnu.org/licenses/gpl.html
 */

class Plugin_Theme_Service_Customizer extends Plugin_Theme_Customizer {

    public function __construct() {
        parent::__construct();
        $this->register_panel = true;
    }

    public function customize_register_panel($wp_customize) {
        //Service section panel
        $wp_customize->add_panel("service_options", [
            "priority" => 600,
            "capability" => "edit_theme_options",
            "title" => esc_html__("Service settings", DJS_POSTTYPE_PLUGIN),
        ]);	
    }

    public function customize_register_section($wp_customize) {
        $wp_customize->add_section("service_section_head", [
            "title" => esc_html__("Service heading", DJS_POSTTYPE_PLUGIN),
            "panel" => "service_options",
            "priority" => 50,
        ]);

        //Other service section
        $wp_customize->add_section("other_service_section", [
            "title" => esc_html__("Other services section", DJS_POSTTYPE_PLUGIN),
            "panel" => "service_options",
            "priority" => 50,
        ]);

        //Service callout
        $wp_customize->add_section("service_callout_settings", [
            "title" => esc_html__("Service Call-to-Action settings", DJS_POSTTYPE_PLUGIN),
            "description" => "",
            "panel" => "service_options",
        ]);
    }

    public function customize_register_settings_and_controls($wp_customize) {
        //Number of services
        $wp_customize->add_setting($this->theme_options_name . "[service_list]", [
            "default" => 3,
            "type" => "option",
            "sanitize_callback" => "sanitize_text_field",
        ]);

        $wp_customize->add_control($this->theme_options_name . "[service_list]", [
            "type" => "select",
            "label" => esc_html__("Number of services on service section", DJS_POSTTYPE_PLUGIN),
            "section" => "service_section_head",
            "priority" => 50,
            "choices" => [
                3 => 3,
                6 => 6,
                9 => 9,
                12 => 12,
                15 => 15,
                18 => 18,
                21 => 21,
                24 => 24,
            ],
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[service_variation]", [
            "default" => 1,
            "type" => "option",
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[service_variation]", [
            "type" => "select",
            "label" => esc_html__("Select Service Style", DJS_POSTTYPE_PLUGIN),
            "section" => "service_section_head",
            "priority" => 50,
            "choices" => [
                1 => esc_html__("Style 1", DJS_POSTTYPE_PLUGIN),
                2 => esc_html__("Style 2", DJS_POSTTYPE_PLUGIN),
                3 => esc_html__("Style 3", DJS_POSTTYPE_PLUGIN),
                4 => esc_html__("Style 4", DJS_POSTTYPE_PLUGIN),
                5 => esc_html__("Style 5", DJS_POSTTYPE_PLUGIN),
                6 => esc_html__("Style 6", DJS_POSTTYPE_PLUGIN),
            ],
        ]);
    
        //Service title
        $wp_customize->add_setting($this->theme_options_name . "[service_title]", [
            "default" => esc_html__("Our Services", DJS_POSTTYPE_PLUGIN),
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[service_title]", [
            "label" => esc_html__("Title", DJS_POSTTYPE_PLUGIN),
            "section" => "service_section_head",
            "type" => "text",
            "priority" => 100,
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[service_description]", [
            "default" => esc_html__("We offer great services to our clients", DJS_POSTTYPE_PLUGIN),
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[service_description]", [
            "label" => esc_html__("Description", DJS_POSTTYPE_PLUGIN),
            "section" => "service_section_head",
            "type" => "text",
            "sanitize_callback" => "sanitize_text_field",
            "priority" => 200,
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[service_middle_extrapadding]", [
            "default" => false,
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[service_middle_extrapadding]", [
            "label" => esc_html__("Give middle element more size", DJS_POSTTYPE_PLUGIN),
            "description" => esc_html__("This setting will work with only service design 1", DJS_POSTTYPE_PLUGIN),
            "section" => "service_section_head",
            "type" => "checkbox",
            "sanitize_callback" => "sanitize_text_field",
            "priority" => 200,
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[service_hover_change_effect]", [
            "default" => true,
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[service_hover_change_effect]", [
            "label" => esc_html__("Enable service animation effect", DJS_POSTTYPE_PLUGIN),
            "description" => esc_html__("This setting will work with only service design 1 and service design 6", DJS_POSTTYPE_PLUGIN),
            "section" => "service_section_head",
            "type" => "checkbox",
            "sanitize_callback" => "sanitize_text_field",
            "priority" => 200,
        ]);
    
        $wp_customize->add_setting("service", [
            "default" => "",
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_control(
            new WP_Service_Customize_Control($wp_customize, "service", [
                "section" => "service_section_head",
                "priority" => 300,
            ])
        );
    
        //Enable . disbaled other services
        $wp_customize->add_setting($this->theme_options_name . "[other_service_section_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[other_service_section_enabled]", [
            "label" => esc_html__("Enable other services section in service template", DJS_POSTTYPE_PLUGIN),
            "section" => "other_service_section",
            "type" => "checkbox",
            "priority" => 50,
        ]);
    
        //Sarvice title
        $wp_customize->add_setting($this->theme_options_name . "[other_service_title]", [
            "default" => esc_html__("Other services", DJS_POSTTYPE_PLUGIN),
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[other_service_title]", [
            "label" => esc_html__("Title", DJS_POSTTYPE_PLUGIN),
            "section" => "other_service_section",
            "type" => "text",
            "priority" => 100,
        ]);
    
        //other service description
        //Service title
        $wp_customize->add_setting($this->theme_options_name . "[other_service_description]", [
            "default" => esc_html__("We offer great services to our clients", DJS_POSTTYPE_PLUGIN),
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[other_service_description]", [
            "label" => esc_html__("Description", DJS_POSTTYPE_PLUGIN),
            "section" => "other_service_section",
            "type" => "text",
            "priority" => 100,
        ]);
    
    
        $wp_customize->add_setting("other_service", [
            "default" => "",
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
        ]);
    
        $wp_customize->add_control(
            new WP_Service_Customize_Control($wp_customize, "other_service", [
                "section" => "other_service_section",
                "priority" => 300,
            ])
        );
    
        //Enable and disabled service callout Section
        $wp_customize->add_setting($this->theme_options_name . "[call_out_area_enabled]", [
            "default" => true,
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[call_out_area_enabled]", [
            "label" => esc_html__("Enable Callout area section", DJS_POSTTYPE_PLUGIN),
            "section" => "service_callout_settings",
            "type" => "checkbox",
        ]);
    
        // add section to manage callout
        $wp_customize->add_setting($this->theme_options_name . "[call_out_title]", [
            "default" => esc_html__("Wallstreet is an elegant and modern theme for business websites.", DJS_POSTTYPE_PLUGIN),
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[call_out_title]", [
            "label" => esc_html__("Title", DJS_POSTTYPE_PLUGIN),
            "section" => "service_callout_settings",
            "type" => "text",
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[call_out_text]", [
            "default" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eros elit, pretium et adipiscing vel, consectetur adipiscing elit.",
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[call_out_text]", [
            "label" => esc_html__("Description", DJS_POSTTYPE_PLUGIN),
            "section" => "service_callout_settings",
            "type" => "text",
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[call_out_button_text]", [
            "default" => esc_html__("Purchase Now", DJS_POSTTYPE_PLUGIN),
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[call_out_button_text]", [
            "label" => esc_html__("Button Text", DJS_POSTTYPE_PLUGIN),
            "section" => "service_callout_settings",
            "type" => "text",
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[call_out_button_link]", [
            "default" => "#",
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_url",
            "type" => "option",
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[call_out_button_link]", [
            "label" => esc_html__("Button Link", DJS_POSTTYPE_PLUGIN),
            "section" => "service_callout_settings",
            "type" => "text",
        ]);
    
        $wp_customize->add_setting($this->theme_options_name . "[call_out_button_link_target]", [
            "capability" => "edit_theme_options",
            "sanitize_callback" => "sanitize_text_field",
            "type" => "option",
            "default" => true,
        ]);
    
        $wp_customize->add_control($this->theme_options_name . "[call_out_button_link_target]", [
            "type" => "checkbox",
            "label" => esc_html__("Open link in new tab", DJS_POSTTYPE_PLUGIN),
            "section" => "service_callout_settings",
        ]);
    }
} ?>
