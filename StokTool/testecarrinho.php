<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="styles/testeestilo.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
  </head>
  <body>
    
    <header>
      <span>Catálogo</span>
      </header>
      <aside class="sidebar">
        
        <nav class="border">
 
         <button>
             <span>
                 <i class="material-symbols-outlined">home</i>
                 <span>Home</span>
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
 
        
 
 <script src="styles/script.js"></script>
    <main>
      <div class="page-title">Orçamentos e Pedidos </div>
      <div class="content">
        <section>
          <table>
            <thead>
              <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Total</th>
                <th>-</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="produto">
                    <img src="imagens/Paulistinha-Menta.png" alt="" />
                    <div class="info">
                      <div class="name"><strong>Palheiros Paulistinha Menta</strong></div>
                      <div class="category">Palheiros</div>
                    </div>
                  </div>
                </td>
                <td>R$ 206,00</td>
                <td>
                  <div class="qtd">
                    <button><i class="bx bx-minus"></i></button>
                    <span>2</span>
                    <button><i class="bx bx-plus"></i></button>
                  </div>
                </td>
                <td><strong>R$ 412,00</strong></td>
                <td>
                  <button class="remove"><i class="bx bx-x"></i></button>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="produto">
                    <img src="imagens/beats.png" alt="" />
                    <div class="info">
                      <div class="name"><strong>Chesterfield Beats</strong></div>
                      <div class="category">Cigarros</div>
                    </div>
                  </div>
                </td>
                <td>R$ 72,00</td>
                <td>
                  <div class="qtd">
                    <button><i class="bx bx-minus"></i></button>
                    <span>2</span>
                    <button><i class="bx bx-plus"></i></button>
                  </div>
                </td>
                <td><strong>R$ 144,00</strong></td>
                <td>
                  <button class="remove"><i class="bx bx-x"></i></button>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="produto">
                    <img src="imagens/isqueiro.png" alt="" />
                    <div class="info">
                      <div class="name"><strong>Isqueiro Bic Maxi</strong></div>
                      <div class="category">Acendedores</div>
                    </div>
                  </div>
                </td>
                <td>R$ 57,00</td>
                <td>
                  <div class="qtd">
                    <button><i class="bx bx-minus"></i></button>
                    <span>1</span>
                    <button><i class="bx bx-plus"></i></button>
                  </div>
                </td>
                <td><strong>R$ 57,00</strong></td>
                <td>
                  <button class="remove"><i class="bx bx-x"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </section>
        <aside>
          <div class="box">
            <header>Resumo da compra</header>
            <div class="info">
              <div><span>Itens</span><span>5</span></div>
              <!--
              <div><span>Frete</span><span>Gratuito</span></div>
             <div>
                <button>
                  Adicionar cupom de desconto
                  <i class="bx bx-right-arrow-alt"></i>
                </button>
              </div>-->
            </div>
            <footer>
              <span>Total</span>
              <span>R$ 418</span>
            </footer>
          </div>
          <button>Gerar Pedido</button>
        </aside>
      </div>
    </main>
  </body>
</html>