<?php

class felhasznalok{
	
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "adattar";
	private $conn = "";
	private $result = "";
	private $row = "";
	private $sql = "";
	
	public function __construct(){
		$this->kapcsolat_nyitas();
	}
	
	public function __destruct(){
		$this->kapcsolat_bontas();
	}
	
	public function check_login(){
		$this->result = $this->conn->query("SELECT * FROM felhasznalok
			WHERE f_email = '".$_POST['input_username']."' and 
				  f_jelszo = '".$_POST['input_password']."'
			");
		if ($this->result->num_rows == 1) {	
			$user_data = mysqli_fetch_assoc(mysqli_query($this->conn, "SELECT * FROM felhasznalok
			WHERE f_email = '".$_POST['input_username']."' and 
				  f_jelszo = '".$_POST['input_password']."'
			"));
			$_SESSION["user_name"] = $user_data['f_nev'];
			$_SESSION["user_perm"] = $user_data['f_jogosultsag'];		
			$_SESSION["login_state"]="van_ilyen_felhasznalo_az_adatbazisban";
		} else {			
			$_SESSION["login_state"]="nincs_felhasznalo_az_adatbazisban";
		} 
	}
	public function all_users(){
		$this->result = $this->conn->query("SELECT * FROM felhasznalok");
		if ($this->result->num_rows > 0) {			
			while($this->row = $this->result->fetch_assoc()) {
				echo "<p style='color: #aaa; font-style: italic;'>";
					echo $this->row["f_email"] . "&nbsp;";
					echo $this->row["f_jogosultsag"] . "&nbsp;";
					echo "[" . $this->row["f_jelszo"] . "]&nbsp;";
				echo "</p>";
			}		
		} else {
			echo "Nincs felvett blogbejegyzés!";
		}		
	}
	public function all_users_onlyname(){
		$this->result = $this->conn->query("SELECT * FROM felhasznalok");
		if ($this->result->num_rows > 0) {			
			while($this->row = $this->result->fetch_assoc()) {
				echo "<p>";
					echo $this->row["f_nev"] . "&nbsp;";
				echo "</p>";
			}		
		} else {
			echo "Nincs felvett blogbejegyzés!";
		}		
	}	
	public function kapcsolat_nyitas() {
		
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		
		if ($this->conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} else {
			echo "Kapcsolat rendben!";
		}		
		$this->conn->set_charset("utf8");
	}
	
	public function kapcsolat_bontas(){
		$this->conn->close();
	}
}

?>