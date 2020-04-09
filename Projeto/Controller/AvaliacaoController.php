<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Avaliacao.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/AvaliacaoDAO.php");

/**
 * Description of AvaliacaoController
 *
 * @author Jussara Gomes
 */
class AvaliacaoController {

    private $conexaoPDO;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new AvaliacaoController();
        }
        return self::$instance;
    }
    
    public function adicionarAvaliacao($idMatricula, $idProva, $nota) {
        $avaliacao = new Avaliacao($idMAtricula, $idProva, $nota);
        return AvaliacaoDAO::getInstance()->adicionarAvaliacao($avaliacao);
    }
    
    public function listarAvaliacoesMatriculado($cpfAluno) {
        return AvaliacaoDAO::getInstance()->listarAvaliacoesMatriculado($cpfAluno);
    }
            
    public function deletarAvaliacao($idAvaliacao) {
        return AvaliacaoDAO::getInstance()->deletarAvaliacao($idAvaliacao);
    }
    
    
    
}
