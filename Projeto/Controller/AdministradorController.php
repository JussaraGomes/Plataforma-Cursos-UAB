<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/AdministradorDAO.php");


/**
 * Description of AdministradorController
 *
 * @author Jussara Gomes
 */
class AdministradorController {

    private static $instance;

    public function __construct() {
        
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new AdministradorController();
        }
        return self::$instance;
    }

    public function cadastrarAdministrador($cpf, $idEndereco, $nome, $email, $senha, $primeiroTelefone) {
        if (AdministradorDAO::getInstance()->verificarAdministradorCPF($cpf) == false) {
			
            $administrador = new Administrador($cpf, $idEndereco, $nome, $email, $senha, $primeiroTelefone, 0);
			
            return AdministradorDAO::getInstance()->adicionarNovoAdministrador($administrador);
        }
		else
			return false;
		
    }

    public function cadastrarAdministrador_($cpf, $idEndereco, $nome, $email, $senha, $primeiroTelefone, $segundoTelefone) {
        if (AdministradorDAO::getInstance()->buscarAdministradorCPF($cpf) == false) {
            $administrador = new Administrador($cpf, $idEndereco, $nome, $email, $senha, $primeiroTelefone);
            $administrador->setSegundoTelefone($segundoTelefone);
            AdministradorDAO::getInstance()->adicionarNovoAdministrador($administrador);
            return AdministradorDAO::getInstance()->buscarAdministradorCPF($cpf);
        }
        return false;
    }
    
    public function buscarAdministradorCPF($cpf) {
        return AdministradorDAO::getInstance()->buscarAdministradorCPF($cpf);
    }
    
    public function autenticarAdministradorCPF($cpf, $senha) {
        return AdministradorDAO::getInstance()->autenticarAdministradorCPF($cpf, $senha);        
    }
    
    public function autenticarAdministradorEmail($email, $senha) {
        return AdministradorDAO::getInstance()->autenticarAdministradorEmail($email, $senha);
    }
    
    public function editarSenhaAdministrador($cpf, $novaSenha) {
        return AdministradorDAO::getInstance()->editarSenhaAdministrador($cpf, $novaSenha);
    }
    
    public function editarDadosAdministrador($cpf, $nome, $email, $senha, $primeiroTelefone, $segundoTelefone) {
		
		$administrador = new Administrador($cpf, 000, $nome, $email, $senha, $primeiroTelefone);
        $administrador->setSegundoTelefone($segundoTelefone);
			
        return AdministradorDAO::getInstance()->editarDadosAdministrador($administrador);
		
    }
    
    public function deletarAdministrador($cpf) {
        return AdministradorDAO::getInstance()->deletarAdministrador($cpf);
    }
        
    public function bloquearDesbloquearAdministrador($cpf, $statusBloqueio) {
        return AdministradorDAO::getInstance()->bloquearDesbloquearAdministrador($cpf, $statusBloqueio);
    }

}
