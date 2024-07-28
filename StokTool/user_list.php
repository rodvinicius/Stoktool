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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    </head>
    <body>
    
 <?php include_once "includes/topo.php";?>
 <?php include_once "includes/side_bar.php";?>
 <div class="teste">
  
  <?php
  if(is_logado()){

  
  if(is_admin()){

  
  ?>
 <table>
    <tr>
        <td ><a href="catalogo.php"><img src="imagens/arrow-left (1).svg" alt="Voltar"></a></td>
        <td><h1>Lista de Usuários</h1></td>
        <tr>
</table>


                    <style>
/* Estilos da tabela */
table {
    font-family: "Noto Sans";
    width: 100%;
    border-collapse: collapse;
}



th, td {
  padding: 10px;
  text-align: center;
}

/* Estilo do cabeçalho */
th {
  background-color: #EDE7F6;
}

/* Estilo das linhas alternadas */
tr:nth-child(even) {
  background-color:  #f1f1f1;
}
</style>

<table>
  <thead>
    <tr>
      <th>Nome</th>
      <th>Tipo</th>
      <th>Usuario</th>
      <th>Estado</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Dados simulados
    $q = "SELECT login.usuario, vendedor.nome, login.ativo, login.tipo FROM vendedor INNER JOIN login ON vendedor.usuario = login.usuario order by ativo desc;";

    $busca = $banco->query($q);
            if(!$busca){
                echo "<tr><td>Infelizmente a busca deu errado";
            }else{
                if($busca->num_rows==0){
                    echo"<tr><td>Nenhum registro encontrado";
                }else{
                    while($reg=$busca->fetch_object()){     
                        echo "<tr><td><a style='color:black;' href='user_list_info.php?cod=$reg->usuario'>$reg->nome</a></td>";
                        echo "<td>$reg->tipo</td>";
                        echo "<td>$reg->usuario</td>";
                        if($reg->ativo=='true'){
                            echo "<td style='color:green;'>ativo</td>";
                        }else{
                            echo "<td style='color:red;'>não ativo</td>";
                        }
                    }
                }
            }

    ?>
  </tbody>
</table>

</body>
</html>
<script>
  <?php
  }else{
  
    echo msg_erro("Você não é administrador.");
  }
}else{
  echo msg_aviso("Faça login para acessar esta página.");

}
  ?>

