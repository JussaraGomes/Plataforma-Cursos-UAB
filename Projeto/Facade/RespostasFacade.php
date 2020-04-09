<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Controller/AdministadorController.php");

/**
 * Description of RespostasFacade
 *
 * @author Jussara Gomes
 */
class RespostasFacade {

    private $conexaoPDO;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new RespostasFacade();
        }
        return self::$instance;
    }
    

    public function adicionarNovaResposta($idPergunta, $textoPergunta, $dataPergunta) {
		return  RespostasController::getInstance()->adicionarNovaResposta($idPergunta, $textoPergunta, $dataPergunta);
    }

    public function listarRespostasPergunta($idPergunta) {
		return  RespostasController::getInstance()->listarRespostasPergunta($idPergunta);
    }
        
    public function deletarResposta($idResposta) {
		return  RespostasController::getInstance()->deletarResposta($idResposta);
    }
    
}
