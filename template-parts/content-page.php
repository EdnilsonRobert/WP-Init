<?php
/*
* Template part: Content Page
*/
$page_slug = 'page-' . $post->post_name . ' container';
?>

            <article <?php post_class( $page_slug ) ?>>

                <?php
                if( is_subpage() ) :
                    $ptitle  = '<span>' . get_the_title( $post->post_parent ) . '</span> ';
                    $ptitle .= get_the_title();
                else :
                    $ptitle  = get_the_title();
                endif;
                printf('<h1 class="page-title">%s</h1><!-- .page-title -->', $ptitle);
                ?>

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