<?php
get_header(); ?>

    <div class="row page-row">
      <div class="eight columns">
        <!-- loop'et starter her -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <h1 id="post-<?php the_ID(); ?>" class="pagetitle">
            <?php the_title(); ?>
          </h1>
          <small class="pagesmall">Skrevet af <strong><?php the_author() ?></strong> den <?php the_time('j. F Y') ?></small>
          <div class="entry">
            <?php the_content(); ?>
          </div>
          <p class="postmetadata">
            Skrevet i <?php the_category(', ') ?>
            <strong>|</strong>
            <?php edit_post_link('<button class="edit-logged-in">Editer</button>','',''); // hvis man er logget ind og kan editerer i indlæg og sider
            // Hvis kommentarer er åbne eller hvis der mindst er en kommentar
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif; ?>
          </p>
        <!-- og ender her -->
        <?php endwhile; else : ?>
          <p><?php _e( 'Desværre, der var ingen indlæg der passede til dine kriterier' ); ?></p>
        <?php endif; ?>
        <!-- Naviger mellem sider med indlæg -->
        <div class="navigation">
          <?php wp_link_pages( array(
          	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
          	'after'       => '</div>',
          	'link_before' => '<span>',
          	'link_after'  => '</span>',
          	) );
          ?>
        </div>
      </div>
      <div class="four columns">
        <?php
        get_sidebar();
        ?>
      </div>
    </div>

<?php
get_footer();
