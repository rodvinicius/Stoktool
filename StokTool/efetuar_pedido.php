<?php

require_once "includes/banco.php";
require_once "includes/funcoes.php";
require_once "includes/login.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilo.css"> 
        <link rel="stylesheet" href="corpo.css">

        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="imagens/icon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <title>confirmar pedido</title>
</head>
<body>


<?php



include_once "includes/topo.php";
include_once "includes/side_bar.php";
?>

<div class="teste" style="body:background-color:white;">
<a href="catalogo.php"><img src="imagens/arrow-left (1).svg" alt="Voltar"></a>
<?php

if (!is_logado()){
    echo "<div class='alert alert-danger'>Faça login para continuar.</div>";
}
echo $_POST['cod_carrinho'];
if (isset($_POST['cod_carrinho'])){
        $cod_carrinho = intval($_POST['cod_carrinho']);
        $q = "UPDATE carrinho SET ativo='false' WHERE COD_CARRINHO = $cod_carrinho";
        $resultado = $banco->query($q);
        $q = "SELECT qtd, cod_prod FROM ITEM_CARRINHO WHERE COD_CARRINHO = $cod_carrinho";
        $busca1 = $banco->query($q);
        // var_dump ($busca->fetch_object());
        if ($busca1){
            while ($item = $busca1->fetch_object()){
                $q = "SELECT VALOR, QTD_ESTOQ FROM PRODUTO WHERE COD_PROD = $item->cod_prod";
                $busca = $banco->query($q);
                $busca = $busca->fetch_object();
                $estoq = $busca->QTD_ESTOQ - $item->qtd;
                // $q = "UPDATE PRODUTO SET QTD_ESTOQ = $estoq WHERE COD_PROD = $item->cod_prod";
                // $banco->query($q);
        
                // $q = "SELECT VALOR, QTD_ESTOQ FROM PRODUTO WHERE COD_PROD = $item->cod_prod";
                // $busca = $banco->query($q);
                // $busca = $busca->fetch_object();
                // $estoq = $busca->QTD_ESTOQ - $item->qtd;
                $q = "UPDATE PRODUTO SET QTD_ESTOQ = $estoq WHERE COD_PROD = $item->cod_prod";
                $banco->query($q);
            }

        }
            if ($resultado){
                echo "<div class='alert alert-success'>Pedido confirmado com sucesso.</div>";
            }else {
                echo "<div class='alert alert-danger'>Erro ao confirmar o pedido.</div>";
            }
}else{
        echo "<div class='alert alert-warning'>Nenhum pedido selecionado.</div>";
}

?>
</div>

<a href="catalogo.php"><img src="imagens/arrow-left (1).svg" alt="Voltar"></a>