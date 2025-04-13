<?php
require_once 'classes/Sessao.php';

Sessao::iniciar();

// verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // limpa e valida os dados recebidos
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];
    $confirma_senha = $_POST['confirma_senha'];
    
    $erros = [];
    if (empty($nome)) {
        $erros[] = "Por favor, informe seu nome.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Informe um e-mail válido.";
    }
    if (empty($senha)) {
        $erros[] = "A senha é obrigatória.";
    } elseif (strlen($senha) < 6) {
        $erros[] = "A senha precisa ter no mínimo 6 caracteres.";
    }
    if ($senha !== $confirma_senha) {
        $erros[] = "As senhas não são iguais.";
    }
    // se estiver tudo certo, salva os dados e redireciona
    if (empty($erros)) {
        Sessao::set('nome_cadastrado', $nome);
        Sessao::set('mensagem', 'Cadastro feito com sucesso. Agora é só fazer login.');
        Sessao::set('tipo_mensagem', 'success');
        header('Location: login.php');
        exit;
    } else {
        Sessao::set('mensagem', implode('<br>', $erros));
        Sessao::set('tipo_mensagem', 'error');
        header('Location: cadastro.php');
        exit;
    }
} else {
    // se o acesso não for via POST, volta para o formulário
    header('Location: cadastro.php');
    exit;
}
?>
