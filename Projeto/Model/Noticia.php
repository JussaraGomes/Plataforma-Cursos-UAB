<?php

class Noticia {

    private $idNoticia;
    private $titulo;
    private $breveDescricao;
    private $corpoNoticia;
    private $dataPublicacao;
    private $urlFoto;

    public function __construct($titulo, $breveDescricao, $corpoNoticia, $dataPublicacao, $urlFoto) {
        $this->titulo = $titulo;
        $this->breveDescricao = $breveDescricao;
        $this->corpoNoticia = $corpoNoticia;
        $this->dataPublicacao = $dataPublicacao;
        $this->urlFoto = $urlFoto;
    }

    // Get's	
    public function getTitulo() {
        return $this->titulo;
    }

    public function getBreveDescricao() {
        return $this->breveDescricao;
    }

    public function getCorpoNoticia() {
        return $this->corpoNoticia;
    }

    public function getDataPublicacao() {
        return $this->dataPublicacao;
    }

    public function getIdNoticia() {
        return $this->idNoticia;
    }
	
    public function getUrlFoto() {
        return $this->urlFoto;
    }

    // Set's	

    public function setTitulo($titulo) {
        return $this->titulo = $titulo;
    }

    public function setBreveDescricao($breveDescricao) {
        $this->breveDescricao = $breveDescricao;
    }

    public function setCorpoNoticia($corpoNoticia) {
        $this->corpoNoticia = $corpoNoticia;
    }

    public function setDataPublicacao($dataPublicacao) {
        $this->dataPublicacao = $dataPublicacao;
    }

    public function setIdNoticia($idNoticia) {
        $this->idNoticia = $idNoticia;
    }
	
    public function setUrlFoto($urlFoto) {
        $this->urlFoto = $urlFoto;
    }

}

?>
