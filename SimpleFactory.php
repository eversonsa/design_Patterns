<?php
/*
Design Patterns Simple Factory ele diz que deve haver uma classe e atraves dela criar objetos de outras sem precisa instanciar, de forma bem resumida,segue um exemplo básico

Feito por: Everson Souza
Email: eversonsa2014@gmail.com

*/
// a classe Facebook será responsavel por criar todas as instancias de nosso exewplo
class Facebook{
	public function createPost(){
		return new Post();
	}
	public function createNewMessage(){
		return new Message();
	}
}

class Post{
	private $autor;

	public function getAutor(){
		return $this->autor;
	}
	public function setAutor($autor){
		$this->autor = $autor;
	}
}
class Message{
	private $message;
	
	public function getMessage(){
		return $this->message;
	}
	public function setMessage($message){
		$this->message = $message;
	}
}

$fb = new Facebook();
// nao precisei criar a instancia da classe POST e Message
$post = $fb->createPost();
$post->setAutor("everson");

$msg = $fb->createNewMessage();
$msg->setMessage("Facebook tem milhares de acessos por dia");

echo "Autor: ".$post->getAutor()."<br>";
echo "Messagem: ".$msg->getMessage()."<hr>";