<?php 
require_once "includes/banco.php";
require_once "includes/funcoes.php";
require_once "includes/login.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Stoktool</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilo.css"> 
        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="imagens/icon.png" type="image/x-icon">
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    </head>
    <body>
     <!--<nav>
    <div class="nav-wrapper  indigo darken-2">
         <img class="logo" style="width: 55px; height: 50px;" src="imagens/icon.png" alt="Stoktool">

         <ul class="right hide-on-med-and-down"><li> </?php include_once "topo.php";?></li></ul>

        <ul class="side-nav" id="menu-mobile">
            <li><a href="#">Angular</a></li>
             <li><a href="#">Ionic</a></li>
            <li><a href="#">TypeScript</a></li>
             <li><a href="#">Cordova</a></li>
        </ul>
    </div>
 </nav>!-->
 <?php include_once "includes/topo.php";?>
 <?php include_once "includes/side_bar.php";?>
 <div class="teste">
     <main class="main">
        <?php
           if(is_logado()){
            if(is_admin()){

            
           $ordem = $_GET['o'] ?? "n";    /*recebe 'o' se nao receber fica "n"*/
           $chave = $_GET['c'] ?? "";     /*recebe 'c' se nao receber fica ""*/
        ?>
        <form method="get" id="busca" class="search-container" action="prod_list_off.php">

                Ordenar:
                <a href="prod_list_off.php?o=n&c=<?php echo $chave;?>">Nome</a> |
                <a href="prod_list_off.php?o=v&c=<?php echo $chave;?>">Valor</a> |
                <a href="prod_list_off.php">Mostrar Todos</a> |
        <form  class="search-container">
            <input type="text"name="c" id="search-bar" placeholder="Buscar">
            <a ><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
        </form>
    </form>
            <table class="listagem">
            <?php 
            $q = "select cod_prod, nome, valor, qtd_estoq, imagem from produto where ativo='false'";

            if(!empty($chave)){
                $q .="and nome like '%$chave%'";
            }

            switch ($ordem){
                case "v":
                    $q .=" order by VALOR desc";
                    break;    
                default:    
                    $q .=" order by cod_prod";
            }
            ?>
          <div class="container">
    <?php
    $busca = $banco->query($q);
    if (!$busca) {
        echo "<div><p>Infelizmente a busca deu errado</p></div>";
    } else {
        if ($busca->num_rows == 0) {
            $mensagem = "Nenhum registro encontrado.";
            exibir_mensagem_toastify($mensagem, 'aviso');
           
                        }else{
                            while($reg=$busca->fetch_object()){                                                         
                                $t = thumb($reg->imagem);                                
                                echo "<tr ><td><img style='width:100px; heigth:100px;' src='$t'";
                                // echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->NOME</a>";
                                //inserir genero e produtora
                                echo "<tr><td>$reg->nome";
                                echo "<td class='valor'>$reg->valor</td>";
                                if(is_admin()){
                                    echo "<td><i class='material-icons'><a style='text-decoration: none; color:grey;' href= 'prod_recupere.php?cod=$reg->cod_prod'>add_circle</i>";

                                }
                                
                                // if(is_admin()){
                                //     //echo "<td>Novo | Alterar | Excluir";
                                //     echo "<td><i class='material-icons'>add_circle</i>";
                                //     echo "<i class='material-icons'><a style='text-decoration: none;' href= 'edit_game.php?cod=$reg->cod'>edit</a></i>";
                                //     echo "<i class='material-icons'><a style='text-decoration: none;'href= 'delete_jogos.php?cod=$reg->cod'>delete</a></i>";
                                // }elseif(is_editor()){
                                //     //echo "<td>Alterar";
                                //     echo "<td><i class='material-icons'>add_circle</i>";
                                //     echo "<i class='material-icons'><a style='text-decoration: none;' href= edit_game.php?cod=$reg->cod>edit</a></i>";
                                   
                                // }
                            }
                            
                        }
                    }
                }else{
                    echo msg_erro("Você não é administrador.");
                }
                }else{
                    echo msg_aviso("Faça login para acessar esta página.");
                }
                ?>
                </table>
            </body>
            <script>
    document.addEventListener('DOMContentLoaded', function() {
        const valores = document.querySelectorAll('.valor');

        valores.forEach(function(valorElemento) {
            let valorTexto = valorElemento.textContent.trim(); // Remove espaços em branco
            valorTexto = valorTexto.replace(/[^\d]/g, ''); // Remove todos os caracteres não numéricos
            const valorNumerico = parseFloat(valorTexto) / 100; // Divide por 100 para obter o valor correto em reais
            const valorFormatado = formatarValor(valorNumerico);
            valorElemento.textContent = valorFormatado;
        });

        function formatarValor(valor) {
            return valor.toLocaleString('pt-BR', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
                style: 'currency',
                currency: 'BRL'
            });
        }
    });
</script>
