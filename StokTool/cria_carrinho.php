<body>
        <?php
           require_once "includes/banco.php";
           require_once "includes/funcoes.php";
           require_once "includes/login.php";
           require_once "catalogo.php";
        ?>
        <div id="teste">

            <?php
                    
                        $usuario = $_SESSION['usuario'] ?? null;
                        // $qtd = $_GET['qtd'] ?? null;
                        $array = $_GET['array'] ?? null;
                        // echo $array;
                        $cliente = $_GET['cliente'] ?? null;
                        

                        
                        if ($usuario == null || $array == null){
                            require "includes/catalogo.php";
                        }

                        $array = json_decode($array);
                        $q = "select cpf from vendedor v inner join login l on v.usuario = l.usuario where v.USUARIO = '$usuario';";

                        $busca = $banco->query($q) ;
                        $vendedor = $busca->fetch_object();
                        $cpf = $vendedor->cpf;

                       $q = "INSERT INTO CARRINHO(CPF,CPFCNPJ)VALUES('$cpf','$cliente')";
                       
                    $banco->query($q) ;
                    $busca = $banco->query("select max(COD_CARRINHO) as COD_CARRINHO from CARRINHO");
                      
                       $carrinho = $busca->fetch_object();
                       
                    
                            

                       foreach ($array as $item){
                        $q = "SELECT VALOR, QTD_ESTOQ FROM PRODUTO WHERE COD_PROD = $item->cod_prod";
                        $busca = $banco->query($q);
                        $busca = $busca->fetch_object();
                        $total = $busca->VALOR * $item->qtd;
                        $q = "INSERT INTO ITEM_CARRINHO(QTD,COD_PROD,COD_CARRINHO,VALOR_TOTAL)VALUES($item->qtd,$item->cod_prod,$carrinho->COD_CARRINHO,$total)";
                        $banco->query($q);
                        
                        
                       }

                     

                    
                        // echo var_dump($vendedor);
                        // echo $q;

                       
                       
                
                
            ?>
             <meta http-equiv="refresh" content="0;url=pedidos.php">
        </div> 
    </body>