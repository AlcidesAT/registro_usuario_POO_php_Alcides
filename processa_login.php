<?php
require_once 'classes/Sessao.php';

Sessao::iniciar();

// confere se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // pegamos os dados que o usuário preencheu
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $lembrar = isset($_POST['lembrar']);
    // por enquanto, pra facilitar, qualquer e-mail e senha são aceitos
    // vemos se já tem um nome salvo na sessão
    $nome_usuario = Sessao::existe('nome_cadastrado') ? Sessao::get('nome_cadastrado') : 'Visitante';

    // salvamos os dados do usuário na sessão
    Sessao::set('usuario_nome', $nome_usuario);
    Sessao::set('usuario_email', $email);
    Sessao::set('autenticado', true);

    // se o usuário quiser que o e-mail seja lembrado, salvamos em um cookie
    if ($lembrar) {
        setcookie('email_usuario', $email, time() + (86400 * 30), "/"); // 30 dias
    } else {
        // se não quiser, apagamos o cookie (caso ele exista)
        if (isset($_COOKIE['email_usuario'])) {
            setcookie('email_usuario', '', time() - 3600, "/");
        }
    }
    // leva o usuário pro dashboard
    header('Location: dashboard.php');
    exit;

} else {
    // se alguém tentar acessar esse arquivo direto, redirecionamos pro login
    header('Location: login.php');
    exit;
}
