<?php
/*
* Template part: Content Single
*/
$page_slug = 'single-' . $post->post_name . ' container';
?>

            <article <?php post_class( $page_slug ) ?>>

                <?php the_title('<h1 class="page-title">', '</h1><!-- .page-title -->'); ?>

                <?php
                if( has_post_thumbnail() ) :
                    echo '<figure class="featured-image">';
                    the_post_thumbnail();
                    echo '</figure><!-- .featured-image -->';
                endif;
                ?>

                <div class="entry-content">

                    <?php the_content(); ?>

                </div><!-- .entry-content -->

            </article><!-- .container -->