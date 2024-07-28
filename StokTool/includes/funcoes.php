<link rel="stylesheet" href="estilo.css">
<?php

function thumb($arq){
    $caminho = "imagens/$arq";    
    if(empty($arq) || !file_exists($caminho)){
        return "imagens/indisponivel.png";
        
    }else{
        return $caminho;
    }
}
function msg_sucesso($m){
    $resp = "<div class='sucesso'><span class='material-icons'>check_circle</span>$m</div>";
//   $resp = "<div class='alert alert-success' role='alert'>
//   <h4 class='alert-heading'>Muito bem!</h4>
//   <p>Aêêê! Você conseguiu ler essa mensagem de alerta. Esse texto vai ter quer se extender um pouquinho pra você conseguir ver como o espaçamento dentro de um alerta funciona.</p>
//   <hr>
//   <p class='mb-0'>Sempre que precisar, use utilitários de margem para manter as coisas perfeitas.</p>
// </div>";
    return $resp;
}
function msg_aviso($m){
    $resp = "<div class='aviso'><span class='material-icons'>info</span>$m</div>";
    return $resp;
}
function msg_erro($m){
    $resp = "<div class='erro'><span style='color: darkred; width: 30px;' class='material-icons'>error</span>$m</div>";
    return $resp;
}
function voltar(){
    return "<a href='index.php'><span class='material-icons'>arrow_back</span></a>";
}
// Função para exibir mensagem usando Toastify
function exibir_mensagem_toastify($mensagem, $tipo = 'sucesso') {
    // Definição do estilo de acordo com o tipo de mensagem
    switch ($tipo) {
        case 'sucesso':
            $background = 'linear-gradient(to right, hsl(228, 65%, 72%),  hsl(228, 65%, 72%))';
            break;
        case 'erro':
            $background = 'linear-gradient(to right, #e53935, #b71c1c)';
            break;
        case 'aviso':
            $background = 'linear-gradient(to right, #ffa000, #ff6f00)';
            break;
        default:
            $background = 'linear-gradient(to right, #2196f3, #1976d2)';
            break;
    }
 
    // Gerando o código JavaScript para exibir Toastify
    echo '<script>';
    echo 'document.addEventListener("DOMContentLoaded", function() {';
    echo '  Toastify({';
    echo '      text: "' . addslashes($mensagem) . '",';
    echo '      duration: 3000,';
    echo '      gravity: "top",';
    echo '      position: "center",';
    echo '      style: {';
    echo '          background: "' . $background . '"';
    echo '      }';
    echo '  }).showToast();';
    echo '});';
    echo '</script>';
}
?>