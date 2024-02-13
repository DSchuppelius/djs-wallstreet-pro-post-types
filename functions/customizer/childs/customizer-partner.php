<?php
/*
 * Created on   : Wed Sep 01 2022
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : customizer-partner.php
 * License      : GNU General Public License v3 or later
 * License Uri  : http://www.gnu.org/licenses/gpl.html
 */

class Plugin_Relationship_Partner_Customizer extends Plugin_Relationship_Customizer {

    public function __construct() {
        parent::__construct();
        $this->name = "partner";
    }

    protected function get_title() {
        return esc_html__("Our Partners", DJS_POSTTYPE_PLUGIN);
    }

    protected function get_description() {
        return esc_html__("Have a look at our partners we are growing their business and they are going up in the market by beating their competitors.", DJS_POSTTYPE_PLUGIN);
    }

    protected function get_section_title() {
        return esc_html__("Partner settings", DJS_POSTTYPE_PLUGIN);
    }

    protected function add_button_relationships($wp_customize) {
        $wp_customize->add_control(
            new WP_Partner_Customize_Control($wp_customize, $this->name, [
                "section" => $this->name . "_section_settings",
                "priority" => 500,
            ])
        );
    }
} ?>
