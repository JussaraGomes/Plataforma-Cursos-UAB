<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Controller/EnderecoController.php");


class EnderecoFacade {

    private static $instance;

    public function __construct() {
        
    }
    
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new EnderecoFacade();
        }
        return self::$instance;
    }

    public function cadastrarEndereco($estado, $logadouro, $cidade, $bairro, $cep, $descricao) {
		return  EnderecoController::getInstance()->cadastrarEndereco($estado, $logadouro, $cidade, $bairro, $cep, $descricao);
    }
    
    public function buscarEndereco($idEndereco){
		return  EnderecoController::getInstance()->buscarEndereco($idEndereco);
    }

    public function editarEndereco($estado, $logadouro, $cidade, $bairro, $cep, $descricao, $idEndereco){
		return  EnderecoController::getInstance()->editarEndereco($estado, $logadouro, $cidade, $bairro, $cep, $descricao, $idEndereco);
    }
    
    public function deletarEndereco($idEndereco) {
		return  EnderecoController::getInstance()->deletarEndereco($idEndereco);
    }
}
