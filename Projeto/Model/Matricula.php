<?php

class Matricula {

    private $idMatricula;
    private $idCurso;
    private $cpfAluno;
    private $dataMatricula;

    public function __construct($idCurso, $cpfAluno, $dataMatricula) {
        $this->idCurso = $idCurso;
        $this->cpfAluno = $cpfAluno;
        $this->dataMatricula = $dataMatricula;
    }

    // Get's
    public function getIdMatricula() {
        return $this->idMatricula;
    }

    public function getIdCurso() {
        return $this->idCurso;
    }

    public function getCpfAluno() {
        return $this->cpfAluno;
    }

    public function getDataMatricula() {
        return $this->dataMatricula;
    }

    // Set's
    public function setIdMatricula($idMatricula) {
        $this->idMatricula = $idMatricula;
    }

    public function setIdModulo($idCurso) {
        $this->idCurso = $idCurso;
    }

    public function setCpfAluno($cpfAluno) {
        $this->cpfAluno = $cpfAluno;
    }

    public function setDataMatricula($dataMatricula) {
        $this->dataMatricula = $dataMatricula;
    }

}

?>
