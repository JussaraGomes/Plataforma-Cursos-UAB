<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Controller/ProvaController.php"); 

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProvaFacade
 *
 * @author Jussara Gomes
 */
class ProvaFacade {

    private $conexaoPDO;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new ProvaFacade();
        }
        return self::$instance;
    }
    
    
    public function adicionarNovaProva($idCurso) {
		return  ProvaController::getInstance()->adicionarNovaProva($idCurso);
    }
    
    public function listarProvas($idCurso) {
		return  ProvaController::getInstance()->listarProvas($idCurso);
    }
        
    public function deletarProva($idProva) {
		return  ProvaController::getInstance()->deletarProva($idProva);
    }
    
}
