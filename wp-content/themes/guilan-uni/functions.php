<?php
require get_theme_file_path('/inc/like-route.php');
require get_theme_file_path('/inc/search-route.php');
require get_theme_file_path('/inc/shopSearch-route.php');
function addData()
{
    register_rest_field('post', 'ahad', array(
        'get_callback' => function () {
            return get_the_author();
        }
    ));
}
add_action('rest_api_init', 'addData');
function banner($args = null)
{
    if (!$args['title']) {
        $args['title'] = get_the_title();
    }

    if (!$args['subtitle']) {
        $args['subtitle'] = get_field('banner_subtitle');
    }

    if (!$args['photo']) {
        if (get_field('banner_image')) {
            $args['photo'] = get_field('banner_image')['sizes']['pageBanner'];
        } else {
            $args['photo'] = get_theme_file_uri('/images/inaki-del-olmo-NIJuEQw0RKg-unsplash.jpg');
        }
    }
?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo'] ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">
                <?php echo $args['title']; ?>
            </h1>
            <div class="page-banner__intro">
                <p> <?php echo $args['subtitle'] ?></p>
            </div>
        </div>
    </div>
<?php
}
function load_css()
{
    wp_register_style('style1', get_stylesheet_uri());
    wp_register_style('fontawsome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_register_style('style2', get_template_directory_uri() . "/build/index.css");
    wp_enqueue_style('fontawsome');
    wp_enqueue_style('style2');
    wp_enqueue_style('style1');
    wp_enqueue_style('bard-woocommerce', get_theme_file_uri('/shopitems/shopstyle.css'));
}
add_action('wp_enqueue_scripts', 'load_css');

function load_js()
{
    if (is_page(array('shop','cart')) || is_product() ) {
        wp_register_script('shopscript', get_template_directory_uri() . "/shopitems/shopscript.js", null, false, true);
    }
    if (!( is_page(array('shop','cart'))||is_product())) {
        wp_register_script('mainjs', get_template_directory_uri() . "/build/index.js", null, false, true);
    }
    
 
    if (is_page(array('shop','cart')) || is_product() ) {
        wp_enqueue_script('shopscript');
    }
    if (!( is_page(array('shop','cart'))||is_product()) ) {
        wp_enqueue_script('mainjs');
    }

    

    wp_localize_script('mainjs', 'uniData', array(
        'siteUrl' => get_site_url(),
        'nonce' => wp_create_nonce('wp_rest')
    ));
    wp_localize_script('shopscript', 'uniData', array(
        'siteUrl' => get_site_url(),
        'nonce' => wp_create_nonce('wp_rest')
    ));
}
add_action('wp_enqueue_scripts', 'load_js');

function add_features()
{
    register_nav_menu('topMenu', 'Top Menu');
    register_nav_menu('topMenushop', 'shop');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('profesorSmall', 400, 260, true);
    add_image_size('profesorMedium', 480, 650, true);
    add_image_size('pageBanner', 1500, 350, true);
    //woocommerce---------------------------
    // add_theme_support( 'woocommerce' );
    // add_theme_support( 'wc-product-gallery-zoom' );
    // add_theme_support( 'wc-product-gallery-lightbox' );
    // add_theme_support( 'wc-product-gallery-slider' );
}

add_action('after_setup_theme', 'add_features');

add_action('admin_init', 'redirectSub');

function redirectSub()
{
    $currentuser = wp_get_current_user();
    if (count($currentuser->roles) == 1 && $currentuser->roles[0] == 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
    }
}

add_action('wp_loaded', 'deletebanner');

function deletebanner()
{
    $currentuser = wp_get_current_user();
    if (count($currentuser->roles) == 1 && $currentuser->roles[0] == 'subscriber') {
        show_admin_bar(false);
    }
}
// make registration customize
add_filter('login_headerurl', 'ownHeader');
function ownHeader()
{
    return esc_url(site_url('/'));
}


add_action('login_enqueue_scripts', 'registrationCss');
function registrationCss()
{
    wp_enqueue_style('style1', get_stylesheet_uri());
}

add_filter('login_headertitle', 'headertitle');
function headertitle()
{
    return 'دانشگاه گیلان';
}

//make notes post type private-------------------------------------->>>>>>>>>>>>>>>>>>>>>>>

add_filter('wp_insert_post_data', 'makeItPrivate');
function makeItPrivate($data)
{
    if ($data['post_type'] == 'note') {
        $data['post_content'] = sanitize_textarea_field($data['post_content']);
        $data['post_title'] = sanitize_text_field($data['post_title']);
    }


    if ($data['post_type'] == 'note' && $data['post_status'] != 'trash') {
        $data['post_status'] = 'private';
    }
    return $data;
}
//add category to custom post type
function reg_cat()
{
    register_taxonomy_for_object_type('category', 'event');
    register_taxonomy_for_object_type('category', 'profesor');
    register_taxonomy_for_object_type('category', 'program');
}
add_action('init', 'reg_cat');
//remove admin bar ---->>>>>>>>>>
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar()
{
    // if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
// }


?>