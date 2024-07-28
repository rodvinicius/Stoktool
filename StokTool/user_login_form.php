<html lang="pt-br">
 
<head>
  <link rel="stylesheet" href="estilo.css">

</head>
 
<?php
require_once "includes/banco.php";
?>
 
<body class="body_card">
 
  <div class="card">
    <div id="card-content">
      <div id="card-title">
      <img id="stoktool" src="imagens/icon.png" alt="Stoktool">
      <p>Stoktool</p>
 
        <p class="fontes">Login</p>
        <div class="underline-title"></div>
      </div>
      <form method="post" class="form">
        <label for="usuario" style="padding-top:13px">
            &nbsp;Usuário
          </label>
        <input id="usuario" class="form-content" type="text" name="usuario" autocomplete="on" required />
        <div class="form-border"></div>
        <label for="senha" style="padding-top:22px">&nbsp;Senha
          </label>
        <input id="senha" class="form-content" type="password" name="senha" required />
        <div class="form-border"></div>
        <div id="forgot-pass">
          <a id="forget-pass" href="senha_recupere_validacao.php"><p>Esqueceu a senha?</p></a>
        </div>

        <input id="submit-btn" type="submit" name="submit" value="LOGIN" />
      </form>
    </div>
  </div>
</body>