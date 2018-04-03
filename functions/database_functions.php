<?php
require 'config.php';
	/*function db_connect(){
		$conn =mysqli_connect("localhost", "root", "", "amlsdb");
		if(!$conn){
			echo "Can't connect database " . mysqli_connect_error($conn);
			exit;
		}
		return $conn;
	}*/
class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		//"INSERT INTO movies(title,year,genre,image,synopsis) VALUES('$title','$year','$genre','$image','$synopsis')"
		//"INSERT INTO movies(title,year,genre,image,synopsis) VALUES(?, ?, ?, ?, ?)"
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
		//$stmt = $this->conn->prepare("UPDATE movies SET title='$title',year='$year',genre='$genre', image='$image', synopsis='$synopsis' WHERE movie_id = '$movie_id'") or die($this->conn->error);
		public function update(){
			$stmt = $this->conn->prepare("UPDATE movies SET title=?,year=?,genre=?, image=?,synopsis=? WHERE movie_id=?") or die($this->conn->error);
			//$stmt->bind_param('sssssi', $_POST['$title'],$_POST['$year'],$_POST['$genre'],$_POST['$image'],$_POST['$synopsis'],$_GET['$movie_id']);
			$stmt->bind_param('sssssi',$_POST['title'], $_POST['year'], $_POST['genre'], $_POST['image'], $_POST['synopsis'],
                $_POST['movie_id']);

			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				//return true;
			//	$stmt->affected_rows;
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


//    if($stmt->execute()){
//        $stmt->close();
//        $this->conn->close();
//        //return true;
//        //	$stmt->affected_rows;
//        return true;
//    }
//    else {
//        echo "INVALID USERNAME/PASSWORD Combination!";
//    }
//            $this->conn->close();
//        else
//            {
//
//            }
//            $this->conn->close();


//		public function login($name,$pass)
//        {
//            $stmt = $this->conn->prepare("SELECT name, pass FROM admin WHERE name=? AND  pass=? LIMIT 1");
//            $stmt->bind_param('ss', $name, $pass);
//            $stmt->execute();
//            $stmt->bind_result($name, $pass);
//            $stmt->store_result();
//            if($stmt->num_rows == 1)  //To check if the row exists
//            {
//                while($stmt->fetch()) //fetching the contents of the row
//
//                {$_SESSION['Logged'] = 1;
//                    $_SESSION['name'] = $name;
//                    echo 'Success!';
//                    //header("Location: admin_movie.php");
//                    exit();
//                }
//
//            }
//
//            if($stmt->execute()){
//                $stmt->close();
//                $this->conn->close();
//                //return true;
//                //	$stmt->affected_rows;
//                return true;
//            }
//            else {
//                echo "INVALID USERNAME/PASSWORD Combination!";
//            }
////            $this->conn->close();
////        else
////            {
////
////            }
////            $this->conn->close();
//        }
        //}


//    /*** for login process ***/
//    public function check_login($name, $pass){
//
//        $pass = md5($pass);
//        $sql2="SELECT name from admin WHERE name='$name' and pass='$pass'";
//
//        //checking if the username is available in the table
//        $result = mysqli_query($this->conn,$sql2);
//        $user_data = mysqli_fetch_array($result);
//        $count_row = $result->num_rows;
//
//        if ($count_row == 1) {
//            // this login var will use for the session thing
//            $_SESSION['login'] = true;
//            $_SESSION['name'] = $user_data['name'];
//            return true;
//        }
//        else{
//            return false;
//        }
//    }
//
//    /*** starting the session ***/
//    public function get_session(){
//        return $_SESSION['login'];
//    }
//
//    public function user_logout() {
//        $_SESSION['login'] = FALSE;
//        //session timeout =>>>session time() ?
//        session_destroy();
//    }



 	}
/* $stmt->bind_param("sssssi", $_POST['title'], $_POST['year'], $_POST['genre'], $_POST['image'], $_POST['synopsis'],
           $_POST['movie_id']); */
	/*
	public function update($title, $year, $genre, $image, $synopsis, $movie_id){
			$stmt = $this->conn->prepare("UPDATE movies SET title=?,year=?,genre=?, image=?, synopsis=? WHERE movie_id=?") or die($this->conn->error);
			$stmt->bind_param("sssss", $title, $year, $genre, $image, $synopsis);
			$stmt = $this->conn->prepare("SELECT * FROM movies WHERE movie_id = '$movie_id'") or die($this->conn->error);
			$stmt->bind_param("i",$_GET["movie_id"]);
			if($stmt->execute())
			$result = $sql->get_result();
	if ($result->num_rows > 0) {		
		$row = $result->fetch_assoc();
	
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
 	}	
	*/
	/*function getAll($conn){
		$query = "SELECT * from movies ORDER BY movie_id DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't retrieve data " . mysqli_error($conn);
			exit;
		}
		return $result;
	}*/
	
	
	
?>