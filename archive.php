<?php
get_header(); ?>

    <div class="row">
      <div class="eight columns">
        <!-- the_loop starter her -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <h1 id="post-<?php the_ID(); ?>">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
            <?php the_title(); ?></a>
          </h1>
          <small><?php the_time('j. F Y') ?> af <strong><?php the_author() ?></strong></small>
          <div class="entry">
            <?php the_content('Læs resten af indholdet &raquo;'); ?>
          </div>
          <p class="postmetadata">
            Skrevet i <?php the_category(', ') ?>
            <strong>|</strong>
            <?php edit_post_link('<button class="edit-logged-in">Editer</button>','',''); // hvis man er logget ind og kan editerer i indlæg og sider ?>
          </p>
        <!-- og ender her -->
        <?php endwhile; else : ?>
          <p><?php _e( 'Desværre, der var ingen indlæg der passede til dine kriterier' ); ?></p>
        <?php endif; ?>
        <!-- Naviger mellem sider med indlæg -->
        <div class="navigation">
          <?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
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
