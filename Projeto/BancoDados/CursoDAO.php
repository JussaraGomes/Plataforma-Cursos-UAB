<?php

require_once("ConsultasSQL.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Curso.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/ConexaoBD.php");

class CursoDAO {
  
    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new CursoDAO();
        }
        return self::$instance;
    }
    
    public function popularCurso($row) { 
        $curso = new Curso($row['Nome'], $row['Descricao'], $row['Nivel_Dificuldade'], $row['Carga_Horaria'], $row['Pre_Requisitos'], $row['Modalidade'], $row['FotoCurso']);
				
		$curso->setIdCurso($row['Id_Curso']);

        return $curso;
    }
    
    // Adiciona novo curso
    public function adicionarNovoCurso($curso) {

        try {
            $sql = ConsultasSQL::getInstance()->adicionarNovoCurso_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $curso->getNome());
            $stmt->bindParam(2, $curso->getDescricao());
            $stmt->bindParam(3, $curso->getNivelDificuldade());
            $stmt->bindParam(4, $curso->getCargaHoraria());
            $stmt->bindParam(5, $curso->getPreRequisitos());
            $stmt->bindParam(6, $curso->getModalidade());
            $stmt->bindParam(7, $curso->getFoto());
			
            return $stmt->execute();
			
        } catch (Exception $e) {
            echo "<br> Erro CursoDAO (adicionarNovoCurso)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function listarCursos() {
        try {
            $sql = ConsultasSQL::getInstance()->listarCurso_SQL();
            
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                return null;
            }

            $arrayCursos = array();

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $curso = $this->popularCurso($linha);
                $arrayCursos[] = $curso;
            }

            return $arrayCursos;
            
        } catch (Exception $e) {
            echo "<br> Erro CursoDAO(listarCursos): Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
   
    public function verificarCursoNome($nomeCurso) {
        try {
            $sql = ConsultasSQL::getInstance()->buscarCursoNome_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $nomeCurso);
            $stmt->execute();
            
            return ($stmt->rowCount() != 0);
            
        } catch (Exception $e) {
            echo "<br> Erro CursoDAO (verificarCursoNome) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
	
    public function buscarCursoId($idCurso) {
        try {
            $sql = ConsultasSQL::getInstance()->buscarCursoId_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $idCurso);
            $stmt->execute();
            
            return $this->popularCurso($stmt->fetch(PDO::FETCH_ASSOC));
        
            
        } catch (Exception $e) {
            echo "<br> Erro CursoDAO (buscarCursoId) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    
    public function editarDadosCurso($curso) {
        try {
            $sql = ConsultasSQL::getInstance()->alterarDadosCurso_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $curso->getNome());
            $stmt->bindParam(2, $curso->getDescricao());
            $stmt->bindParam(3, $curso->getNivelDificuladade());
            $stmt->bindParam(4, $curso->getCargaHoraria());
            $stmt->bindParam(5, $curso->getPreRequisitos());
            $stmt->bindParam(6, $curso->getModalidade());
            $stmt->bindParam(7, $curso->getFoto());
            $stmt->bindParam(8, $curso->getIdCurso());

            $stmt->execute();
        } catch (Excepetion $e) {
            echo "<br> Erro CursoDAO (editarDadosCurso) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function deletarCurso($idCurso) {
        try {
            $sql = ConsultasSQL::getInstance()->deletarAdministrador_SQL();
            $p_sql = $ConexaoPDO->prepare($sql);
            
            $p_sql->bindParam(1, $idCurso);
            
            return $p_sql->execute();
        
            
        } catch (Exception $e) {
            echo "Erro CursoDAO (deletarCurso) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
}
