<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RespostasController
 *
 * @author Jussara Gomes
 */
class RespostasController {

    private $conexaoPDO;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new RespostasController();
        }
        return self::$instance;
    }
    

    public function adicionarNovaResposta($idPergunta, $textoPergunta, $dataPergunta) {

    }

    public function listarRespostasPergunta($idPergunta) {

    }
        
    public function deletarResposta($idResposta) {

    }
    
}
