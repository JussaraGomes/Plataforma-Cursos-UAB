<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Curso.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/CursoDAO.php");

/**
 * Description of CursoController
 *
 * @author Jussara Gomes
 */
class CursoController {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new CursoController();
        }
        return self::$instance;
    }
    
    public function adicionarNovoCurso($nome, $descricao, $nivelDificuldade, $cargaHoraria, $preRequisitos, $modalidade, $urlFoto) {
		if (CursoDAO::getInstance()->verificarCursoNome($nome) == false) {
			$curso = new Curso($nome, $descricao, $nivelDificuldade, $cargaHoraria, $preRequisitos, $modalidade, $urlFoto);
			return CursoDAO::getInstance()->adicionarNovoCurso($curso);
		}
		else
			return false;
    }

    public function listarCursos() {
        return CursoDAO::getInstance()->listarCursos();
    }
   
    public function buscarCursoId($idCurso) {
        return CursoDAO::getInstance()->buscarCursoId($idCurso);
    }
    
    public function editarDadosCurso($idCurso, $nome, $descricao, $nivelDificuldade, $cargaHoraria, $preRequisitos, $modalidade, $urlFoto) {
        $curso = new Curso($nome, $descricao, $nivelDificuldade, $cargaHoraria, $preRequisitos, $modalidade, $urlFoto);
        $curso-->setIdCurso($idCurso);
        return CursoDAO::getInstance()->editarDadosCurso($curso);
    }

    public function deletarCurso($idCurso) {
        return CursoDAO::getInstance()->deletarCurso($idCurso);
    }
}
