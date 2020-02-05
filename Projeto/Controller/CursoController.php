<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CursoController
 *
 * @author Jussara Gomes
 */
class CursoController {

    private $conexaoPDO;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new CursoController();
        }
        return self::$instance;
    }
    
    public function adicionarNovoCurso($nome, $descricao, $nivelDificuldade, $cargaHoraria, $preRequisitos, $modalidade) {
        $curso = new Curso($nome, $descricao, $nivelDificuldade, $cargaHoraria, $preRequisitos, $modalidade);
        return CursoDAO::getInstance()-->adicionarNovoCurso($curso);
    }

    public function listarCursos() {
        return CursoDAO::getInstance()-->listarCursos();
    }
   
    public function buscarCursoId($idCurso) {
        return CursoDAO::getInstance()-->buscarCursoId($idCurso);
    }
    
    public function editarDadosCurso($idCurso, $nome, $descricao, $nivelDificuldade, $cargaHoraria, $preRequisitos, $modalidade) {
        $curso = new Curso($nome, $descricao, $nivelDificuldade, $cargaHoraria, $preRequisitos, $modalidade);
        $curso-->setIdCurso($idCurso);
        return CursoDAO::getInstance()-->editarDadosCurso($curso);
    }

    public function deletarCurso($idCurso) {
        return CursoDAO::getInstance()-->deletarCurso($idCurso);
    }
}
