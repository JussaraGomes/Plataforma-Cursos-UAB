<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Controller/AvaliacaoController.php"); 

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AvaliacaoFacade
 *
 * @author Jussara Gomes
 */
class AvaliacaoFacade {

    private $conexaoPDO;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new AvaliacaoFacade();
        }
        return self::$instance;
    }
    
    public function adicionarAvaliacao($idMatricula, $idProva, $nota) {
		return  AvaliacaoController::getInstance()->adicionarAvaliacao($idMatricula, $idProva, $nota);
    }
    
    public function listarAvaliacoesMatriculado($cpfAluno) {
		return  AvaliacaoController::getInstance()->listarAvaliacoesMatriculado($cpfAluno);
    }
            
    public function deletarAvaliacao($idAvaliacao) {
		return  AvaliacaoController::getInstance()->deletarAvaliacao($idAvaliacao);
    }
    
    
    
}
