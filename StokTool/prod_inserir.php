<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Stoktool</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilo.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        
    </head>
    <body>
        <?php
           require_once "includes/banco.php";
           require_once "includes/funcoes.php";
           require_once "includes/login.php";
        ?>
        <div id="corpo">
            <?php
            if(is_logado()){

            
                if(!is_admin()){
                    echo msg_erro("Você não é administrador.");
                }else{
                    if(!isset($_POST['nome'])){
                        require "prod_inserir_form.php";
                    }else{
                        $nome = $_POST['nome'] ?? null;
                        // $valor = $_POST['valor'] ?? null;
                        $valor = preg_replace("/\D/", "", $_POST['valor'] ?? "");
                        $qtd_estoque = $_POST['qtdestoq'] ?? null; 
                        $capa = $_POST['capa'] ?? null;
                        if(empty($nome)||empty($valor)||empty($qtd_estoque)){
                                echo msg_erro('Todos os dados são obrigatórios');
                            }else{
                                $q = "INSERT INTO produto(nome,valor,qtd_estoq,imagem)VALUES('$nome','$valor','$qtd_estoque','$capa')";
                                if($banco->query($q)){
                                    $mensagem = "Produto $nome cadastrado com sucesso.";
                                    exibir_mensagem_toastify($mensagem, 'sucesso');?>
                                    <meta http-equiv="refresh" content="3;url=catalogo.php">
                               <?php }else{
                                    $mensagem = "Não foi possivel adicionar o produto.";
                                    exibir_mensagem_toastify($mensagem, 'erro');
                                    
                                }
                            }                        
                        }                 
                    }
                }else{
                    $mensagem = "Faça login para acessar esta página.";
                    exibir_mensagem_toastify($mensagem, 'aviso');
                    echo '<meta http-equiv="refresh" content="3;url=user_login.php">';
                }
            ?>
        </div> 
    </body>
   
</html>