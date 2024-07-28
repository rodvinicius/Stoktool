<link rel="stylesheet" href="includes/side_bar.css">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="testeestilo.css">
<?php
?>
 
    <!--Inicio Sidebar-->
   
    <div class="sidebar close">
     
      <div class="logo-details">
       
      <a href="catalogo.php"><i ><img style="width:60px; padding: 1% 1px 15px 20px;" src="imagens/icon.png" alt="Stoktool"></i></a>
       <span class="logo_name"><img src="imagens/icon.png" alt=""></span>
     
 
      </div>
     
      <ul class="nav-links">
      <?php
      if(!is_logado()){
        echo "</ul>";
        echo "</div>";
      }else{
        ?>
        <li>
         
          <a href="catalogo.php">
            <i class='bx bxs-home bx-sm' style="color:grey"></i>
            <span class="link_name">Página Principal</span>
          </a>
           
          <!-- <ul class="sub-menu blank">
            <li><a class="link_name" href="catalogo.php">Principal</a></li>
          </ul> -->
         
        </li>
        <?php
     
 
     
          if(is_admin()){
       
       
 
?>
        <li>
         
          <div class="iocn-link">
           
            <a href="#">
              <i class='bx bx-package bx-sm' style="color:grey ;"></i>
              <span class="link_name">Categoria</span>
            </a>
           
           
         
          </div>
         
          <ul class="sub-menu">
           
            <li><a class="link_name">Produtos</a></li>
            <li><a href="prod_inserir.php">Adicionar produto</a></li>
            <li><a href="prod_list_off.php">Produtos excluídos</a></li>
            <li><a href="alterar.php">Alterar produto</a></li>
 
 
           
         
          </ul>
         
        </li>
       
        <li>
         
          <div class="iocn-link">
           
         
             
            <i class="bx bx-user bx-sm"  style="color:grey;"></i>
         
          </div>
         
          <ul class="sub-menu">
            <li><a class="link_name">Usuários</a></li>
            <li><a href="user_novo.php">Criar novo usuário</a></li>
            <li><a href="user_list.php">Lista de Usuários</a></li>
         
          </ul>
 
        </li>
	<li>
          
          <div class="iocn-link">
            
           
             
            <i class='bx bx-group bx-sm' style="color:grey;"></i>
          
          </div>
          
          <ul class="sub-menu">
          
            <li><a class="link_name" href="#">Clientes</a></li>
            <li><a href="cliente_inserir.php">Cadastrar novo cliente</a></li>
            <li><a href="cliente_list.php">Lista de clientes</a></li>
          
          </ul>

        </li>

        <li>
          
          <div class="iocn-link">
            
           
            <i class='bx bx-cart-alt bx-sm'  style="color:grey;"></i>
          
          </div>
          
          <ul class="sub-menu">
          
            <li><a class="link_name" href="#">Pedidos</a></li>
            <li><a href="pedidos.php">Acompanhar pedidos</a></li>
          
          </ul>

        </li>
            
        <!-- <buton class="button-mobile" onclick="toggleMenu()">
        <i class="material-symbols-outlined">menu</i>
        <span>Menu</span>
    </buton>

    <nav class="menu-mobile" id="menu-mobile">
        <button class="button-close" onclick="toggleMenu()">
            <span>
                <i class="material-symbols-outlined"> close </i>
            </span>
        </button>
        <button>
            <span>
                <i class="material-symbols-outlined">home</i>
                <span class='bx bxs-home bx-sm'>Home</span>
            </span>
        </button>
        <button>
            <span>
                <i class="material-symbols-outlined">tag</i>
                <span class="mobile-text">Explorar</span>
            </span>
        </button>
        <button>
            <span>
                <i class="material-symbols-outlined">email</i>
                <span class="mobile-text">Mensagens</span>
            </span>
        </button>
        <button>
            <span>
                <i class="material-symbols-outlined">home</i>
                <span class="mobile-text"></span>
            </span>
        </button>
        <button>
            <span>
                <i class="material-symbols-outlined">home</i>
                <span class="mobile-text"></span>
            </span>
        </button>
        <button>
            <span>
                <i class="material-symbols-outlined">home</i>
                <span class="mobile-text"></span>
            </span>
        </button>
    </nav> -->




        
<!--
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Analytics</a></li>
          </ul>
 
        </li>
       
        <li>
         
          <a href="#">
            <i class='bx bx-line-chart' style="color:grey;"></i>
            <span class="link_name">Chart</span>
          </a>
 
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Controles</a></li>
          </ul>
 
        </li>
 
        <li>
         
          <div class="iocn-link">
         
            <a href="#">
              <i class='bx bx-plug' style="color:grey;"></i>
              <span class="link_name">Plugins</span>
            </a>
           
            <i class='bx bxs-chevron-down arrow' ></i>
           
          </div>
         
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Plugins</a></li>
            <li><a href="#">Formularios</a></li>
            <li><a href="#">Menus</a></li>
            <li><a href="#">SlideShow</a></li>
          </ul>
 
        </li>
       
        <li>
       
          <a href="#">
            <i class='bx bx-compass' style="color:grey;"></i>
            <span class="link_name">Explore</span>
          </a>
         
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Explore</a></li>
          </ul>
 
        </li>
 
        <li>
         
          <a href="#">
            <i class='bx bx-history' style="color:grey;"></i>
            <span class="link_name">Histórico</span>
          </a>
         
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Histórico</a></li>
          </ul>
 
        </li>-->
         
     
 
     
 
      </ul><!--Fecha ul-->
 
    </div>
    <?php
    }else{
      ?>
      <li>
          
          <div class="iocn-link">
            
           
             
            <i class='bx bx-group bx-sm' style="color:grey;"></i>
          
          </div>
          
          <ul class="sub-menu">
          
            <li><a class="link_name" href="#">Clientes</a></li>
            <li><a href="cliente_inserir.php">Cadastrar novo cliente</a></li>
            <li><a href="cliente_list.php">Lista de clientes</a></li>
          
          </ul>

        </li>

        <li>
          
          <div class="iocn-link">
            
           
            <i class='bx bx-cart-alt bx-sm'  style="color:grey;"></i>
          
          </div>
          
          <ul class="sub-menu">
          
            <li><a class="link_name" href="#">Pedidos</a></li>
            <li><a href="pedidos.php">Acompanhar pedidos</a></li>
          
          </ul>

        </li>

        
<?php
  
      echo "</ul>";
 
    echo "</div>";
    }
      }
    ?>
    <!--Fecha Sidebar-->