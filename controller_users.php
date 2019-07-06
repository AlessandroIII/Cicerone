<?php 
	include "database.php";

	function registraGlobeTrotter($reg_gt){
		Database::connect();
		// $reg_gt['password'] = hash('sha256', $reg_gt['password']);
		$already_exists = checkAvailability($reg_gt['username']);
		// echo $already_exists; exit;
		if($already_exists == 0){
			$values = "0, '".$reg_gt['nome']."',
				'".$reg_gt['cognome']."',
				'".$reg_gt['username_gt']."',
				'".$reg_gt['password']."',
				'".$reg_gt['sesso']."',
				'".$reg_gt['data_nascita']."',
				'".$reg_gt['email']."'";
			$table = "globeTrotter";
			$fields = "id, nome, cognome, username, password, sesso, dataNascita, email";
			Database::insertRecord($table, $fields, $values);
			header("Location: login.view.php");
		}else{
			header("Location: reg_gt.view.php?username_av=no");
		}
	}

	function checkAvailability($username){
		$n_account_gt = Database::countRows("globetrotter", "username ='".$username."'")[0]['COUNT(*)'];
		$n_account_cic = Database::countRows("cicerone", "username ='".$username."'")[0]['COUNT(*)'];
		if($n_account_cic == 0 && $n_account_gt == 0){
			return 0;
		}else{
			return 1;
		}
	}

	function getPayments(){
		Database::connect();
		$fields = "*";
		$table = "metodopagamento";
		$conditions = TRUE;
		return Database::search($fields, $table, $conditions);
	}

	function registraCicerone($reg_cic){
		Database::connect();
		$reg_cic['password'] = hash('sha256', $reg_cic['password']);
		$already_exists = checkAvailability($reg_cic);
		if($already_exists == 0){
			$values = "0, '".$reg_cic['nome']."',
				'".$reg_cic['cognome']."',
				'".$reg_cic['username_gt']."',
				'".$reg_cic['password']."',
				'".$reg_cic['sesso']."',
				'".$reg_cic['data_nascita']."',
				'".$reg_cic['email']."'";
			$table = "globeTrotter";
			$fields = "id, nome, cognome, username, password, sesso, dataNascita, email";
			Database::insertRecord($table, $fields, $values);
			header("Location: login.view.php");	
		}else{
			header("Location: reg_cicerone.view.php?username_av=no");
		}
	}

?>