
<?php
    //$q = "select nome, valor, qtd_estoq from produto";
    //$busca = $banco->query($q);
    ?>


<form action="cliente_inserir.php" method="POST">
    <div class="cardd">
    <table>
    <tr>
        <td><a href="catalogo.php"><img src="imagens/arrow-left (1).svg" alt="Voltar"></a></td>
        <td><h1>Cadastrar novo cliente</h1></td>
</table>
        <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-4" class="qualquer">
                <label for="validationCustom01"  class="form-label">CPF/CNPJ</label>
                <input type="text" name="cpfcnpj" class="form-control" id="cpfcnpj" placeholder="Digite CPF ou CNPJ">
       
                
            </div>
            
            <div class="col-md-4" class="qualquer">
                <label for="validationCustom01" class="form-label">Nome</label>
                <input type="text" name="nome" placeholder="Nome" class="form-control" id="nome">
            </div>
            
            <div class="col-md-4" class="qualquer">
                <label for="validationCustom01" class="form-label">Logradouro</label>
                <input type="text" name="logradouro" placeholder="Endereço" class="form-control" id="logradouro">
            </div>
            
            <div class="col-md-4" class="qualquer">
                <label for="validationCustom01" class="form-label">Telefone</label>
                <input type="tel" name="telefone" placeholder="Telefone" class="form-control" id="telefone"><br>
                <button class="btn btn-primary"  type="submit">Cadastrar cliente</button>
            </div>
            
            
        </div>
    </form>
    <script>
    const input = document.getElementById('cpfcnpj');
    const input_tel = document.getElementById('telefone');

    input.addEventListener('input', function() {
        let value = input.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
        
        // Verifica se é CPF (11 dígitos) ou CNPJ (14 dígitos)
        if (value.length <= 11) {
            // Formata CPF: 000.000.000-00
            input.value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
        } else {
            // Formata CNPJ: 00.000.000/0000-00
            input.value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
        }
    });

    input_tel.addEventListener('input', function() {
        let value = input_tel.value.replace(/\D/g, '');

        if (value.length <=10) {
            input_tel.value = value.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');   //(16) 0000-0000//
        }else {
            input_tel.value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
        }
        console.log (value);
    })
</script>