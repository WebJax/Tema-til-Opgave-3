<?php
/**
 * Templaten til at vise kommentarer
 *
 * Til området hvor der kan gives og vises kommentarer i single.php
 *
 * @package WordPress
 * @subpackage cmskursus
 * @since CMS Kursus 0.1
 */

/*
 * Hvis indlægget er password-beskyttet, vises kommentarene
 * først når passwordet er indtastet
 */
if ( post_password_required() )
    return;
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : // Hvis der er kommentarer?>
        <h2 class="comments-title">
            <?php
                printf( _nx( 'En kommentar på "%2$s"', '%1$s kommentarer på "%2$s"', get_comments_number(), 'comments title', 'cmskursus' ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 74,
                ) );
            ?>
        </ol><!-- .comment-list -->

        <?php
            // Er der kommentarer man skal navigerer rundt i?
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text section-heading"><?php _e( 'Kommentar navigation', 'cmskursus' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Ældre kommentarer', 'cmskursus' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Nyere kommentarer &rarr;', 'cmskursus' ) ); ?></div>
        </nav><!-- .kommentar-navigation -->
      <?php endif; // Check for kommentar navigation ?>

        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php _e( 'Kommentarmuligheden er lukket.' , 'cmskursus' ); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() hvis der er kommentarer ?>

    <?php// wordpress standard funktion til at vise kommentar indtastningsområdet ?>
    <?php comment_form(); ?>

</div><!-- #comments -->
