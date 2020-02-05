<?php

class Endereco {

    private $idEndereco;
    private $estado;
    private $cidade;
    private $bairro;
    private $cep;
    private $descricao;

    public function __construct($estado, $cidade, $bairro, $cep, $descricao) {
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->cep = $cep;
        $this->descricao = $descricao;
    }

    // Get's
    public function getIdEndereco() {
        return $this->idEndereco;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCEP() {
        return $this->cep;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    // Set's	
    public function setIdEndereco($idEndereco) {
        $this->idEndereco = $idEndereco;
    }
	
    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCEP($cep) {
        $this->cep = $cep;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

}

?>
