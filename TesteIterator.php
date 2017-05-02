<?php
require'iterator.php';

$livro1 = new Book('everson', 'chico brito peçanha');
$livro2 = new Book('urra', 'ai mente');
$livro3 = new Book('pai degua', 'tome chibata');

$bookList = new BookList();
$bookList->adicionarLivro($livro1);
$bookList->adicionarLivro($livro2);
$bookList->adicionarLivro($livro3);

while ($bookList->valid()) {
	$book = $bookList->current();
	echo "Titulo: ".$book->getTitulo()." Autor: ".$book->getAutor()."<br/>";
	$bookList->next();
}