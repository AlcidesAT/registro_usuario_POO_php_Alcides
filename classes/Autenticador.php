<?php
require_once 'Usuario.php';
require_once 'Sessao.php';

class Autenticador {
    // usuário fake só pra testes rápidos
    private static $email_teste = "teste@exemplo.com";
    private static $senha_teste = "123456";
    private static $nome_teste = "Usuário Teste";
    /**
     * cadastra um novo usuário
     * @param string $nome
     * @param string $email
     * @param string $senha
     * @return bool
     */
    public static function registrar($nome, $email, $senha) {
        // simulação de cadastro sem salvamento
        // caso fosse real, teria verificação de e-mail duplicado, salvar no banco, etc.

        self::$nome_teste = $nome;
        self::$email_teste = $email;
        self::$senha_teste = $senha;
        return true;
    }
    /**
     * login do usuário
     * @param string $email
     * @param string $senha
     * @return bool
     */
    public static function login($email, $senha) {
        // só compara com o usuário fake definido ali em cima
        if ($email === self::$email_teste && $senha === self::$senha_teste) {
            Sessao::set('usuario_nome', self::$nome_teste);
            Sessao::set('usuario_email', self::$email_teste);
            Sessao::set('autenticado', true);
            return true;
        }
        return false; // email ou senha errados
    }
    /**
     * confere se o usuário tá logado
     * @return bool
     */
    public static function estaAutenticado() {
        return Sessao::existe('autenticado') && Sessao::get('autenticado') === true;
    }
    /**
     * retorna os usuários registrados (só um placeholder por enquanto)
     * @return array
     */
    public static function getUsuarios() {
        return [];
    }
}
?>
