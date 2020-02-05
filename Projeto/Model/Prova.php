<?php

class Prova {

    private $idProva;
    private $idCurso;

    public function __construct($idCurso) {
        $this->idCurso = $idCurso;
    }

    // Get's
    public function getIdProva() {
        return $this->idProva;
    }

    public function getIdCurso() {
        return $this->idCurso;
    }

    // Set's
    public function setIdProva($idProva) {
        $this->idProva = $idProva;
    }

    public function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
    }

}

?>
