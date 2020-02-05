<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Controller/MatriculaController.php"); 

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MatriculadoFacade
 *
 * @author Jussara Gomes
 */
class MatriculaFacade {

    private $conexaoPDO;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new MatriculaFacade();
        }
        return self::$instance;
    }
   
    public function adicionarnovaMatricula($idCurso, $cpfAluno, $dataMatricula) {
		return  MatriculadoController::getInstance()->adicionarnovaMatricula($idCurso, $cpfAluno, $dataMatricula);
    }
    
    
    public function listarMatriculasCurso($idCurso) {
		return  MatriculadoController::getInstance()->listarMatriculasCurso($idCurso);
    }
    
        
    public function listarMatriculasAluno($cpfAluno) {
		return  MatriculadoController::getInstance()->listarMatriculasAluno($cpfAluno);
    }
    
    public function deletarMatricula($idMatricula) {
		return  MatriculadoController::getInstance()->deletarMatricula($idMatricula);
    }
        }
