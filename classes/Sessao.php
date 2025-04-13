<?php
class Sessao {
    /**
     * garante que a sessão foi iniciada
     */
    public static function iniciar() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    /**
     * salva um valor na sessão
     * @param string $chave
     * @param mixed $valor
     */
    public static function set($chave, $valor) {
        self::iniciar();
        $_SESSION[$chave] = $valor;
    }
    /**
     * pega um valor da sessão (ou null se não existir)
     * @param string $chave
     * @return mixed
     */
    public static function get($chave) {
        self::iniciar();
        return isset($_SESSION[$chave]) ? $_SESSION[$chave] : null;
    }
    /**
     * vê se uma chave existe na sessão
     * @param string $chave
     * @return bool
     */
    public static function existe($chave) {
        self::iniciar();
        return isset($_SESSION[$chave]);
    }
    /**
     * limpa tudo e destrói a sessão
     */
    public static function destruir() {
        self::iniciar();
        $_SESSION = [];
        // remove o cookie da sessão, caso exista
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
    }
}
?>
