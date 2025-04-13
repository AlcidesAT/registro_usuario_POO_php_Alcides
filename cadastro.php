<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crie sua conta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
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
            margin-top: 20px;
            text-align: center;
        }
        .links a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Vamos criar sua conta?</h1>
    
    <?php
    session_start();
    if (isset($_SESSION['mensagem'])) {
        echo '<div class="' . $_SESSION['tipo_mensagem'] . '">' . $_SESSION['mensagem'] . '</div>';
        unset($_SESSION['mensagem']);
        unset($_SESSION['tipo_mensagem']);
    }
    ?>
    
    <form action="processa_cadastro.php" method="post">
        <div class="form-group">
            <label for="nome">Seu nome completo:</label>
            <input type="text" id="nome" name="nome"required>
        </div>
        
        <div class="form-group">
            <label for="email">Seu e-mail:</label>
            <input type="email" id="email" name="email"required>
        </div>
        
        <div class="form-group">
            <label for="senha">Crie uma senha:</label>
            <input type="password" id="senha" name="senha"required>
        </div>
        
        <div class="form-group">
            <label for="confirma_senha">Confirme sua senha:</label>
            <input type="password" id="confirma_senha" name="confirma_senha"required>
        </div>
        
        <button type="submit">Cadastrar agora</button>
    </form>
    
    <div class="links">
        <p>Já tem uma conta? <a href="login.php">Entrar aqui</a></p>
    </div>
</body>
</html>
