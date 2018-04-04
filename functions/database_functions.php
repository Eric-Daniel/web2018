<?php
require 'config.php';

class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}

		public function create($title, $year, $genre, $image, $synopsis){
			$stmt = $this->conn->prepare("INSERT INTO movies(title,year,genre,image,synopsis) VALUES(?, ?, ?, ?, ?)") or die($this->conn->error);
			$stmt->bind_param("sssss", $title, $year, $genre, $image, $synopsis);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

		public function read(){

			$stmt = $this->conn->prepare("SELECT * from movies ORDER BY movie_id DESC") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

    public function filter(){

        $stmt = $this->conn->prepare("SELECT DISTINCT year FROM movies") or die($this->conn->error);
        if($stmt->execute()){
			$result = $stmt->get_result();
            $stmt->close();
            $this->conn->close();
            return $result;
        }
    }

    public function filterGenre(){

        $stmt = $this->conn->prepare("SELECT DISTINCT genre FROM movies") or die($this->conn->error);
        if($stmt->execute()){
            $result = $stmt->get_result();
            $stmt->close();
            $this->conn->close();
            return $result;
        }
    }

		public function movie_id($movie_id){
			$stmt = $this->conn->prepare("SELECT * FROM movies WHERE movie_id = '$movie_id'") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($movie_id){
			$stmt = $this->conn->prepare("DELETE FROM movies WHERE movie_id = '$movie_id'") or die($this->conn->error);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}

		public function update(){
			$stmt = $this->conn->prepare("UPDATE movies SET title=?,year=?,genre=?, image=?,synopsis=? WHERE movie_id=?") or die($this->conn->error);
			$stmt->bind_param('sssssi',$_POST['title'], $_POST['year'], $_POST['genre'], $_POST['image'], $_POST['synopsis'],
                $_POST['movie_id']);

			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}


    public function login($username, $password){
        $stmt = $this->conn->prepare("SELECT * FROM admin WHERE username = '$username' && password = '$password'") or die($this->conn->error);
        if($stmt->execute()){
            $result = $stmt->get_result();
            $valid = $result->num_rows;
            $fetch = $result->fetch_array();
            return array(
                'username'=> $fetch['username'],
                'count'=>$valid
            );
        }
    }

 	}

?>