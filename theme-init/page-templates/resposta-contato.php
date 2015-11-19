<?php
/*
* WordPress template: Page
* Template name: Resposta contato
*/
global $wpdb, $post;
$post     = $_POST;
$erro     = false;
$response = '';

if( !isset($_POST) || empty($_POST) ) :
    $erro = 'O formulário não pode estar vazio. Por favor preencha os campos necessários.';
endif;

foreach( $_POST as $chave => $valor ) :
    $$chave = trim( strip_tags($valor) );
    if( empty($valor) || ctype_space($valor) ) :
        $erro = 'Existem campos em branco. Por favor preencha os campos necessários.';
    endif;
endforeach;

if( ( !isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) ) && !$erro ) :
    $erro = 'O e-mail fornecido parece inválido. Por favor, cheque o e-mail novamente.';
endif;

if( !$erro ) :
    $wpdb->insert('contato', $post);

    $response = send_contact_form();
else :
    $response = '<p class="form-warning">' . $erro . '</p><!-- .form-warning -->';
endif;

get_header();

$page_slug = 'page-' . $post->post_name . ' container-full';
?>

    <main class="content-area">
        
        <article <?php post_class( $page_slug ) ?>>

            <div class="contact-response container">

                <h2 class="page-title">Fale conosco</h2><!-- .page-title -->

                <?php echo $response; ?>

            </div><!-- .contact-response .container -->

        </article><!-- .container-full -->

    </main><!-- .content-area -->

<?php get_footer();