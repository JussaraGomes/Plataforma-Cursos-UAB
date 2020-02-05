<?php

class Plataforma {

    private $idPlataforma;
    private $idEndereco;
    private $nome;
    private $email;
    private $senha;
    private $descricao;
    private $primeiroTelefone;
    private $segundoTelefone;
	private $linkFacebook;
	private $linkInstagram;
	private $linkSite;

    public function __construct($idEndereco, $nome, $email, $senha, $descricao, $primeiroTelefone, $segundoTelefone, $linkFacebook, $linkInstagram, $linkSite) {
        $this->idEndereco = $idEndereco;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->descricao = $descricao;
        $this->primeiroTelefone = $primeiroTelefone;
        $this->segundoTelefone = $segundoTelefone;
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

    public function getSenha() {
        return $this->senha;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getPrimeiroTelefone() {
        return $this->primeiroTelefone;
    }

    public function getSegundoTelefone() {
        return $this->segundoTelefone;
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

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setPrimeiroTelefone($primeiroTelefone) {
        $this->primeiroTelefone = $primeiroTelefone;
    }

    public function setSegundoTelefone($segundoTelefone) {
        $this->segundoTelefone = $segundoTelefone;
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
