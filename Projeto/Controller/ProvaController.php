<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Prova.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/ProvaDAO.php");

/**
 * Description of ProvaController
 *
 * @author Jussara Gomes
 */
class ProvaController {

    private $conexaoPDO;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new ProvaController();
        }
        return self::$instance;
    }
    
    
    public function adicionarNovaProva($idCurso) {

    }
    
    public function listarProvas($idCurso) {

    }
        
    public function deletarProva($idProva) {
 
    }
    
}
