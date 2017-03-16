<?php
get_header(); ?>

    <div class="row page-row">
      <div class="eight columns">
        <!-- the_loop starter her -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <h1 id="post-<?php the_ID(); ?>" class="pagetitle">
            <?php the_title(); ?>
          </h1>
          <small class="pagesmall">Udgivet den <?php the_time('j. F Y') ?></small>
          <div class="entry">
            <?php the_content(); ?>
          </div>
          <p class="postmetadata">
            Skrevet i <?php the_category(', ') ?>
            <strong>|</strong>
            <?php edit_post_link('<button class="edit-logged-in">Editer</button>','',''); // hvis man er logget ind og kan editerer i indlæg og sider?>
          </p>
        <!-- Loop'et ender her -->
        <?php endwhile; else : ?>
          <p><?php _e( 'Desværre, der var ingen indlæg der passede til dine kriterier' ); ?></p>
        <?php endif; ?>
      </div> <!-- .eight columns -->
      <div class="four columns">
        <?php
        get_sidebar(); // klassisk sidebar til widgets(små moduler med enkle funktioner, der kan placeres i indrettede områder såsom sidebar, footer)
        ?>
      </div><!-- .four columns -->
    </div><!-- .rows .page-row -->

<?php
get_footer();
