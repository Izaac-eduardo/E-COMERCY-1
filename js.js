
// Dados dos produtos
const products = [
    {
        id: 1,
        name: "Action Figure Goku Super Sayajin",
        price: 159.90,
        image: "img/goku.jpg",
        description: "Action figure premium do Goku em sua forma Super Sayajin",
        category: "action-figures"
    },
    {
        id: 2,
        name: "Camiseta Batman Logo",
        price: 79.90,
        image: "img/bat.webp",
        description: "Camiseta preta com o icônico logo do Batman",
        category: "roupas"
    },
    {
        id: 3,
        name: "Paword",
        price: 299.90,
        image: "img/paw.jpg",
        description: "pegue todos os paws",
        category: "games"
    },
    {
        id: 4,
        name: "Caneca Star Wars Darth Vader",
        price: 49.90,
        image: "img/vader.webp",
        description: "Caneca temática do Darth Vader com efeito térmico",
        category: "acessorios"
    },
    {
        id: 5,
        name: "Funko Pop Naruto",
        price: 89.90,
        image: "img/funko.webp",
        description: "Funko Pop colecionável do protagonista Naruto Uzumaki",
        category: "action-figures"
    },
    {
        id: 6,
        name: "Livro: Guia do Mochileiro das Galáxias",
        price: 39.90,
        image: "img/livro.jpg",
        description: "Clássico da ficção científica de Douglas Adams",
        category: "livros"
    },
    {
        id: 7,
        name: "Mousepad Gamer RGB LED",
        price: 119.90,
        image: "img/pad.webp",
        description: "Mousepad gamer com iluminação RGB personalizável",
        category: "acessorios"
    },
    {
        id: 8,
        name: "Cyberpunk 2077 Phantom Liberty",
        price: 199.90,
        image: "img/ciber.jpg",
        description: "Expansão do aclamado jogo futurístico",
        category: "games"
    },
    {
        id: 9,
        name: "Moletom Rick and Morty",
        price: 149.90,
        image: "img/moleton.webp",
        description: "Moletom confortável com estampa da dupla dimensional",
        category: "roupas"
    }
];

// Estado da aplicação
let cart = [];
let filteredProducts = [...products];

// Elementos DOM
const productsGrid = document.getElementById('productsGrid');
const searchInput = document.getElementById('searchInput');
const cartIcon = document.getElementById('cartIcon');
const cartModal = document.getElementById('cartModal');
const closeCart = document.getElementById('closeCart');
const cartCount = document.getElementById('cartCount');
const cartItems = document.getElementById('cartItems');
const cartTotal = document.getElementById('cartTotal');
const checkoutBtn = document.getElementById('checkoutBtn');
const filterButtons = document.querySelectorAll('.filter-btn');

// Renderizar produtos
function renderProducts(products) {
    productsGrid.innerHTML = '';
    products.forEach((product, index) => {
        const productCard = document.createElement('div');
        productCard.className = 'product-card';
        productCard.style.animationDelay = `${index * 0.1}s`;
        productCard.innerHTML = `
            <img src="${product.image}" alt="${product.name}" class="product-image">
            <div class="product-info">
                <h3 class="product-title">${product.name}</h3>
                <p class="product-description">${product.description}</p>
                <div class="product-price">R$ ${product.price.toFixed(2).replace('.', ',')}</div>
                <button class="add-to-cart" onclick="addToCart(${product.id})">
                    Adicionar ao Carrinho
                </button>
            </div>
        `;
        productsGrid.appendChild(productCard);
    });
}

// Adicionar ao carrinho
function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    const existingItem = cart.find(item => item.id === productId);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ ...product, quantity: 1 });
    }

    updateCartUI();
    showCartAnimation();
}

// Animação do carrinho
function showCartAnimation() {
    cartIcon.style.transform = 'scale(1.2)';
    cartIcon.style.background = 'linear-gradient(45deg, #2ed573, #1e90ff)';
    setTimeout(() => {
        cartIcon.style.transform = 'scale(1)';
        cartIcon.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
    }, 300);
}

// Atualizar interface do carrinho
function updateCartUI() {
    cartCount.textContent = cart.reduce((sum, item) => sum + item.quantity, 0);
    renderCartItems();
    updateCartTotal();
}

// Renderizar itens do carrinho
function renderCartItems() {
    if (cart.length === 0) {
        cartItems.innerHTML = `
            <div class="empty-cart">
                <div class="empty-cart-icon">🛒</div>
                <p>Seu carrinho está vazio</p>
                <p>Que tal adicionar alguns produtos nerds?</p>
            </div>
        `;
        return;
    }

    cartItems.innerHTML = cart.map(item => `
        <div class="cart-item">
            <img src="${item.image}" alt="${item.name}" class="cart-item-image">
            <div class="cart-item-info">
                <div class="cart-item-title">${item.name}</div>
                <div class="cart-item-price">R$ ${item.price.toFixed(2).replace('.', ',')}</div>
            </div>
            <div class="quantity-controls">
                <button class="quantity-btn" onclick="updateQuantity(${item.id}, -1)">-</button>
                <span>${item.quantity}</span>
                <button class="quantity-btn" onclick="updateQuantity(${item.id}, 1)">+</button>
            </div>
        </div>
    `).join('');
}

// Atualizar quantidade
function updateQuantity(productId, change) {
    const item = cart.find(item => item.id === productId);
    if (item) {
        item.quantity += change;
        if (item.quantity <= 0) {
            cart = cart.filter(cartItem => cartItem.id !== productId);
        }
        updateCartUI();
    }
}

// Atualizar total do carrinho
function updateCartTotal() {
    const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    cartTotal.textContent = `Total: R$ ${total.toFixed(2).replace('.', ',')}`;
}

// Filtrar produtos
function filterProducts(category = 'todos', searchTerm = '') {
    filteredProducts = products.filter(product => {
        const matchesCategory = category === 'todos' || product.category === category;
        const matchesSearch = product.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
                            product.description.toLowerCase().includes(searchTerm.toLowerCase());
        return matchesCategory && matchesSearch;
    });
    renderProducts(filteredProducts);
}

// Event listeners
filterButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        filterButtons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const category = btn.dataset.category;
        filterProducts(category, searchInput.value);
    });
});

searchInput.addEventListener('input', (e) => {
    const activeFilter = document.querySelector('.filter-btn.active').dataset.category;
    filterProducts(activeFilter, e.target.value);
});

cartIcon.addEventListener('click', () => {
    cartModal.style.display = 'block';
    document.body.style.overflow = 'hidden';
});

closeCart.addEventListener('click', () => {
    cartModal.style.display = 'none';
    document.body.style.overflow = 'auto';
});

cartModal.addEventListener('click', (e) => {
    if (e.target === cartModal) {
        cartModal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
});

checkoutBtn.addEventListener('click', () => {
    if (cart.length === 0) {
        alert('Seu carrinho está vazio!');
        return;
    }
    
    const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    alert(`Compra finalizada com sucesso!\nTotal: R$ ${total.toFixed(2).replace('.', ',')}\n\nObrigado por comprar na NerdShop! 🚀`);
    cart = [];
    updateCartUI();
    cartModal.style.display = 'none';
    document.body.style.overflow = 'auto';
});

// Tecla ESC para fechar o modal
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && cartModal.style.display === 'block') {
        cartModal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
});

// Inicializar aplicação
renderProducts(products);
