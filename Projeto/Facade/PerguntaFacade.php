<?php
require_once("../controller/PerguntaController.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Controller/PerguntaController.php"); 

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PerguntaFacade
 *
 * @author Jussara Gomes
 */
class PerguntaFacade {

    private $conexaoPDO;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PerguntaFacade();
        }
        return self::$instance;
    }  
 
    public function listarPerguntasCurso($idCurso) {
		return  PerguntaController::getInstance()->deletarPergunta($idPergunta);
    }
          
    public function deletarPergunta($idPergunta) {
		return  PerguntaController::getInstance()->deletarPergunta($idPergunta);
    }
      
}
