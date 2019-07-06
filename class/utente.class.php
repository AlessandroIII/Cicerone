<?php 

class Utente{
	private $id = 0;
	private $username = "";
	private $nome = "";
	private $cognome = "";
	private $dataOraRegistrazione = "";
	private $sesso = "";
	private $email = "";
	private $dataNascita = "";

	public function __construct($id, $username, $name, $surname, $registrationMoment, $sex, $mailAddress, $birthday, $psw){
		$this->id = $id;
		$this->username = $username;
		$this->
	}

	public function getUsername(){return $this->username;}
	public function getNome(){return $this->nome;}
	public function getCognome(){return $this->cognome;}
	public function getDataOraRegistrazione(){return $this->dataOraRegistrazione;}
	public function getSesso(){return $this->sesso;}
	public function setSesso($s){$this->sesso = $s;}

}

?>

