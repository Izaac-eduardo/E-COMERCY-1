<?php
// Dados dos produtos em destaque
$produtos_destaque = [
    [
        'id' => 1,
        'nome' => 'RTX 4090 Gaming X',
        'categoria' => 'Placa de Vídeo',
        'preco' => 'R$ 12.499,00',
        'descricao' => 'A mais poderosa GPU para gaming e criação de conteúdo',
        'imagem' => 'https://images.unsplash.com/photo-1591238372338-7c3d7e8ccce8?w=600&h=400&fit=crop',
        'disponivel' => true,
        'popular' => true,
        'desconto' => 15
    ],
    [
        'id' => 2,
        'nome' => 'Ryzen 9 7950X',
        'categoria' => 'Processador',
        'preco' => 'R$ 3.299,00',
        'descricao' => 'Processador de alta performance para entusiastas',
        'imagem' => 'https://images.unsplash.com/photo-1555617981-dac3880eac6e?w=600&h=400&fit=crop',
        'disponivel' => true,
        'popular' => false,
        'desconto' => 0
    ],
    [
        'id' => 3,
        'nome' => 'Mechanical Keyboard RGB',
        'categoria' => 'Periférico',
        'preco' => 'R$ 899,00',
        'descricao' => 'Teclado mecânico com switches Cherry MX e RGB',
        'imagem' => 'https://images.unsplash.com/photo-1541140532154-b024d705b90a?w=600&h=400&fit=crop',
        'disponivel' => true,
        'popular' => true,
        'desconto' => 25
    ],
    [
        'id' => 4,
        'nome' => 'Monitor Gaming 4K 144Hz',
        'categoria' => 'Monitor',
        'preco' => 'R$ 4.899,00',
        'descricao' => 'Monitor OLED 27" para gaming profissional',
        'imagem' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=600&h=400&fit=crop',
        'disponivel' => false,
        'popular' => true,
        'desconto' => 0
    ],
    [
        'id' => 5,
        'nome' => 'SSD NVMe 2TB',
        'categoria' => 'Armazenamento',
        'preco' => 'R$ 1.299,00',
        'descricao' => 'SSD NVMe Gen4 com velocidades extremas',
        'imagem' => 'https://images.unsplash.com/photo-1597872200969-2b65d56bd16b?w=600&h=400&fit=crop',
        'disponivel' => true,
        'popular' => false,
        'desconto' => 20
    ]
];

function calcularPrecoComDesconto($preco, $desconto) {
    $valor = floatval(str_replace(['R$ ', '.', ','], ['', '', '.'], $preco));
    $valorDesconto = $valor - ($valor * $desconto / 100);
    return 'R$ ' . number_format($valorDesconto, 2, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeekStore - Produtos em Destaque</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460);
            color: white;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 60px;
        }

        .header h1 {
            font-size: 3rem;
            background: linear-gradient(45deg, #00d4ff, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.2rem;
            color: #a0a0a0;
        }

        .destaque-section {
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 1.8rem;
            margin-bottom: 30px;
            color: #fff;
            border-bottom: 3px solid #00d4ff;
            padding-bottom: 10px;
            display: inline-block;
        }

        .carousel-container {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .carousel {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .produto-card {
            min-width: 100%;
            position: relative;
            background: linear-gradient(135deg, rgba(0, 212, 255, 0.1), rgba(255, 107, 107, 0.1));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            overflow: hidden;
            display: flex;
            height: 400px;
        }

        .produto-imagem {
            flex: 1;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .produto-imagem::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(0, 0, 0, 0.3), rgba(0, 212, 255, 0.2));
        }

        .produto-info {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .produto-categoria {
            font-size: 0.9rem;
            color: #00d4ff;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .produto-nome {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .produto-descricao {
            font-size: 1.1rem;
            color: #d0d0d0;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .produto-preco {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .preco-atual {
            font-size: 2rem;
            font-weight: bold;
            color: #4ecdc4;
        }

        .preco-original {
            font-size: 1.2rem;
            color: #888;
            text-decoration: line-through;
        }

        .desconto-badge {
            background: linear-gradient(45deg, #ff6b6b, #ff8e8e);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .produto-status {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .status-badge {
            padding: 8px 16px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .disponivel {
            background: linear-gradient(45deg, #4ecdc4, #44a08d);
            color: white;
        }

        .indisponivel {
            background: linear-gradient(45deg, #ff6b6b, #ee5a52);
            color: white;
        }

        .popular {
            background: linear-gradient(45deg, #ffd700, #ffed4e);
            color: #333;
        }

        .btn-comprar {
            background: linear-gradient(45deg, #00d4ff, #0099cc);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-comprar:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 212, 255, 0.4);
        }

        .btn-comprar:disabled {
            background: #666;
            cursor: not-allowed;
        }

        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.5rem;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .carousel-nav:hover {
            background: rgba(0, 212, 255, 0.8);
            transform: translateY(-50%) scale(1.1);
        }

        .nav-prev {
            left: 20px;
        }

        .nav-next {
            right: 20px;
        }

        .carousel-indicators {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .indicator.active {
            background: #00d4ff;
            transform: scale(1.2);
        }

        @media (max-width: 768px) {
            .produto-card {
                flex-direction: column;
                height: auto;
            }

            .produto-imagem {
                height: 250px;
            }

            .produto-nome {
                font-size: 1.8rem;
            }

            .header h1 {
                font-size: 2rem;
            }
        }

        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>GeekStore</h1>
            <p>Os melhores produtos tech para você</p>
        </div>

        <div class="destaque-section">
            <h2 class="section-title">RECOMENDADOS E EM DESTAQUE</h2>
            
            <div class="carousel-container">
                <div class="carousel" id="carousel">
                    <?php foreach ($produtos_destaque as $index => $produto): ?>
                        <div class="produto-card">
                            <div class="produto-imagem" style="background-image: url('<?php echo $produto['imagem']; ?>')"></div>
                            <div class="produto-info">
                                <div class="produto-categoria"><?php echo $produto['categoria']; ?></div>
                                <h3 class="produto-nome"><?php echo $produto['nome']; ?></h3>
                                <p class="produto-descricao"><?php echo $produto['descricao']; ?></p>
                                
                                <div class="produto-status">
                                    <?php if ($produto['disponivel']): ?>
                                        <span class="status-badge disponivel">Disponível</span>
                                    <?php else: ?>
                                        <span class="status-badge indisponivel">Em breve</span>
                                    <?php endif; ?>
                                    
                                    <?php if ($produto['popular']): ?>
                                        <span class="status-badge popular">Popular</span>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="produto-preco">
                                    <?php if ($produto['desconto'] > 0): ?>
                                        <span class="preco-atual"><?php echo calcularPrecoComDesconto($produto['preco'], $produto['desconto']); ?></span>
                                        <span class="preco-original"><?php echo $produto['preco']; ?></span>
                                        <span class="desconto-badge">-<?php echo $produto['desconto']; ?>%</span>
                                    <?php else: ?>
                                        <span class="preco-atual"><?php echo $produto['preco']; ?></span>
                                    <?php endif; ?>
                                </div>
                                
                                <button class="btn-comprar" <?php echo !$produto['disponivel'] ? 'disabled' : ''; ?> onclick="comprarProduto(<?php echo $produto['id']; ?>)">
                                    <?php echo $produto['disponivel'] ? 'Comprar Agora' : 'Indisponível'; ?>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <button class="carousel-nav nav-prev" onclick="prevSlide()">‹</button>
                <button class="carousel-nav nav-next" onclick="nextSlide()">›</button>
            </div>
            
            <div class="carousel-indicators">
                <?php foreach ($produtos_destaque as $index => $produto): ?>
                    <div class="indicator <?php echo $index === 0 ? 'active' : ''; ?>" onclick="goToSlide(<?php echo $index; ?>)"></div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script>
        let currentSlide = 0;
        const totalSlides = <?php echo count($produtos_destaque); ?>;
        const carousel = document.getElementById('carousel');
        const indicators = document.querySelectorAll('.indicator');

        function updateCarousel() {
            carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentSlide);
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateCarousel();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateCarousel();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateCarousel();
        }

        // Auto-play carousel
        setInterval(nextSlide, 5000);

        // Função para comprar produto
        function comprarProduto(id) {
            // Aqui você pode implementar a lógica de compra
            // Por exemplo, redirecionar para página do produto ou adicionar ao carrinho
            
            // Exemplo de animação de loading no botão
            const button = event.target;
            const originalText = button.textContent;
            button.innerHTML = '<span class="loading"></span> Processando...';
            button.disabled = true;
            
            setTimeout(() => {
                button.textContent = originalText;
                button.disabled = false;
                alert(`Produto ${id} adicionado ao carrinho!`);
            }, 2000);
        }

        // Adicionar suporte a touch/swipe em dispositivos móveis
        let touchStartX = 0;
        let touchEndX = 0;

        carousel.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });

        carousel.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            if (touchEndX < touchStartX - 50) {
                nextSlide();
            }
            if (touchEndX > touchStartX + 50) {
                prevSlide();
            }
        }

        // Pausar auto-play quando hover
        const carouselContainer = document.querySelector('.carousel-container');
        let autoPlayInterval;

        function startAutoPlay() {
            autoPlayInterval = setInterval(nextSlide, 5000);
        }

        function stopAutoPlay() {
            clearInterval(autoPlayInterval);
        }

        carouselContainer.addEventListener('mouseenter', stopAutoPlay);
        carouselContainer.addEventListener('mouseleave', startAutoPlay);

        // Iniciar auto-play
        startAutoPlay();
    </script>
</body>
</html>