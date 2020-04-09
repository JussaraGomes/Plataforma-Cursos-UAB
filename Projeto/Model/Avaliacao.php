<?php

class Avaliacao {

    private $idAvaliacao;
    private $idMatricula;
    private $idProva;
    private $nota;

    public function __construct($idMatricula, $idProva, $nota) {
        $this->idMatricula = $idMatricula;
        $this->idProva = $idProva;
        $this->nota = $nota;
    }

    // Get's
    public function getIdAvaliacao() {
        return $this->idAvaliacao;
    }

    public function getIdMatricula() {
        return $this->idMatricula;
    }

    public function getIdProva() {
        return $this->idProva;
    }

    public function getNota() {
        return $this->nota;
    }

    // Set's
    public function setIdAvaliacao($idAvaliacao) {
        $this->idAvaliacao = $idAvaliacao;
    }

    public function setIdMatricula($idMatricula) {
        $this->idMatricula = $idMatricula;
    }

    public function setIdProva($idProva) {
        $this->idProva = $idProva;
    }

    public function setNota($nota) {
        $this->nota = $nota;
    }

}

?>
