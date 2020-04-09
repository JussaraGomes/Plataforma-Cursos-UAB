<?php

class Aluno {

    private $cpfAluno;
    private $idEndereco;
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $bloqueado;

    public function __construct($cpfAluno, $idEndereco, $nome, $email, $senha, $telefone, $bloqueado) {
        $this->cpfAluno = $cpfAluno;
        $this->idEndereco = $idEndereco;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->telefone = $telefone;
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

    public function getTelefone() {
        return $this->telefone;
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

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setBloqueado($bloqueado) {
        $this->bloqueado = $bloqueado;
    }

}

?>
