<?php

class Professor {

    private $cpfProfessor;
    private $idEndereco;
    private $nome;
    private $email;
    private $senha;
    private $primeiroTelefone;
    private $segundoTelefone;
    private $bloqueado;
    private $url_foto;

    public function __construct($cpfProfessor, $idEndereco, $nome, $email, $senha, $primeiroTelefone, $bloqueado, $url_foto) {
        $this->cpfProfessor = $cpfProfessor;
        $this->idEndereco = $idEndereco;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->primeiroTelefone = $primeiroTelefone;
        $this->bloqueado = $bloqueado;
        $this->url_foto = $url_foto;
    }

    // Get's	
    public function getCpfProfessor() {
        return $this->cpfProfessor;
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
	
    public function getFoto() {
        return $this->url_foto;
    }

    // Set's	

    public function setCpfProfessor($cpfProfessor) {
        return $this->cpfProfessor = $cpfProfessor;
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
	
    public function setFoto($url_foto) {
        $this->url_foto = $url_foto;
    }

}

?>
