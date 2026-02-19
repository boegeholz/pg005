<?php
// alunos/Professor/index.php
// Página PHP que exibe uma lista de produtos em cards usando Bootstrap

require_once __DIR__ . '/../../config/db_config.php';

// Cria conexão PDO usando as variáveis definidas em config/db_config.php
try {
    $pdo = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    // Em produção, não exponha detalhes sensíveis
    echo '<!doctype html><html lang="pt-br"><head><meta charset="utf-8"><title>Erro</title></head><body>';
    echo '<div style="padding:2rem;font-family:Arial, sans-serif;">';
    echo '<h1>Erro de conexão</h1>';
    echo '<p>Não foi possível conectar ao banco de dados. Verifique as configurações.</p>';
    echo '</div></body></html>';
    exit;
}

// Busca produtos
try {
    $stmt = $pdo->query('SELECT id, name, description, price, image FROM products ORDER BY id DESC');
    $products = $stmt->fetchAll();
} catch (PDOException $e) {
    $products = [];
}

// Helper para escapar saída
function e($str) {
    return htmlspecialchars($str, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Página Simples - Produtos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="icon" href="./img/mansao_icone.ico" type="image/x-icon">
</head>
<body>

    <header class="bg-dark text-white py-5">
        <div class="container text-center">
            <h1 class="display-5 mb-2">Bem-vindo ao Meu Projeto</h1>
            <p class="lead mb-0">Uma página simples, rápida e eficiente.</p>
        </div>
    </header>

    <div class="container mt-3">
        <a href="../../index.html" class="btn btn-primary mb-3">Voltar</a>
    </div>

    <main class="container my-4">
        <div class="bg-white p-4 rounded shadow-sm">
            <h2>Produtos</h2>
            <p>Lista de produtos cadastrados no banco de dados.</p>

            <?php if (empty($products)): ?>
                <div class="alert alert-info">Nenhum produto encontrado. Você pode criar a tabela e inserir alguns produtos usando o arquivo SQL fornecido.</div>
            <?php else: ?>
                <div class="row">
                    <?php foreach ($products as $product): ?>
                        <div class="col-12 col-sm-6 col-md-4 mb-4">
                            <div class="card h-100">
                                <?php if (!empty($product['image']) && file_exists(__DIR__ . '/' . $product['image'])): ?>
                                    <img src="<?php echo e($product['image']); ?>" class="card-img-top" alt="<?php echo e($product['name']); ?>">
                                <?php else: ?>
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Imagem</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em" font-family="Arial, Helvetica, sans-serif" font-size="16" text-anchor="middle"><?php echo e($product['name']); ?></text></svg>
                                <?php endif; ?>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?php echo e($product['name']); ?></h5>
                                    <p class="card-text mb-4"><?php echo e($product['description']); ?></p>
                                    <div class="mt-auto">
                                        <p class="h6 text-success mb-2">R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></p>
                                        <a href="#" class="btn btn-outline-primary btn-sm">Ver detalhes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <h3 class="mt-4">Como criar a tabela de produtos</h3>
            <p>Existe um arquivo SQL com a DDL e exemplos em <code>db/create_products_table.sql</code>.</p>

        </div>
    </main>

    <footer class="bg-dark text-white text-center py-3 mt-4">
        <div class="container">
            <p class="mb-0">&copy; 2026 Gabriel Boegeholz. Todos os direitos reservados.</p>
            <a href="https://instagram.com/toguro" target="_blank" rel="noopener noreferrer">
                <img src="img/Instagram_icon.png" alt="Instagram" class="mx-2" style="width: 24px; height: 24px;">
            </a>
        </div>
    </footer>

    <!-- Optional: Bootstrap JS (popper + bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>
</body>
</html>
