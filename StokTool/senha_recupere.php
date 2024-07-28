<?php
include "includes/login.php";
include "includes/banco.php";
include "includes/funcoes.php"; 
$cpf = $_SESSION['cpf'];
$usuario = $_SESSION['usuario'];
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stoktool</title>
    <link rel="stylesheet" href="estilo.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</head>




<body>
<?php 


if(isset($_POST['senha1']) && isset($_POST['senha2'])) {
    $senha1 = $_POST['senha1'];
    $senha2 = $_POST['senha2'];

    if(is_null($senha1) || is_null($senha2)) {
        $mensagem = "Todos os dados são necessários.";
        exibir_mensagem_toastify($mensagem, 'erro');
    } else {
        if($senha1 != $senha2) {
            $mensagem = "Senhas não conferem.";
        exibir_mensagem_toastify($mensagem, 'erro');
        } else {
            if($senha1 == $senha2) {
                $senhaOficial = gerarCrypto($senha1);
                $ok = testarCrypto($senha1, $senhaOficial);
                if($ok==1){
                    $q = "update login set senha='$senhaOficial' where usuario='$usuario';";
                    if($banco->query($q)){
                        ?>
                        <script>
                            alert("Senha alterada");
                        </script>
                            <meta http-equiv="refresh" content="2;url=user_login.php">
                           
                        <?php

                    }else{
                        ?>
                        <script>
                            alert("Erro ao alterar senha.");
                        </script>
                            <meta http-equiv="refresh" content="2;url=user_login.php">
                           
                        <?php
                    }
                }else{
                    ?>
                    <script>
                        alert("Erro ao criar nova senha. Tente novamente.");
                    </script>
                        <meta http-equiv="refresh" content="2;url=user_login.php">
                       
                    <?php
                }
            }
        }
    }
}else{
    require "senha_recupere_form.php";
}
 ?>


</body>
</html>