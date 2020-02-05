<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Controller/Questoes_ProvaController.php"); 

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Questoes_ProvaFacade
 *
 * @author Jussara Gomes
 */
class Questoes_ProvaFacade {

    private $conexaoPDO;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Questoes_ProvaFacade();
        }
        return self::$instance;
    }
    
    
    public function adicionarNovaQuestao($perguntaQuestao, $alternativaCorreta, $alternativaIncorreta1, $alternativaIncorreta2, $alternativaIncorreta3, $alternativaIncorreta4) {
		return  Questoes_ProvaController::getInstance()->adicionarNovaQuestao($perguntaQuestao, $alternativaCorreta, $alternativaIncorreta1, $alternativaIncorreta2, $alternativaIncorreta3, $alternativaIncorreta4);
    }

    public function listarQuestoesProva($idProva) {
		return Questoes_ProvaController::getInstance()->listarQuestoesProva($idProva);
    }
            
    public function deletarQuestao($idQuestao) {
		return Questoes_ProvaController::getInstance()->deletarQuestao($idQuestao);
    }    
    
}
