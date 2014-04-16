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
    $email_assunto = "[Renascentes] - Contato via site";
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
    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" href="stylesheets/app.css" />
    <script src="bower_components/modernizr/modernizr.js"></script>
  </head>
  <body>
    <section id="welcome">
      <div class="social">
        <ul class="inline-list">
          <li><a href="http://facebook.com/renascentes"><img src="images/header_fb.png"></a></li>
          <li><a href="http://twitter.com/renascentes"><img src="images/header_twit.png"></a></li>
          <li><a href="http://youtube.com/renascentespoa"><img src="images/header_yt.png"></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="large-7 large-centered columns">
          <div class="download">
            <h1 class="text-center">Renascentes</h1>
            <div class="row listen clearfix">
              <div class="large-6 medium-12 small-12 small-centered large-uncentered columns">
                <a class="button baixar radius" href="#album">Baixar o disco</a>
              </div>
              <div class="large-6 medium-12 small-12 small-centered large-uncentered columns">
                <a class="button ouvir radius" href="#band">Ouça agora</a>
              </div>
            </div>
            <ul class="side-nav">
              <li><a class="text-center" href="#schedule">Agenda</a></li>
              <li><a class="text-center" href="#contact">Contato</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section id="album">
      <div class="row">
        <div class="large-10 large-centered columns text-center">
          <div class="format">
            <div class="cover">
              <div class="options right">
                <ul class="side-nav">
                  <li>
                    <a class="button radius" href="music/Renascentes-2014-MP3-320kbps.zip">MP3</a>
                    <p>Para todo mundo.</p>
                  </li>
                  <li>
                    <a class="button radius" href="music/Renascentes-2014-FLAC.zip">FLAC</a>
                    <p>Para nerds de música.</p>
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

        <div class="large-10 large-centered columns">
          <div class="stream">

              <iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/30631417%3Fsecret_token%3Ds-1V3gW&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true"></iframe>
            <p>
              Também disponível no <a href="http://www.google.com/url?q=http%3A%2F%2Fgrooveshark.com%2F%23!%2Falbum%2FRenascentes%2F9649174&sa=D&sntz=1&usg=AFQjCNH6pR0VvH25CfSWuV2RReGRgwOEFQ">Grooveshark</a>.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="schedule">
      <div class="row">
        <div class="large-7 large-centered columns">
          <div class="calendar">
            <h2>Agenda</h2>
            <table>
              <tr>
                <td class="day">1º de maio</td>
                <td class="city">Porto Alegre ∙ Teatro Renascença</td>
              </tr>
              <tr>
                <td class="day">21 de maio</td>
                <td class="city">Belo Horizonte ∙ A Obra</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="row">
        <div class="large-6 large-centered columns">
          <div class="form">
            <h2>Contato</h2>
            <div class="row">
              <div class="typewriter clearfix">
                <div class="large-12 columns">
                  <div class="contact">
                    <img src="images/typewriter.png">
                    <p>Mundo Grão Produções</p>
                    <p class="tel">+55 (51)9734.2080</p>
                    <a href="mailto:renascentes@gmail.com">
                      renascentes@gmail.com
                    </a>
                  </div>
                </div>
<!--                 <div class="large-6 columns">
                  <?php if ($isSuccess === true) : ?>

            <?php else : ?>
                  <form action="<?php echo $_SERVER['PHP_SELF'];?>#contact"
                        role="form"
                        class="<?php if ($isSuccess === true){ echo 'success'; } ?>"
                        method="post"
                        id="contact-form">
                      <input name="nome" type="text" class="std-input"
                             placeholder="Nome" required />

                      <input name="email" type="email" class="std-input"
                             placeholder="e-mail" required />

                      <input name="telefone" type="text" class="std-input"
                             placeholder="Telefone" required />

                      <textarea name="mensagem" id="message"
                                class="std-input std-textarea" placeholder="Mensagem" required></textarea>

                      <input type="submit" value="Enviar">
                      <?php if ($error === true) : ?>
                      <p class="error-message">Todos os campos são obrigatórios!</p>
                      <?php endif; ?>

                    <p class="success-msg">
                      <strong>Sua mensagem foi enviada!</strong>
                      Esqueceu algo? <a href="<?php echo $_SERVER['PHP_SELF']; ?>#contato" id="reset-form">Envie outra mensagem!</a>
                    </p>
                  </form>
                  <?php endif; ?>

                </div>
              </div>-->
            </div>
            <h4>Renascentes</h4>
          </div>
        </div>
      </div>
    </section>

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/foundation/js/foundation.min.js"></script>
    <script src="js/jquery.flexverticalcenter.js"></script>
    <script src="js/app.js"></script>
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                             m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-50001867-1', 'renascentes.com.br');
    ga('send', 'pageview');

    </script>
  </body>
</html>
