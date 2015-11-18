<?php
/*
* Template part: Contact form
*/
?>

            <form class="form-contato form-vertical" method="post" action="<?php bloginfo('url'); ?>/resposta-contato/">
                <fieldset>
                    <label for="fm-nome">
                        <input type="text" name="nome" id="fm-nome" placeholder="Nome" required>
                    </label>

                    <label for="fm-sobrenome">
                        <input type="text" name="sobrenome" id="fm-sobrenome" placeholder="Sobrenome" required>
                    </label>

                    <label for="fm-email">
                        <input type="text" name="email" id="fm-email" placeholder="E-mail" required>
                    </label>

                    <label for="fm-telefone">
                        <input type="text" name="telefone" id="fm-telefone" placeholder="Telefone" required>
                    </label>

                    <label for="fm-mensagem">
                        <textarea name="mensagem" id="fm-mensagem" rows="3" cols="30" placeholder="Mensagem" required></textarea>
                    </label>
                </fieldset>

                <div class="send-form">
                    <button type="submit">Entre em contato</button>
                </div><!-- .send-form -->
            </form><!-- .form-contato .form-vertical -->
