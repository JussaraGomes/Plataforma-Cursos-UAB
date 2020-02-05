<?php

class Responsaveis_Curso {

    private $idCurso;
    private $cpfProfessor;

    public function __construct($cpfProfessor) {
        $this->cpfProfessor = $cpfProfessor;
    }

    // Get's
    public function getIdCurso() {
        return $this->idCurso;
    }

    public function getCpfProfessor() {
        return $this->cpfProfessor;
    }

    // Set's	
    public function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
    }

    public function setCpfProfessor($cpfProfessor) {
        $this->cpfProfessor = $cpfProfessor;
    }

}

?>
