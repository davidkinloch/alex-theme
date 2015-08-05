<?php


//login 
function my_login_logo_url() {
return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
return 'Alexanders College';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

// hide drafts
function relationship_options_filter($options, $field, $the_post) {
$options['post_status'] = array('publish');
return $options;
}
add_filter('acf/fields/post_object/query/name=choose_a_project', 'relationship_options_filter', 10, 3);


//toolbar 
add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
function my_toolbars( $toolbars )
{
    // Uncomment to view format of $toolbars
    /*
    echo '< pre >';
        print_r($toolbars);
    echo '< /pre >';
    die;
    */

    // Add a new toolbar called "Very Simple"
    // - this toolbar has only 1 row of buttons
    $toolbars['Very Simple' ] = array();
    $toolbars['Very Simple' ][1] = array('bold' , 'italic' , 'underline' );

    // Edit the "Full" toolbar and remove 'code'
    // - delet from array code from http://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
    if( ($key = array_search('code' , $toolbars['Full' ][2])) !== false )
    {
        unset( $toolbars['Full' ][2][$key] );
    }

    // remove the 'Basic' toolbar completely
    unset( $toolbars['Basic' ] );

    // return $toolbars - IMPORTANT!
    return $toolbars;
}

//remove media buttons from contributor
function RemoveAddMediaButtonsForNonAdmins(){
if ( !current_user_can( 'manage_options' ) ) {
remove_action( 'media_buttons', 'media_buttons' );
}
}
add_action('admin_head', 'RemoveAddMediaButtonsForNonAdmins');

function remove_tinymce_buttons( $buttons ){
    //Remove last 3 buttons in the second row
    //Undo/Redo/Keyboard Shortcuts
    $remove = array( 'bold', 'italic', 'strikethrough', 'bullist', 'numlist', 'blockquote', 'hr', 'alignleft', 'aligncenter', 'alignright', 'link', 'unlink', 'wp_more', 'spellchecker', 'fullscreen', 'wp_adv');
 
    return array_diff( $buttons, $remove );
 }
 
add_filter( 'mce_buttons','remove_tinymce_buttons' );

function remove_tinymce2_buttons( $buttons ){
    //Remove last 3 buttons in the second row
    //Undo/Redo/Keyboard Shortcuts
    $remove = array( 'formatselect', 'underline', 'alignjustify', 'forecolor', 'pastetext','removeformat','charmap','outdent','indent', 'undo', 'redo', 'wp_help' );
 
    return array_diff( $buttons, $remove );
 }
 
add_filter( 'mce_buttons_2','remove_tinymce2_buttons' );

add_filter('quicktags_settings', 'cyb_quicktags_settings');
function cyb_quicktags_settings( $qtInit  ) {
    //Set to emtpy string, empty array or false won't work. It must be set to ","
    $qtInit['buttons'] = ',';
    return $qtInit;
}

//remove screen options
add_filter('screen_options_show_screen', '__return_false');

//remove comments
// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if(post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
    return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url()); exit;
    }
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}
add_action('init', 'df_disable_comments_admin_bar');
//end of remove comments


//remove menu items tools for contributor
add_action( 'admin_init', 'my_remove_menu_pages' );
function my_remove_menu_pages() {

    global $user_ID;

    if ( current_user_can( 'contributor' ) ) {
        remove_menu_page('tools.php');
        remove_menu_page('edit.php?post_type=team');
        remove_menu_page('profile.php');
        remove_menu_page('media.php');
        remove_menu_page('edit.php');
    }
}

//remove update nag for contributor
add_action('admin_head','admin_css');
function admin_css()
{
if( current_user_can('contributor'))//Choose the correct role where you need to block update nag
{
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
}
}



// change name posts to project
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Projects';
    $submenu['edit.php'][5][0] = 'Projects';
    $submenu['edit.php'][10][0] = 'New Project';
    $submenu['edit.php'][16][0] = 'Projects Tags';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Projects';
    $labels->singular_name = 'Projects';
    $labels->add_new = 'New Project';
    $labels->add_new_item = 'New Project';
    $labels->edit_item = 'Edit Projects';
    $labels->new_item = 'Projects';
    $labels->view_item = 'View Projects';
    $labels->search_items = 'Search Projects';
    $labels->not_found = 'No Projects found';
    $labels->not_found_in_trash = 'No Projects found in Trash';
    $labels->all_items = 'All Projects';
    $labels->menu_name = 'Projects';
    $labels->name_admin_bar = 'Projects';
}

add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

//add dashboard widgets
/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function wps_recent_posts_dw() {
?>
    <p><a href='/wordpress/wp-admin/post-new.php' class='button button-primary'>Start a New Project</a></p>
    <p>or</p>
    <p>Work on an existing project:</p>
   <ul>
     <?php
          global $post;
          global $current_user;
            get_currentuserinfo();
            global $user_level;

            if ( $user_level < 5) {
                $args = array( 'numberposts' => -1, 'orderby' => 'date', 'post_status' => 'any', 'author' => $current_user->ID );
            } else {
                $args = array( 'numberposts' => -1, 'orderby' => 'date', 'post_status' => 'any');
            }
            $myposts = get_posts( $args );
                foreach( $myposts as $post ) :  setup_postdata($post); ?>
                    <li><a href="post.php?post=<?php echo get_the_ID(); ?>&action=edit"><?php the_title(); ?></a></li>
                <?php endforeach; ?>
   </ul>
<?php
}

function add_wps_recent_posts_dw() {
       wp_add_dashboard_widget( 'wps_recent_posts_dw', __( 'Recent Posts' ), 'wps_recent_posts_dw' );
}
add_action('wp_dashboard_setup', 'add_wps_recent_posts_dw' );


// remove dashboard widgets 
function remove_dashboard_widgets() {
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );


/**
 * Create the function to output the contents of our Dashboard Widget.
 */

/**
 * Register `team` post type
 */
function team_post_type() {
   
   // Labels
    $labels = array(
        'name' => _x("Team", "post type general name"),
        'singular_name' => _x("Team", "post type singular name"),
        'menu_name' => 'Team Profiles',
        'add_new' => _x("Add New", "team item"),
        'add_new_item' => __("Add New Profile"),
        'edit_item' => __("Edit Profile"),
        'new_item' => __("New Profile"),
        'view_item' => __("View Profile"),
        'search_items' => __("Search Profiles"),
        'not_found' =>  __("No Profiles Found"),
        'not_found_in_trash' => __("No Profiles Found in Trash"),
        'parent_item_colon' => ''
    );
    
    // Register post type
    register_post_type('team' , array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-groups',
        'rewrite' => false,
        'supports' => array('title', 'editor', 'thumbnail')
    ) );
}
add_action( 'init', 'team_post_type', 0 );


function wpb_change_title_text( $title ){
     $screen = get_current_screen();
 
     if  ( 'team' == $screen->post_type ) {
          $title = 'Profile name';
     }
 
     return $title;
}
 
add_filter( 'enter_title_here', 'wpb_change_title_text' );


// contributors add images to posts 
if ( current_user_can('contributor') && !current_user_can('upload_files') )
    add_action('admin_init', 'allow_contributor_uploads');
function allow_contributor_uploads() {
    $contributor = get_role('contributor');
    $contributor->add_cap('upload_files');
}


//remove menu items from contibutor
function remove_menus(){

$author = wp_get_current_user();
if(isset($author->roles[0])){ 
    $current_role = $author->roles[0];
}else{
    $current_role = 'no_role';
}

if($current_role == 'contributor'){  
  remove_menu_page( 'Team Profiles' );                  //Dashboard
}

}
add_action( 'admin_menu', 'remove_menus' );

//admin Stylesheet 
add_action('admin_head', 'custom_style');

function custom_style() {
  echo '<link rel="stylesheet" href="/wp-content/themes/alexanders-college/admin-style.css" type="text/css" media="all" />';
}


function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/admin-style.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

/**
 * Add automatic image sizes
 */
if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'super-hero', 1020, 490, true );
    add_image_size( 'super-hero-thumb', 510, 245, true );
    add_image_size( 'hero', 1020, 400, true );
    add_image_size( 'section-image', 455, 330, true );
    add_image_size( 'big-block-image', 457, 296, true ); 
    add_image_size( 'projects-thumb', 442, 250, true ); 
    add_image_size( 'projects-small', 462, 374, true ); 
}

// srip inl dimensions on images
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}


// add category nicenames in body and post class
function category_id_class( $classes ) {
    global $post;
    foreach ( get_the_category( $post->ID ) as $category ) {
        $classes[] = $category->category_nicename;
    }
    return $classes;
}
add_filter( 'post_class', 'category_id_class' );
add_filter( 'body_class', 'category_id_class' );

//diable admin bar
add_filter('show_admin_bar', '__return_false');

// Add thumbnai to posts
add_theme_support( 'post-thumbnails' );

// ADD MENU 
function register_my_menu() {
  register_nav_menu('main-nav',__( 'Main Nav' ));
}
add_action( 'init', 'register_my_menu' );


// Register widgetized areas
function theme_widgets_init() {
// Area 1
register_sidebar( array (
'name' => 'Primary Widget Area',
'id' => 'primary_widget_area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h4 class="widget-title">',
'after_title' => '</h4>',
 ) );

// Area 2
register_sidebar( array (
'name' => 'Secondary Widget Area',
 'id' => 'secondary_widget_area',
'before_widget' => '',
'after_widget' => "",
'before_title' => '<h4 class="widget-title">',
'after_title' => '</h4>',
 ) );
} 

// end theme_widgets_init

add_action( 'init', 'theme_widgets_init' );

$preset_widgets = array (
'primary_widget_area'  => array( 'search', 'pages', 'categories', 'archives' ),
'secondary_widget_area'  => array( 'links', 'meta' )
 );
if ( isset( $_GET['activated'] ) ) {
update_option( 'sidebars_widgets', $preset_widgets );
}

// update_option( 'sidebars_widgets', NULL );

// Check for static widgets in widget-ready areas
function is_sidebar_active( $index ){
global $wp_registered_sidebars;
$widgetcolums = wp_get_sidebars_widgets();
if ($widgetcolums[$index]) return true;
return false;
} // end is_sidebar_active

// remove p tags from images
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');