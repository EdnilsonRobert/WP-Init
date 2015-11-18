<?php
/**
* WordPress template: Functions
*/

/**
* SETUP INICIAL
* ------------------------------------------------------------------------------
*/
    function theme_setup() {
        // HANDLER PARA A TAG <title>
        add_theme_support('title-tag');

        // REGISTRO DE CSS
        function theme_styles() {
            wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', '', false, 'screen');
            wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/css/style.css', '', false, 'screen');
        }
        add_action('wp_enqueue_scripts', 'theme_styles');

        // REGISTRO DE SCRIPTS
        function theme_scripts() {
            wp_enqueue_script('form-validation', get_stylesheet_directory_uri() . '/js/form-validation/jquery.validate.min.js', array('jquery'), '1.14.0', true);
            wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), null, true);
        }
        add_action('wp_enqueue_scripts', 'theme_scripts');

        // REMOVER ITENS DO HEADER EM wp_head();
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'parent_post_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
        remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
        // REMOVE WP EMOJI
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');

        // REGISTRO DE IMAGENS
        add_theme_support('post-thumbnails');
//        add_image_size("square-medium", 300, 300, true);
//        add_filter('image_size_names_choose', 'custom_sizes');
//        function custom_sizes( $sizes ) {
//            return array_merge( $sizes, array(
//                'square-medium' => 'Square 300x300',
//            ) );
//        }

        // REGISTRO DE MENUS
        add_theme_support('nav-menus');
        function theme_menus() {
            register_nav_menus( array(
                'header-menu'   => 'Menu Principal',
                'footer-menu'   => 'Menu Footer'
            ) );
        }
        add_action('init', 'theme_menus');

    }
    add_action('after_setup_theme', 'theme_setup');

/**
* CHECAGEM DE SUB PÁGINAS
* ------------------------------------------------------------------------------
*/
    function is_subpage() {
        global $post;
        return ( is_page() && $post->post_parent ) ? $post->post_parent : false;
//        if( is_page() && $post->post_parent ) :
//            return $post->post_parent;
//        else :
//            return false;
//        endif;
    }

/**
* LINKS DE IMAGENS EM POSTAGENS
*/
    // REMOVER PADRÃO DE COLOCAR LINKS NAS IMAGENS
    update_option('image_default_link_type','none'); // none | custom | post

/**
* SUBSTITUIR <p> POR <figure> EM IMAGENS INSERIDAS EM POSTAGENS
*/
    add_filter(
        'image_send_to_editor',
        function( $html, $id, $caption, $title, $align, $url, $size, $alt ) {
            // if( current_theme_supports( 'html5' )  && ! $caption )
                $html = printf( '<figure>%s</figure>', $html );
            return $html;
        }, 10, 8
    );

/**
* ENVIAR EMAIL COM PHP MAILER
* ------------------------------------------------------------------------------
*/
    function send_contact_form() {
        require(ABSPATH . WPINC . '/class-phpmailer.php');
        require(ABSPATH . WPINC . '/class-smtp.php');

        // Campos: nome, sobrenome, email, telefone, mensagem

        date_default_timezone_set('America/Sao_Paulo');
        $siteurl = trailingslashit( get_option('home') );
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->CharSet='UTF-8';
        $mail->isHTML(true);
        $mail->From = 'enviowp@domain.com.br';
        $mail->FromName = $_POST['nome'];
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->Subject = 'Formulário de contato enviado pelo site';
        $mail->AddReplyTo($_POST['email']);
        $mail->Host = 'mail.domain.com.br';
        $mail->SMTPAuth = true;
        $mail->Username = 'enviowp@domain.com.br';
        $mail->Password = '1234';

        $html  = '<p>O cliente <strong>'.$_POST['nome'].' '.$_POST['sobrenome'].'</strong> entrou em contato.</p>';
        $html .= '<p>Deixou os seguintes contatos:</p>';
        $html .= '<ul>';
        $html .= '<li>Email: <strong>'.$_POST['email'].'</strong></li>';
        $html .= '<li>Telefone: <strong>'.$_POST['telefone'].'</strong></li>';
        $html .= '</ul>';
        $html .= '<p>Deixou a seguinte mensagem:</p>';
        $html .= '<blockquote>'.$_POST['mensagem'].'</blockquote>';

        $mail->Body = $html;

        // $mail->AddAddress( "email@domain.com.br", "Contato" );
        $mail->AddAddress( "ednilson@agenciaboaideia.com.br", "Teste" );

        // Enviar email
        $success = "Mensagem enviada com sucesso. <br> Em breve <strong>" . get_bloginfo('name') . "</strong> entrará em contato.";
        $error   = "Não foi possível enviar a mensagem nesse momento. <br> Tente novamente mais tarde.";

        // Retorno com exibição de erro (desenvolvimento)
        // return ( $mail->Send() ) ? '<p class="form-success">'. $success .'</p>' : '<p class="form-warning">'. $error . ' | ' . $mail->ErrorInfo . '</p>';

        // Retorno sem exibição de erro (produção)
        return ( $mail->Send() ) ? '<p class="form-success">'. $success .'</p>' : '<p class="form-warning">'. $error . '</p>';

        $mail->ClearAllRecipients();
    } // send_contact_form();

/**
* FIM DO DOCUMENTO
* ------------------------------------------------------------------------------
*/