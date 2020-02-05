<?php

class Aluno {

    private $cpfAluno;
    private $idEndereco;
    private $nome;
    private $email;
    private $senha;
    private $primeiroTelefone;
    private $segundoTelefone;
    private $bloqueado;

    public function __construct($cpfAluno, $idEndereco, $nome, $email, $senha, $primeiroTelefone, $segundoTelefone, $bloqueado) {
        $this->cpfAluno = $cpfAluno;
        $this->idEndereco = $idEndereco;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->primeiroTelefone = $primeiroTelefone;
        $this->segundoTelefone = $segundoTelefone;
        $this->bloqueado = $bloqueado;
    }

    // Get's	
    public function getCpfAluno() {
        return $this->cpfAluno;
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

    public function getSegundoTelefone() {
        return $this->segundoTelefone;
    }

    public function getBloqueado() {
        return $this->bloqueado;
    }

    // Set's	

    public function setCpfAluno($cpfAluno) {
        return $this->cpfAluno = $cpfAluno;
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

    public function setSegundoTelefone($segundoTelefone) {
        $this->segundoTelefone = $segundoTelefone;
    }

    public function setBloqueado($bloqueado) {
        $this->bloqueado = $bloqueado;
    }

}

?>
