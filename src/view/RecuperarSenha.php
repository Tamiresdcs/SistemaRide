<?php
require_once '../controller/AuthController.php';

$mensagem = '';
if (isset($_POST['email'], $_POST['tipo'])) {
    $auth = new AuthController();
    $senha = $auth->recuperarSenha($_POST['email'], $_POST['tipo']);
    if ($senha) {
        $mensagem = "Sua senha é: <strong>$senha</strong>";
    } else {
        $mensagem = "E-mail não encontrado para o tipo selecionado.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Recuperar Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4">Recuperar Senha</h2>
    <?php if ($mensagem): ?>
        <div class="alert alert-info"><?= $mensagem ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label>Tipo:</label>
            <select name="tipo" class="form-select">
                <option value="motorista">Motorista</option>
                <option value="passageiro">Passageiro</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Recuperar Senha</button>
        <a href="Login.php" class="btn btn-link">Voltar ao Login</a>
    </form>
</body>
</html>