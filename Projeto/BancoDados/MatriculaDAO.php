<?php

require("ConexaoBD.php");
require_once("ConsultasSQL.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Model/Matricula.php");

class MatriculaDAO {
    
    
    private $instance;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new MatriculaDAO();
        }
        return self::$instance;
    }
    
    public function popularMatricula($row) {
        $matricula = new Matricula($row['Id_Matricula'], $row['Id_Curso'], $row['Data_Matricula'], $row['Id_Modulo']);
        
        return $matricula;
    }

    public function adicionarnovaMatricula($matricula) {

        try {
            $sql = Sql::getInstance()->adicionarNovoAdministrador_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            $stmt->bindParam(1, $matricula->getIdCurso());
            $stmt->bindParam(2, $matricula->getCpfAluno());
            $stmt->bindParam(3, $matricula->getDataMatricula());
            
            $stmt->execute();
        
            
        } catch (Exception $e) {
            echo "<br> Erro MatriculaDAO (adicionarNovaMatricula)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    
    
    public function listarMatriculasCurso($idCurso) {
        try {
            $sql = Sql::getInstance()->listarMatriculasCurso_SQL();
            
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $idCurso);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                return null;
            }

            $arrayMatriculas = array();

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $matricula = $this->popularMatricula($linha);
                $arrayMatriculas[] = $matricula;
            }

            return $arrayMatriculas;
            
        } catch (Exception $e) {
            echo "<br> Erro MatriculaDAO(listarMatriculasCurso): Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    
        
    public function listarMatriculasAluno($cpfAluno) {
        try {
            $sql = Sql::getInstance()->listarMatriculasAluno_SQL();
            
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $cpfAluno);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                return null;
            }

            $arrayMatriculas = array();

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $matricula = $this->popularMatricula($linha);
                $arrayMatriculas[] = $matricula;
            }

            return $arrayMatriculas;
            
        } catch (Exception $e) {
            echo "<br> Erro MatriculaDAO(listarMatriculasAluno): Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    
    public function deletarMatricula($idMatricula) {
        try {
            $sql = Sql::getInstance()->deletarMatricula_SQL();
            $p_sql = $ConexaoPDO->prepare($sql);
            $p_sql->bindParam(1, $idMatricula);
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro MatriculaDAO (deletarMatricula) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
}
