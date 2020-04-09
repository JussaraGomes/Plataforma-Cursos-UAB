<?php


require("ConexaoBD.php");
require_once("ConsultasSQL.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Pergunta.php");

class PerguntaDAO {
    
    private $instance;

    public function __construct() {
        $this->conexaoPDO = (new ConexaoBD)->getConexaoPDO();
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PerguntaDAO();
        }
        return self::$instance;
    }
    
    public function popularPergunta($row) {
        $pergunta = new Pergunta($row['Id_Pergunta'], $row['Id_Curso'], $row['Texto_Pergunta'], $row['Data_Pergunta']);
        
        return $pergunta;
    }

  
    public function adicionarPergunta($pergunta) {

        try {
            $sql = Sql::getInstance()->adicionarNovaPergunta_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $pergunta->getIdCurso());
            $stmt->bindParam(2, $pergunta->getTextoPergunta());
            $stmt->bindParam(3, $pergunta->getDataPergunta());

            $stmt->execute();
        } catch (Exception $e) {
            echo "<br> Erro Pergunta_PerguntaDAO (adicionarPergunta)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function listarPerguntasCurso($idCurso) {
        try {
            $sql = Sql::getInstance()->listarPerguntasCurso_SQL();
            
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $idCurso);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                return null;
            }

            $arrayPerguntas = array();

            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $pergunta = $this->popularPergunta($linha);
                $arrayPerguntas[] = $pergunta;
            }

            return $arrayPerguntas;
            
        } catch (Exception $e) {
            echo "<br> Erro PerguntaDAO(listarPerguntaCurso): Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
          
    public function deletarPergunta($idPergunta) {
        try {
            $sql = Sql::getInstance()->deletarPergunta_SQL();
            $p_sql = $ConexaoPDO->prepare($sql);
            
            $p_sql->bindParam(1, $idPergunta);
            
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro PerguntaDAO (deletarPergunta) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    
}
