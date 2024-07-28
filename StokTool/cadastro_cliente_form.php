
<?php
    //$q = "select nome, valor, qtd_estoq from produto";
    //$busca = $banco->query($q);
    ?>


<form action="cadastro_cliente.php" method="POST">
    <div class="cardd">
        <table style="margin-right:10%;" >
            <tr>
                <td><?php echo voltar();?></td>
                <td><h1 class="fonth1">Novo Cliente</h1></td>
                
            </tr>
        </table>
        <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-4" class="qualquer">
                <label for="validationCustom01"  class="form-label">CPF/CNPJ</label>
                <input type="text" name="cpfcnpj" class="form-control" id="cpfcnpj">
                
            </div>
            
            <div class="col-md-4" class="qualquer">
                <label for="validationCustom01" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome">
            </div>
            
            <div class="col-md-4" class="qualquer">
                <label for="validationCustom01" class="form-label">Logradouro</label>
                <input type="text" name="logradouro" class="form-control" id="logradouro">
            </div>
            
            <div class="col-md-4" class="qualquer">
                <label for="validationCustom01" class="form-label">Telefone</label>
                <input type="number" name="telefone" class="form-control" id="telefone"><br>
                <button class="btn btn-primary" type="submit">Cadastrar</button>
            </div>
            
            
        </div>
    </form>

    <script>
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
</script>
    
    
    