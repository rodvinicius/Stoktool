<?php
require_once "includes/banco.php";
$cod = $_GET['cod'] ?? 0;


$q = "select nome, valor, qtd_estoq, imagem, cod_prod from produto where cod_prod='$cod'";
$busca = $banco->query($q);
$reg=$busca->fetch_object();

?>

<form action="prod_recupere.php" method="POST">
<div class="cardd">
  <table>
    <tr>
      <td><a href="index.php"><img src="imagens/arrow-left (1).svg" alt="Voltar"></a></td>
<td><h1>Recuperar Produto</h1></td>
</tr>
</table>
<form class="row g-3 needs-validation" novalidate>
  <div class="col-md-4" class="qualquer">
    <label for="validationCustom01"  class="form-label">Nome</label>
    <input type="text" name="nome" readonly class="form-control" id="validationCustom01" value="<?php echo $reg->nome;?>">
    <div class="valid-feedback">
     
    </div>
  </div>
  <div class="col-12" class="qualquer">
  </div>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Valor</label>
    <input type="text" name="valor" readonly class="form-control" id="valor" value="<?php echo $reg->valor;?>">
    <div class="valid-feedback">
     
    </div>
  </div>
  <div class="col-12">
  </div>
  <div class="col-md-4" class="qualquer">
    <label for="validationCustom01" class="form-label">Quantidade em estoque</label>
    <input type="text" name="qtd_estoq" readonly class="form-control" id="validationCustom01" value="<?php echo $reg->qtd_estoq;?>">
    <div class="valid-feedback">
    
    </div>
  </div>
  <div class="col-12" class="qualquer">
  </div>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Capa</label>
    <input type="file" name="capa" disabled class="form-control" id="validationCustom01" value="<?php echo $reg->imagem;?>">
    <div class="valid-feedback">
    
    </div>
  </div>
  <div class="col-12">
  <label><input type="text" hidden id="capa1" name="capa1" value="<?php echo $reg->imagem;?>"><br>
 
    <button class="btn btn-primary" type="submit">Recuperar</button>
    <input type="hidden" name="cod" value="<?php echo $reg->cod_prod;?>">
  </div>
</form>
</div>
</form>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('valor');

            // Função para aplicar a máscara de valor em reais
            function aplicarMascaraValor(value) {
                value = value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
                value = (value / 100).toFixed(2) + ''; // Converte para float e fixa duas casas decimais
                value = value.replace(".", ","); // Substitui ponto por vírgula
                value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'); // Adiciona os pontos de milhar
                return 'R$ ' + value;
            }

            // Aplica a máscara ao valor inicial, se houver
            input.value = aplicarMascaraValor(input.value);

            // Aplica a máscara ao digitar no campo
            input.addEventListener('input', function() {
                input.value = aplicarMascaraValor(input.value);
            });
        });
    </script>