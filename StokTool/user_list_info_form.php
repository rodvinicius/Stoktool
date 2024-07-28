<?php
require_once "includes/banco.php";
$cod = $_GET['cod'] ?? 0;


$q = "SELECT vendedor.cpf, login.usuario, vendedor.nome, login.ativo, login.tipo FROM vendedor INNER JOIN login ON vendedor.usuario = login.usuario where login.usuario = '$cod' ;";
$busca = $banco->query($q);
$reg=$busca->fetch_object();

?>

<form action="user_list_info.php" method="POST">
<div class="cardd">
  <table>
    <tr>
      <td><a href="user_list.php"><img src="imagens/arrow-left (1).svg" alt="Voltar"></a></td>
      <!-- <//?php if($reg->ativo=='true'){
        ?> <td><h1>Desativar Usuário</h1></td><//?php
      }else{
        ?> <td><h1>Recuperar Usuário</h1></td><//?php
      } ?> -->
       <td><h1 style="font-size: 34px">Informações do Usuário</h1>
</tr>
</table>
<form class="row g-3 needs-validation" novalidate>
<div class="col-md-4" class="qualquer">
    <label for="validationCustom01"  class="form-label">CPF</label>
    <input type="text" name="CPF" readonly class="form-control" id="cpf" value="<?php echo $reg->{'cpf'};?>">
    <div class="valid-feedback">
     
    </div>
  </div>

  <div class="col-md-4" class="qualquer">
    <label for="validationCustom01"  class="form-label">Nome</label>
    <input type="text" name="nome" readonly class="form-control" id="validationCustom01" value="<?php echo $reg->{'nome'};?>">
    <div class="valid-feedback">
     
    </div>
  </div>

  <div class="col-md-4" class="qualquer">
    <label for="validationCustom01"  class="form-label">Usuario</label>
    <input type="text" name="usuario" readonly class="form-control" id="validationCustom01" value="<?php echo $reg->{'usuario'};?>">
    <div class="valid-feedback">
     
    </div>
  </div>

  <div class="col-md-4" class="qualquer">
    <label for="validationCustom01"  class="form-label">Tipo</label>
    <input type="text" name="tipo" readonly class="form-control" id="validationCustom01" value="<?php echo $reg->{'tipo'};?>">
    <div class="valid-feedback">
     
    </div>
  </div>
  <div class="col-12">
  <label><input type="text" hidden id="cod" name="cod" value="<?php echo $reg->usuario;?>"><br>
  
  <?php if($reg->ativo=='true'){
    ?><button style="font-family: 'Noto Sans';" class="btn btn-primary" type="submit">Desativar</button>&nbsp&nbsp<?php 
  }else{
    ?><button style="font-family: 'Noto Sans';" class="btn btn-primary" type="submit">Recuperar</button><?php
  }
  echo "<input style='font-family: 'Noto Sans';' class='btn btn-primary' type='submit' formaction='user_modify_form.php?cod=$reg->usuario' value='Modificar'>";?> 
 </div>
</form>

</div>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('cpf');

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
