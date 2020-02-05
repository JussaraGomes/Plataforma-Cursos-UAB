<?php

require("ConexaoBD.php");
require_once("ConsultasSQL.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Model/Curso.php");

class CursoDAO {
  
    private $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new CursoDAO();
        }
        return self::$instance;
    }
    
    public function popularCurso($row) { 
        $curso = new Curso(
            $row['Id_Curso'], $row['Nome'], $row['Descricao'], $row['Nivel_Dificuldade'], $row['Carga_Horaria'], $row['Pre_Requisitos'], $row['Modalidade']);
        return $curso;
    }
    
    // Adiciona novo curso
    public function adicionarNovoCurso($curso) {

        try {
            $sql = Sql::getInstance()->adicionarNovoCurso_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $curso->getNome());
            $stmt->bindParam(2, $curso->getDescricao());
            $stmt->bindParam(3, $curso->getNivelDificuldade());
            $stmt->bindParam(4, $curso->getCargaHoraria());
            $stmt->bindParam(5, $curso->getPreRequisitos());
            $stmt->bindParam(6, $curso->getModalidade());
            $stmt->execute();
        } catch (Exception $e) {
            echo "<br> Erro CursoDAO (adicionarNovoCurso)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function listarCursos() {
        try {
            $sql = Sql::getInstance()->listarCurso_SQL();
            
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
   
    public function buscarCursoId($idCurso) {
        try {
            $sql = Sql::getInstance()->buscarCursoId_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $idCurso);
            $stmt->execute();
            
            return $this->popularCurso($stmt->fetch(PDO::FETCH_ASSOC));
        
            
        } catch (Exception $e) {
            echo "<br> Erro AdministradorDAO (buscarAdministradorCPF) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    
    public function editarDadosCurso($curso) {
        try {
            $sql = Sql::getInstance()->alterarDadosCurso_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $curso->getNome());
            $stmt->bindParam(2, $curso->getDescricao());
            $stmt->bindParam(3, $curso->getNivelDificuladade());
            $stmt->bindParam(4, $curso->getCargaHoraria());
            $stmt->bindParam(5, $curso->getPreRequisitos());
            $stmt->bindParam(6, $curso->getModalidade());
            $stmt->bindParam(7, $curso->getIdCurso());

            $stmt->execute();
        } catch (Excepetion $e) {
            echo "<br> Erro CursoDAO (editarDadosCurso) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function deletarCurso($idCurso) {
        try {
            $sql = Sql::getInstance()->deletarAdministrador_SQL();
            $p_sql = $ConexaoPDO->prepare($sql);
            
            $p_sql->bindParam(1, $idCurso);
            
            return $p_sql->execute();
        
            
        } catch (Exception $e) {
            echo "Erro CursoDAO (deletarCurso) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
}
