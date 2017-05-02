<?php
require'dao.php';

$usuarioDAO = new UsuarioDAO();

$usuarioDAO->inserir(array(

	'nome' => 'barrabas',
	'email' => 'barrabas@barrabas.com',
	'senha' => md5('123')
));


$usuarios = $usuarioDAO->get();

foreach ($usuarios as $usuario) {
	echo "NOME ".$usuario->getNome()." Email: ".$usuario->getEmail();
	echo "<hr/>";
}
