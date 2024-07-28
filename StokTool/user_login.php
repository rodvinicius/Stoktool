<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@NaN,0,0,0" />
    <link rel="shortcut icon" href="imagens/icon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
   
    <title>Stoktool</title>
</head>
<body>
    <?php
    require_once "includes/banco.php";
    require_once "includes/login.php";
    require_once "includes/funcoes.php";
 
    if(!isset($_POST['usuario'])){
        require "user_login_form.php";
    }else{
        $USUARIO = $_POST['usuario'];
        $SENHA = $_POST['senha'];
        if(is_null($USUARIO) || is_null($SENHA)){
            require "user_login_form.php";
        }else{
           $q = "select l.usuario, l.senha, l.tipo, l.ativo, v.nome from LOGIN l inner join vendedor v on l.usuario = v.usuario where l.usuario='$USUARIO'";
           // $q = "select v.nome, v.cpf, l.usuario, l.senha from login l inner join vendedor v on l.usuario='$USUARIO'";
           


            $busca=$banco->query($q);
            if((!$busca)){
                echo msg_erro('Falha ao acessar o banco.');
            }else{
                if(($busca->num_rows>0)){
                    $reg = $busca->fetch_object();
                    if($reg->{'ativo'}=='true'){
                    
                    if(testarCrypto($SENHA, $reg->{'senha'})){
                        ?>
                        <script>
                            Swal.fire({
                                position: "top",
                                icon: "success",
                                title: "Logado",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        </script>
                        <meta http-equiv="refresh" content="1;url=catalogo.php">
                       
                        <?php
                        $_SESSION['usuario'] = $reg->{'usuario'};
                        $_SESSION['nome'] = $reg->{'nome'};
                        $_SESSION['tipo'] = $reg->{'tipo'};
                    }else{
                        ?>
                        <script>
                            alert("Senha incorreta");
                        </script>
                       
                            <meta http-equiv="refresh" content="3;url=user_login.php">
                           
                        <?php
                    }
                }else{
                    $mensagem = "Este usuário não está ativo.";
                    exibir_mensagem_toastify($mensagem, 'erro');
                }
            }else{
                echo msg_erro('Usuário inválido');?>
                <meta http-equiv="refresh" content="3;url=user_login.php">
                <?php
            }
            }
        }
    }
   ?>
 
</body>
</html>