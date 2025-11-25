<?php
include '../includes/auth.php';
include '../includes/database.php';
redirectIfNotLoggedIn();
include '../includes/header.php';
?>

<h2>Dashboard</h2>

<?php
$total_produtos = $pdo->query("SELECT COUNT(*) as total FROM produtos")->fetch()['total'];
$total_categorias = $pdo->query("SELECT COUNT(*) as total FROM categorias")->fetch()['total'];
$estoque_baixo = $pdo->query("SELECT COUNT(*) as total FROM produtos WHERE quantidade_estoque = 0")->fetch()['total'];
$valor_total = $pdo->query("SELECT SUM(preco_custo * quantidade_estoque) as total FROM produtos")->fetch()['total'];
?>

<div class="row mt-4">
    <div class="col-md-3"><div class="card text-center p-3"><h4><?php echo $total_produtos; ?></h4><p>Produtos</p></div></div>
    <div class="col-md-3"><div class="card text-center p-3"><h4><?php echo $total_categorias; ?></h4><p>Categorias</p></div></div>
    <div class="col-md-3"><div class="card text-center p-3"><h4><?php echo $estoque_baixo; ?></h4><p>Estoque Baixo</p></div></div>
    <div class="col-md-3"><div class="card text-center p-3"><h4>R$ <?php echo number_format($valor_total, 2, ',', '.'); ?></h4><p>Valor Total</p></div></div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><h5>Menu Admin</h5></div>
            <div class="card-body">
                <a href="produtos.php" class="btn btn-primary w-100 mb-2">Gerenciar Produtos</a>
                <a href="categorias.php" class="btn btn-primary w-100 mb-2">Gerenciar Categorias</a>
                <a href="relatorios.php" class="btn btn-primary w-100 mb-2">Relatórios</a>
                <a href="usuarios.php" class="btn btn-primary w-100 mb-2">Gerenciar Usuários</a>
                <a href="<?php echo $base_url; ?>/fornecedores/index.php" class="btn btn-primary w-100 mb-2">Gerenciar Fornecedores</a>

            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>