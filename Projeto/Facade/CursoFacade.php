<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Controller/CursoController.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CursoFacade
 *
 * @author Jussara Gomes
 */
class CursoFacade {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new CursoFacade();
        }
        return self::$instance;
    }
    
    public function adicionarNovoCurso($nome, $descricao, $nivelDificuldade, $cargaHoraria, $preRequisitos, $modalidade, $urlFoto) {
		return  CursoController::getInstance()->adicionarNovoCurso($nome, $descricao, $nivelDificuldade, $cargaHoraria, $preRequisitos, $modalidade, $urlFoto);
    }

    public function listarCursos() {
		return  CursoController::getInstance()->listarCursos();
    }
   
    public function buscarCursoId($idCurso) {
		return  CursoController::getInstance()->buscarCursoId($idCurso);
    }
    
    public function editarDadosCurso($idCurso, $nome, $descricao, $nivelDificuldade, $cargaHoraria, $preRequisitos, $modalidade, $urlFoto) {
		return  CursoController::getInstance()->editarDadosCurso($idCurso, $nome, $descricao, $nivelDificuldade, $cargaHoraria, $preRequisitos, $modalidade, $urlFoto);
    }

    public function deletarCurso($idCurso) {
		return  CursoController::getInstance()->deletarCurso($idCurso);
    }
}
