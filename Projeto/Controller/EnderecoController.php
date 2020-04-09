<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Endereco.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/EnderecoDAO.php");

/**
 * Description of EnderecoController
 *
 * @author Jussara Gomes
 */
class EnderecoController {

    private static $instance;

    public function __construct() {
        
    }
    
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new EnderecoController();
        }
        return self::$instance;
    }

    public function cadastrarEndereco($estado, $logadouro, $cidade, $bairro, $cep, $descricao) {

        $endereco = new Endereco($estado, $logadouro, $cidade, $bairro, $cep, $descricao);

        return EnderecoDAO::getInstance()->adicionarNovoEndereco($endereco);
    }
    
    public function buscarEndereco($idEndereco){
        return EnderecoDAO::getInstance()->buscarEndereco($idEndereco);
    }

    public function editarEndereco($estado, $logadouro, $cidade, $bairro, $cep, $descricao, $idEndereco){
		
        $endereco = new Endereco($estado, $logadouro, $cidade, $bairro, $cep, $descricao);
        
		$endereco->setIdEndereco($idEndereco);
        
        return EnderecoDAO::getInstance()->editarEndereco($endereco);
    }
    
    public function deletarEndereco($idEndereco) {
        return EnderecoDAO::getInstance()->deletarEndereco($idEndereco);
    }
}
