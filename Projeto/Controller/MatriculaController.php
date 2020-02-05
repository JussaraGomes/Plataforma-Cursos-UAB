<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MatriculaController
 *
 * @author Jussara Gomes
 */
class MatriculaController {

    private $conexaoPDO;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new MatriculaController();
        }
        return self::$instance;
    }
   
    public function adicionarnovaMatricula($idCurso, $cpfAluno, $dataMatricula) {
        $matricula = new Matricula($idCurso, $cpfAluno, $dataMatricula);
        return MatriculaDAO::getInstance()-->adicionarnovaMatricula($matricula);
    }
    
    
    public function listarMatriculasCurso($idCurso) {
        return MatriculaDAO::getInstance()-->listarMatriculasCurso($idCurso);
    }
    
        
    public function listarMatriculasAluno($cpfAluno) {
        return MatriculaDAO::getInstance()-->listarMatriculasAluno($cpfAluno);
    }
    
    public function deletarMatricula($idMatricula) {
        return MatriculaDAO::getInstance()-->deletarMatricula($idMatricula);
    }
        }
