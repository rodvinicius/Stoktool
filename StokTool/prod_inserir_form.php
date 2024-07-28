
<?php
    //$q = "select nome, valor, qtd_estoq from produto";
    //$busca = $banco->query($q);
    ?>
<html>
    <body>

<form action="prod_inserir.php" method="POST">
    <div class="cardd">
    <table>
    <tr>
        <td><a href="catalogo.php"><img src="imagens/arrow-left (1).svg" alt="Voltar"></a></td>
        <td><h1>Novo Produto</h1></td>
</table>
        <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-4" class="qualquer">
                <label for="validationCustom01"  class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome">
                
            </div>
            
            <div class="col-md-4" class="qualquer">
                <label for="valor" class="form-label">Valor</label>
                <input type="text" name="valor" class="form-control" id="valor">
            </div>
            
            <div class="col-md-4" class="qualquer">
                <label for="validationCustom01" class="form-label">Quantidade em Estoque</label>
                <input type="number" name="qtdestoq" class="form-control" id="qtdestoq">
            </div>
            
            <div class="col-md-4" class="qualquer">
                <label for="validationCustom01" class="form-label">Capa</label>
                <input type="file" name="capa" class="form-control" id="capa"><br>
                <button class="btn btn-primary" type="submit">Inserir</button>
            </div>
            
            
        </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('valor');

            // Função para aplicar a máscara de valor em reais
            function aplicarMascaraValor(value) {
                value = value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
                value = (value / 100).toFixed(2) + ''; // Converte para float e fixa duas casas decimais
                value = value.replace(".", ","); // Substitui ponto por vírgula
                value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'); // Adiciona os pontos de milhar
                return 'R$ ' + value;
            }

            // Aplica a máscara ao valor inicial, se houver
            input.value = aplicarMascaraValor(input.value);

            // Aplica a máscara ao digitar no campo
            input.addEventListener('input', function() {
                input.value = aplicarMascaraValor(input.value);
            });
        });
    </script>
</body>
</html> 
    
    
    