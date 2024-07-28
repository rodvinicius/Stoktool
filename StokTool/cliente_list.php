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
        <link rel="stylesheet" href="tabela_user.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>



        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
 <table>
    <tr>
        <td><a href="catalogo.php"><img src="imagens/arrow-left (1).svg" alt="Voltar"></a></td>
        <td><h1>Lista de Clientes</h1></td>
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
      <?php 
      if (is_admin()){
        echo "<th>Nome</th>";
        echo "<th>CPF/CNPJ</th>";
        echo "<th>Logradouro</th>";
        echo "<th>Telefone</th>";
        echo "<th>Estado</th>";
        echo "<th>Editar</th>";
        echo "</tr>";
      }else{
        echo "<th>Nome</th>";
        echo "<th>CPF/CNPJ</th>";
        echo "<th>Logradouro</th>";
        echo "<th>Telefone</th>";
        echo "<th>Estado</th>";
        echo "</tr>";
      }
      ?>
  </thead>
  <tbody>
    <?php
    // Dados simulados
    $q = "SELECT cpfcnpj, nome_c, logradouro, telefone, ativo from cliente order by nome_c desc;";

    $busca = $banco->query($q);
            if(!$busca){
                echo "<tr><td>Infelizmente a busca deu errado";
            }else{
                if($busca->num_rows==0){
                    echo"<tr><td>Nenhum registro encontrado";
                }else{
                    while($reg=$busca->fetch_object()){  
                      if (is_admin()){

                        echo "<tr><td><a style='color:black;' >$reg->nome_c</a></td>";
                        echo "<td data-mask='cpf-cnpj'>$reg->cpfcnpj</td>";
                        echo "<td>$reg->logradouro</td>";
                        echo "<td data-mask='telefone'>$reg->telefone</td>";
                        if($reg->ativo=='true'){
                          echo "<td style='color:green;'>ativo</td>";
                      }else{
                          echo "<td style='color:red;'>não ativo</td>";
                      }
                        echo "<td> <i class='material-icons'><a style='text-decoration: none; color:grey; padding: 10px; padding-top:20px;' href= 'cliente_edit.php?cod=$reg->cpfcnpj'>edit</a></i> 
                        <i class='material-icons'><a style='text-decoration: none; color:grey; padding: 10px 10px ; ' href= 'cliente_delete.php?cod=$reg->cpfcnpj'>delete</a></i> </td>";
                      }else{
                        echo "<tr><td><a style='color:black;' >$reg->nome_c</a></td>";
                        echo "<td data-mask='cpf-cnpj'>$reg->cpfcnpj</td>";
                        echo "<td>$reg->logradouro</td>";
                        echo "<td data-mask='telefone'>$reg->telefone</td>";
                        if($reg->ativo=='true'){
                          echo "<td style='color:green;'>ativo</td>";
                      }else{
                          echo "<td style='color:red;'>não ativo</td>";
                      }
                        
                      }
                     
                  
                        // if($reg->ativo=='true'){
                        //     echo "<td style='color:green;'>ativo</td>";
                        // }else{
                        //     echo "<td style='color:red;'>não ativo</td>";
                        // }
                    }
                }
            }

    ?>
  </tbody>
</table>

</body>
</html>
<script>
$(document).ready(function() {
    // Máscara para CPF ou CNPJ
    $('td[data-mask="cpf-cnpj"]').each(function() {
        var value = $(this).text().trim();
        var mask = value.length === 11 ? '000.000.000-00' : '00.000.000/0000-00';
        $(this).text(value).mask(mask, {reverse: true});
    });

    // Máscara para telefone
    $('td[data-mask="telefone"]').each(function() {
        var value = $(this).text().trim();
        var mask = value.length === 11 ? '(00) 00000-0000' : '(00) 0000-0000';
        $(this).text(value).mask(mask);
    });
});
</script>


  