<?php
/*
* WordPress template: Header
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/Organization">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="<?php get_template_directory_uri(); ?>/favicon.ico">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="masthead">
        <div class="container-content">
            <h1 class="brand">
                <a title="Página inicial de <?php echo esc_attr( get_bloginfo('name') ); ?>" class="site-title" href="<?php echo esc_url( home_url('/') ); ?>" rel="home" itempro="name"><?php
                    bloginfo('name');
                ?></a><!-- .site-title -->
            </h1><!-- .brand -->

            <button type="button" class="toggle-menu"><i class="fa fa-plus"></i> <span>Menu</span></button>
            <nav class="main-navigation">
                <ul class="main-menu">
                    <?php wp_nav_menu( array(
                        'theme_location' => 'header-menu',
                        'menu'           => 'Menu principal',
                        'container'      => false,
                        'items_wrap'     => '%3$s'
                    ) );
                    ?>
                </ul><!-- .main-menu -->
            </nav><!-- .main-navigation -->
        </div><!-- .container-content -->
    </header><!-- .masthead .container-full -->
