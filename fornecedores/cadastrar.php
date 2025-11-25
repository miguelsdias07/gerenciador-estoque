<?php
session_start();
include '../includes/auth.php';
include '../includes/database.php';
redirectIfNotLoggedIn();
include '../includes/header.php';

if ($_POST) {
  $stmt = $pdo->prepare("INSERT INTO fornecedores (nome, cnpj, telefone, email, endereco) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([
    $_POST['nome'], $_POST['cnpj'], $_POST['telefone'], $_POST['email'], $_POST['endereco']
  ]);
  header('Location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Fornecedor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h4>Novo fornecedor</h4>
  <form method="post" class="row g-3">
    <div class="col-md-6"><input name="nome" class="form-control" placeholder="Nome" required></div>
    <div class="col-md-6"><input name="cnpj" class="form-control" placeholder="CNPJ" required></div>
    <div class="col-md-6"><input name="telefone" class="form-control" placeholder="Telefone"></div>
    <div class="col-md-6"><input name="email" class="form-control" placeholder="Email"></div>
    <div class="col-md-12"><input name="endereco" class="form-control" placeholder="Endereço"></div>
    <div class="col-12"><button class="btn btn-primary">Salvar</button></div>
  </form>
</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>
