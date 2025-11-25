<?php
session_start();
include '../includes/auth.php';
include '../includes/database.php';
redirectIfNotLoggedIn();
include '../includes/header.php';

$busca = $_GET['q'] ?? '';
$sql = "SELECT * FROM fornecedores";
if ($busca) {
  $sql .= " WHERE nome LIKE :busca OR cnpj LIKE :busca";
}
$sql .= " ORDER BY nome ASC";

$stmt = $pdo->prepare($sql);
if ($busca) {
  $stmt->bindValue(':busca', "%$busca%");
}
$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Fornecedores</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h4>Fornecedores</h4>
  <form method="get" class="d-flex mb-3">
    <input type="text" name="q" class="form-control me-2" placeholder="Buscar por nome ou CNPJ" value="<?= htmlspecialchars($busca) ?>">
    <button class="btn btn-primary">Buscar</button>
    <a href="cadastrar.php" class="btn btn-primary ms-auto">Novo</a>
  </form>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th><th>Nome</th><th>CNPJ</th><th>Telefone</th><th>Email</th><th>Endereço</th><th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dados as $f): ?>
      <tr>
        <td><?= $f['id'] ?></td>
        <td><?= $f['nome'] ?></td>
        <td><?= $f['cnpj'] ?></td>
        <td><?= $f['telefone'] ?></td>
        <td><?= $f['email'] ?></td>
        <td><?= $f['endereco'] ?></td>
        <td>
          <a href="editar.php?id=<?= $f['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
          <a href="excluir.php?id=<?= $f['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Excluir fornecedor?')">Excluir</a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>
