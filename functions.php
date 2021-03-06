<?php
/**
 * Opgave 3 tema setup
 */


// Registrer sidebar widget område
function opgavetre_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Hoved Sidebar', 'theme-slug' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets i dette område vil blive vist i højre side.', 'opgavetre' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'opgavetre_widgets_init' );

function opgavetre_setup() {
  // Der gøres brug af widgets

  // Der gøres brug af post_thumbnail
  add_theme_support( 'post-thumbnails' );

  // Der gøres også brug af brugerdefinerede header-billeder
  $args = array(
  	'width'         => 980,
  	'height'        => 200,
  	'default-image' => get_template_directory_uri() . '/assets/images/header.jpg',
  );

  add_theme_support( 'custom-header', $args );

  // Temaet har to muligheder for menu placeringer.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'opgavetre' ),
		'social' => __( 'Sociale Links Menu', 'opgavetre' ),
	) );

  /*
   * Dette lader WordPress håndtere dokument titlen.
   * På denne måde bliver der ikke brugt et 'hard-coded' title-tag,
   * og det bliver dermed dynamisk i forhold til side/indlægstitel og indhold.
   */
  add_theme_support( 'title-tag' );

}
add_action( 'after_setup_theme', 'opgavetre_setup' );

/**
 * Den rigtige måde at indlæse scripts og styles på i Wordpress
 */
function opgave_tre_tema_scripts() {
  // Skeleton css indlæses efter nomalize for ikke at blive overskrevet af normaliseringen
  wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css' );
  wp_enqueue_style( 'skeleton', get_template_directory_uri() . '/assets/css/skeleton.css' );
  wp_enqueue_style( 'raleway-google-font', '//fonts.googleapis.com/css?family=Raleway:400,300,600' );
  // indlæsning af temaets style.css lægges til sidst, så der kan overrides på skeleton og normalize
  wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'opgave_tre_tema_scripts' ); // tilføj indlæsning af disse scipts/styles
