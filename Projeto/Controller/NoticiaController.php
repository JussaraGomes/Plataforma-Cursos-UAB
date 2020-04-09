<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Noticia.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/NoticiaDAO.php");

/**
 * Description of AlunoControler
 *
 * @author Jussara Gomes
 */
class NoticiaController {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new NoticiaController();
        }
        return self::$instance;
    }
    
	// Adiciona uma nova notícia
    public function adicionarNovaNoticia($titulo, $breveDescricao, $corpoNoticia, $dataPublicacao, $urlFoto) {
		if (NoticiaDAO::getInstance()->verificarNoticiaTitulo($titulo) == false) {
			$noticia = new Noticia($titulo, $breveDescricao, $corpoNoticia, $dataPublicacao, $urlFoto);    
			return NoticiaDAO::getInstance()->adicionarNovaNoticia($noticia);
		}
		else
			return false;
    }

    // Lista as notícias do banco
    public function listarNoticias() {
		return  NoticiaDAO::getInstance()->listarNoticias();
    }
	
    // Busca uma notícia pelo id
    public function buscarNoticiaId($idNoticia) {
		return  NoticiaDAO::getInstance()->buscarNoticiaId($idNoticia);
    }
}

?>
