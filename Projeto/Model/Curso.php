<?php

class Curso {

    private $idCurso;
    private $nome;
    private $descricao;
    private $nivelDificuldade;
    private $cargaHoraria;
    private $preRequisito;
    private $modalidade;
    private $urlFoto;

    public function __construct($nome, $descricao, $nivelDificuldade, $cargaHoraria, $preRequisito, $modalidade, $urlFoto) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->nivelDificuldade = $nivelDificuldade;
        $this->cargaHoraria = $cargaHoraria;
        $this->preRequisito = $preRequisito;
        $this->modalidade = $modalidade;
        $this->urlFoto = $urlFoto;
    }

    // Get's	
    public function getIdCurso() {
        return $this->idCurso;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getNivelDificuldade() {
        return $this->nivelDificuldade;
    }

    public function getCargaHoraria() {
        return $this->cargaHoraria;
    }

    public function getPreRequisitos() {
        return $this->preRequisito;
    }

    public function getModalidade() {
        return $this->modalidade;
    }

    public function getFoto() {
        return $this->urlFoto;
    }

    // Set's	

    public function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setNivelDificuldade($nivelDificuldade) {
        $this->nivelDificuldade = $nivelDificuldade;
    }

    public function setCargaHoraria($cargaHoraria) {
        $this->cargaHoraria = $cargaHoraria;
    }

    public function setPreRequisito($preRequisito) {
        $this->primeiroTelefone = $preRequisito;
    }

    public function setModalidade($modalidade) {
        $this->modalidade = $modalidade;
    }

    public function setFoto($urlFoto) {
        $this->urlFoto = $urlFoto;
    }

}

?>
