<?php
/**
* WordPress template: Single
*/
get_header(); ?>

    <main class="content-area">
        <div class="container-full">

            <?php
            if( have_posts() ) :
                the_post();

                get_template_part('template-parts/content-single');

            else:
                // ERROR
            endif;
            ?>

        </div><!-- container-full -->
    </main><!-- .content-area -->

<?php get_footer();