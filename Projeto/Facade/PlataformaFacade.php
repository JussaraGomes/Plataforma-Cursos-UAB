<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Controller/PlataformaController.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PlataformaFacade
 *
 * @author Jussara Gomes
 */
class PlataformaFacade {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PlataformaFacade();
        }
        return self::$instance;
    }
    
    public function listarPlataformas() {
		return  PlataformaController::getInstance()->listarPlataformas();
    }
    
    
    public function buscarPlataforma($idPlataforma) {
		return  PlataformaController::getInstance()->buscarPlataforma($idPlataforma);
    }

    public function editarDadosPlataforma($idPlataforma, $nome, $email, $descricao, $comoFunciona, $primeiroTelefone, $linkFacebook, $linkInstagram, $linkSite) {
		return  PlataformaController::getInstance()->editarDadosPlataforma($idPlataforma,$nome, $email, $descricao, $comoFunciona, $primeiroTelefone, $linkFacebook, $linkInstagram, $linkSite);
    }
     
}
