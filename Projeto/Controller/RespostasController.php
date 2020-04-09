<?php

//require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Resposta.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/RespostaDAO.php");

/**
 * Description of RespostasController
 *
 * @author Jussara Gomes
 */
class RespostasController {

    private $conexaoPDO;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new RespostasController();
        }
        return self::$instance;
    }
    

    public function adicionarNovaResposta($idPergunta, $textoPergunta, $dataPergunta) {
		return null;
    }

    public function listarRespostasPergunta($idPergunta) {
		return null;
    }
        
    public function deletarResposta($idResposta) {
		return null;
    }
    
}
