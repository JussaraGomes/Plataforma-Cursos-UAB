<?php

class Aula {

    private $idAula;
    private $idModulo;
    private $nomeAula;

    public function __construct($idModulo, $nomeAula) {
        $this->idModulo = $idModulo;
        $this->nomeAula = $nomeAula;
    }

    // Get's
    public function getIdAula() {
        return $this->idAula;
    }

    public function getIdModulo() {
        return $this->idModulo;
    }

    public function getNomeAula() {
        return $this->nomeAula;
    }

    // Set's
    public function setIdAula($idAula) {
        $this->idAula = $idAula;
    }

    public function setIdModulo($idModulo) {
        $this->idModulo = $idModulo;
    }

    public function setNomeAula($nomeAula) {
        $this->nomeAula = $nomeAula;
    }

}

?>
