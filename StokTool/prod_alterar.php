<?php 
include "includes/funcoes.php";
include "includes/login.php";
include "includes/banco.php";
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="corpo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="imagens/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    <title>Stoktool</title>
</head>
<body>

    <?php
    if(!is_logado()){
        $mensagem = "Faça login para acessar esta página.";
        exibir_mensagem_toastify($mensagem, 'erro');
    }else{
        if(!isset($_POST['nome'])){
            if(is_admin()){
                include "prod_alterar_form.php";
            }else{
                $mensagem = "Você não é adminstrador.";
                exibir_mensagem_toastify($mensagem, 'erro');
            }
        }else{
            $cod = $_POST['cod'] ?? null;
            $nome = $_POST['nome'] ?? null;
            $valor = preg_replace("/\D/", "", $_POST['valor'] ?? "");
            // $valor = $_POST['valor'] ?? null;
            $qtd_estoq = $_POST['qtd_estoq'] ?? null;
            $capa = $_POST['capa'] ?? null;
            $capaOriginal = $_POST['capa1'] ?? null;

            if($capa==null){
                $q = "update produto SET nome='$nome', valor=$valor, qtd_estoq=$qtd_estoq, imagem='$capaOriginal' where COD_PROD=$cod ";

            }else{
                $q = "update produto SET nome='$nome', valor=$valor, qtd_estoq=$qtd_estoq, imagem='$capa' where COD_PROD=$cod ";

            }
            
            if(empty($nome) || empty($valor || empty($qtd_estoq)) ){
                $mensagem = "Todos os dados são obrigatórios.";
                exibir_mensagem_toastify($mensagem, 'aviso');
            }else{
                if($banco->query($q)){
                    $mensagem = "Produto $nome alterado com sucesso";
                    exibir_mensagem_toastify($mensagem, 'aviso');
                }else{
                    echo msg_erro('Produto não alterado.');
                }
            }?><meta http-equiv="refresh" content="3;url=catalogo.php"><?php
        }
}
    ?>
</body>
</html>