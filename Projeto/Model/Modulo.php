<?php

class Modulo {

    private $idModulo;
    private $idCurso;
    private $nomeModulo;

    public function __construct($idCurso, $nomeModulo) {
        $this->idCurso = $idCurso;
        $this->nomeModulo = $nomeModulo;
    }

    // Get's
    public function getIdModulo() {
        return $this->idModulo;
    }

    public function getIdCurso() {
        return $this->idCurso;
    }

    public function getNomeModulo() {
        return $this->nomeModulo;
    }

    // Set's
    public function setIdModulo($idModulo) {
        $this->idModulo = $idModulo;
    }

    public function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
    }

    public function setTextoPergunta($nomeModulo) {
        $this->nomeModulo = $nomeModulo;
    }

}

?>
