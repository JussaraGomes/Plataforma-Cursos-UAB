<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Controller/NoticiaController.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NoticiaFacade
 *
 * @author Jussara Gomes
 */
class NoticiaFacade {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new NoticiaFacade();
        }
        return self::$instance;
    }
    
    
    // Adiciona uma nova notícia
    public function adicionarNovaNoticia($titulo, $breveDescricao, $corpoNoticia, $dataPublicacao, $urlFoto) {
		return  NoticiaController::getInstance()->adicionarNovaNoticia($titulo, $breveDescricao, $corpoNoticia, $dataPublicacao, $urlFoto);
    }
 
    // Lista as notícias do banco
    public function listarNoticias() {
		return  NoticiaController::getInstance()->listarNoticias();
    }
	
    // Busca uma notícia pelo id
    public function buscarNoticiaId($idNoticia) {
		return  NoticiaController::getInstance()->buscarNoticiaId($idNoticia);
    }
}

?>