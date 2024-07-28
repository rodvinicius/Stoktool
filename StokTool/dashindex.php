<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="styles/testeestilo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
    
     
    <aside class="sidebar">
        
       <nav class="border">

        <button>
            <span>
                <i  class="material-symbols-outlined">home</i>
                <a style="text-decoration: none; color: black;" href='index.php'><span>Home</span></a>
            </span>
        </button>
        <button>
            <span>
                <i class="material-symbols-outlined">Monitoring</i>
                <span>Vendas</span>
            </span>
        </button>
        <button>
            <span>
                <i class="material-symbols-outlined">dataset</i>
                <span>Produtos</span>
            </span>
        </button>
        <button>
            <span>
                <i class="material-symbols-outlined">Diversity_3</i>
                <span>Cliente</span>
            </span>
        </button>
        <button>
            <span>
                <i class="material-symbols-outlined">Person</i>
                <span>Vendedor</span>
            </span>
        </button>
        <button>
            <span>
                <i class="material-symbols-outlined">Inventory_2</i>
                <span>Estoque</span>
            </span>
        </button>    

       </nav>
   
    </aside>
    <!-- Menu mobile -->
    <buton class="button-mobile" onclick="toggleMenu()">
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
                <span class="mobile-text">Home</span>
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
    </nav>

    <main class="main">
    
        <div id="corpo">
            <h1>Dashboard</h1>
            <div>
                <h3>Hoje</h3>
                <a >R$0,00</a>
            </div>
            <div>
                <h3>Até o momento</h3>
                <a >R$0,00</a>
            </div>
            <div>
                <h3>Objetivo</h3>
                <a >R$0,00</a>
            </div>
        <div class="graficos">
            <h2>Meta diária</h2>
            <canvas id="myChart"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script>
        let ctx = document.getElementById("myChart");

        let dados = {
            datasets: [{
                data: [10, 20],
                backgroundColor: ['rgb(255, 99, 132)', 'rgb(255, 199, 132)']
            }],

            labels: ['569566565', 'Amarelo']
        };

        let opcoes = {
            cutoutPercentage: 40
        };


        let meuDonutChart = new Chart(ctx, {
            type: 'doughnut',
            data: dados,
            options: opcoes
        });

    </script>
        </div>
        <div class="graficos">
            <h2>Meta mensal</h2>
            <canvas id="myChart2"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script>
        let ctx2 = document.getElementById("myChart2");

        let dados2 = {
            datasets: [{
                data: [10, 20],
                backgroundColor: ['rgb(255, 99, 132)', 'rgb(255, 199, 132)']
            }],

            labels: ['569566565', 'Amarelo']
        };

        let opcoes2 = {
            cutoutPercentage: 40
        };


        let meuDonutChart2 = new Chart(ctx2, {
            type: 'doughnut',
            data: dados2,
            options: opcoes2
        });

    </script>
        </div>
    </main>

<script src="styles/script.js"></script>



</script>
</body>
</html>