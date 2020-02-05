<?php

class Pergunta {

    private $idPergunta;
    private $idCurso;
    private $textoPergunta;
    private $dataPergunta;

    public function __construct($idCurso, $textoPergunta, $dataPergunta) {
        $this->idPergunta = $idPergunta;
        $this->idCurso = $idCurso;
        $this->textoPergunta = $textoPergunta;
        $this->dataPergunta = $dataPergunta;
    }

    // Get's
    public function getIdPergunta() {
        return $this->idPergunta;
    }

    public function getIdCurso() {
        return $this->idCurso;
    }

    public function getTextoPergunta() {
        return $this->textoPergunta;
    }

    public function getDataPergunta() {
        return $this->dataPergunta;
    }

    // Set's
    public function setIdPergunta($idPergunta) {
        $this->idPergunta = $idPergunta;
    }

    public function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
    }

    public function setTextoPergunta($textoPergunta) {
        $this->textoPergunta = $textoPergunta;
    }

    public function getDataPergunta($dataPergunta) {
        $this->dataPergunta = $dataPergunta;
    }

}

?>
