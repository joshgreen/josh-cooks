<?php
/**
 * josh-cooks functions and definitions
 *
 * @package josh-cooks
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
  $content_width = 640; /* pixels */
}

if ( ! function_exists( 'josh_cooks_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function josh_cooks_setup() {

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on josh-cooks, use a find and replace
   * to change 'josh-cooks' to the name of your theme in all the template files
   */
  load_theme_textdomain( 'josh-cooks', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  //add_theme_support( 'post-thumbnails' );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'josh-cooks' ),
  ) );




  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
  ) );

  /*
   * Enable support for Post Formats.
   * See http://codex.wordpress.org/Post_Formats
   */
  add_theme_support( 'post-formats', array(
    'aside', 'image', 'video', 'quote', 'link',
  ) );

  // Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'josh_cooks_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );
}
endif; // josh_cooks_setup
add_action( 'after_setup_theme', 'josh_cooks_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function josh_cooks_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Sidebar', 'josh-cooks' ),
    'id'            => 'sidebar-1',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h1 class="widget-title">',
    'after_title'   => '</h1>',
  ) );
}
add_action( 'widgets_init', 'josh_cooks_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function josh_cooks_scripts() {
  wp_enqueue_style( 'josh-cooks-style', get_stylesheet_uri() );

  wp_enqueue_script( 'josh-cooks-my', get_template_directory_uri() . '/js/my.js', array(), '', true );

  wp_enqueue_script( 'josh-cooks-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151201', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'josh_cooks_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Featured image support
 */
add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );
add_image_size('large-thumb', 1060, 650, true);
add_image_size('feature-image', 2280, 1922);
set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
// additional image sizes
// delete the next line if you do not need additional image sizes
add_image_size( 'blog-thumb', 800, 9999 ); //300 pixels wide (and unlimited height)
}

add_image_size( 'custom-size', 220, 180 );

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
       // return '<a href="'. get_permalink($post->ID) . '">...</a>';
       return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
* Change Excerpt length
*/
function my_excerpt_length($length) {
return 30;
}
add_filter('excerpt_length', 'my_excerpt_length');



/**
* Remove class and ID’s from Custom Menus
*/
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
// function my_css_attributes_filter($var) {
//   return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
// }

/**
* Breadcrumbs without plugin
*/
function the_breadcrumb() {
    echo '<ul id="crumbs">';
  if (!is_home()) {
    echo '<li><a href="';
    echo get_option('home');
    echo '">';
    echo 'Home';
    echo "</a></li>";
    if (is_category() || is_single()) {
      echo '<li>';
      the_category(' </li><li> ');
      if (is_single()) {
        echo "</li><li>";
        the_title();
        echo '</li>';
      }
    } elseif (is_page()) {
      echo '<li>';
      echo the_title();
      echo '</li>';
    }
  }
  elseif (is_tag()) {single_tag_title();}
  elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
  elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
  elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
  elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
  elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
  elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
  echo '</ul>';
}


/**
 * Prints jQuery in footer on front-end.
 */
function ds_print_jquery_in_footer( &$scripts) {
  if ( ! is_admin() )
    $scripts->add_data( 'jquery', 'group', 1 );
}
add_action( 'wp_default_scripts', 'ds_print_jquery_in_footer' );

/**
* Add custom post type to feed
*/
function myfeed_request($qv) {
    if (isset($qv['feed']) && !isset($qv['post_type']))
        $qv['post_type'] = array('post', 'recipes', 'ingerdients', 'sousviderecipe');
    return $qv;
}
add_filter('request', 'myfeed_request');

/**
* Add custom post type to feed
*/
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if(is_single() && $item->title == "Blog"){ //Notice you can change the conditional from is_single() and $item->title
             $classes[] = "special-class";
     }
     return $classes;
}

// Featured images
add_theme_support( 'post-thumbnails' );
add_image_size('large-thumb', 1060, 650, true);
add_image_size('super-thumb', 2080, auto, true);


// class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
//   function start_el ( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
//     // Copy all the start_el code from source, and modify



//     //
//   }

//   function end_el( &$output, $item, $depth = 0, $args = array() ) {
//     // Copy all the end_el code from source, and modify
//   }
// }

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '';
           $append = '';
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}

add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {

  $parents = array();
  foreach ( $items as $item ) {
    if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
      $parents[] = $item->menu_item_parent;
    }
  }

  foreach ( $items as $item ) {
    if ( in_array( $item->ID, $parents ) ) {
      $item->classes[] = 'dropdown';
    }
  }

  return $items;
}


// move scripts to footer

function remove_head_scripts() {
   remove_action('wp_head', 'wp_print_scripts');
   remove_action('wp_head', 'wp_print_head_scripts', 9);
   remove_action('wp_head', 'wp_enqueue_scripts', 1);

   add_action('wp_footer', 'wp_print_scripts', 5);
   add_action('wp_footer', 'wp_enqueue_scripts', 5);
   add_action('wp_footer', 'wp_print_head_scripts', 5);
}
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );

// remove junk from head
// remove_action('wp_head', 'rsd_link');
// remove_action('wp_head', 'wp_generator');
// remove_action('wp_head', 'feed_links', 2);
// remove_action('wp_head', 'index_rel_link');
// remove_action('wp_head', 'wlwmanifest_link');
// remove_action('wp_head', 'feed_links_extra', 3);
// remove_action('wp_head', 'start_post_rel_link', 10, 0);
// remove_action('wp_head', 'parent_post_rel_link', 10, 0);
// remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

// Remove login errors
add_filter('login_errors', create_function('$a', "return null;"));

// hide Admin bar
show_admin_bar( false );

// Remove the wordpress update notification for all users except sysadmin
   global $user_login;
   get_currentuserinfo();
   if ($user_login !== "admin") { // change admin to the username that gets the updates
    add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
    add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
   }

// Enable GZIP output compression
 if(extension_loaded("zlib") && (ini_get("output_handler") != "ob_gzhandler"))
   add_action('wp', create_function('', '@ob_end_clean();@ini_set("zlib.output_compression", 1);'));

// Change the login logo with yours
 function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/forageorporridge-login.svg) !important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');



//Add custom post types to categories
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if( is_category() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item', 'post', 'recipes', 'ingerdients', 'sousviderecipe'); // don't forget nav_menu_item to allow menus to work!
    $query->set('post_type',$post_type);
    return $query;
    }
}



// Image class
function image_tag_class($class) {
    $class .= ' jc-img';
    return $class;
}
add_filter('get_image_tag_class', 'image_tag_class' );