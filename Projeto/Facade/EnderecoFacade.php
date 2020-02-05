<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Controller/EnderecoController.php"); 

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include ('../Model/Endereco.php');
require_once("../database/EnderecoDAO.php");

/**
 * Description of EnderecoFacade
 *
 * @author Jussara Gomes
 */
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

    public function cadastrarEndereco($estado, $cidade, $bairro, $cep, $descricao) {
		return  EnderecoController::getInstance()->cadastrarEndereco($estado, $cidade, $bairro, $cep, $descricao);
    }
    
    public function buscarEndereco($idEndereco){
		return  EnderecoController::getInstance()->buscarEndereco($idEndereco);
    }

    public function editarEndereco($estado, $cidade, $bairro, $cep, $descricao, $idEndereco){
		return  EnderecoController::getInstance()->editarEndereco($estado, $cidade, $bairro, $cep, $descricao, $idEndereco);
    }
    
    public function deletarEndereco($idEndereco) {
		return  EnderecoController::getInstance()->deletarEndereco($idEndereco);
    }
}
