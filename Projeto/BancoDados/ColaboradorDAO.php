<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Colaborador.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/ConexaoBD.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/ConsultasSQL.php");

class ColaboradorDAO {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new ColaboradorDAO();
        }
        return self::$instance;
    }

    public function popularColaborador($row) { 
        $colaborador = new Colaborador($row['CPF_Colaborador'], $row['Id_Endereco'], $row['Nome'], $row['Email'], $row['Primeiro_Telefone'], $row['Funcao'], $row['BreveDescricao'], $row['FotoColaborador']);

        return $colaborador;
    }
	
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    // Adiciona um novo administrador com um telefone
    public function adicionarNovoColaborador($colaborador) {

        try {
            $sql = ConsultasSQL::getInstance()->adicionarNovoColaborador_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);

            $stmt->bindParam(1, $colaborador->getCpfColaborador());
            $stmt->bindParam(2, $colaborador->getIdEndereco());
            $stmt->bindParam(3, $colaborador->getNome());
            $stmt->bindParam(4, $colaborador->getEmail());
            $stmt->bindParam(5, $colaborador->getPrimeiroTelefone());
            $stmt->bindParam(6, $colaborador->getFuncao());
            $stmt->bindParam(7, $colaborador->getBreveDescricao());
            $stmt->bindParam(8, $colaborador->getFoto());
			
			return $stmt->execute();

        } catch (Exception $e) {
            echo "<br> Erro ColaboradorDAO (adicionarNovoColaborador)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    
	public function verificarColaboradorCPF($cpf) {
        try {
            $sql = ConsultasSQL::getInstance()->buscarColaborador_SQL();			
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			
            $stmt->bindParam(1, $cpf);
            $stmt->execute();
            
			return ($stmt->rowCount() != 0);
			
        } catch (Exception $e) {
            echo "<br> Erro ColaboradorDAO (verificarColaboradorCPF) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }


    public function buscarColaboradorCPF($cpf) {
        try {
            $sql = ConsultasSQL::getInstance()->buscarColaborador_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			
            $stmt->bindParam(1, $cpf);
            
			$stmt->execute();
            
			return self::popularColaborador($stmt->fetch(PDO::FETCH_ASSOC));
			
        } catch (Exception $e) {
            echo "<br> Erro ColaboradorDAO (buscarColaboradorCPF) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }

    public function listarColaboradores() {
        try{
			$sql = ConsultasSQL::getInstance()->listarColaboradores_SQL();
			$stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			
			$stmt->execute();
			
			$colaboradores = array();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				$colaboradores[] = $this->popularColaborador($row);
			}
		  
			return $colaboradores;
		}  
		catch (Exception $e) {
            echo "<br> Erro ColaboradorDAO (listarColaboradores): Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    
}

?>
