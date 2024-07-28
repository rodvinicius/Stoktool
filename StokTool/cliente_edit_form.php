<?php 
require_once "includes/banco.php";
require_once "includes/funcoes.php";
require_once "includes/login.php";

$cod = $_GET['cod'] ?? 0;
$q = "select cpfcnpj, nome_c, logradouro, telefone from cliente WHERE cpfcnpj='$cod'";
$busca = $banco->query($q);
if ($busca) {
  $reg = $busca->fetch_object();
} else {
  echo "Erro na consulta ao banco de dados: " . $banco->error;
  exit; 
}
 if($reg){
?>


<form action="cliente_edit.php" method="POST">
    <div class="cardd">
    <table>
    <tr>
        <td><a href="cliente_list.php"><img src="imagens/arrow-left (1).svg" alt="Voltar"></a></td>
        <td><h1>Editar dados de cliente</h1></td>
</table>
        <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-4" class="qualquer">
                <label for="validationCustom01"  class="form-label">CPF/CNPJ</label>
                <input type="text" name="cpfcnpj" readonly class="form-control" id="cpfcnpj"  value="<?php echo $reg->cpfcnpj;?>">
       
                
            </div>
            
            <div class="col-md-4" class="qualquer">
                <label for="validationCustom01" class="form-label">Nome</label>
                <input type="text" name="nome"  class="form-control" id="nome" value="<?php echo $reg->nome_c;?>" >
            </div>
            
            <div class="col-md-4" class="qualquer">
                <label for="validationCustom01" class="form-label">Logradouro</label>
                <input type="text" name="logradouro"  class="form-control" id="logradouro" value="<?php echo $reg->logradouro;?>">
            </div>
            
            <div class="col-md-4" class="qualquer">
                <label for="validationCustom01" class="form-label">Telefone</label>
                <input type="tel" name="telefone"  class="form-control" id="telefone" value="<?php echo $reg->telefone;?>"><br>

                <?php
 }
                ?>
                <button class="btn btn-primary"  type="submit">Atualizar dados</button>
            </div>
            
            
        </div>
    </form>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('cpfcnpj');
        const input_tel = document.getElementById('telefone');

        function applyMask() {
            let value = input.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            
            // Verifica se é CPF (11 dígitos) ou CNPJ (14 dígitos)
            if (value.length <= 11) {
                // Formata CPF: 000.000.000-00
                input.value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            } else {
                // Formata CNPJ: 00.000.000/0000-00
                input.value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
            }
        }

        function applyPhoneMask() {
            let value = input_tel.value.replace(/\D/g, '');
    
            if (value.length <=10) {
                input_tel.value = value.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');   //(16) 0000-0000//
            } else {
                input_tel.value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
            }
        }

        // Aplica a máscara ao carregar a página
        applyMask();
        applyPhoneMask();

        // Adiciona event listeners para aplicar a máscara durante a digitação
        input.addEventListener('input', applyMask);
        input_tel.addEventListener('input', applyPhoneMask);
    });
    </script>