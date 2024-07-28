<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Novo Usuário</title>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        <div id="teste">
            <?php
            if(is_logado()){
                if(is_admin()){

                
            
                    if(!isset($_POST['usuario'])){
                        require "user_novo_form.php";
                    }else{
                        $cpf = preg_replace("/\D/", "", $_POST['cpf'] ?? "");
                        $usuario = $_POST['usuario'] ?? null;
                        $nome = $_POST['nome'] ?? null;
                        $senha = $_POST['senha1'] ?? null;
                        $senha2 = $_POST['senha2'] ?? null;
                        $tipo = $_POST['tipo'] ?? null;

                        

                        $q = "select * from vendedor where cpf = '$cpf'";
                        $resultado = $banco->query($q); 
                        if($resultado){
                           $analise = mysqli_num_rows($resultado);
                           if($analise>=1){
                            $mensagem = "Este CPF já está sendo usado.";
                            exibir_mensagem_toastify($mensagem, 'erro');
                            }else{
                                if($senha === $senha2){
                                    if(empty($cpf)||empty($usuario)||empty($nome)||empty($senha)||empty($senha2)||empty($tipo)){
                                        $mensagem = "Todos os dados são obrigatórios!";
                                        exibir_mensagem_toastify($mensagem, 'erro');                                                                           
                                    }else{
                                        $senhaOficial = gerarCrypto($senha);
                                        $ok = testarCrypto($senha, $senhaOficial);
                                        if($ok==1){
                                            $qLogin = "INSERT INTO LOGIN(usuario,senha,tipo)VALUES('$usuario','$senhaOficial','$tipo')";
                                            if($banco->query($qLogin)){
                                                $qUser = "INSERT INTO VENDEDOR(cpf,nome,usuario)VALUES('$cpf','$nome','$usuario')";
                                                if($banco->query($qUser)){
                                                    $mensagem = "Usuário $nome cadastrado com sucesso!";
                                                    exibir_mensagem_toastify($mensagem, 'sucesso');
                                                    // echo $cpf;
                                                    ?>
                                                    
                                                    <meta http-equiv="refresh" content="2;url=catalogo.php"><?php
                                                }
                                            }
                                        }else{
                                            $mensagem = "Não foi possivel criar o usuário $usuario!";
                                            exibir_mensagem_toastify($mensagem, 'erro');
                                            ?>
                                            <meta http-equiv="refresh" content="3;url=user_novo.php">
        
                                        <?php }
                                    }
                                }else{
                                    echo msg_erro("Senhas não conferem, repita o procedimento.");
                                }
                            }
                            //echo "<h1>Novo usuário</h1>";
                            }

                       }
                    }else{
                        echo msg_erro("Você não é administrador.");
                        
                    } 
                    }else{
                        echo msg_aviso("Faça login para acessar esta página.");
                    }
                
            ?>
        </div> 
    </body>
</html>