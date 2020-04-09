<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Plataforma.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/PlataformaDAO.php");

/**
 * Description of PlataformaController
 *
 * @author Jussara Gomes
 */
class PlataformaController {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PlataformaController();
        }
        return self::$instance;
    }
    
    public function listarPlataformas() {

    }
    
    
    public function buscarPlataforma($idPlataforma) {
		return  PlataformaDAO::getInstance()->buscarPlataforma($idPlataforma);

    }

    public function editarDadosPlataforma($idPlataforma, $nome, $email, $descricao, $comoFunciona, $primeiroTelefone, $linkFacebook, $linkInstagram, $linkSite) {
						
		$plataforma = new Plataforma(0, $nome, $email, $descricao, $comoFunciona, $primeiroTelefone, $linkFacebook, $linkInstagram, $linkSite);    
		
		$plataforma->setIdPlataforma($idPlataforma);
		
		echo "Controler2: Como funcion: ",$plataforma->getComoFunciona();

        return PlataformaDAO::getInstance()->editarDadosPlataforma($plataforma);
    }
     
}
