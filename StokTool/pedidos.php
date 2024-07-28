<?php 
require_once "includes/banco.php";
require_once "includes/funcoes.php";
require_once "includes/login.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>pedidos</title>
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
 include_once "includes/topo.php";
 include_once "includes/side_bar.php";
 include_once "includes/login.php";
 ?>
 <?php
$q = "select COD_CARRINHO,CPFCNPJ from carrinho where ativo = 'true 'order by COD_CARRINHO desc, CPFCNPJ desc";
$busca = $banco->query($q);

$q3 = "SELECT p.NOME AS nomep, cl.NOME_C AS nomec
FROM PRODUTO p
INNER JOIN ITEM_CARRINHO ic ON p.COD_PROD = ic.COD_PROD
INNER JOIN CARRINHO c ON ic.COD_CARRINHO = c.COD_CARRINHO
INNER JOIN CLIENTE cl ON c.CPFCNPJ = cl.CPFCNPJ";
$busca3 = $banco->query($q3);

// var_dump($busca3);

 ?>
 
 <div class="teste" style="body:background-color:white;">
 <a href="catalogo.php"><img src="imagens/arrow-left (1).svg" alt="Voltar"></a>
<?php

if (!$busca) {
    echo "<div><p>Infelizmente a busca deu errado</p></div>";
} else {
    if ($busca->num_rows == 0) {
        echo "<div><p>Nenhum registro encontrado</p></div>";
    } else {
        $counter = 1; 

        while ($reg = $busca->fetch_object()) {
            
?>
    <form action="efetuar_pedido.php" method="post">
        <input type="text" hidden name="cod_carrinho" value="<?= $reg->COD_CARRINHO?>">
 <div class="accordion" id="accordionExample<?php echo $counter; ?>">

    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $counter; ?>" aria-expanded="true" aria-controls="collapse<?php echo $counter; ?>">
    <?php 
        $q4 = "select nome_c from cliente where CPFCNPJ = '$reg->CPFCNPJ'";
        // echo $q4;
        $reg3 = $banco->query($q4);
        $reg3=$reg3->fetch_object();
        $nomecliente = $reg3->nome_c;
    ?>
      <?php echo "$reg->COD_CARRINHO | $nomecliente"; ?>
      </button>
    </h2>
    <div id="collapse<?php echo $counter; ?>" class="accordion-collapse collapse " data-bs-parent="#accordionExample<?php echo $counter; ?>">
      <div class="accordion-body">
        <strong>
        <div class='pedidos'>
        <?php 
            $q2 = "select ic.cod_prod, ic.valor_total, ic.qtd, p.nome, p.imagem from item_carrinho as ic inner join PRODUTO as p on p.cod_prod = ic.cod_prod where COD_CARRINHO = $reg->COD_CARRINHO ";
            $busca2 = $banco->query($q2);
            $cod_carrinho = $reg->COD_CARRINHO;
            if(!$busca2){
                echo "<tr><td>Infelizmente a busca deu errado";
            }else{
                if($busca2->num_rows==0){
                    echo"<tr><td>Nenhum registro encontrado";
                }else{
                    while($reg2=$busca2->fetch_object()){     ?>
                    <?php 
                    $t = thumb($reg2->imagem); 
                    ?>
                        <div class="list-group">
                            <span class="list-group-item list-group-item-action " aria-current="true">
                                <div class="img-item w-100">
                                    <img style='width:50px; height:50px; padding-top:10px' src='<?= $t?>'>
                                    <div class="w-100">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1"><?= $reg2->nome?></h5>
                                            <p>Valor Total R$:<?= number_format($reg2->valor_total/100, 2, ',', "") ?></p>
                                        </div>
                                        <p class="mb-1">Quantidade:&nbsp;<?= $reg2->qtd?></p>
                                    </div>
                                </div>
                                
                    </span>
                            
                            </div>
                            <br>
                        <?php 
                    }
                }
                    
            }
        ?>
        <button class='btn btn-primary' style='margin-left:80%;' type='submit'>Confirmar pedido</button>
        </div>
        </strong> 
      </div>
    </div>
  </div>
        </form>

<?php
            $counter++;
        }
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</div>
       
</body>
</html>
