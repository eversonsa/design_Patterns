<?php 
	class Book {

		private $autor;
		private $titulo;

		public function __construct($autor, $titulo){
			$this->autor = $autor;
			$this->titulo = $titulo;
		}
		public function getAutor(){
			return $this->autor;
		}
		public function setAutor($autor){
			$this->autor = $autor;
		}
		public function getTitulo(){
			return $this->titulo;
		}
		public function setTitulo($tirulo){
			$this->titulo = $titulo;
		}
	}

	
	class BookList
	{	
		private $books;
		private $currentIndex;
		
		function __construct(){
			$this->currentIndex = 0;
		}

		public function adicionarLivro(Book $book){
			$this->books[] = $book;
		}
		public function contarLivros(){
			return count($this->books);
		}
		public function removerLivro(Book $book){
			foreach ($this->books as $key => $value) {
				if (($value->getTitulo().$value->getAutor()) == ($book->getTitulo().$book->getAutor())) {
					unset($this->books[$key]);
				}
			}

			$this->books = array_values($this->books);
		}
		public function current(){
			return $this->books[$this->currentIndex];
		}
		public function next(){
			return $this->currentIndex++;
		}
		public function key(){
			return $this->currentIndex;
		}
		public function reset(){
			return $this->currentIndex = 0;
		}
		public function valid(){
			if(isset($this->books[$this->currentIndex])){
				return true;
			}else {
				return false;
			}
		}
	}


