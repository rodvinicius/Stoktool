<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>excluir cliente</title>
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
            if(!is_logado()){
                echo msg_erro("Efetue o login para editar seus dados");
            }else{
                if(!isset($_POST['nome'])){
                    if(is_admin()){
                        include "cliente_delete_form.php";
                    }else{
                        echo "voce n é adm";
                    }
                }else{
                $cpfcnpj = preg_replace("/\D/", "", $_POST['cpfcnpj'] ?? "");
                $nome=$_POST['nome']??null;
                $logradouro=$_POST['logradouro']??null;
                $telefone = preg_replace("/\D/", "", $_POST['telefone'] ?? "");

                echo "<pre>";
                echo "CPF/CNPJ: $cpfcnpj\n";
                echo "Nome: $nome\n";
                echo "Logradouro: $logradouro\n";
                echo "Telefone: $telefone\n";
                echo "</pre>";

                if ($cpfcnpj && $nome && $logradouro && $telefone) {
                    $q = "UPDATE cliente SET ativo='false' WHERE cpfcnpj='$cpfcnpj'";


                    if($banco->query($q)){
                        $mensagem = "Cliente excluido com sucesso";
                        exibir_mensagem_toastify($mensagem, 'sucesso');
                    }else{
                        $mensagem = "Não foi possível excluir o cliente";
                        exibir_mensagem_toastify($mensagem, 'erro');
                    }?> <meta http-equiv="refresh" content="2;url=cliente_list.php"> <?php
                }
            }        
        }     
            ?>
        </div>
        
    </body>
</html>