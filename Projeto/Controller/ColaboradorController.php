<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Colaborador.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/ColaboradorDAO.php");

/**
 * Description of AlunoControler
 *
 * @author Jussara Gomes
 */
class ColaboradorController {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new ColaboradorController();
        }
        return self::$instance;
    }
    
    public function adicionarNovoColaborador($CpfColaborador, $idEndereco, $nome, $email, $primeiro_Telefone, $funcao, $breveDescricao, $fotoColaborador)  {
		if (ColaboradorDAO::getInstance()->verificarColaboradorCPF($CpfColaborador) == false) {
			
			$colaborador = new Colaborador($CpfColaborador, $idEndereco, $nome, $email, $primeiro_Telefone, $funcao, $breveDescricao, $fotoColaborador);    

			return ColaboradorDAO::getInstance()->adicionarNovoColaborador($colaborador);
			
		}
		else
			return false;
    }


    public function buscarColaboradorCPF($cpf) {
        return ColaboradorDAO::getInstance()->buscarColaboradorCPF($cpf);
    }
	
	
    public function listarColaboradores() {
        return ColaboradorDAO::getInstance()->listarColaboradores();
    }
}

?>