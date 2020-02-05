<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Controller/AdministradorController.php"); 


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include ('../Model/Administrador.php');
require_once("../database/AdministradorDAO.php");

/**
 * Description of AdministadorFacade
 *
 * @author Jussara Gomes
 */
class AdministadorFacade {

    private static $instance;

    public function __construct() {
        
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new AdministadorFacade();
        }
        return self::$instance;
    }

    public function cadastrarAdministrador($cpf, $idEndereco, $nome, $email, $senha, $primeiroTelefone) {
		return  AdministradorController::getInstance()->cadastrarAdministrador($cpf, $idEndereco, $nome, $email, $senha, $primeiroTelefone);
    }

    public function cadastrarAdministrador_($cpf, $idEndereco, $nome, $email, $senha, $primeiroTelefone, $segundoTelefone) {
		return  AdministradorController::getInstance()->cadastrarAdministrador_($cpf, $idEndereco, $nome, $email, $senha, $primeiroTelefone, $segundoTelefone);
    }
    
    public function buscarAdministradorCPF($cpf) {
		return  AdministradorController::getInstance()->buscarAdministradorCPF($cpf);
    }
    
    public function autenticarAdministradorCPF($cpf, $senha) {
		return  AdministradorController::getInstance()->autenticarAdministradorCPF($cpf, $senha);
    }
    
    public function autenticarAdministradorEmail($email, $senha) {
		return  AdministradorController::getInstance()->autenticarAdministradorEmail($email, $senha);
    }
    
    public function editarSenhaAdministrador($cpf, $novaSenha) {
		return  AdministradorController::getInstance()->editarSenhaAdministrador($cpf, $novaSenha);
    }
    
    public function editarDadosAdministrador($cpf, $nome, $email, $senha, $primeiroTelefone, $segundoTelefone) {
		return  AdministradorController::getInstance()->editarDadosAdministrador($cpf, $nome, $email, $senha, $primeiroTelefone, $segundoTelefone);
    }
    
    public function deletarAdministrador($cpf) {
		return  AdministradorController::getInstance()->deletarAdministrador($cpf);
    }
        
    public function bloquearDesbloquearAdministrador($cpf, $statusBloqueio) {
		return  AdministradorController::getInstance()->bloquearDesbloquearAdministrador($cpf, $statusBloqueio);
    }

}
