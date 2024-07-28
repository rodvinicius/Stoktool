<?php
require_once "includes/banco.php";
$cod = $_GET['cod'] ?? 0;



?>
<body class="body_card">
  
</body>

<form action="user_novo.php" method="POST">
<div  class="cardd">
  <table>
    <tr>
      <td><a href="catalogo.php"><img src="imagens/arrow-left (1).svg" alt="Voltar"></a></td>
<td><h1>Criar usuário</h1></td>
</tr>
</table>
<form class="row g-3 needs-validation" novalidate>
<div class="col-md-4" class="qualquer">
    <tr><label for="validationCustom01"  class="form-label">CPF</label>
    <input type="text" name="cpf" class="form-control" id="CPF" maxlength="14">
    <div class="valid-feedback">
     
    </div>
  </div>
  <div class="col-md-4" class="qualquer">
    <label for="validationCustom01"  class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" maxlength="45" id="validationCustom01" value="">
    <div class="valid-feedback">
    </div>
  </div>


  <div class="col-12" class="qualquer">
  </div>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Usuario</label>
    <input type="text" name="usuario" class="form-control" id="validationCustom01" maxlength="45" value="">
    <div class="valid-feedback">
    </div>
    <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Tipo</label>
    <select name="tipo"   id="validationCustom01">
      <option value="admin">administrador</option>
      <option value="vendedor">Vendedor</option>
    </select>
    <div class="valid-feedback">

    </div>
  </div>
</div>

  <div class="col-md-4" class="qualquer">
    <label for="validationCustom01" class="form-label">Senha</label>
    <input type="password" name="senha1" class="form-control" id="validationCustom01" value="">
    <div class="valid-feedback">
    
    </div>
  </div>
  <div class="col-md-4" class="qualquer">
    <label for="validationCustom01" class="form-label">Confirme a senha</label>
    <input type="password" name="senha2" class="form-control" id="validationCustom01" value="">
    <div class="valid-feedback">
    
    </div>
  </div>
    <br><br><button class="btn btn-primary" type="submit">Criar</button>
    <input type="hidden" name="cod" value="">
  </div>
</form>
</div>
</form>



<script>
const input = document.querySelector('input');
 
input.addEventListener('keypress', () => {
    let inputLength = input.value.length;
 
    // Máscara CPF
    if (inputLength == 3 || inputLength == 7) {
        input.value += '.';
    } else if (inputLength == 11) {
        input.value += '-';
    }
 
});
</script>



