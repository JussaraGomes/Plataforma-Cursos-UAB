<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Controller/AlunoController.php");

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
class AlunoFacade {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new AlunoFacade();
        }
        return self::$instance;
    }
    
    
    // Adiciona um novo aluno com um telefone
    public function adicionarNovoAluno($cpfAluno, $idEndereco, $nome, $email, $senha, $primeiroTelefone) {
		return  AlunoController::getInstance()->adicionarNovoAluno($cpfAluno, $idEndereco, $nome, $email, $senha, $primeiroTelefone);
    }

    // Adiciona um novo aluno com dois telefones
    public function adicionarNovoAluno_($cpfAluno, $idEndereco, $nome, $email, $senha, $primeiroTelefone, $segundoTelefone) {
		return  AlunoController::getInstance()->adicionarNovoAluno_($cpfAluno, $idEndereco, $nome, $email, $senha, $primeiroTelefone, $segundoTelefone);
    }

    public function buscarAlunoCPF($cpf) {
		return  AlunoController::getInstance()->buscarAlunoCPF($cpf);
    }

    // Altenticar aluno através do CPF
    public function autenticarAlunoCPF($cpf, $senha) {
		return  AlunoController::getInstance()->autenticarAlunoCPF($cpf, $senha);
    }

    // Autenticar adminitrador atravéz do email
    public function autenticarAlunoEmail($email, $senha) {
		return  AlunoController::getInstance()->autenticarAlunoEmail($email, $senha);
    }

    // Editar senha do administrador
    public function editarSenhaAluno($cpf, $novaSenha) {
		return  AlunoController::getInstance()->editarSenhaAluno($cpf, $novaSenha);
    }

    // Edita dados do administrador
    public function editarDadosAluno($cpf, $nome, $email, $primeiroTelefone, $segundoTelefone) {
		return  AlunoController::getInstance()->editarDadosAluno($cpf, $nome, $email, $primeiroTelefone, $segundoTelefone);
    }

    public function deletarAluno($cpf) {
		return  AlunoController::getInstance()->deletarAluno($cpf);
    }

    public function bloquearDesbloquearAluno($cpf, $statusBloqueio) {
		return  AlunoController::getInstance()->bloquearDesbloquearAluno($cpf, $statusBloqueio);

    }

}
