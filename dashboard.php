<?php
require_once 'classes/Sessao.php';

Sessao::iniciar();

// verifica se o usuário está autenticado
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    Sessao::set('mensagem', 'Você precisa estar logado para acessar essa página 😊');
    Sessao::set('tipo_mensagem', 'error');
    header('Location: login.php');
    exit;
}

// obtém informações do usuário da sessão
$nome_usuario = $_SESSION['usuario_nome'] ?? 'Visitante';
$email_usuario = $_SESSION['usuario_email'] ?? '';

// verifica se existe cookie de email
$email_cookie = $_COOKIE['email_usuario'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Área</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .user-info,
        .cookie-info {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .user-info h2 {
            margin-top: 0;
        }
        .logout-button {
            background-color: #f44336;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        .logout-button:hover {
            background-color: #d7352e;
        }
        .logout-container {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Olá, seja bem-vindo!</h1>
    
    <div class="user-info">
        <h2>Olá, <?php echo htmlspecialchars($nome_usuario); ?>!</h2>
        <p>Seu e-mail cadastrado é: <strong><?php echo htmlspecialchars($email_usuario); ?></strong></p>
    </div>
    
    <?php if ($email_cookie): ?>
    <div class="cookie-info">
        <h3>Um lembrete do seu navegador:</h3>
        <p>Seu e-mail salvo por aqui é: <strong><?php echo htmlspecialchars($email_cookie); ?></strong></p>
    </div>
    <?php endif; ?>
    
    <div class="logout-container">
        <a href="logout.php" class="logout-button">Sair da conta</a>
    </div>
</body>
</html>
