<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."Model/Noticia.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/ConexaoBD.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/Projeto/"."BancoDados/ConsultasSQL.php");

class NoticiaDAO {

    private static $instance;

    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new NoticiaDAO();
        }
        return self::$instance;
    }

    public function popularNoticia($row) { 
        $noticia = new Noticia($row['Titulo'], $row['BreveDescricao'], $row['CorpoNoticia'], $row['DataPublicacao'], $row['FotoNoticia']);
				
		$noticia->setIdNoticia($row['Id_Noticia']);

        return $noticia;
    }
	
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 

    // Adiciona uma nova notícia
    public function adicionarNovaNoticia($noticia) {

		
        try {
            $sql = ConsultasSQL::getInstance()->adicionarNoticia_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
		
		echo $sql;

            $stmt->bindParam(1, $noticia->getTitulo());
            $stmt->bindParam(2, $noticia->getBreveDescricao());
            $stmt->bindParam(3, $noticia->getCorpoNoticia());
            $stmt->bindParam(4, $noticia->getDataPublicacao());
            $stmt->bindParam(5, $noticia->getUrlFoto());
			
			return $stmt->execute();

        } catch (Exception $e) {
            echo "<br> Erro NoticiaDAO (adicionarNovaNoticia)- Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
    
	public function verificarNoticiaTitulo($titulo) {
        try {
            $sql = ConsultasSQL::getInstance()->buscarNoticiaTitulo_SQL();			
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			
            $stmt->bindParam(1, $titulo);
            $stmt->execute();
            
			return ($stmt->rowCount() != 0);
			
        } catch (Exception $e) {
            echo "<br> Erro NoticiaDAO (verificarNoticiaNome) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
	
	public function listarNoticias(){
		try{
			$sql = ConsultasSQL::getInstance()->listarNoticias_SQL();
			$stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			
			$stmt->execute();
			
			$noticias = array();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				$noticias[] = $this->popularNoticia($row);
			}
		  
			return $noticias;
		} 
		catch (Exception $e){	
            echo "<br> Erro NoticiaDAO (listarNoticias) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
		}
	}
	
    public function buscarNoticiaId($idNoticia) {
        try {
            $sql = ConsultasSQL::getInstance()->buscarNoticiaId_SQL();
            $stmt = ConexaoDB::getConexaoPDO()->prepare($sql);
			
            $stmt->bindParam(1, $idNoticia);
            
			$stmt->execute();
            
			return self::popularNoticia($stmt->fetch(PDO::FETCH_ASSOC));
			
        } catch (Exception $e) {
            echo "<br> Erro NoticiaDAO (buscarNoticiaId) - Código: " . $e->getCode() . " Mensagem: " . $e->getMessage();
        }
    }
}

?>
