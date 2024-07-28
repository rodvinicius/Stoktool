<?php
session_start();
if(!isset($_SESSION['usuario'])){
    $_SESSION['usuario']="";
    $_SESSION['nome']="";
    $_SESSION['tipo']="";
    
}
//function cripto($senha){
  //  $cripto = base64_encode($senha);
  //return $cripto;
//}

function gerarCrypto($senha){
   $hash = crypt($senha,'senha');

   return $hash;
}


function testarCrypto($senha,$hash){
    $ok = password_verify($senha,$hash);
    return $ok;
}

//gerarCrypto("1234"); <--
//testarCrypto("1234","seUc7O/85EPvQ"); <--

//$hash = cripto(12345);
//if(password_verify(12345, $hash)){
   //   echo "ok";
//}else{
  //  echo "no";
//}
//function testarCripto($senha, $cripto){  
//}
 //echo cripto('oii');
function logout(){
    unset($_SESSION['usuario']);
    unset($_SESSION['nome']);
    unset($_SESSION['tipo']);?>
    <meta http-equiv="refresh" content="3;url=user_login.php">


<?php }
function is_logado(){
    if(empty($_SESSION['usuario'])){
        return false;
    }else{
        return true;
    }
}
function is_admin(){
    $tipo = $_SESSION['tipo'] ?? null;
    if(is_null($tipo)){
        return false;
    }else{
        if($tipo == 'admin'){
            return true;
        }else{
            return false;
        }
    }
}

function is_user(){
    $tipo = $_SESSION['tipo'] ?? null;
    if(is_null($tipo)){
        return false;
    }else{
        if($tipo == 'usuario'){
            return true;
        }else{
            return false;
        }
    }
}

?>