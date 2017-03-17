<?php
// Header til opgave 3

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' );?>" /> <!-- typisk UTF-8 -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- mobil specifik meta -->
  <title><?php wp_title(); ?></title> <!-- den definerede side-titel fra wp-admin -> Indstillinger -> Generelt -->
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" /> <!-- Wordpress meddeler nu hvis andre linker til sidens indhold -->
  <?php wp_head(); ?> <!-- skal være med hvis der er plugins der skal tilføje noget til <head>-tag'et (css, js) -->
</head>
<body <?php body_class();?>> <!-- tilføj de css klasser der er defineret til body-tag'et -->
  <header>
    <div class="header-image" style="background: url('<?php echo get_template_directory_uri() . '/assets/images/background.jpg'; ?>');">
      <!-- indsæt html-markup til header-billede eller Indlægs-billede -->
      <?php
      $postID = get_post(); // Hent første post og check om der er et indlægs-billede. Derved undgåes at oprette et loop
      if ( has_post_thumbnail($postID->ID) ) {
        the_post_thumbnail($postID->ID);
      } else {
      ?>
      <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
      <?php } ?>
    </div>
    <div class="menu-container">
      <div class="container">
        <?php
        wp_nav_menu( array(
          'theme_location' => 'top',
        ) ); ?>
      </div>
    </div>
  </header>

  <div class="container">
