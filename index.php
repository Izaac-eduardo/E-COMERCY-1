
<?php
$page_title = "HAINGPOINT - Sua Loja Geek";
$current_page = "home";
include 'includes/header.php';

?>
<body>
<div class="container">
        <div class="filters">
            <div class="filter-buttons">
                <button class="filter-btn active" data-category="todos">Todos</button>
                <button class="filter-btn" data-category="action-figures">Action Figures</button>
                <button class="filter-btn" data-category="games">Games</button>
                <button class="filter-btn" data-category="roupas">Roupas</button>
                <button class="filter-btn" data-category="acessorios">Acessórios</button>
                <button class="filter-btn" data-category="livros">Livros</button>
            </div>
        </div>

        <div class="products-grid" id="productsGrid">
            <!-- Produtos serão inseridos aqui pelo JavaScript -->
        </div>
    </div>

    <!-- Cart Modal -->
    <div class="cart-modal" id="cartModal">
        <div class="cart-content">
            <div class="cart-header">
                <h2>Seu Carrinho</h2>
                <button class="close-cart" id="closeCart">&times;</button>
            </div>
            <div id="cartItems">
                <!-- Itens do carrinho serão inseridos aqui -->
            </div>
            <div class="cart-total" id="cartTotal">Total: R$ 0,00</div>
            <button class="checkout-btn" id="checkoutBtn">Finalizar Compra</button>
        </div>
    </div>
        <script src="js.js"></script>
    </body>