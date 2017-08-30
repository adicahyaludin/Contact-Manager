<?php

class ConnectDB {

	private $host = "localhost";
	private $db   = "contact_manager";
	private $user = "root";
	private $pass = "";
	private $opt = array(
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	);
	
	protected $conn;

	public function __construct() {
		try {
			$this->conn = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->pass, $this->opt);
		} catch (PDOException $e) {
		    die("Error!: " . $e->getMessage() . "<br/>");
		}
	}
}