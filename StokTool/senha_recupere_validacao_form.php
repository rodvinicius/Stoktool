
<?php
require_once "includes/banco.php";
require_once "includes/login.php";

?>

<form action="senha_recupere_validacao.php" method="POST">
<div class="cardd">
  <table>
    <tr>
      <td><a href="user_login.php"><img src="imagens/arrow-left (1).svg" alt="Voltar"></a></td>
<td><h1>Recuperar Senha</h1></td>
</tr>
</table>
<form class="row g-3 needs-validation" novalidate>
  <div class="col-md-4" class="qualquer">
    <label for="validationCustom01"  class="form-label">Digite seu CPF</label>
    <input type="text" name="cpf" class="form-control" id="cpf" maxlength='14'>
    <div class="valid-feedback">
    </div>
</div>
<div class="col-md-4" class="qualquer">
    <label for="validationCustom01"  class="form-label">Digite seu usuário</label>
    <input type="text" name="usuario" class="form-control" id="validationCustom01">
    <div class="valid-feedback">
   
    </div>
</div><br><br>
<button class="btn btn-primary" type="submit">Verificar</button>
</form>
</form>



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