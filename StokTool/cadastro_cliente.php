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
                if(!is_admin()){
                    echo msg_erro('Área restrita! Você não é administrador!');
                }else{
                    if(!isset($_POST['cpfcnpj'])){
                        require "cadastro_cliente_form.php";
                    }else{
                        $cpfcnpj = $_POST['cpfcnpj'] ?? null;
                        $nome = $_POST['nome'] ?? null;
                        $logradouro = $_POST['logradouro'] ?? null;
                        $telefone = $_POST['telefone'] ?? null; 
                        if(empty($cpfcnpj)||empty($nome)||empty($logradouro)||empty($telefone)){
                            $mensagem = "Todos os dados são obrigatórios.";
                            exibir_mensagem_toastify($mensagem, 'erro');
                            }else{
                                $q = "INSERT INTO cliente(cpfcnpj,nome,logradouro,telefone)VALUES('$cpfcnpj','$nome','$logradouro','$telefone')";
                                if($banco->query($q)){
                                    $mensagem = "Cliente <strong>$nome</strong> cadastrado com sucesso";
                                    exibir_mensagem_toastify($mensagem, 'sucesso');
                                    echo '<meta http-equiv="refresh" content="3;url=catalogo.php">';
                               }else{
                                    $mensagem = "Não foi possivel adicionar cliente";
                                    exibir_mensagem_toastify($mensagem, 'erro');
                                    
                                }
                            }                        
                        }                 
                    }
            ?>
        </div> 
    </body>
</html>