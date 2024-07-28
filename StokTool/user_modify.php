<?php
  require_once "includes/banco.php";
  require_once "includes/funcoes.php";
  require_once "includes/login.php";


  
?>


<!DOCTYPE html>
<head>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>
    <title>Stoktool</title>
</head>
</head>
<body>
    <?php 
  
    
    if(!is_logado()){
        echo msg_aviso("Faça login para acessar esta página.");
    }else{
        if(!isset($_POST['nome'])){
            if(is_admin()){
                include "user_modify_form.php";
            }else{
                echo msg_erro("Você não é administrador.");
            }
        }else{
            $nome = $_POST['nome'] ?? null;
            $cod = $_POST['cod'] ?? null; 
            $usuario = $_POST['usuario'] ?? null;
            $tipo = $_POST['tipo'] ?? null;
            
            // $analise = "SELECT login.usuario, vendedor.nome, login.ativo, login.tipo FROM vendedor INNER JOIN login ON vendedor.usuario = login.usuario where login.usuario = '$cod'";
            
           
            // $q = "select cpf from vendedor where cpf ='$cpf'";
            // $resultado = $banco->query($q); 
            // echo "$q";
            // if($resultado){
            //         if(strlen($cpf) !=14){
            //             echo msg_erro("Insira o CPF corretamente.");
                    
            //          }else{
                        if(is_null($usuario)||is_null($nome)||is_null($tipo)){
                           echo msg_erro("Todos os dados são obrigatórios.");
                            
                         }else{
                            // $analise2 = "select vendedor.cpf, login.usuario, vendedor.nome, login.ativo, login.tipo from vendedor inner join login on vendedor.usuario = login.usuario where login.usuario = '$cod';";
                            //  $busca = $banco->query($analise2);
                            //  if($busca){
                            //  $reg=$busca->fetch_object();
                            //  echo msg_sucesso("Tudo certo.");
                            //  }else{
                            //     echo msg_erro("Falha na busca. Tente novamente.");
                            //  }
                            $analise2 = "update vendedor set nome='$nome' where usuario='$usuario';";
                            $busca = $banco->query($analise2);
                            if($busca){
                                $analise3 = "update login set tipo='$tipo' where usuario='$usuario';";
                                $busca = $banco->query($analise3);
                                if($busca){
                                    $mensagem = "Informações alteradas";
                                    exibir_mensagem_toastify($mensagem, 'sucesso');
                                    echo '<meta http-equiv="refresh" content="2;url=user_list.php">';
                                }else{
                                    $mensagem = "Não foi possível alterar as informações";
                                    exibir_mensagem_toastify($mensagem, 'erro');
                                    echo '<meta http-equiv="refresh" content="2;url=user_list.php">';
                                }
                            }
                        }
                    //}
        }
    }
    ?>          
</body>
</html>