<?php
/**
* WordPress template: Page
*/
get_header(); ?>

    <main class="content-area">
        <div class="container-full">

            <?php
            if( have_posts() ) :
                the_post();

                get_template_part('template-parts/content-page');

            else:
                // ERROR
            endif;
            ?>

        </div><!-- container-full -->
    </main><!-- .content-area -->

<?php get_footer();