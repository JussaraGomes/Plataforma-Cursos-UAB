<?php

class ConexaoDB {

	private static $pdo;

	public function __construct() {

	}

	public static function getConexaoPDO(){

		if(!isset(self::$pdo)){

			$servidor = "localhost";
			$usuario = "root";
			$senha ="";
			$dbname = "UAB_Plataforma";

			try{
				self::$pdo = new PDO("mysql:host={$servidor}; dbname={$dbname}",$usuario, $senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
			} 
			catch(PDOException $erro){
				echo "Falha na conexão com o banco: ". $erro->getMessage();
				exit();
			}
		}
		return self::$pdo;
	}
	
	public static function closeConexaoPDO(){
		self::$pdo = null;
	}
}
?>
