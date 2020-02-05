<?php

class Material {

    private $idMaterial;
    private $idAula;
    private $nomeMaterial;
    private $tipoMaterial;
    private $arquivo;

    public function __construct($idAula, $nomeMaterial, $tipoMaterial, $arquivo) {
        $this->idAula = $idAula;
        $this->nomeMaterial = $nomeMaterial;
        $this->tipoMaterial = $tipoMaterial;
        $this->arquivo = $arquivo;
    }

    // Get's
    public function getIdMaterial() {
        return $this->idMaterial;
    }

    public function getIdAula() {
        return $this->idAula;
    }

    public function getNomeMaterial() {
        return $this->nomeMaterial;
    }

    public function getTipoMaterial() {
        return $this->tipoMaterial;
    }

    public function getArquivo() {
        return $this->arquivo;
    }

    // Set's
    public function setIdAula($idMaterial) {
        $this->idMaterial = $idMaterial;
    }

    public function setIdModulo($idAula) {
        $this->idAula = $idAula;
    }

    public function setNomeAula($nomeMaterial) {
        $this->nomeMaterial = $nomeMaterial;
    }

    public function setTipoMaterial($tipoMaterial) {
        $this->tipoMaterial = $tipoMaterial;
    }

    public function setArquivo($arquivo) {
        $this->arquivo = $arquivo;
    }

}

?>
