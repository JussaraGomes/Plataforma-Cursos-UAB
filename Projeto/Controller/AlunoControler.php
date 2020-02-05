<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlunoControler
 *
 * @author Jussara Gomes
 */
class AlunoController {

    private $conexaoPDO;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new AdministradorController();
        }
        return self::$instance;
    }
    
    public function adicionarNovoAluno($cpfAluno, $idEndereco, $nome, $email, $senha, $primeiroTelefone) {
        $aluno = new Aluno($cpfAluno, $idEndereco, $nome, $email, $senha, $primeiroTelefone);    
        return AlunoDAO::getInstance()->adicionarNovoAluno($aluno);
    }

    public function adicionarNovoAluno_($cpfAluno, $idEndereco, $nome, $email, $senha, $primeiroTelefone, $segundoTelefone) {
        $aluno = new Aluno($cpfAluno, $idEndereco, $nome, $email, $senha, $primeiroTelefone);    
        return AlunoDAO::getInstance()->adicionarNovoAluno($aluno);
    }

    public function buscarAlunoCPF($cpf) {
        return AlunoDAO::getInstance()->adicionarNovoAluno($aluno);
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
