<?php
/*
 * Created on   : Wed Jun 22 2022
 * Author       : Daniel Jörg Schuppelius
 * Author Uri   : https://schuppelius.org
 * Filename     : post-meta.php
 * License      : GNU General Public License v3 or later
 * License Uri  : http://www.gnu.org/licenses/gpl.html
 */
function wallstreet_init() {
    add_meta_box("home_slider_meta", esc_html__("Slider Details", DJS_POSTTYPE_PLUGIN), "wallstreet_meta_slider", SLIDER_POST_TYPE, "normal", "high");
    add_meta_box("home_service_meta", esc_html__("Service Details", DJS_POSTTYPE_PLUGIN), "wallstreet_meta_service", SERVICE_POST_TYPE, "normal", "high");
    add_meta_box("home_portfolio_meta", esc_html__("Portfolio Details", DJS_POSTTYPE_PLUGIN), "wallstreet_meta_portfolio", PORTFOLIO_POST_TYPE, "normal", "high");
    add_meta_box("home_portfolio_meta_details", esc_html__("Portfolio Featured Details", DJS_POSTTYPE_PLUGIN), "wallstreet_meta_portfolio_details", PORTFOLIO_POST_TYPE, "normal", "high");

    add_meta_box("team", esc_html__("Team Details", DJS_POSTTYPE_PLUGIN), "wallstreet_meta_team", TEAM_POST_TYPE, "normal", "high");
    add_meta_box("client", esc_html__("Client Details", DJS_POSTTYPE_PLUGIN), "wallstreet_meta_client", CLIENT_POST_TYPE, "normal", "high");
    add_meta_box("partner", esc_html__("Partner Details", DJS_POSTTYPE_PLUGIN), "wallstreet_meta_partner", PARTNER_POST_TYPE, "normal", "high");
    add_meta_box("testimonial", esc_html__("Testimonial Detail", DJS_POSTTYPE_PLUGIN), "wallstreet_meta_testimonial", TESTIMONIAL_POST_TYPE, "normal", "high");

    add_action("save_post", "wallstreet_meta_save");
}
add_action("admin_init", "wallstreet_init");

function wallstreet_meta_slider() {
    global $post;
    $slider_title = sanitize_text_field(get_post_meta(get_the_ID(), "slider_title", true));
    $slider_description = sanitize_text_field(get_post_meta(get_the_ID(), "slider_description", true));
    $slider_button_text = sanitize_text_field(get_post_meta(get_the_ID(), "slider_button_text", true));
    $slider_button_link = sanitize_text_field(get_post_meta(get_the_ID(), "slider_button_link", true));
    $slider_button_target = sanitize_text_field(get_post_meta(get_the_ID(), "slider_button_target", true)); ?>
    <p><h4 class="heading"><?php esc_html_e("Title", DJS_POSTTYPE_PLUGIN); ?></h4></p> 
    <p><input class="inputwidth" name="slider_title" id="slider_title" placeholder="<?php esc_attr_e("Title", DJS_POSTTYPE_PLUGIN); ?> " type="text" value="<?php if (!empty($slider_title)) { echo esc_attr($slider_title); } ?>"> </input></p>		
    <p><h4 class="heading"><?php esc_html_e("Description", DJS_POSTTYPE_PLUGIN); ?> </h4>
    <p><input class="inputwidth" name="slider_description" id="slider_description" placeholder="<?php esc_attr_e("Description", DJS_POSTTYPE_PLUGIN); ?>" type="text" value="<?php if (!empty($slider_description)) { echo esc_attr($slider_description); } ?>"> </input></p>	
    <p><h4 class="heading"><?php esc_html_e("Button Text", DJS_POSTTYPE_PLUGIN); ?> </h4>
    <p><input class="inputwidth" name="slider_button_text" id="slider_button_text" placeholder="<?php esc_attr_e("Text", DJS_POSTTYPE_PLUGIN); ?>" type="text" value="<?php if (!empty($slider_button_text)) { echo esc_attr($slider_button_text); } ?>"> </input></p>	
    <p><h4 class="heading"><?php esc_html_e("Button Link", DJS_POSTTYPE_PLUGIN); ?></h4>
    <p><input class="inputwidth" name="slider_button_link" id="slider_button_link" placeholder="<?php esc_attr_e("Link", DJS_POSTTYPE_PLUGIN); ?>" type="text" value="<?php if (!empty($slider_button_link)) { echo esc_attr($slider_button_link); } ?>"> </input></p>
    <p><input type="checkbox" id="slider_button_target" name="slider_button_target" <?php if ($slider_button_target) { echo "checked"; } ?> ><?php esc_html_e("Open link in new tab", DJS_POSTTYPE_PLUGIN); ?></p>
<?php }

function wallstreet_meta_service() {
    global $post;
    $service_icon_image = sanitize_text_field(get_post_meta(get_the_ID(), "service_icon_image", true));
    $service_icon_target = sanitize_text_field(get_post_meta(get_the_ID(), "service_icon_target", true));
    $meta_service_link = sanitize_text_field(get_post_meta(get_the_ID(), "meta_service_link", true));
    $meta_service_target = sanitize_text_field(get_post_meta(get_the_ID(), "meta_service_target", true));
    $service_description_text = sanitize_text_field(get_post_meta(get_the_ID(), "service_description_text", true));
    $service_readmore_text = sanitize_text_field(get_post_meta(get_the_ID(), "service_readmore_text", true));
    ?>
    <p><h4 class="heading">
        <?php esc_html_e("Icon", DJS_POSTTYPE_PLUGIN); echo " " . esc_html__("(Using font awesome icons name) like:", DJS_POSTTYPE_PLUGIN) . " fa-rub."; ?>
        <label style="margin-left:10px;"><a target="_blank" href="http://fontawesome.io/icons/"><?php esc_html_e("Get your Font Awesome icons.", DJS_POSTTYPE_PLUGIN); ?></a></label>
    </h4></p>
    <p><input type="checkbox" id="service_icon_target" name="service_icon_target" <?php if ($service_icon_target) { echo "checked"; } ?> ><?php esc_html_e("To enable service icon check mark the checkbox", DJS_POSTTYPE_PLUGIN); ?></p>
    <p><input class="inputwidth" name="service_icon_image" id="service_icon_image" placeholder="<?php esc_attr_e("Icon", DJS_POSTTYPE_PLUGIN); ?>" type="text" value="<?php if (!empty($service_icon_image)) { echo esc_attr($service_icon_image); } ?>"></input></p>

    <p><h4 class="heading"><?php esc_html_e("Link", DJS_POSTTYPE_PLUGIN); ?></h4></p>
    <p><input class="inputwidth" name="meta_service_link" id="meta_service_link" placeholder="<?php esc_attr_e("Link", DJS_POSTTYPE_PLUGIN); ?>" type="text" value="<?php if (!empty($meta_service_link)) { echo esc_attr($meta_service_link); } ?>"></input></p>
    <p><input type="checkbox" id="meta_service_target" name="meta_service_target" <?php if ($meta_service_target) { echo "checked"; } ?> ><?php esc_html_e("Open link in new tab", DJS_POSTTYPE_PLUGIN); ?></p>

    <p><h4 class="heading"><?php esc_html_e("Description", DJS_POSTTYPE_PLUGIN); ?></h4></p>
    <p><textarea name="service_description_text" id="service_description_text" style="width: 480px; height: 56px; padding: 0px;" placeholder="<?php esc_attr_e("Description", DJS_POSTTYPE_PLUGIN); ?>" rows="3" cols="10" ><?php if (!empty($service_description_text)) { echo esc_textarea($service_description_text); } ?></textarea></p>

    <p><h4 class="heading"><?php esc_html_e("Button Text", DJS_POSTTYPE_PLUGIN); ?></h4></p>
    <p><input class="inputwidth" name="service_readmore_text" id="service_readmore_text" placeholder="<?php esc_attr_e("Button Text", DJS_POSTTYPE_PLUGIN); ?>" type="text" value="<?php if (!empty($service_readmore_text)) { echo esc_attr($service_readmore_text); } ?>"></input></p>
<?php }

function wallstreet_meta_portfolio() {
    global $post;
    $meta_project_target = sanitize_text_field(get_post_meta(get_the_ID(), "meta_project_target", true));
    $portfolio_project_summary = sanitize_text_field(get_post_meta(get_the_ID(), "portfolio_project_summary", true));
    $meta_project_link = sanitize_text_field(get_post_meta(get_the_ID(), "meta_project_link", true));
    ?>
    <p><h4 class="heading"><?php esc_html_e("Link", DJS_POSTTYPE_PLUGIN); ?></h4></p>
    <p><input class="inputwidth" name="meta_project_link" id="meta_project_link" placeholder="<?php esc_attr_e("Link", DJS_POSTTYPE_PLUGIN); ?>" type="text" value="<?php if (!empty($meta_project_link)) { echo esc_attr($meta_project_link); } ?>"> </input></p>	
    <p><input type="checkbox" id="meta_project_target" name="meta_project_target" <?php if ($meta_project_target) { echo "checked"; } ?> ><?php esc_html_e("Open link in new tab", DJS_POSTTYPE_PLUGIN); ?></p>
    <p><h4 class="heading"><?php esc_html_e("Page Info", DJS_POSTTYPE_PLUGIN); ?></h4></p>
    <p><input class="inputwidth" name="portfolio_project_summary" id="portfolio_project_summary" placeholder="<?php esc_attr_e("Page Info", DJS_POSTTYPE_PLUGIN); ?>" type="text" value="<?php if (!empty($portfolio_project_summary)) { echo esc_attr($portfolio_project_summary); } ?>"> </input></p>	
<?php }

function wallstreet_meta_portfolio_details() {
    global $post;
    $portfolio_client_project_title = sanitize_text_field(get_post_meta(get_the_ID(), "portfolio_client_project_title", true));
    $portfolio_project_visit_site = sanitize_text_field(get_post_meta(get_the_ID(), "portfolio_project_visit_site", true));
    $portfolio_project_button_text = sanitize_text_field(get_post_meta(get_the_ID(), "portfolio_project_button_text", true));
    $meta_button_link = sanitize_text_field(get_post_meta(get_the_ID(), "meta_button_link", true));
    $meta_button_target = sanitize_text_field(get_post_meta(get_the_ID(), "meta_button_target", true));
    ?>
    <p><h4 class="heading"><?php esc_html_e("Clients", DJS_POSTTYPE_PLUGIN); ?></h4></p>
    <p><input class="inputwidth" name="portfolio_client_project_title" id="portfolio_client_project_title" placeholder="<?php esc_attr_e("Clients", DJS_POSTTYPE_PLUGIN); ?>" type="text" value="<?php if (!empty($portfolio_client_project_title)) { echo esc_attr($portfolio_client_project_title); } ?>"> </input></p>	
    <p><h4 class="heading"><?php esc_html_e("Website", DJS_POSTTYPE_PLUGIN); ?></h4></p>
    <p><input class="inputwidth" name="portfolio_project_visit_site" id="portfolio_project_visit_site" placeholder="<?php esc_attr_e("Website", DJS_POSTTYPE_PLUGIN); ?>: https://schuppelius.org" type="text" value="<?php if (!empty($portfolio_project_visit_site)) { echo esc_attr($portfolio_project_visit_site); } ?>"> </input></p>
    <p><h4 class="heading"><?php esc_html_e("Button Text", DJS_POSTTYPE_PLUGIN); ?></h4></p>
    <p><input class="inputwidth" name="portfolio_project_button_text" id="portfolio_project_button_text" placeholder="<?php esc_attr_e("Button Text", DJS_POSTTYPE_PLUGIN); ?>" type="text" value="<?php if (!empty($portfolio_project_button_text)) { echo esc_attr($portfolio_project_button_text); } ?>"> </input></p>	
    <p><h4 class="heading"><?php esc_html_e("Button Link", DJS_POSTTYPE_PLUGIN); ?></h4></p>
    <p><input class="inputwidth" name="meta_button_link" id="meta_button_link" placeholder="<?php esc_attr_e("Button Link", DJS_POSTTYPE_PLUGIN); ?>" type="text" value="<?php if (!empty($meta_button_link)) { echo esc_attr($meta_button_link); } ?>"> </input></p>	
    <p><input type="checkbox" id="meta_button_target" name="meta_button_target" <?php if ($meta_button_target) { echo "checked"; } ?> ><?php esc_html_e("Open link in new tab", DJS_POSTTYPE_PLUGIN); ?></p>
<?php }

function wallstreet_meta_testimonial() {
    global $post;
    $testimonial_description_text = sanitize_text_field(get_post_meta(get_the_ID(), "testimonial_description_text", true)); ?>	
    <p><label><?php esc_html_e("Description", DJS_POSTTYPE_PLUGIN); ?></label></p>
    <p><textarea name="testimonial_description_text" id="testimonial_description_text" style="width: 550px; height: 100px; padding: 0px;" placeholder="<?php esc_attr_e("Description", DJS_POSTTYPE_PLUGIN); ?>"  rows="3" cols="10" ><?php if (!empty($testimonial_description_text)) { echo esc_textarea($testimonial_description_text); } ?></textarea></p>
<?php }

function wallstreet_meta_team() {
    global $post;
    $designation_meta_save = sanitize_text_field(get_post_meta(get_the_ID(), "designation_meta_save", true));
    $description_meta_save = sanitize_text_field(get_post_meta(get_the_ID(), "description_meta_save", true));
    $fb_meta_save = sanitize_text_field(get_post_meta(get_the_ID(), "fb_meta_save", true));
    $fb_meta_save_chkbx = sanitize_text_field(get_post_meta(get_the_ID(), "fb_meta_save_chkbx", true));
    $skype_meta_save = sanitize_text_field(get_post_meta(get_the_ID(), "skype_meta_save", true));
    $skype_meta_save_chkbx = sanitize_text_field(get_post_meta(get_the_ID(), "skype_meta_save_chkbx", true));
    $rss_meta_save = sanitize_text_field(get_post_meta(get_the_ID(), "rss_meta_save", true));
    $rss_meta_save_chkbx = sanitize_text_field(get_post_meta(get_the_ID(), "rss_meta_save_chkbx", true));
    $lnkd_meta_save = sanitize_text_field(get_post_meta(get_the_ID(), "lnkd_meta_save", true));
    $lnkd_meta_save_chkbx = sanitize_text_field(get_post_meta(get_the_ID(), "lnkd_meta_save_chkbx", true));
    $twt_meta_save = sanitize_text_field(get_post_meta(get_the_ID(), "twt_meta_save", true));
    $twt_meta_save_chkbx = sanitize_text_field(get_post_meta(get_the_ID(), "twt_meta_save_chkbx", true));
    ?>

    <p><h4 class="heading"><?php esc_html_e("Designation", DJS_POSTTYPE_PLUGIN); ?></h4></p>
    <p><input class="inputwidth" name="designation_meta_save" id="designation_meta_save" placeholder="<?php esc_attr_e("Designation", DJS_POSTTYPE_PLUGIN); ?>" type="text" value="<?php if (!empty($designation_meta_save)) { echo esc_attr($designation_meta_save); } ?>"></input></p>
    <p><h4 class="heading"><?php esc_html_e("Description", DJS_POSTTYPE_PLUGIN); ?></h4></p>
    <p><textarea name="description_meta_save" id="description_meta_save" style="width: 480px; height: 56px; padding: 0px;" placeholder="<?php esc_attr_e("Description", DJS_POSTTYPE_PLUGIN); ?>"  rows="3" cols="10" ><?php if (!empty($description_meta_save)) { echo esc_textarea($description_meta_save); } ?></textarea></p>	
    
    <p><h4 class="heading"><span><?php esc_html_e("Social Media Settings", DJS_POSTTYPE_PLUGIN); ?></span></h4></p>
    
    <p><h4 class="heading"><label><?php esc_html_e("Facebook URL", DJS_POSTTYPE_PLUGIN); ?></label></h4></p>
    <input style="width:70%;padding: 10px;" name="fb_meta_save" id="fb_meta_save" placeholder="<?php esc_attr_e("Facebook URL", DJS_POSTTYPE_PLUGIN); ?>" value="<?php if (!empty($fb_meta_save)) { echo esc_attr($fb_meta_save); } ?>"/>
    <input type="checkbox" name="fb_meta_save_chkbx" id="fb_meta_save_chkbx" <?php if ($fb_meta_save_chkbx) { echo "checked"; } ?> /><?php esc_html_e("Open link in new tab", DJS_POSTTYPE_PLUGIN); ?></p>
    
    <p><h4 class="heading"><label><?php esc_html_e("Skype URL", DJS_POSTTYPE_PLUGIN); ?></label></h4></p>
    <input style="width:70%;padding: 10px;" name="skype_meta_save" id="skype_meta_save" placeholder="<?php esc_attr_e("Skype URL", DJS_POSTTYPE_PLUGIN); ?>" value="<?php if (!empty($skype_meta_save)) { echo esc_attr($skype_meta_save); } ?>"/>
    <input type="checkbox" name="skype_meta_save_chkbx" id="skype_meta_save_chkbx" <?php if ($skype_meta_save_chkbx) { echo "checked"; } ?> /><?php esc_html_e("Open link in new tab", DJS_POSTTYPE_PLUGIN); ?></p>

    <p><h4 class="heading"><label><?php esc_html_e("RSS URL", DJS_POSTTYPE_PLUGIN); ?></label></h4></p>
    <input style="width:70%; padding: 10px;" name="rss_meta_save" id="rss_meta_save" placeholder="<?php esc_attr_e("RSS URL", DJS_POSTTYPE_PLUGIN); ?>" value="<?php if (!empty($rss_meta_save)) { echo esc_attr($rss_meta_save); } ?>"/>
    <input type="checkbox" name="rss_meta_save_chkbx" id="rss_meta_save_chkbx" <?php if ($rss_meta_save_chkbx) { echo "checked"; } ?> /><?php esc_html_e("Open link in new tab", DJS_POSTTYPE_PLUGIN); ?></p>
    
    <p><h4 class="heading"><label><?php esc_html_e("LinkedIn URL", DJS_POSTTYPE_PLUGIN); ?></label></h4></p>
    <input style="width:70%;padding: 10px;" name="lnkd_meta_save" id="lnkd_meta_save" placeholder="<?php esc_attr_e("LinkedIn URL", DJS_POSTTYPE_PLUGIN); ?>" value="<?php if (!empty($lnkd_meta_save)) { echo esc_attr($lnkd_meta_save); } ?>"/>
    <input type="checkbox" name="lnkd_meta_save_chkbx" id="lnkd_meta_save_chkbx" <?php if ($lnkd_meta_save_chkbx) { echo "checked"; } ?> /><?php esc_html_e("Open link in new tab", DJS_POSTTYPE_PLUGIN); ?></p>
    
    <p><h4 class="heading"><?php esc_html_e("Twitter URL", DJS_POSTTYPE_PLUGIN); ?></h4></p>
    <p><input style="width:70%; padding: 10px;" name="twt_meta_save" id="twt_meta_save" placeholder="<?php esc_attr_e("Twitter URL", DJS_POSTTYPE_PLUGIN); ?>"  value="<?php if (!empty($twt_meta_save)) { echo esc_attr($twt_meta_save); } ?>"/>	
    <input type="checkbox" name="twt_meta_save_chkbx" id="twt_meta_save_chkbx" <?php if ($twt_meta_save_chkbx) { echo "checked"; } ?> /><?php esc_html_e("Open link in new tab", DJS_POSTTYPE_PLUGIN); ?></p>
<?php }

function wallstreet_meta_client() {
    global $post;
    $client_link = sanitize_text_field(get_post_meta(get_the_ID(), "clientstrip_link", true));
    $meta_client_target = sanitize_text_field(get_post_meta(get_the_ID(), "meta_client_target", true)); ?>

    <p><h4 class="heading"><?php esc_html_e("Link", DJS_POSTTYPE_PLUGIN); ?></h4>
    <p><input class="inputwidth" name="client_link" id="client_link" placeholder="<?php esc_attr_e("Link", DJS_POSTTYPE_PLUGIN); ?>" type="text" value="<?php if (!empty($client_link)) { echo esc_attr($client_link); } ?>"></input></p>
    <p><input type="checkbox" id="meta_client_target" name="meta_client_target" <?php if ($meta_client_target) { echo "checked"; } ?> > <?php esc_html_e("Open link in new tab", DJS_POSTTYPE_PLUGIN); ?></p>	
    <p><label><?php esc_html_e("Upload client image using feature image. Best fit scenario is using 130 X 130 px image.", DJS_POSTTYPE_PLUGIN); ?></label></p>
<?php }

function wallstreet_meta_partner() {
    global $post;
    $partner_link = sanitize_text_field(get_post_meta(get_the_ID(), "partnerstrip_link", true));
    $meta_partner_target = sanitize_text_field(get_post_meta(get_the_ID(), "meta_partner_target", true)); ?>

    <p><h4 class="heading"><?php esc_html_e("Link", DJS_POSTTYPE_PLUGIN); ?></h4>
    <p><input class="inputwidth" name="partner_link" id="partner_link" placeholder="<?php esc_attr_e("Link", DJS_POSTTYPE_PLUGIN); ?>" type="text" value="<?php if (!empty($partner_link)) { echo esc_attr($partner_link); } ?>"></input></p>
    <p><input type="checkbox" id="meta_partner_target" name="meta_partner_target" <?php if ($meta_partner_target) { echo "checked"; } ?> > <?php esc_html_e("Open link in new tab", DJS_POSTTYPE_PLUGIN); ?></p>	
    <p><label><?php esc_html_e("Upload partner image using feature image. Best fit scenario is using 130 X 130 px image.", DJS_POSTTYPE_PLUGIN); ?></label></p>
<?php }

function wallstreet_meta_save($post_id) {
    if ((defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) || (defined("DOING_AJAX") && DOING_AJAX) || isset($_REQUEST["bulk_edit"])) {
        return;
    }

    if (!current_user_can("edit_page", $post_id)) {
        return;
    }
    if (isset($_POST["post_ID"])) {
        $post_ID = $_POST["post_ID"];
        $post_type = get_post_type($post_ID);
        if ($post_type == SLIDER_POST_TYPE) {
            update_post_meta($post_ID, "slider_title", sanitize_text_field($_POST["slider_title"]));
            update_post_meta($post_ID, "slider_description", sanitize_text_field($_POST["slider_description"]));
            update_post_meta($post_ID, "slider_button_text", sanitize_text_field($_POST["slider_button_text"]));
            update_post_meta($post_ID, "slider_button_link", sanitize_text_field($_POST["slider_button_link"]));
            update_post_meta($post_ID, "slider_button_target", sanitize_text_field($_POST["slider_button_target"]));
        } elseif ($post_type == SERVICE_POST_TYPE) {
            update_post_meta($post_ID, "service_icon_image", sanitize_text_field($_POST["service_icon_image"]));
            update_post_meta($post_ID, "service_icon_target", sanitize_text_field($_POST["service_icon_target"]));
            update_post_meta($post_ID, "meta_service_link", sanitize_text_field($_POST["meta_service_link"]));
            update_post_meta($post_ID, "meta_service_target", sanitize_text_field($_POST["meta_service_target"]));
            update_post_meta($post_ID, "service_description_text", sanitize_text_field($_POST["service_description_text"]));
            update_post_meta($post_ID, "service_readmore_text", sanitize_text_field($_POST["service_readmore_text"]));
        } elseif ($post_type == PORTFOLIO_POST_TYPE) {
            update_post_meta($post_ID, "portfolio_client_project_title", sanitize_text_field($_POST["portfolio_client_project_title"]));
            update_post_meta($post_ID, "meta_project_target", sanitize_text_field($_POST["meta_project_target"]));
            update_post_meta($post_ID, "meta_project_link", sanitize_text_field($_POST["meta_project_link"]));
            update_post_meta($post_ID, "portfolio_project_visit_site", sanitize_text_field($_POST["portfolio_project_visit_site"]));
            update_post_meta($post_ID, "portfolio_project_button_text", sanitize_text_field($_POST["portfolio_project_button_text"]));
            update_post_meta($post_ID, "portfolio_project_summary", sanitize_text_field($_POST["portfolio_project_summary"]));
            update_post_meta($post_ID, "meta_button_target", sanitize_text_field($_POST["meta_button_target"]));
            update_post_meta($post_ID, "meta_button_link", sanitize_text_field($_POST["meta_button_link"]));
        } elseif ($post_type == "page") {
            update_post_meta($post_ID, "page_description", sanitize_text_field($_POST["page_description"]));
            update_post_meta($post_ID, "content_page_layout", sanitize_text_field($_POST["content_page_layout"]));
        } elseif ($post_type == "post") {
            update_post_meta($post_ID, "post_description", sanitize_text_field($_POST["post_description"]));
            update_post_meta($post_ID, "content_post_layout", sanitize_text_field($_POST["content_post_layout"]));
        } elseif ($post_type == TESTIMONIAL_POST_TYPE) {
            update_post_meta($post_ID, "testimonial_description_text", sanitize_text_field($_POST["testimonial_description_text"]));
        } elseif ($post_type == TEAM_POST_TYPE) {
            update_post_meta($post_ID, "designation_meta_save", sanitize_text_field($_POST["designation_meta_save"]));
            update_post_meta($post_ID, "description_meta_save", sanitize_text_field($_POST["description_meta_save"]));
            update_post_meta($post_ID, "fb_meta_save", sanitize_text_field($_POST["fb_meta_save"]));
            update_post_meta($post_ID, "fb_meta_save_chkbx", sanitize_text_field($_POST["fb_meta_save_chkbx"]));
            update_post_meta($post_ID, "skype_meta_save", sanitize_text_field($_POST["skype_meta_save"]));
            update_post_meta($post_ID, "skype_meta_save_chkbx", sanitize_text_field($_POST["skype_meta_save_chkbx"]));
            update_post_meta($post_ID, "rss_meta_save", sanitize_text_field($_POST["rss_meta_save"]));
            update_post_meta($post_ID, "rss_meta_save_chkbx", sanitize_text_field($_POST["rss_meta_save_chkbx"]));
            update_post_meta($post_ID, "lnkd_meta_save", sanitize_text_field($_POST["lnkd_meta_save"]));
            update_post_meta($post_ID, "lnkd_meta_save_chkbx", sanitize_text_field($_POST["lnkd_meta_save_chkbx"]));
            update_post_meta($post_ID, "twt_meta_save", sanitize_text_field($_POST["twt_meta_save"]));
            update_post_meta($post_ID, "twt_meta_save_chkbx", sanitize_text_field($_POST["twt_meta_save_chkbx"]));
        } elseif ($post_type == CLIENT_POST_TYPE) {
            update_post_meta($post_ID, "clientstrip_link", sanitize_text_field($_POST["client_link"]));
            update_post_meta($post_ID, "meta_client_target", sanitize_text_field($_POST["meta_client_target"]));
        } elseif ($post_type == PARTNER_POST_TYPE) {
            update_post_meta($post_ID, "partnerstrip_link", sanitize_text_field($_POST["partner_link"]));
            update_post_meta($post_ID, "meta_partner_target", sanitize_text_field($_POST["meta_partner_target"]));
        }
    }
} ?>
