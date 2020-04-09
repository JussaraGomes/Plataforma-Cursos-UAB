<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Questoes_Prova.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/Questoes_ProvaDAO.php");

/**
 * Description of Questoes_ProvaController
 *
 * @author Jussara Gomes
 */
class Questoes_ProvaController {

    private $conexaoPDO;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Questoes_ProvaController();
        }
        return self::$instance;
    }
    
    
    public function adicionarNovaQuestao($perguntaQuestao, $alternativaCorreta, $alternativaIncorreta1, $alternativaIncorreta2, $alternativaIncorreta3, $alternativaIncorreta4) {

    }

    public function listarQuestoesProva($idProva) {

    }
            
    public function deletarQuestao($idQuestao) {

    }    
    
}
