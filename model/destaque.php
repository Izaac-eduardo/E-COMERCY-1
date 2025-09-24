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
