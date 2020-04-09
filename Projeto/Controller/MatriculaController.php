<?php


require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Matricula.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/MatriculaDAO.php");

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
        return MatriculaDAO::getInstance()->adicionarnovaMatricula($matricula);
    }
    
    
    public function listarMatriculasCurso($idCurso) {
        return MatriculaDAO::getInstance()->listarMatriculasCurso($idCurso);
    }
    
        
    public function listarMatriculasAluno($cpfAluno) {
        return MatriculaDAO::getInstance()->listarMatriculasAluno($cpfAluno);
    }
    
    public function deletarMatricula($idMatricula) {
        return MatriculaDAO::getInstance()->deletarMatricula($idMatricula);
    }
        }
