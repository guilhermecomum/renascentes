<?php
if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone'])
    && isset($_POST['mensagem'])){

    //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
    //====================================================
    $email_remetente = "guerrinha@comum.org"; // deve ser um email do dominio
    //====================================================

    //Configurações do email, ajustar conforme necessidade
    //====================================================
    $email_destinatario = "guerrinha@comum.org"; // qualquer email pode receber os dados
    $email_reply = "$email";
    $email_assunto = "Site teste";
    //====================================================


    //Variaveis de POST, Alterar somente se necessário
    //====================================================
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];
    //====================================================

    //Monta o Corpo da Mensagem
    //====================================================
    $email_conteudo = "Nome = $nome \n";
    $email_conteudo .= "Email = $email \n";
    $email_conteudo .=  "Telefone = $telefone \n";
    $email_conteudo .=  "Mensagem = $mensagem \n";
    //====================================================

    //Seta os Headers (Alerar somente caso necessario)
    //====================================================
    $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Subject: $email_assunto","Return-Path:  $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
    //====================================================


    //Enviando o email
    //====================================================
    if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'true'){
            echo "1";
            die();
        } else {
            $isSuccess = true;
        }
    } else {
        $error = true;
    }

}
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Renascentes</title>
    <link rel="stylesheet" href="stylesheets/app.css" />
    <script src="bower_components/modernizr/modernizr.js"></script>
  </head>
  <body>
    <section id="welcome">
      <div class="row">
        <div class="download">
          <div class="large-7 large-centered columns">
            <h1 class="text-center">Renascentes</h1>
            <div class="listen clearfix">
              <a class="button left radius" href="">Baixar o disco</a>
              <a class="button right radius" href="">Ouça agora</a>
            </div>
            <ul class="side-nav">
              <li><a class="text-center" href="">Agenda</a></li>
              <li><a class="text-center" href="">Contato</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section id="album">
      <div class="row">
        <div class="format">
          <div class="large-10 large-centered columns text-center">
            <div class="cover">
              <div class="download right">
                <ul class="side-nav">
                  <li>
                    <a class="button radius" href="">MP3</a>
                    <p>Para todo mundo</p>
                  </li>
                  <li>
                    <a class="button radius" href="">FLAC</a>
                    <p>Para nerds de música</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="band">
      <div class="row">
        <div class="stream">
          <div class="large-10 large-centered columns">
<!-- <iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/25884082&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true"></iframe> -->
            <p>
              Também disponível no
              <a href="">Spotify</a>,
              <a href="">Rdio</a>,
              <a href="">Deezer</a> e
              <a href="">Grooveshark</a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="schedule">
      <div class="row">
          <div class="calendar">
              <div class="large-7 large-centered columns">
                <h2>Agenda</h2>
                <table>
                  <tr>
                    <td class="day">18 de maio</td>
                    <td class="city">Pindamonhegaba do Sudoeste ∙ Alber Hall</td>
                  </tr>
                  <tr>
                    <td class="day">18 de maio</td>
                    <td class="city">Pindamonhegaba do Sudoeste ∙ Alber Hall</td>
                  </tr>
                  <tr>
                    <td class="day">18 de maio</td>
                    <td class="city">Pindamonhegaba do Sudoeste ∙ Alber Hall</td>
                  </tr>
                  <tr>
                    <td class="day">18 de maio</td>
                    <td class="city">Pindamonhegaba do Sudoeste ∙ Alber Hall</td>
                  </tr>
                  <tr>
                    <td class="day">18 de maio</td>
                    <td class="city">Pindamonhegaba do Sudoeste ∙ Alber Hall</td>
                  </tr>
                  <tr>
                    <td class="day">18 de maio</td>
                    <td class="city">Pindamonhegaba do Sudoeste ∙ Alber Hall</td>
                  </tr>
                </table>
              </div>
          </div>
      </div>
    </section>

    <section id="contact">
      <div class="row">
        <div class="form">
          <div class="large-10 large-centered columns">
            <h2>Contato</h2>
            <div class="typewriter">
              <div class="row">
                <div class="large-6 columns">
                  <div class="contact">
                    <img src="images/typewriter.png">
                    <p>Mundo Grão Produções</p>
                    <p class="tel">+55 (51)9734.2080</p>
                    <a href="mailto:renascentes@gmail.com">
                      renascentes@gmail.com
                    </a>
                  </div>
                </div>
                <div class="large-6 columns">
                  <?php if ($isSuccess === true) : ?>

            <?php else : ?>
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>#contato" role="form" class="std-form contact-form <?php if ($isSuccess === true){ echo 'success'; } ?>" method="post" id="contact-form">
                    <fieldset>
                      <legend>Formulário de contato </legend>

                      <input name="nome" type="text" class="std-input"
                             placeholder="Nome" required />

                      <input name="email" type="email" class="std-input"
                             placeholder="e-mail" required />

                      <input name="telefone" type="text" class="std-input"
                             placeholder="Telefone" required />

                      <textarea name="mensagem" id="message"
                                class="std-input std-textarea" placeholder="Mensagem" required></textarea>

                      <button class="std-btn send-form-btn" id="send-form">Enviar</button>
                      <?php if ($error === true) : ?>
                      <p class="error-message">Todos os campos são obrigatórios!</p>
                      <?php endif; ?>
                    </fieldset>

                    <p class="success-msg">
                      <strong>Sua mensagem foi enviada!</strong>
                      Esqueceu algo? <a href="<?php echo $_SERVER['PHP_SELF']; ?>#contato" id="reset-form">Envie outra mensagem!</a>
                    </p>
                  </form>
                  <?php endif; ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/foundation/js/foundation.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
