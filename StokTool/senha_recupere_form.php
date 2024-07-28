<?php
require_once "includes/banco.php";
require_once "includes/login.php";


?>

<form action="senha_recupere.php" method="POST">
<div class="cardd">
  <table>
    <tr>
      <td><a href="user_login.php"><img src="imagens/arrow-left (1).svg" alt="Voltar"></a></td>
<td><h1>Nova Senha</h1></td>
</tr>
</table>
<form class="row g-3 needs-validation" novalidate>
  <div class="col-md-4" class="qualquer">
    <label for="validationCustom01"  class="form-label">Senha</label>
    <input type="text" name="senha1" class="form-control" id="validationCustom01" >
    <div class="valid-feedback">
     
    </div>
  </div>
  <br><div class="col-md-4" class="qualquer">
    <label for="validationCustom01"  class="form-label">Repita a senha</label>
    <input type="text" name="senha2" class="form-control" id="validationCustom01" >
    <div class="valid-feedback">
     
    </div>
  </div>
    <br><button style="border-radius:4px;" type="submit">Alterar</button>
 

</div>
</form>

