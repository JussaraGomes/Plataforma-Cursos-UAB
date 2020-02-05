<?php

require("ConexaoBD.php");
require_once("ConsultasSQL.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Model/Plataforma.php");

class PlataformaDAO {

    private $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PlataformaDAO();
        }
        return self::$instance;
    }
    
    public function popularPlataforma($row) {
        $administrador = new Administrador(
                $row['Id_Plataforma'], $row['Id_Endereco'], $row['Nome'], $row['Email'], $row['Descricao'], $row['Primeiro_Telefone'], $row['Segundo_Telefone']);
        return $administrador;
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
            $sql = Sql::getInstance()->buscarPlataformaId_SQL();
            
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
            
            $stmt->bindParam(1, $idPlataforma->getIdPlataforma());
            
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
            $sql = Sql::getInstance()->alterarDadosAdministrador_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $plataforma->getNome());
            $stmt->bindParam(2, $plataforma->getEmail());
            $stmt->bindParam(3, $plataforma->getDescricao());
            $stmt->bindParam(4, $plataforma->getPrimeiroTelefone());
            $stmt->bindParam(5, $plataforma->getSegundoTelefone());
            $stmt->bindParam(6, $plataforma->getIdPlataforma());
            $stmt->bindParam(7, $plataforma->getLinkFacebook());
            $stmt->bindParam(8, $plataforma->getLinkInstagram());
            $stmt->bindParam(9, $plataforma->getLinkSite());

            $stmt->execute();
        } catch (Excepetion $e) {
            echo "<br> Erro PlataformaDAO (editarDadosPlataforma) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    
    public function adicionarPlataforma($plataforma) {

        try {
            // Só permite a inserção se não houver plataforma cadastrada no banco
            if ($this->listarPlataformas() == null) {
                $sql = Sql::getInstance()->adicionarPlataforma_SQL();
                $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

                $stmt->bindParam(1, $plataforma->getIdEndereco());
                $stmt->bindParam(2, $plataforma->getNome());
                $stmt->bindParam(3, $plataforma->getEmail());
                $stmt->bindParam(4, $plataforma->getDescricao());
                $stmt->bindParam(5, $plataforma->getPrimeiroTelefone());
                $stmt->bindParam(6, $plataforma->getSegundoTelefone());
                $stmt->bindParam(7, $plataforma->getLinkFacebook());
                $stmt->bindParam(8, $plataforma->getLinkInstagram());
                $stmt->bindParam(9, $plataforma->getLinkSite());

                $stmt->execute();
            }
            else {
                echo "<br> Erro PlataformaDAO (adicionarPlataforma)- Código: Não é permitido duas instâncias da plataforma no banco.";
            }
            
        } catch (Exception $e) {
            echo "<br> Erro PlataformaDAO (adicionarPlataforma)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    
    public function deletarPlataforma($idPlataforma) {
        try {
            $sql = Sql::getInstance()->deletarPlataforma_SQL();
            $p_sql = $ConexaoPDO->prepare($sql);
            
            $p_sql->bindParam(1, $idPlataforma);
            
            return $p_sql->execute();
            
        } catch (Exception $e) {
            echo "Erro PlataformaDAO (deletarPlataforma) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

}
