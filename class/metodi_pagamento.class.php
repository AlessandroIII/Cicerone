<?php 

public class MetodoPagamento{
	private $id = 0;
	private $descrizione = "";

	public function __construct($id, $descr){
		$this->id = $id;
		$this->descrizione = $descr;
	}

	public function __destruct(){
		// rilascio risorse
	}

}

?>