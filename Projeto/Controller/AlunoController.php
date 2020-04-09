<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Aluno.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/AlunoDAO.php");

/**
 * Description of AlunoControler
 *
 * @author Jussara Gomes
 */
class AlunoController {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new AlunoController();
        }
        return self::$instance;
    }
    
    public function adicionarNovoAluno($cpfAluno, $idEndereco, $nome, $email, $senha, $primeiroTelefone) {
		if (AlunoDAO::getInstance()->verificarAlunoCPF($cpf) == false) {
			$aluno = new Aluno($cpfAluno, $idEndereco, $nome, $email, $senha, $primeiroTelefone, 0);    
			return AlunoDAO::getInstance()->adicionarNovoAluno($aluno);
		}
		else
			return false;
    }


    public function buscarAlunoCPF($cpf) {
        return AlunoDAO::getInstance()->buscarAlunoCPF($cpf);
    }

    public function autenticarAlunoCPF($cpf, $senha) {
        return AlunoDAO::getInstance()->autenticarAlunoCPF($cpf, $senha);
    }

    public function autenticarAlunoEmail($email, $senha) {
        return AlunoDAO::getInstance()->autenticarAlunoEmail($email, $senha);
    }

    public function editarSenhaAluno($cpf, $novaSenha) {
        return AlunoDAO::getInstance()->editarSenhaAluno($cpf, $novaSenha);
    }

    public function editarDadosAluno($cpf, $nome, $email, $primeiroTelefone, $segundoTelefone) {
        return AlunoDAO::getInstance()->editarDadosAluno($cpf, $nome, $email, $primeiroTelefone, $segundoTelefone);
    }

    public function deletarAluno($cpf) {
        return AlunoDAO::getInstance()->deletarAluno($cpf);
    }

    public function bloquearDesbloquearAluno($cpf, $statusBloqueio) {
        return AlunoDAO::getInstance()->bloquearDesbloquearAluno($cpf, $statusBloqueio);
    }

}

?>