<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <title>Stoktool</title>
</head>
<body>

<?php 
require_once "includes/banco.php";
require_once "includes/funcoes.php";
require_once "includes/login.php";

$cod = $_GET['cod'] ?? 0;
$q = "select vendedor.cpf, login.usuario, vendedor.nome, login.ativo, login.tipo from vendedor inner join login on vendedor.usuario = login.usuario where login.usuario='$cod'";
$busca = $banco->query($q);
if ($busca) {
  $reg = $busca->fetch_object();
} else {
  echo "Erro na consulta ao banco de dados: " . $banco->error;
  exit; 
}
 if($reg){
?>
<form action="user_modify.php" method="POST">
<div class="cardd">
  <table>
    <tr>
      <td><a href="user_list.php"><img src="imagens/arrow-left (1).svg" alt="Voltar"></a></td>
      <!-- <//?php if($reg->ativo=='true'){
        ?> <td><h1>Desativar Usuário</h1></td><//?php
      }else{
        ?> <td><h1>Recuperar Usuário</h1></td><//?php
      } ?> -->
       <td><h1>Modificar Usuário</h1>
</tr>
</table>
<form class="row g-3 needs-validation" novalidate>
  <div class="col-md-4" class="qualquer">
  
    <label for="validationCustom01"  class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" id="nome" maxlength="45" value="<?php echo $reg->nome;?>">
    <div class="valid-feedback">
     
    </div>
  </div>

  <div class="col-md-4" class="qualquer">
    <label for="validationCustom01"  class="form-label">Usuario</label>
    <input type="text" name="usuario" readonly class="form-control" id="usuario" value="<?php echo $reg->usuario;?>">
    <div class="valid-feedback">
     
    </div>

    <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Tipo</label>
    <?php
    if($reg->tipo=='admin'){
      ?>
      <select name="tipo"   id="usuario">
      <option value="admin">administrador</option>
      <option value="vendedor">Vendedor</option>
    </select>
    <?php
    }else{
      ?>
      <select name="tipo"   id="usuario">
      <option value="vendedor">Vendedor</option>
      <option value="admin">administrador</option>
    </select>
      
    <?php
}
?>


  <!-- <div class="col-12">

  </div> -->
   <!-- <button style="font-family: 'Noto Sans';" class="btn btn-primary" type="submit">Modificar</button> -->
   <br><br><button class="btn btn-primary" type="submit">Alterar</button> 
   <input type="text" hidden name="cod" value="<?php echo $cod; ?>"><br>
</form>
</div>


<!-- <script>
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
</script> -->


<?php
}else{
  echo msg_erro("Usuário não encontrado.");
}
?>
</body>
</html>

