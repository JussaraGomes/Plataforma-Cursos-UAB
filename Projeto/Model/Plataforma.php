<?php

class Plataforma {

    private $idPlataforma;
    private $idEndereco;
    private $nome;
    private $email;
    private $descricao;
    private $primeiroTelefone;
	private $linkFacebook;
	private $linkInstagram;
	private $linkSite;
	private $comoFunciona;

    public function __construct($idEndereco, $nome, $email, $descricao, $comoFunciona, $primeiroTelefone, $linkFacebook, $linkInstagram, $linkSite) {
        $this->idEndereco = $idEndereco;
        $this->nome = $nome;
        $this->email = $email;
        $this->descricao = $descricao;
        $this->comoFunciona = $comoFunciona;
        $this->primeiroTelefone = $primeiroTelefone;
        $this->linkFacebook = $linkFacebook;
        $this->linkInstagram = $linkInstagram;
        $this->linkSite = $linkSite;
		
    }

    // Get's
	public function getIdPlataforma(){
		return $this->idPlataforma;
	}
	
    public function getIdEndereco() {
        return $this->idEndereco;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDescricao() {
        return $this->descricao;
    }
	
    public function getComoFunciona() {
        return $this->comoFunciona;
    }

    public function getPrimeiroTelefone() {
        return $this->primeiroTelefone;
    }

    public function getLinkFacebook() {
        return $this->linkFacebook;
    }
	
    public function getLinkInstagram() {
        return $this->linkInstagram;
    }
	
    public function getLinkSite() {
        return $this->linkSite;
    }
	
    // Set's
	public function setIdPlataforma($idPlataforma){
		$this->idPlataforma = $idPlataforma;
	}
	
	public function setIdEndereco($idEndereco){
		$this->idEndereco = $idEndereco;
	}
	
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setComoFunciona($comoFunciona) {
        $this->comoFunciona = $comoFunciona;
    }
	
    public function setPrimeiroTelefone($primeiroTelefone) {
        $this->primeiroTelefone = $primeiroTelefone;
    }

    public function setLinkFacebook($linkFacebook) {
        $this->linkFacebook = $linkFacebook;
    }
	
    public function setLinkInstagram($linkInstagram) {
        $this->linkInstagram = $linkInstagram;
    }
	
    public function setLinkSite($linkSite) {
        $this->linkSite = $linkSite;
    }
}

?>
