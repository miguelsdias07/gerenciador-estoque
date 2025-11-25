<?php
// Página inicial do sistema de gerenciamento de estoque
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Bem-vindo ao Gerenciador de Estoque</h2>

    <div class="row g-3">
        <div class="col-md-6">
            <a href="admin/produtos.php" class="btn btn-primary w-100 btn-lg">Produtos</a>
        </div>
        <div class="col-md-6">
            <a href="admin/index.php" class="btn btn-primary w-100 btn-lg">Painel Administrativo</a>
        </div>
        <div class="col-md-6">
            <a href="fornecedores/index.php" class="btn btn-primary w-100 btn-lg">Fornecedores</a>
        </div>
    </div>
</div>

</body>
</html>
