<link rel="stylesheet" href="estilo.css">

<nav class="z-depth-0" style="height: 60px;">
    <div class="nav-wrapper  deep-purple lighten-5">
        <?php
        if(!empty($_SESSION['usuario'])){
            echo "<img class='logo' style='width: 55px; height: 50px;' src='imagens/icon.png' alt='Stoktool'>";
            echo "<ul class='right hide-on-med-and-down'>";
            echo "<li> <p class='fontes_ola'>Olá,<strong> " . $_SESSION['nome']." |</strong><p></li>";
            echo "<li><a href='user_logout.php'><img  src='imagens/log-out (2).svg' alt='Sair'>ㅤ</img></a></li>";
            // echo "<li><img src='imagens/log-out (2).svg' onclick='SairLogin();' alt='Sair'></li>";
            echo "</ul>";
            
    }else{
        echo "<ul class='right hide-on-med-and-down'><li><a class='fontes_ola' href='user_login.php' >Entrar    <img src='imagens/log-in.svg' alt='Entrar'></img></a><li></ul>";
       
}
?>

<!-- 
<script>
    function sairLogin(){
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

    }
            </script> -->
</div>
</nav>
