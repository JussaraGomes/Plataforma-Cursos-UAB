<?php

class Colaborador {

    private $CpfColaborador;
    private $idEndereco;
    private $nome;
    private $email;
    private $primeiro_Telefone;
    private $funcao;
    private $breveDescricao;
    private $fotoColaborador;

    public function __construct($CpfColaborador, $idEndereco, $nome, $email, $primeiro_Telefone, $funcao, $breveDescricao, $fotoColaborador) {
        $this->CpfColaborador = $CpfColaborador;
        $this->idEndereco = $idEndereco;
        $this->nome = $nome;
        $this->email = $email;
        $this->primeiro_Telefone = $primeiro_Telefone;
        $this->funcao = $funcao;
        $this->breveDescricao = $breveDescricao;
        $this->fotoColaborador = $fotoColaborador;
    }

    // Get's	
    public function getCpfColaborador() {
        return $this->CpfColaborador;
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

    public function getPrimeiroTelefone() {
        return $this->primeiro_Telefone;
    }

    public function getFuncao() {
        return $this->funcao;
    }

    public function getBreveDescricao() {
        return $this->breveDescricao;
    }
	
    public function getFoto() {
        return $this->fotoColaborador;
    }

    // Set's	

    public function setCpfAluno($CpfColaborador) {
        return $this->CpfColaborador = $CpfColaborador;
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

    public function setPrimeiroTelefone($primeiro_Telefone) {
        $this->primeiro_Telefone = $primeiro_Telefone;
    }

    public function setFuncao($funcao) {
        $this->funcao = $funcao;
    }

    public function setBloqueado($bloqueado) {
        $this->bloqueado = $bloqueado;
    }

    public function setBreveDescricao($breveDescricao) {
        $this->breveDescricao = $breveDescricao;
    }
	
    public function setFoto($fotoColaborador) {
        $this->fotoColaborador = $fotoColaborador;
    }

}

?>
