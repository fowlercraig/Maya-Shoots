<?php
add_action('after_setup_theme', 'blankslate_setup');
function blankslate_setup()
{
load_theme_textdomain('blankslate', get_template_directory() . '/languages');
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'logged-in' => __( 'Logged In', 'blankslate' ) )
);
register_nav_menus(
array( 'logged-out' => __( 'Logged Out', 'blankslate' ) )
);
register_nav_menus(
array( 'footer-menu' => __( 'Footer Menu', 'blankslate' ) )
);
}
add_action('wp_enqueue_scripts', 'blankslate_load_scripts');
function blankslate_load_scripts()
{
wp_enqueue_script('jquery');
}
add_action('comment_form_before', 'blankslate_enqueue_comment_reply_script');
function blankslate_enqueue_comment_reply_script()
{
if (get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
}
add_filter('the_title', 'blankslate_title');
function blankslate_title($title) {
if ($title == '') {
return '&rarr;';
} else {
return $title;
}
}
add_filter('wp_title', 'blankslate_filter_wp_title');
function blankslate_filter_wp_title($title)
{
return $title . esc_attr(get_bloginfo('name'));
}
add_action('widgets_init', 'blankslate_widgets_init');
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __('Sidebar Widget Area', 'blankslate'),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings($comment)
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter('get_comments_number', 'blankslate_comments_number');
function blankslate_comments_number($count)
{
if (!is_admin()) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count($comments_by_type['comment']);
} else {
return $count;
}
}

function devpress_login_form_shortcode() {
	if ( is_user_logged_in() )
		return '';

	return wp_login_form( array( 'echo' => true ) );
}

function devpress_add_shortcodes() {
	add_shortcode( 'devpress-login-form', 'devpress_login_form_shortcode' );
}

add_action( 'init', 'devpress_add_shortcodes' );

add_action('wp_logout','go_home');
function go_home(){
  wp_redirect( home_url() );
  exit();
}

add_image_size( 'index-thumb', 300, 9999 );
add_image_size( 'project-thumb', 600, 600, true );
add_image_size( 'index-thumb-mobile', 300, 300 );

require_once(TEMPLATEPATH.'/snippets/themewrangler.class.php');

$settings = array(

    'available_scripts' => array(
      'jquery'		   => array('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js','1.10.2'),
      'magnific'		=> array('//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/0.9.9/jquery.magnific-popup.min.js'),
      'imagesloaded' => array('//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/3.0.4/jquery.imagesloaded.min.js'),
      'transit'		=> array('//cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.9/jquery.transit.min.js'),
      'superfish'		=> array('//cdnjs.cloudflare.com/ajax/libs/superfish/1.7.4/superfish.min.js'),
      'accordion'	   => array('//./././javascripts/plugins.js'),
      'collapse'	   => array('/wp-content/themes/mayashoots_update/javascripts/jquery.collapse.js'),
      'collapses'	   => array('/wp-content/themes/mayashoots_update/javascripts/jquery.collapse_storage.js'),
      'collapsec'	   => array('/wp-content/themes/mayashoots_update/javascripts/jquery.collapse_cookie_storage.js'),
      'global'		   => array('/wp-content/themes/mayashoots_update/javascripts/jquery.hoveraccordion.min.js'),
      'scripts'		=> array('/wp-content/themes/mayashoots_update/javascripts/scripts.js'),
      'smartajax'		=> array('/wp-content/themes/mayashoots_update/javascripts/load.smartajax.js'),
    ),
    
    'default_scripts'=> array(
      'jquery',
      'smartajax', 
      'magnific', 
      'imagesloaded', 
      'transit', 
      'collapse', 
      'collapses', 
      'collapsec', 
      'plugins', 
      'scripts'
    ),
    
    'available_stylesheets' => array(
      'default' 	   => array('/wp-content/themes/mayashoots_update/style.css',1),
      'plugins' 	   => array('/wp-content/themes/mayashoots_update/stylesheets/plugins.css'),
      'layout' 		=> array('/wp-content/themes/mayashoots_update/stylesheets/layout.css'),
      'fonts' 		   => array('//fast.fonts.com/cssapi/b4536772-c013-4a38-9bd1-55bdc006019b.css'),
    ),
    
    'default_stylesheets' => array('default','layout', 'plugins'),
    
    'remove_from_head' => array(
      'rsd_link',
      'wlwmanifest_link',
      'wp_generator',
      'rel_canonical',
      'index_rel_link',
      'parent_post_rel_link',
      'start_post_rel_link',
      'adjacent_posts_rel_link',
      'adjacent_posts_rel_link_wp_head',
      'wp_shortlink_wp_head',
      'wp_shortlink_wp_header',
      'feed_links',
      'latest_comments',
      'feed_links_extra',
    ),
    
    'deregister_scripts' => array('jquery','l10n')

  );

Themewrangler::set_defaults( $settings );

add_filter('show_admin_bar', '__return_false');
function twentyten_remove_recent_comments_style() {  
        global $wp_widget_factory;  
        remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );  
    }  
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );

function the_slug($echo=true){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  if( $echo ) echo $slug;
  do_action('after_slug', $slug);
  return $slug;
}