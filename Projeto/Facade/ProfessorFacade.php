<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Controller/ProfessorController.php");

/**
 * Description of ProfessorFacade
 *
 * @author Jussara Gomes
 */
class ProfessorFacade {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new ProfessorFacade();
        }
        return self::$instance;
    }
    
    public function adicionarNovoProfessor($cpfProfessor, $idEndereco, $nome, $email, $senha, $primeiroTelefone, $url_foto) {
		return  ProfessorController::getInstance()->adicionarNovoProfessor($cpfProfessor, $idEndereco, $nome, $email, $senha, $primeiroTelefone, $url_foto);
    }
       
    // Busca um administrador atravéz do CPF
    public function buscarProfessorCPF($cpf) {
		return  ProfessorController::getInstance()->buscarProfessorCPF($cpf);
    }

    // Altenticar administrador através do CPF
    public function autenticarProfessorCPF($cpf, $senha) {
		return  ProfessorController::getInstance()->autenticarProfessorCPF($cpf, $senha);
    }

    // Autenticar adminitrador atravéz do email
    public function autenticarProfessorEmail($email, $senha) {
		return  ProfessorController::getInstance()->autenticarProfessorEmail($email, $senha);
    }

    // Editar senha do administrador
    public function editarSenhaProfessor($cpf, $novaSenha) {
		return  ProfessorController::getInstance()->editarSenhaProfessor($cpf, $novaSenha);
    }

    // Edita dados do administrador
    public function editarDadosProfessor($cpfProfessor, $nome, $email, $primeiroTelefone, $segundoTelefone) {
		return  ProfessorController::getInstance()->editarDadosProfessor($cpfProfessor, $nome, $email, $primeiroTelefone, $segundoTelefone);
    }

// Apaga um administrador do banco
    public function deletarProfessor($cpf) {
		return  ProfessorController::getInstance()->deletarProfessor($cpf);
    }

    // Bloqueia ou desbloqueia um administrador
    public function bloquearDesbloquearProfessor($cpf, $statusBloqueio) {
		return  ProfessorController::getInstance()->bloquearDesbloquearProfessor($cpf, $statusBloqueio);
    }
}
