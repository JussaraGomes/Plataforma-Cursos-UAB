<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PerguntaController
 *
 * @author Jussara Gomes
 */
class PerguntaController {

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
 
    public function listarPerguntasCurso($idCurso) {
     
    }
          
    public function deletarPergunta($idPergunta) {
  
    }
      
}
