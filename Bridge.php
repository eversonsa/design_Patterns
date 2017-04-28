<?php 

interface APIdesenho {
	public function desenharCirculo($x, $y, $radius);
}
class APIDesenho1 implements APIdesenho {
	public function desenharCirculo($x, $y, $radius) {
		echo "Desenhando Circulo v1: ".$x." - ".$y." - ".$radius;
	}
}
abstract class forma{
	protected $api;
	protected $x;
	protected $y;

	public function __construct(APIdesenho $api){
		$this->api = $api;
	}
}
class Circulo extends forma {
	protected $radio;
	public function __construct($x, $y, $radius, APIdesenho $api){
		parent::__construct($api);
		$this->x = $x;
		$this->y = $y;
		$this->radio = $radius;
	}
	public function desenhar(){
		$this->api->desenharCirculo($this->x, $this->y, $this->radio);
	}
}


$Circulo = new Circulo(1,3,7, new APIDesenho1());
$Circulo->desenhar();
