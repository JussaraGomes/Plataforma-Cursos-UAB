<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
        return AvaliacaoDAO::getInstance()-->adicionarAvaliacao($avaliacao);
    }
    
    public function listarAvaliacoesMatriculado($cpfAluno) {
        return AvaliacaoDAO::getInstance()-->listarAvaliacoesMatriculado($cpfAluno);
    }
            
    public function deletarAvaliacao($idAvaliacao) {
        return AvaliacaoDAO::getInstance()-->deletarAvaliacao($idAvaliacao);
    }
    
    
    
}
