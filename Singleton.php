<?php
/*
Design Patterns Singlenton ele diz que so deve haver uma instancia na hora de se criar um objeto
segue um exemplo básico

Feito por: Everson Souza
Email: eversonsa2014@gmail.com

*/
	 class Pessoa{

	 	private $nome;

	 	public static function getIntance(){
	 		static $instancia = null;

	 		if($instancia === null){
	 			$instancia = new pessoa();
	 		}

	 		return $instancia;
	 	}

	 	private function __construct(){

	 	}

	 	public function getNome(){
	 		return $this->nome;
	 	}
	 	public function setNome($nome){
	 		 $this->nome = $nome;
	 	}
	 }

	 // $nome = new Pessoa(); isso da erro pois alem de protegermos a nossa classe no construtor como privado, vai de // encontro com o especificado pela boa pratica
	 $n = Pessoa::getIntance();
	 $n->setNome("everson");
	 echo "Meu nome eh ".$n->getNome();

 ?>