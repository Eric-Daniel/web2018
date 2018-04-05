<?php
	define('db_host', 'localhost');
	define('db_user', 'root');
	define('db_password', '');
	define('db_name', 'amlsdb');
	
	class db_connect{	
		public $host = db_host;
		public $user = db_user;
		public $password = db_password;
		public $dbname = db_name;
		public $conn;
		public $error;
		
		public function __construct() {
			$this->connect();
		  }

		public function connect(){
			$this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
			if(!$this->conn){
				$this->error = "Fatal Error: Can't connect to database" . $this->connect->connect_error();
				return false;
			}
			return $this->conn;
		}

		public function db_query($sql){
			$result = $this->conn->query($sql);
			return $result;
		  }
		  
		  public function escape_string($value){
			return $this->conn->real_escape_string($_POST["query"]);
		  }
	}	
?>