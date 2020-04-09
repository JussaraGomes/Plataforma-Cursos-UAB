<?php


require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Professor.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/ProfessorDAO.php");

/**
 * Description of ProfessorConteoller
 *
 * @author Jussara Gomes
 */
class ProfessorController {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new ProfessorController();
        }
        return self::$instance;
    }
    
    public function adicionarNovoProfessor($cpfProfessor, $idEndereco, $nome, $email, $senha, $primeiroTelefone, $url_foto) {
		if (ProfessorDAO::getInstance()->verificarProfessorCPF($cpfProfessor) == false) {

			$professor = new Professor($cpfProfessor, $idEndereco, $nome, $email, $senha, $primeiroTelefone, 0, $url_foto); 
			
			return ProfessorDAO::getInstance()->adicionarNovoProfessor($professor);
		}
		else
			return false;
    }
   
    
    // Busca um administrador atravéz do CPF
    public function buscarProfessorCPF($cpf) {

    }

    // Altenticar administrador através do CPF
    public function autenticarProfessorCPF($cpf, $senha) {
		return  ProfessorDAO::getInstance()->autenticarProfessorCPF($cpf, $senha);
    }

    // Autenticar adminitrador atravéz do email
    public function autenticarProfessorEmail($email, $senha) {

    }

    // Editar senha do administrador
    public function editarSenhaProfessor($cpf, $novaSenha) {

    }

    // Edita dados do administrador
    public function editarDadosProfessor($cpfProfessor, $nome, $email, $primeiroTelefone, $segundoTelefone) {
 
    }

// Apaga um administrador do banco
    public function deletarProfessor($cpf) {

    }

    // Bloqueia ou desbloqueia um administrador
    public function bloquearDesbloquearProfessor($cpf, $statusBloqueio) {

    }
}
