<?php

class Questoes_Prova {

    private $idQuestao;
    private $idProva;
    private $perguntaQuestao;
    private $alternativaCorreta;
    private $alternativaIncorreta1;
    private $alternativaIncorreta2;
    private $alternativaIncorreta3;
    private $alternativaIncorreta4;

    public function __construct($idProva, $perguntaQuestao, $alternativaCorreta, $alternativaIncorreta1, $alternativaIncorreta2, $alternativaIncorreta3, $alternativaIncorreta4) {
        $this->idProva = $idProva;
        $this->perguntaQuestao = $perguntaQuestao;
        $this->alternativaCorreta = $alternativaCorreta;
        $this->alternativaIncorreta1 = $alternativaIncorreta1;
        $this->alternativaIncorreta2 = $alternativaIncorreta2;
        $this->alternativaIncorreta3 = $alternativaIncorreta3;
        $this->alternativaIncorreta4 = $alternativaIncorreta4;
    }

    // Get's
    public function getIdQuestao() {
        return $this->idQuestao;
    }

    public function getIdProva() {
        return $this->idProva;
    }

    public function getPerguntaQuestao() {
        return $this->perguntaQuestao;
    }

    public function getAlternativaCorreta() {
        return $this->alternativaCorreta;
    }

    public function getAlternativaIncorreta1() {
        return $this->alternativaIncorreta1;
    }

    public function getAlternativaIncorreta2() {
        return $this->alternativaIncorreta2;
    }

    public function getAlternativaIncorreta3() {
        return $this->alternativaIncorreta3;
    }

    public function getAlternativaIncorreta4() {
        return $this->alternativaIncorreta4;
    }

    // Set's
    public function getIdQuestao($idQuestao) {
        $this->idQuestao = $idQuestao;
    }

    public function getIdProva($idProva) {
        $this->idProva = $idProva;
    }

    public function getPerguntaQuestao($perguntaQuestao) {
        $this->perguntaQuestao = $perguntaQuestao;
    }

    public function getAlternativaCorreta($alternativaCorreta) {
        $this->alternativaCorreta = $alternativaCorreta;
    }

    public function getAlternativaIncorreta1($alternativaIncorreta1) {
        $this->alternativaIncorreta1 = $alternativaIncorreta1;
    }

    public function getAlternativaIncorreta2($alternativaIncorreta2) {
        $this->alternativaIncorreta2 = $alternativaIncorreta2;
    }

    public function getAlternativaIncorreta3($alternativaIncorreta3) {
        $this->alternativaIncorreta3 = $alternativaIncorreta3;
    }

    public function getAlternativaIncorreta4($alternativaIncorreta4) {
        $this->alternativaIncorreta4 = $alternativaIncorreta4;
    }

}

?>
