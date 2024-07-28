<?php
require_once "includes/funcoes.php";
require_once "includes/banco.php";
require_once "includes/login.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stoktool</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/5.3/assets/css/docs.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>
<body>
 
<?php
 
 
if(!is_logado()){
    echo msg_aviso("Faça login para acessar esta página.");
} else {
    if(!isset($_POST['nome'])){
        if(is_admin()){
            include "user_list_info_form.php";
        } else {
            echo msg_erro("Você não é administrador.");
        }
    } else {
        $cod = $_POST['cod'];
        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $tipo = $_POST['tipo'];
 
        $analise = "SELECT login.usuario, vendedor.nome, login.ativo, login.tipo FROM vendedor INNER JOIN login ON vendedor.usuario = login.usuario WHERE login.usuario = '$cod';";
        $busca = $banco->query($analise);
        $reg = $busca->fetch_object();
 
        if(empty($nome) || empty($usuario) || empty($tipo)){
            echo msg_erro("Todos os dados são necessários.");
        } else {
            if($reg->ativo == 'true'){
                $q = "UPDATE login SET ativo='true',ativo='false' WHERE usuario='$cod'";
                if($banco->query($q)){
                    $mensagem = "Usuário Desativado";
                    exibir_mensagem_toastify($mensagem, 'sucesso');
                    echo '<meta http-equiv="refresh" content="2;url=user_list.php">';
                } else {
                    $mensagem = "Erro ao desativar usuário.";
                    exibir_mensagem_toastify($mensagem, 'erro');
                    echo '<meta http-equiv="refresh" content="2;url=user_list.php">';
                }
            } else {
                $q = "UPDATE login SET ativo='false',ativo='true' WHERE usuario='$cod'";
                if($banco->query($q)){
                    // Mensagem para Toastify
                    $mensagem = "Usuário recuperado com sucesso";
                    exibir_mensagem_toastify($mensagem, 'sucesso');
                    echo '<meta http-equiv="refresh" content="2;url=user_list.php">';
                } else {
                    $mensagem = "Erro ao recuperar usuário";
                    exibir_mensagem_toastify($mensagem, 'erro');
                    echo '<meta http-equiv="refresh" content="2;url=user_list.php">';
                }
            }
        }
    }
}

?>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('CPF');

            // Função para aplicar a máscara de CPF
            function aplicarMascaraCPF(value) {
                value = value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
                if (value.length <= 11) {
                    // Formata CPF: 000.000.000-00
                    return value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
                }
                return value; // Retorna o valor sem formatação se não for CPF válido
            }

            // Aplica a máscara quando o valor inicial é carregado
            input.value = aplicarMascaraCPF(input.value);

            // Aplica a máscara ao digitar no campo
            input.addEventListener('input', function() {
                input.value = aplicarMascaraCPF(input.value);
            });
        });
    </script>
</html>