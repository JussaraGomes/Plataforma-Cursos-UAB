<?php

require("ConexaoBD.php");
require_once("ConsultasSQL.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projetos/"."/Projeto_Plataforma/"."Model/Endereco.php");

class EnderecoDAO {

    private $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new EnderecoDAO();
        }
        return self::$instance;
    }

    public function popularEndereco($row) {
        $endereco = new Endereco(
                $row['Id_Endereco'], $row['Estado'], $row['Cidade'], $row['Bairro'], $row['CEP'], $row['Descricao']);
        return $endereco;
    }

    public function adicionarNovoEndereco($endereco) {

        try {
            $sql = Sql::getInstance()->adicionarNovoEndereco_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $endereco->getEstado());
            $stmt->bindParam(2, $endereco->getCidade());
            $stmt->bindParam(3, $endereco->getBairro());
            $stmt->bindParam(4, $endereco->getCep());
            $stmt->bindParam(5, $endereco->getDescricao());

            return $stmt->execute();
        } catch (Exception $e) {
            echo "<br> Erro EnderecoDAO (adicionarNovoEndereco)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function buscarEndereco($idEndereco) {
        try {
            $sql = Sql::getInstance()->buscarEndereco_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $idEndereco);

            $stmt->execute();

            return $this->popularEndereco($stmt->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            echo "<br> Erro EnderecoDAO (buscarEnderecoCPF) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function editarEndereco($endereco) {
        try {
            $sql = Sql::getInstance()->alterarDadosAdministrador_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $endereco->getEstado());
            $stmt->bindParam(2, $endereco->getCidade());
            $stmt->bindParam(3, $endereco->getBairro());
            $stmt->bindParam(4, $endereco->getCep());
            $stmt->bindParam(5, $endereco->getDescricao());
            $stmt->bindParam(6, $endereco->getIdEndereco());

            return $stmt->execute();
        } catch (Excepetion $e) {
            echo "<br> Erro EnderecoDAO (editarEndereco) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function deletarEndereco($idEndereco) {
        try {
            $sql = Sql::getInstance()->deletarAdministrador_SQL();
            $p_sql = $ConexaoPDO->prepare($sql);

            $p_sql->bindParam(1, $idEndereco);

            return $p_sql->execute();
            
        } catch (Exception $e) {
            echo "Erro EnderecoDAO (deletarEndereco) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

}
