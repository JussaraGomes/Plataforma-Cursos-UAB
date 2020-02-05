<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProfessorConteoller
 *
 * @author Jussara Gomes
 */
class ProfessorConteoller {

    private $conexaoPDO;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new ProfessorConteoller();
        }
        return self::$instance;
    }
    
    // Adiciona um novo administrador com um telefone
    public function adicionarNovoProfessor($cpfProfessor, $idEndereco, $nome, $email, $senha, $primeiroTelefone) {

    }
   
    // Adiciona um novo administrador com um telefone
    public function adicionarNovoProfessor_($cpfProfessor, $idEndereco, $nome, $email, $senha, $primeiroTelefone, $segundoTelefone) {

    }
    
    // Busca um administrador atravéz do CPF
    public function buscarProfessorCPF($cpf) {

    }

    // Altenticar administrador através do CPF
    public function autenticarProfessorCPF($cpf, $senha) {

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
