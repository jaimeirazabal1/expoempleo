<?php 
class Usuarios extends ActiveRecord{

	public function encriptar($p){
		return md5($p);
	}
	public function confirmar_pass($p1,$p2){
		return $p1 == $p2;
	}
	protected function initialize(){
		$this->validates_uniqueness_of("username");
	}
}

?>