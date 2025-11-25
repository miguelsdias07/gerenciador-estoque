<?php
session_start();
include '../includes/auth.php';
include '../includes/database.php';
redirectIfNotLoggedIn();
include '../includes/header.php';

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM fornecedores WHERE id = ?");
$stmt->execute([$id]);
$f = $stmt->fetch();

if ($_POST) {
  $stmt = $pdo->prepare("UPDATE fornecedores SET nome=?, cnpj=?, telefone=?, email=?, endereco=? WHERE id=?");
  $stmt->execute([
    $_POST['nome'], $_POST['cnpj'], $_POST['telefone'], $_POST['email'], $_POST['endereco'], $id
  ]);
  header('Location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Editar Fornecedor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h4>Editar fornecedor</h4>
  <form method="post" class="row g-3">
    <div class="col-md-6"><input name="nome" class="form-control" value="<?= $f['nome'] ?>" required></div>
    <div class="col-md-6"><input name="cnpj" class="form-control" value="<?= $f['cnpj'] ?>" required></div>
    <div class="col-md-6"><input name="telefone" class="form-control" value="<?= $f['telefone'] ?>"></div>
    <div class="col-md-6"><input name="email" class="form-control" value="<?= $f['email'] ?>"></div>
    <div class="col-md-12"><input name="endereco" class="form-control" value="<?= $f['endereco'] ?>"></div>
    <div class="col-12"><button class="btn btn-primary">Salvar</button></div>
  </form>
</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>
