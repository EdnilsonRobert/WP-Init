<?php
/*
* WordPress template: Footer
*/
?>

    <footer class="colophon container-full">
        <div class="container-content">

            <a title="Página inicial de <?php echo esc_attr( get_bloginfo('name') ); ?>" class="footer-brand" href="<?php echo esc_url( home_url('/') ); ?>" rel="home" itempro="name"><?php
                bloginfo('name');
            ?></a><!-- .site-title -->

        </div><!-- .container-content -->
    </footer><!-- .colophon .container-full -->

    <div class="signature">
        <a title="Criação e otimização de sites <br> Agência Ótima Ideia" class="developed-by" href="http://otimaideia.com.br" rel="external" target="_blank">
            Criação e otimização de sites Agência Ótima Ideia
        </a><!-- .developed-by -->
    </div><!-- .signature -->

    <div class="signature">
        <a title="Criação de sites Agência Boa Ideia" class="developed-by" href="http://agenciaboaideia.com.br" rel="external" target="_blank">
            Criação de sites Agência Boa Ideia
        </a><!-- .developed-by -->
    </div><!-- .signature -->

<?php wp_footer(); ?>

</body>
</html>