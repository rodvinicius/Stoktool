<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <title>Stoktool</title>
</head>
<body>
<?php
require_once "includes/banco.php";
require_once "includes/funcoes.php";
require_once "includes/login.php";

if(!isset($_POST['usuario'])){  
        include "senha_recupere_validacao_form.php";
}else{

    $usuario = $_POST['usuario'];
    $cpf = preg_replace("/\D/", "", $_POST['cpf'] ?? "");
    // $cpf = $_POST['cpf'];


    if(is_null($usuario)||is_null($cpf)){
        $mensagem = "Todos os dados são necessários.";
        exibir_mensagem_toastify($mensagem, 'erro');
    }else{
       // $q = "select login.usuario, login.cpf as 'cpf Login', vendedor.cpf as 'cpf vendedor', vendedor.nome from login inner join vendedor on login.cpf=vendedor.cpf where login.usuario='$usuario';";
    //    $q = "SELECT login.usuario, login.cpf AS 'cpf Login', vendedor.cpf AS 'cpf vendedor', vendedor.nome FROM login INNER JOIN vendedor ON login.cpf = vendedor.cpf WHERE login.usuario = '$usuario';";
    //     $resultado = $banco->query($q);
    //     $analise = mysqli_num_rows($resultado);
    //     echo $analise;
    //     if($analise<=0){
    //         echo "Nenhum registro encontrado";
    //     }else{
    //         if($busca = $banco->query($q)){
    //             while($reg=$busca->fetch_object($q)){
    //                 echo $reg->login.usuario;
    //                 echo $reg->vendedor.cpf;
    //             }
               
    //         }
    //     } 
    $q = "select vendedor.cpf, login.usuario, login.senha, login.tipo, vendedor.nome from login inner join vendedor on login.usuario = vendedor.usuario where login.usuario='$usuario' and vendedor.cpf='$cpf'";
    $resultado = $banco->query($q);
    $analise = mysqli_num_rows($resultado);
    if ($analise <= 0) {
        echo "Nenhum registro encontrado";
    }else{
        while ($reg = $resultado->fetch_object()) {
            if(($usuario==$reg->{'usuario'})&&($cpf==$reg->{'cpf'})){
                $mensagem = "Redirecionando...";
                exibir_mensagem_toastify($mensagem, 'aviso');
                $_SESSION['cpf'] = $cpf;
                $_SESSION['usuario'] = $usuario;
                
                ?><meta http-equiv="refresh" content="2;url=senha_recupere.php"><?php
            }else{
                $mensagem = "Dados não conferem.";
                exibir_mensagem_toastify($mensagem, 'erro');
            }
        }
    }
}  
}

?>

</body>
</html>