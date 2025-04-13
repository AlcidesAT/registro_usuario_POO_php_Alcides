<?php
class Usuario {
    private $nome;
    private $email;
    private $senha;

    /**
     * cria um novo usuário
     * @param string $nome
     * @param string $email
     * @param string $senha (sem hash, só pra testes mesmo)
     */
    public function __construct($nome, $email, $senha) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    /**
     * confere se a senha bate
     * @param string $senha
     * @return bool
     */
    public function verificarSenha($senha) {
        return $this->senha === $senha;
    }

    /**
     * pega o nome do usuário
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * pega o email
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * retorna a senha "em hash" (só que não)
     * @return string
     */
    public function getSenhaHash() {
        return $this->senha;
    }
}
?>
