
<?php
$page_title = "HAINGPOINT - Sua Loja Geek";
$current_page = "home";

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>HAINGPOINT - Sua Loja Geek</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">🚀 HAINGPOINT</div>
                <div class="search-bar">
                    <input type="text" id="searchInput" placeholder="Buscar produtos nerds...">
                </div>
                <button class="cart-icon" id="cartIcon">
                    🛒 Carrinho
                    <span class="cart-count" id="cartCount">0</span>
                </button>

                <button class="cart-icon" id="loguim">
                    <a href="loguim.php">

                        Loguim
                    </a>

                </button>
            </div>
        </div>

    </header>



<div class="container">
        <div class="filters">
            <div class="filter-buttons">
                <button class="filter-btn active" data-category="todos">Todos</button>
                <button class="filter-btn" data-category="action-figures">Action Figures</button>
                <button class="filter-btn" data-category="games">Games</button>
                <button class="filter-btn" data-category="roupas">Roupas</button>
                <button class="filter-btn" data-category="acessorios">Acessórios</button>
                <button class="filter-btn" data-category="livros">Livros</button>
                <a href="categoria">categoria</a>
            </div>
        </div>

        
        <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <script src="js.js"></script>

        <script>
    const loggedUser = JSON.parse(localStorage.getItem("loggedUser"));
    if (loggedUser) {
        document.getElementById("userProfile").classList.remove("hidden");
        document.getElementById("profileName").textContent = loggedUser.name;
        
        // Se tiver foto, use ela, senão gera avatar com a inicial
        const profilePic = document.getElementById("profilePic");
        if (loggedUser.photo) {
            profilePic.src = loggedUser.photo;
        } else {
            // gera avatar fake (ex: com inicial)
            profilePic.src = "https://ui-avatars.com/api/?name=" + encodeURIComponent(loggedUser.name);
        }
    }
</script>

    </body>