<?php

class Resposta {

    private $idResposta;
    private $idPergunta;
    private $textoResposta;
    private $dataResposta;

    public function __construct($idResposta, $idPergunta, $textoResposta, $dataResposta) {
        $this->idResposta = $idResposta;
        $this->idPergunta = $idPergunta;
        $this->textoResposta = $textoResposta;
        $this->dataResposta = $dataResposta;
    }

    // Get's
    public function getIdResposta() {
        return $this->idResposta;
    }

    public function getIdPergunta() {
        return $this->idPergunta;
    }

    public function getTextoResposta() {
        return $this->textoResposta;
    }

    public function getDataResposta() {
        return $this->dataResposta;
    }

    // Set's
    public function setIdResposta($idResposta) {
        $this->idResposta = $idResposta;
    }

    public function setIdCurso($idPergunta) {
        $this->idPergunta = $idPergunta;
    }

    public function setTextoPergunta($textoResposta) {
        $this->textoResposta = $textoResposta;
    }

    public function getDataPergunta($dataResposta) {
        $this->dataResposta = $dataResposta;
    }

}

?>
