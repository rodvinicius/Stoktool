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
                
                
                    if(!isset($_POST['cpfcnpj'])){
                        require "cliente_inserir_form.php";
                    }else{
                        $cpfcnpj = preg_replace("/\D/", "", $_POST['cpfcnpj'] ?? "");
                        $nome = $_POST['nome'] ?? null;
                        $logradouro = $_POST['logradouro'] ?? null; 
                        $telefone = preg_replace("/\D/", "", $_POST['telefone'] ?? "");
                        if(empty($cpfcnpj)||empty($nome)||empty($logradouro)){
                            $mensagem = "Todos os dados são obrigatórios.";
                            exibir_mensagem_toastify($mensagem, 'erro');
                            }else{
                                $q = "INSERT INTO cliente(cpfcnpj,nome_c,logradouro,telefone)VALUES('$cpfcnpj','$nome','$logradouro','$telefone')";
                                if($banco->query($q)){
                                    $mensagem = "Cliente $nome cadastrado com sucesso.";
                                    exibir_mensagem_toastify($mensagem, 'sucesso');
                                    ?>
                                    <meta http-equiv="refresh" content="3;url=catalogo.php">
                               <?php }else{
                                    $mensagem = "Não foi possivel adicionar o cliente <b>$nome</b>.";
                                    exibir_mensagem_toastify($mensagem, 'erro');
                                    
                                }
                            }                        
                        }                 
                    
            ?>
        </div> 
    </body>
</html>