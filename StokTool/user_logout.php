

 
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Stoktool</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos/estilo.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    </head>
    <body>
        <?php
           require_once "includes/banco.php";
           require_once "includes/funcoes.php";
           require_once "includes/login.php";
        ?>
        <div id="corpo">


        <?php
        logout();
        $mensagem = "encerrando sessão...";
        exibir_mensagem_toastify($mensagem, 'sucesso');
        // if(logout()){
        //     echo msg_sucesso("Fechando sessão...");
        // }else{
        //     echo msg_erro("Erro ao fechar sessão. Tente novamente.");
        // }
        ?>
            <!-- <script>
                const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: "btn btn-success",
    cancelButton: "btn btn-danger"
  },
  buttonsStyling: false
});
swalWithBootstrapButtons.fire({
  title: "Deseja sair da sessão?",
  text: "Isso poderá cancelar algumas ações que não tenham sido concluídas.",
  icon: "warning",
  showCancelButton: true,
  confirmButtonText: "Sim",
  cancelButtonText: "Não, cancelar",
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    swalWithBootstrapButtons.fire({
      title: "Saiu da sessão",
    //   text: "",
      icon: "success"
     
    });
    
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire({
      title: "Ação cancelada",
    //   text: "Your imaginary file is safe :)",
      icon: "success"
    });
  }
});
            </script>
            -->
        </div> 
    </body>
</html>

