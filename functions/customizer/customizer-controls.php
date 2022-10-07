<?php
/*
 * Created on   : Wed Jun 22 2022
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : customizer-controls.php
 * License      : GNU General Public License v3 or later
 * License Uri  : http://www.gnu.org/licenses/gpl.html
 */
function define_customizer_controls($wp_customize) {
    if (class_exists("WP_Customize_Control")) {
        if (!class_exists("WP_GoTo_Customize_Control")) {
            class WP_GoTo_Customize_Control extends WP_Customize_Control {
                public $type = "new_menu";
                protected string $url_part;
                protected string $button_text;
        
                /**
                * Render the control's content.
                */
                public function render_content() { ?>
                    <a href="<?php echo esc_url(home_url('/') . '/wp-admin/' . $this->url_part); ?>" class="button" target="_blank"><?php echo $this->button_text; ?></a>
                <?php }
            }
        }
        
        if (!class_exists("WP_Layout_Customize_Control")) {
            class WP_Layout_Customize_Control extends WP_Customize_Control {
                public $type = "new_menu";
                /**
                * Render the control's content.
                */
                public function render_content() {
                    $current_setup = PostTypes_Plugin_Setup::instance();
                    $data_enable = is_array($current_setup->get("front_page_data")) ? $current_setup->get("front_page_data") : explode(",", $current_setup->get("front_page_data"));
                    $defaultenableddata = ["service", "portfolio", "team", "blog", "testimonials", "features", "client", "partner"];
                    $layout_disable = array_diff($defaultenableddata, $data_enable); ?>
                    <h3><?php esc_html_e("Enable", DJS_POSTTYPE_PLUGIN); ?></h3>
                    <ul class="sortable customizer_layout" id="enable">
                        <?php if (!empty($data_enable[0])) {
                            foreach ($data_enable as $value) { ?>
                                <li class="ui-state" id="<?php echo $value; ?>"><?php echo $value; ?></li>
                            <?php }
                        } ?>
                    </ul>
        
                    <h3><?php esc_html_e("Disable", DJS_POSTTYPE_PLUGIN); ?></h3>
                    <ul class="sortable customizer_layout" id="disable">
                        <?php if (!empty($layout_disable)) {
                            foreach ($layout_disable as $value) { ?>
                                <li class="ui-state" id="<?php echo $value; ?>"><?php echo $value; ?></li>
                            <?php }
                        } ?>
                    </ul>
        
                    <div class="section">
                        <p><b><?php esc_html_e("Slider section always top on the home page", DJS_POSTTYPE_PLUGIN); ?></b></p>
                        <p><b><?php esc_html_e("Note :", DJS_POSTTYPE_PLUGIN); ?></b>&nbsp;<?php esc_html_e("By default, all the sections are enabled on the homepage. If you do not want to display any section just drag that section to the disabled box.", DJS_POSTTYPE_PLUGIN); ?></p>
                        <p></p>
                    </div>
        
                    <script>
                        jQuery(document).ready(function($) {
                            $(".sortable").sortable({
                                connectWith: '.sortable'
                            });
                        });
        
                        jQuery(document).ready(function($) {
                            // Get items id you can chose
                            function enabledItems(layoutItems) {
                                var columns = [];
                                $(layoutItems + ' #enable').each(function() {
                                    columns.push($(this).sortable('toArray').join(','));
                                });
                                return columns.join('|');
                            }
        
                            function disabledItems(layoutItems) {
                                var columns = [];
                                $(layoutItems + ' #disable').each(function() {
                                    columns.push($(this).sortable('toArray').join(','));
                                });
                                return columns.join('|');
                            }
        
                            //onclick check id
                            $('#enable .ui-state,#disable .ui-state').mouseleave(function() {
                                var enable = enabledItems('#customize-control-wallstreet_pro_options-layout_manager');
                                var disable = disabledItems('#customize-control-wallstreet_pro_options-layout_manager');
        
                                $("#customize-control-wallstreet_pro_options-front_page_data input[type = 'text']").val(enable);
                                $("#customize-control-wallstreet_pro_options-layout_textbox_disable input[type = 'text']").val(disable);
                                $("#customize-control-wallstreet_pro_options-front_page_data input[type = 'text']").change();
                            });
                        });
                    </script>
                <?php }
            }
        }
    
        if (!class_exists("Wallstreet_Customize_Slug")) {
            class Wallstreet_Customize_Slug extends WP_Customize_Control {
                public function render_content() { ?>
                    <h3><?php esc_html_e("After changing the slug, please do not forget to save the permalinks. Without saving, the old permalinks will not update.", DJS_POSTTYPE_PLUGIN); ?>
                <?php }
            }
        }
    }
    
    if (class_exists('WP_GoTo_Customize_Control')) {
        if (!class_exists("WP_GoTo_PostType_Customize_Control")) {
            class WP_GoTo_PostType_Customize_Control extends WP_GoTo_Customize_Control {
                protected string $post_type;
        
                /**
                 * Render the control's content.
                 */
                public function render_content() { 
                    $this->url_part = 'edit.php?post_type=' . $this->post_type; 
                    parent::render_content();
                }
            }
        }
    
        if (!class_exists("WP_Slug_Customize_Control")) {
            //Permalinks
            class WP_Slug_Customize_Control extends WP_GoTo_Customize_Control {
                public function __construct($manager, $id, $args = []) {
                    parent::__construct($manager, $id, $args);
                    $this->url_part = "options-permalink.php";
                    $this->button_text = esc_html__("Click here permalinks setting", DJS_POSTTYPE_PLUGIN);
                }
            }
        }
    }
    
    if (class_exists('WP_GoTo_PostType_Customize_Control')) {
        if (!class_exists("WP_Client_Customize_Control")) {
            //Client link
            class WP_Client_Customize_Control extends WP_GoTo_PostType_Customize_Control {
                public function __construct($manager, $id, $args = []) {
                    parent::__construct($manager, $id, $args);
                    $this->post_type = CLIENT_POST_TYPE;
                    $this->button_text = esc_html__("Click here to add client", DJS_POSTTYPE_PLUGIN);
                }
            }
        }
    
        if (!class_exists("WP_Partner_Customize_Control")) {
            //Partner link
            class WP_Partner_Customize_Control extends WP_GoTo_PostType_Customize_Control {
                public function __construct($manager, $id, $args = []) {
                    parent::__construct($manager, $id, $args);
                    $this->post_type = PARTNER_POST_TYPE;
                    $this->button_text = esc_html__("Click here to add partner", DJS_POSTTYPE_PLUGIN);
                }
            }
        }
    
        if (!class_exists("WP_Project_Customize_Control")) {
            //Project link
            class WP_Project_Customize_Control extends WP_GoTo_PostType_Customize_Control {
                public function __construct($manager, $id, $args = []) {
                    parent::__construct($manager, $id, $args);
                    $this->post_type = PORTFOLIO_POST_TYPE;
                    $this->button_text = esc_html__("Click here to add project", DJS_POSTTYPE_PLUGIN);
                }
            }
        }
    
        if (!class_exists("WP_Service_Customize_Control")) {
            //Service link
            class WP_Service_Customize_Control extends WP_GoTo_PostType_Customize_Control {
                public function __construct($manager, $id, $args = []) {
                    parent::__construct($manager, $id, $args);
                    $this->post_type = SERVICE_POST_TYPE;
                    $this->button_text = esc_html__("Click here to add service", DJS_POSTTYPE_PLUGIN);
                }
            }
        }
    
        if (!class_exists("WP_Slider_Customize_Control")) {
            //Slider link
            class WP_Slider_Customize_Control extends WP_GoTo_PostType_Customize_Control {
                public function __construct($manager, $id, $args = []) {
                    parent::__construct($manager, $id, $args);
                    $this->post_type = SLIDER_POST_TYPE;
                    $this->button_text = esc_html__("Click here to add slider", DJS_POSTTYPE_PLUGIN);
                }
            }
        }
    
        if (!class_exists("WP_Testmonial_Customize_Control")) {
            //Testimonial link
            class WP_Testmonial_Customize_Control extends WP_GoTo_PostType_Customize_Control {
                public function __construct($manager, $id, $args = []) {
                    parent::__construct($manager, $id, $args);
                    $this->post_type = TESTIMONIAL_POST_TYPE;
                    $this->button_text = esc_html__("Click here to add testimonial", DJS_POSTTYPE_PLUGIN);
                }
            }
        }
    }
}
add_action('customize_register', 'define_customizer_controls');
