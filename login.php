<?php
require_once 'classes/Sessao.php';
Sessao::iniciar();

// se o usuário já estiver logado, redireciona para o painel
if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
    header('Location: dashboard.php');
    exit;
}

// verifica se há um e-mail salvo no cookie
$email_salvo = $_COOKIE['email_usuario'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesse sua conta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 6px;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
        .success {
            color: green;
            margin-bottom: 15px;
        }
        .links {
            margin-top: 25px;
        }
    </style>
</head>
<body>
    <h1>Acesse sua conta</h1>
    <?php
    if (isset($_SESSION['mensagem'])) {
        echo '<div class="' . $_SESSION['tipo_mensagem'] . '">' . $_SESSION['mensagem'] . '</div>';
        unset($_SESSION['mensagem']);
        unset($_SESSION['tipo_mensagem']);
    }
    ?>
    <form action="processa_login.php" method="post">
        <div class="form-group">
            <label for="email">Seu e-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email_salvo); ?>" required>
        </div>

        <div class="form-group">
            <label for="senha">Sua senha:</label>
            <input type="password" id="senha" name="senha" required>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="lembrar" <?php echo !empty($email_salvo) ? 'checked' : ''; ?>>
                Manter meu e-mail salvo neste dispositivo
            </label>
        </div>

        <button type="submit">Entrar</button>
    </form>
    <div class="links">
        <p>Ainda não tem uma conta? <a href="cadastro.php">Crie a sua agora</a></p>
    </div>
</body>
</html>
