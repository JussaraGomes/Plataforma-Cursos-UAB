<?php

class Administrador {

    private $cpfAdministrador;
    private $idEndereco;
    private $nome;
    private $email;
    private $senha;
    private $primeiroTelefone;
    private $bloqueado;

    public function __construct($cpfAdministrador, $idEndereco, $nome, $email, $senha, $primeiroTelefone, $bloqueado) {
        $this->cpfAdministrador = $cpfAdministrador;
        $this->idEndereco = $idEndereco;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->primeiroTelefone = $primeiroTelefone;
        $this->bloqueado = $bloqueado;
    }

    // Get's	
    public function getCpfAdministrador() {
        return $this->cpfAdministrador;
    }

    public function getIdEndereco() {
        return $this->idEndereco;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getPrimeiroTelefone() {
        return $this->primeiroTelefone;
    }

    public function getBloqueado() {
        return $this->bloqueado;
    }

    // Set's	

    public function setCpfAdministrador($cpfAdministrador) {
        return $this->cpfAdministrador = $cpfAdministrador;
    }

    public function setIdEndereco($idEndereco) {
        $this->idEndereco = $idEndereco;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setPrimeiroTelefone($primeiroTelefone) {
        $this->primeiroTelefone = $primeiroTelefone;
    }

    public function setBloqueado($bloqueado) {
        $this->bloqueado = $bloqueado;
    }

}

?>
