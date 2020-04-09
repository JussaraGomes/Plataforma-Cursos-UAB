<?php


require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Plataforma.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/ConexaoBD.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/ConsultasSQL.php");

class PlataformaDAO {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PlataformaDAO();
        }
        return self::$instance;
    }
    
    public function popularPlataforma($row) {
        $plataforma = new plataforma($row['Id_Endereco'], $row['Nome'], $row['Email'], $row['Descricao'], $row['ComoFunciona'], $row['Primeiro_Telefone'], $row['Link_Facebook'], $row['Link_Instagram'], $row['Link_Site']);
		
		$plataforma->setIdPlataforma($row['Id_Plataforma']);

        return $plataforma;
    }

    
    public function listarPlataformas() {
        try {
            $sql = Sql::getInstance()->listarPlataforma_SQL();
            
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                return null;
            }

            return $this->popularPlataforma($stmt->fetch(PDO::FETCH_ASSOC));
            
        } catch (Exception $e) {
            echo "<br> Erro PlataformaDAO(listarPlataformas): Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    
    
    public function buscarPlataforma($idPlataforma) {
        try {
            $sql = ConsultasSQL::getInstance()->buscarPlataformaId_SQL();
            
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $idPlataforma);
            
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                return null;
            }

            return $this->popularPlataforma($stmt->fetch(PDO::FETCH_ASSOC));
            
        } catch (Exception $e) {
            echo "<br> Erro PlataformaDAO(buscarPlataforma): Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function editarDadosPlataforma($plataforma) {
        try {
            $sql = ConsultasSQL::getInstance()->alterarDadosPlataforma_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $plataforma->getNome());
            $stmt->bindParam(2, $plataforma->getEmail());
            $stmt->bindParam(3, $plataforma->getDescricao());
            $stmt->bindParam(4, $plataforma->getComoFunciona());
            $stmt->bindParam(5, $plataforma->getPrimeiroTelefone());
            $stmt->bindParam(6, $plataforma->getLinkFacebook());
            $stmt->bindParam(7, $plataforma->getLinkInstagram());
            $stmt->bindParam(8, $plataforma->getLinkSite());
            $stmt->bindParam(9, $plataforma->getIdPlataforma());
			
            return $stmt->execute();
			
        } catch (Excepetion $e) {
            echo "<br> Erro PlataformaDAO (editarDadosPlataforma) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    

}

?>