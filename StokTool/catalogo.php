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
        <link rel="stylesheet" href="corpo.css">

        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="imagens/icon.png" type="image/x-icon">
       
    </head>
    <body>

    <?php
    $q2 = "SELECT cpfcnpj, nome_c from cliente WHERE ativo='true'";
    $busca2 = $banco->query($q2);
    if (!$busca2) {
        echo "Erro na consulta: " . $conexao->error;
    }
    
    
    ?>
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
 <?php 
 include_once "includes/topo.php";
 if (is_logado()){
     include_once "includes/side_bar.php";
 }
 include_once "includes/login.php";
 ?>
 

 <div class="teste" style="body:background-color:white;">
     <main class="main">
        <?php
           if(is_logado()){
           $ordem = $_GET['o'] ?? "n";    /*recebe 'o' se nao receber fica "n"*/
           $chave = $_GET['c'] ?? "";     /*recebe 'c' se nao receber fica ""*/
        ?>
        <form method="get" id="busca" class="search-container" action="catalogo.php">

                Ordenar:
                <a href="catalogo.php?o=n&c=<?php echo $chave;?>">Nome</a> |
                <a href="catalogo.php?o=v&c=<?php echo $chave;?>">Valor</a> |
                <a href="catalogo.php">Mostrar Todos</a> |
        <form  class="search-container">
            <input type="text"name="c" id="search-bar" placeholder="Buscar">
            <a ><img class="search-icon" src="./imagens/search.png"></a>
        </form>
    </form>
    
            <table class="listagem">
            <?php 
            $q = "select cod_prod, nome, valor, qtd_estoq, imagem from produto where ativo='true'";

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
            echo "<div><p>Nenhum registro encontrado</p></div>";
        } else {
           
            while ($reg = $busca->fetch_object()) {
                $t = thumb($reg->imagem);
                echo "<div class='item'>";
                echo "<img style='width:100px; height:100px; padding-top:10px' src='$t'>";
                echo "<p style='font-size:17px; font-family:Noto Sans; padding-top:20px;'>$reg->nome</p>";
                $valor_formatado = number_format($reg->valor / 100, 2, ',', '.');
                echo "<p style='font-size:17px; font-family:Noto Sans; padding-top:20px;'>Valor unitário R$$valor_formatado</p>";
                echo "<p id='valorT-$reg->cod_prod' data-valor='$reg->valor' style='font-size:17px; font-family:Noto Sans; padding-top:20px;'></p>";?>
                
                <div class="center-btn">
                    <button class='contBtn' id='btnDecrement' onclick="decrementarQuantidade('<?php echo $reg->cod_prod; ?>')">-</button>
                    <input type="number" class="contInput" value="0" id="<?php echo $reg->cod_prod; ?>" onkeydown="return validarNumero(event)">

                    <button class='contBtn' id='btnIncrement' onclick="incrementarQuantidade('<?php echo $reg->cod_prod; ?>')">+</button>
                </div>
               <?php echo "<p style='font-size:13px; font-family:Noto Sans; padding-top:20px;'>quantidade estoque: <strong>$reg->qtd_estoq</strong></p>"; ?>
                <?php 
                // if (is_admin()) {
                //     echo "<i class='material-icons'><a style='text-decoration: none; color:grey; padding: 10px; padding-top:20px;' href= 'prod_alterar.php?cod=$reg->cod_prod'>edit</a></i>";
                //     echo "<i class='material-icons'><a style='text-decoration: none; color:grey; padding: 10px 10px ; ' href= 'prod_delete.php?cod=$reg->cod_prod'>delete</a></i>";
                // }
                ?>

                </div>
                

            <?php } ?>

            <select name="cliente" class="cliente" id="cliente">
                            <?php
                                while($reg=$busca2->fetch_object()){
                                    echo "<option value='$reg->cpfcnpj'>$reg->nome_c</option>";
                                }
                            ?>
                            </select>
           
                            
                            <button class='btn btn-primary' style='margin-left:80%;' type='submit' onclick="preencheArray()">Gerar orçamento</button>

            <?php
        }
    }
}
?>

        <script>;
    function preencheArray() {
                var valoresArray = [];
    var inputs = document.getElementsByClassName('contInput');
    for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].value > 0) {
    var inputObj = {
    cod_prod: inputs[i].id,
    qtd: inputs[i].value
                        };
    valoresArray.push(inputObj);
                    }
                }
    console.log(valoresArray);
    const cliente = document.querySelector("[name=cliente]");
    location.href = "./cria_carrinho.php?array="+JSON.stringify(valoresArray)+"&cliente="+cliente.value;
    }

    
    </script>



  
    
</div>
                </table>
                <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
        <script>
    function incrementarQuantidade(codProduto) {
        var input = document.getElementById(codProduto);
        var valorAtual = parseInt(input.value);
        const novovalor = valorAtual + 1;
        input.value = novovalor;
        valorTotal(novovalor, codProduto);
    }

    function decrementarQuantidade(codProduto) {
        var input = document.getElementById(codProduto);
        var valorAtual = parseInt(input.value);
        if (valorAtual > 0) {
            const novovalor = valorAtual - 1;
            input.value = novovalor;
            valorTotal(novovalor, codProduto);
        }
    }
    function valorTotal(qtd, cod_prod) {
    const valorT = document.getElementById(`valorT-${cod_prod}`);
    const valorUnitario = parseInt(valorT.dataset.valor) / 100; // Valor unitário em reais
    const total = valorUnitario * qtd;

    // Formatação do valor total
    const valorTotalFormatado = formatarValor(total);

    valorT.innerText = total == 0 ? "" : `Valor total R$ ${valorTotalFormatado}`;
}

// Função para formatar o valor para o formato desejado (R$ X,XX)
function formatarValor(valor) {
    return valor.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });
}
</script>
<script>
        function validarNumero(event) {
        var key = event.key;
        // Verifica se a tecla pressionada é o sinal de menos (-)
        if (key === '-') {
            // Cancela o evento para evitar que o caractere seja inserido
            event.preventDefault();
            return false;
        }
        return true;
    }   
            </script>
        </main>
    </div>
</body>