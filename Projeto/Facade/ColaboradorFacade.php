<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Controller/ColaboradorController.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlunoFacade
 *
 * @author Jussara Gomes
 */
class ColaboradorFacade {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new ColaboradorFacade();
        }
        return self::$instance;
    }
    
    public function adicionarNovoColaborador($CpfColaborador, $idEndereco, $nome, $email, $primeiro_Telefone, $funcao, $breveDescricao, $fotoColaborador)  {
		return ColaboradorController::getInstance()->adicionarNovoColaborador($CpfColaborador, $idEndereco, $nome, $email, $primeiro_Telefone, $funcao, $breveDescricao, $fotoColaborador);		
    }


    public function buscarColaboradorCPF($cpf) {
        return ColaboradorController::getInstance()->buscarColaboradorCPF($cpf);
    }
	
	
    public function listarColaboradores() {
        return ColaboradorController::getInstance()->listarColaboradores();
    }
}
