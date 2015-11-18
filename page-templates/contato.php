<?php
/**
* WordPress template: Page
* Template name: Contato
*/
get_header();

$page_slug = 'page-' . $post->post_name . ' container';
?>

    <main class="content-area">
        <div class="container-full">

            <?php if( have_posts() ) : ?>
                <?php the_post(); ?>

                <article <?php post_class( $page_slug ) ?>>

                    <?php the_title('<h1 class="page-title">', '</h1><!-- .page-title -->'); ?>

                    <div class="entry-content">

                        <?php the_content(); ?>

                    </div><!-- .entry-content -->

                    <?php get_template_part('template-parts/contact-form'); ?>

                </article><!-- .container -->

            <?php
            else:
                // ERROR
            endif;
            ?>

        </div><!-- container-full -->
    </main><!-- .content-area -->

<?php get_footer();