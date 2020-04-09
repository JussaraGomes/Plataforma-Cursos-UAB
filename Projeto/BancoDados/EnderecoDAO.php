<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Endereco.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/ConexaoBD.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/ConsultasSQL.php");

class EnderecoDAO {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new EnderecoDAO();
        }
        return self::$instance;
    }

    public function popularEndereco($row) {
        $endereco = new Endereco($row['Estado'], $row['Logadouro'], $row['Cidade'], $row['Bairro'], $row['CEP'], $row['Descricao']);
				
		$endereco->setIdEndereco($row['Id_Endereco']);
		
        return $endereco;
    }

    public function adicionarNovoEndereco($endereco) {

        try {
            $sql = ConsultasSQL::getInstance()->adicionarNovoEndereco_SQL();
			
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $endereco->getEstado());
            $stmt->bindParam(2, $endereco->getLogadouro());
            $stmt->bindParam(3, $endereco->getCidade());
            $stmt->bindParam(4, $endereco->getBairro());
            $stmt->bindParam(5, $endereco->getCep());
            $stmt->bindParam(6, $endereco->getDescricao());

            if($stmt->execute())
				return ConexaoDB::getConexaoPDO()->lastInsertId("uab_plataforma.Id_Endereco");
			else
				return -1;

        } catch (Exception $e) {
            echo "<br> Erro EnderecoDAO (adicionarNovoEndereco)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function buscarEndereco($idEndereco) {
        try {
            $sql = ConsultasSQL::getInstance()->buscarEndereco_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $idEndereco);

            $stmt->execute();

            return $this->popularEndereco($stmt->fetch(PDO::FETCH_ASSOC));
			
        } catch (Exception $e) {
            echo "<br> Erro EnderecoDAO (buscarEnderecoCPF) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function editarEndereco($endereco) {
		echo "DAO";
        try {
            $sql = ConsultasSQL::getInstance()->alterarEndereco_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $endereco->getEstado());
            $stmt->bindParam(2, $endereco->getLogadouro());
            $stmt->bindParam(3, $endereco->getCidade());
            $stmt->bindParam(4, $endereco->getBairro());
            $stmt->bindParam(5, $endereco->getCep());
            $stmt->bindParam(6, $endereco->getDescricao());
            $stmt->bindParam(7, $endereco->getIdEndereco());

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
