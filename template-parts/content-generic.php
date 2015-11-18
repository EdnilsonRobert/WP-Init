<?php
/*
* Template part: Content generic
*/
$page_slug = 'container';
?>

            <article <?php post_class( $page_slug ) ?>>

                <?php printf( '<h1 class="page-title"><a title="%s" href="%s" rel="bookmark">%s</a></h1>', the_title_attribute('echo=0'), get_the_permalink(), get_the_title() ); ?>

                <div class="entry-content">

                    <?php
                    if( has_post_thumbnail() ) :
                        echo '<figure class="featured-image">';
                        the_post_thumbnail();
                        echo '</figure>';
                    endif;
                    ?>

                    <?php ( is_page() || is_single() ) ? the_content() : the_excerpt(); ?>

                </div><!-- .entry-content -->

            </article><!-- .container -->
