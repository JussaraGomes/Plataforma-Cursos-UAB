<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PlataformaController
 *
 * @author Jussara Gomes
 */
class PlataformaController {

    private $conexaoPDO;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PlataformaController();
        }
        return self::$instance;
    }
    
    public function listarPlataformas() {

    }
    
    
    public function buscarPlataforma($idPlataforma) {

    }

    public function editarDadosPlataforma($idPlataforma,$nome, $email, $descricao, $primeiroTelefone, $segundoTelefone) {

    }
    
    public function adicionarPlataforma($idEndereco,$nome, $email, $descricao, $primeiroTelefone, $segundoTelefone) {

    }
    
    public function deletarPlataforma($idPlataforma) {

    }
}
