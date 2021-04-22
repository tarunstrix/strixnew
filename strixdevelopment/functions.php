<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {

    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    $theme = wp_get_theme();

    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 

        array(),  // if the parent theme code has a dependency, copy it to here

        $theme->parent()->get('Version')

    );

    wp_enqueue_style( 'child-style', get_stylesheet_uri(),

        array( $parenthandle ),

        $theme->get('Version') // this only works if you have Version in the style header

    );
    

}
 //--------------Adding script to elementor
     add_action( 'elementor/frontend/before_enqueue_scripts', function() {
     wp_enqueue_script( 'plugin-slick-frontend', get_stylesheet_directory_uri() . '/assets/js/slick.js', ['elementor-frontend', ], 'plugin_version',true );
     wp_enqueue_script( 'plugin-name-frontend', get_stylesheet_directory_uri() . '/assets/js/custom-slider.js', ['elementor-frontend', ], 'plugin_version',true );
     });
/*
* Creating a function to create our CPT
*/
function my_custom_post_product() {
  $labels = array(
    'name'               => _x( 'Experts', 'post type general name' ),
    'singular_name'      => _x( 'Expert', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Expert' ),
    'edit_item'          => __( 'Edit Expert' ),
    'new_item'           => __( 'New Expert' ),
    'all_items'          => __( 'All Experts' ),
    'view_item'          => __( 'View Expert' ),
    'search_items'       => __( 'Search Experts' ),
    'not_found'          => __( 'No Expert found' ),
    'not_found_in_trash' => __( 'No Expert found in the Trash' ), 
    'parent_item_colon'  => ’,
    'menu_name'          => 'Experts'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => ' our Experts and their specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
    'has_archive'   => true,
  );
  register_post_type( 'expert', $args ); 
}
add_action( 'init', 'my_custom_post_product' );



//post type for testimonial
function my_custom_post_testimonial() {
  $labels = array(
    'name'               => _x( 'testimonials', 'post type general name' ),
    'singular_name'      => _x( 'testimonial', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'testimonial' ),
    'add_new_item'       => __( 'Add New testimonial' ),
    'edit_item'          => __( 'Edit testimonial' ),
    'new_item'           => __( 'New testimonial' ),
    'all_items'          => __( 'All testimonials' ),
    'view_item'          => __( 'View testimonial' ),
    'search_items'       => __( 'Search testimonials' ),
    'not_found'          => __( 'No testimonial found' ),
    'not_found_in_trash' => __( 'No testimonial found in the Trash' ), 
    'parent_item_colon'  => ’,
    'menu_name'          => 'testimonial'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => ' clint review and their specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
    'has_archive'   => true,
  );
  register_post_type( 'testimonial', $args ); 
}
add_action( 'init', 'my_custom_post_testimonial' );

//post type for portfolio
function my_custom_post_portfolio() {
  $labels = array(
    'name'               => _x( 'portfolios', 'post type general name' ),
    'singular_name'      => _x( 'portfolio', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'portfolio' ),
    'add_new_item'       => __( 'Add New portfolio' ),
    'edit_item'          => __( 'Edit portfolio' ),
    'new_item'           => __( 'New portfolio' ),
    'all_items'          => __( 'All portfolios' ),
    'view_item'          => __( 'View portfolio' ),
    'search_items'       => __( 'Search portfolios' ),
    'not_found'          => __( 'No portfolio found' ),
    'not_found_in_trash' => __( 'No portfolio found in the Trash' ), 
    'parent_item_colon'  => ’,
    'menu_name'          => 'portfolio'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => ' our portfolio',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
    'has_archive'   => true,
  );
  register_post_type( 'portfolio', $args ); 
}
add_action( 'init', 'my_custom_post_portfolio' );

// Breadcrumbs
function page_breadcrumbs() {
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
add_shortcode( 'page-menu', 'page_breadcrumbs' );
// shortcode for slick slider 
function slick_shortcode() {
    
 ob_start();
 include(get_stylesheet_directory() . '/template-part/slider.php');
 return    ob_get_clean();
}
add_shortcode('slick-slider' , 'slick_shortcode');

//shortcode for testimonial
function testimonial_shortcode() {
    
 ob_start();
 include(get_stylesheet_directory() . '/template-part/testimonial.php');
 return    ob_get_clean();
}
add_shortcode('custom-testimonial' , 'testimonial_shortcode');
//shortcode for portfolio
function portfolio_shortcode() {
    
 ob_start();
 include(get_stylesheet_directory() . '/template-part/portfolio.php');
 return    ob_get_clean();
}
add_shortcode('custom-portfolio' , 'portfolio_shortcode');
