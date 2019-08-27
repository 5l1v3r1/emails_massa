<?php
date_default_timezone_set('America/Sao_Paulo');

class Dados {
	private $db;
	
	public function __construct(){
		$config = array();

		$config['db'] = "scripts_emails";
		$config['host'] = "localhost";
		$config['user'] = "root";
		$config['pass'] = "";

		try {
			$this->db = new PDO("mysql:dbname=".$config['db'].";host=".$config['host']."", "".$config['user']."", "".$config['pass']."");
		} catch(PDOException $e) {
			echo "FALHA: ".$e->getMessage();
		}
	}

	public function setEmail($email){
		$sql = $this->db->prepare('SELECT * FROM emails');
		$sql->execute();

		if ($sql->rowCount() <= 4) {
			$sql = $this->db->prepare('INSERT INTO emails SET email = :email');
			$sql->bindValue(':email', $email);
			$sql->execute();

			return true;
		} else {
			return false;
		}
	}

	public function getEmails(){
		$sql = $this->db->prepare('SELECT * FROM emails');
		$sql->execute();

		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	public function delEmail($id){
		$sql = $this->db->prepare('DELETE FROM emails WHERE id = :id');
		$sql->bindValue(':id', $id);
		$sql->execute();

		return true;
	}
}