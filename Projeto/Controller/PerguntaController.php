<?php


require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Pergunta.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/PerguntaDAO.php");

/**
 * Description of PerguntaController
 *
 * @author Jussara Gomes
 */
class PerguntaController {

    private $conexaoPDO;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new AdministradorController();
        }
        return self::$instance;
    }  
 
    public function listarPerguntasCurso($idCurso) {
     
    }
          
    public function deletarPergunta($idPergunta) {
  
    }
      
}
