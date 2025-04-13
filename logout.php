<?php
require_once 'classes/Sessao.php';

// destrói a sessão
Sessao::destruir();
// redireciona para a página de login
header('Location: login.php');
exit;
?>