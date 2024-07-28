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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    <title>Stoktool</title>
</head>
<body>
    <?php

    if(!is_logado()){
        echo msg_aviso("Faça login para acessar esta página.");
    }else{
        if(!isset($_POST['nome'])){
            if(is_admin()){
                include "prod_recupere_form.php";
            }else{
                echo msg_erro("Você não é administrador.");
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
                $q = "update produto SET nome='$nome', valor=$valor, qtd_estoq=$qtd_estoq, imagem='$capaOriginal', ativo='true' where COD_PROD=$cod ";

            }else{
                $q = "update produto SET nome='$nome', valor=$valor, qtd_estoq=$qtd_estoq, imagem='$capa', ativo='true' where COD_PROD=$cod ";

            }
            
            if(empty($nome) || empty($valor || empty($qtd_estoq)) ){
                $mensagem = "Todos os dados são obrigatórios.";
                exibir_mensagem_toastify($mensagem, 'aviso');
                echo msg_aviso('');
            }else{
                if($banco->query($q)){
                    $mensagem = "Produto $nome recuperado.";
                    exibir_mensagem_toastify($mensagem, 'sucesso');
                     echo "<a class='sucesso'></a>";
                }else{
                    $mensagem = "Não foi possível excluir o produto.";
                    exibir_mensagem_toastify($mensagem, 'erro');
                }
            }?><meta http-equiv="refresh" content="3;url=prod_list_off.php"><?php
        }
        
    }
    ?>
</body>
</html>