<?php 

class Conexao{
	protected $db;

	public function __construct(){
		try{
			$this->db = new PDO("mysql:dbname=loja;host=localhost", "root", "");
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			echo "Erro ao conectar na base de dados ".$e->getMessage();
			die();
		}
	}
}

class UsuarioDAO extends Conexao{
	public function __construct(){
		parent::__construct();
	}
	public function get($fields = array(), $where = array()){
		$usuarios = array();
		$valores = array();

		if(count($fields) == 0){
			$fields = array('*');
		}
		$sql = "SELECT ".implode(',', $fields)." FROM Usuario "; 

		if (count($where) > 0) {
			$tabelas = array_keys($where);
			$valores = array_values($where);
			$comp = array();

			foreach ($tabelas as $tabela) {
				$comp[] = $tabela." = ";
			}

			$sql .=implode(" AND ", $comp);
		}

		$sql = $this->db->prepare($sql);
		$sql->execute($valores);

		if ($sql->rowCount() > 0) {
			foreach ($sql->fetchAll() as $item) {
				$usuarios[] = new Usuario($item);
			}
		}

		return $usuarios;
	}

	public function inserir($fields = array()){
		if (count($fields) > 0) {
			$questions = array();
			for ($q=0; $q <count(array_keys($fields)) ; $q++) { 
				$questions[] = '?';
			}

			$sql = "INSERT INTO usuario (".implode(',',array_keys($fields)).")VALUES(".implode(',',$questions).")";
			$sql = $this->db->prepare($sql);
			$sql->execute(array_values($fields));
		}
	}
}


class Usuario {
	private $id;
	private $nome;
	private $email;
	private $senha;
	
	function __construct($array){
		$this->id = (isset($array['id'])) ? $array['id']:'';
		$this->nome = (isset($array['nome'])) ? $array['nome']:'';
		$this->email = (isset($array['email'])) ? $array['email']:'';
		$this->senha = (isset($array['senha'])) ? $array['senha']:'';
	}
	public function getId(){return $this->id;}
	public function getNome(){return $this->nome;}
	public function getEmail(){return $this->email;}

	public function setId($id){$this->id = $id;}
	public function setNome($nome){$this->nome = $nome;}
	public function setEmail($email){$this->email = $email;}
	public function setSenha($senha){$this->senha = md5($senha);}
}