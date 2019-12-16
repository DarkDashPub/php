<?php

class blogbejegyzesek{
	
	private $servername = "localhost:3306";
	private $username = "root";
	private $password = "";
	private $dbname = "adattar";

	
	
	
	
	
	public function __construct(){
		$this->kapcsolat_nyitas();
	}
	
	public function __destruct(){
		$this->kapcsolat_bontas();
	}
	
	public function cmd_update_vegrehajt_muvelet(){
		$this->sql = "UPDATE 
						blogbejegyzes 
					  SET
						`tartalom` = '".$_GET['input_tartalom']."',
						`nev` = '".$_GET['input_cim']."',
						`datum` = '".date('Y-m-d H:m:s')."',
						`szerzo` = '".$_GET['input_szerzo']."'
					  WHERE
						id = ".$_GET['input_modositando_id']."		
		";

		if ($this->conn->query($this->sql) === TRUE) {
			echo "Sikeres módosítás";
		} else {
			echo "Sikertelen módosítás";
		}		
	}
	
	public function cmd_update_form(){
		
		$this->result = $this->conn->query("SELECT * FROM 
												blogbejegyzes
											WHERE 
												id = ".$_GET['modositando_id']."
											");
											
		if ($this->result->num_rows > 0) {
				
			while($this->row = $this->result->fetch_assoc()) {
				$this->row["nev"]
				?>
				<fieldset>
					<legend>Adatok módosítása</legend>
					<form method="GET">
						Szerző:
						<input type="text" name="input_szerzo"
						value="<?php echo $this->row["szerzo"]; ?>"><br />
						Cím:
						<input type="text" name="input_cim"
						value="<?php echo $this->row["nev"]; ?>"><br />
						Tartalom:
						<input type="text" name="input_tartalom"
						value="<?php echo $this->row["tartalom"]; ?>"><br />
						
						<input type="hidden" name="input_modositando_id"
						value="<?php echo $this->row["id"]; ?>">
						<input type="hidden" name="action" value="cmd_update_vegrehajt">
						<input type="submit" value="Módosítás" />
					</form>
				</fieldset>
				<?php
			}
			
		} else {
			echo "Nincs felvett blogbejegyzés!";
		}				
	}
	
	public function felvetel_form(){
		?>
		<fieldset>
			<legend>Adatok felvétele</legend>
			<form method="GET">
				Szerző:
				<input type="text" name="input_szerzo"><br />
				Cím:
				<input type="text" name="input_cim"><br />
				Tartalom:
				<input type="text" name="input_tartalom"><br />
				
				<input type="hidden" name="oldal" value="insert">
				<input type="hidden" name="action" value="cmd_insert">
				<input type="submit" value="Felvétel" />
			</form>
		</fieldset>
		<?php
	}
	public function adat_aktivalas(){
		if (isset($_GET['aktivalando_id']) and 
			!empty($_GET['aktivalando_id']) and 
			is_numeric($_GET['aktivalando_id'])
			){			
			$this->sql = "UPDATE 
							blogbejegyzes
						  SET
							aktivitas = 'aktiv'
						  WHERE 
							id = ".$_GET['aktivalando_id']."
						 ";

			if ($this->conn->query($this->sql) === TRUE) {
				echo "Sikeres aktiválás!";
			} else {
				echo "Sikertelen aktiválás";
			}
		}		
	}	
	public function adat_inaktivalas(){
		if (isset($_GET['inaktivalando_id']) and 
			!empty($_GET['inaktivalando_id']) and 
			is_numeric($_GET['inaktivalando_id'])
			){		
			$this->sql = "UPDATE 
						blogbejegyzes
					  SET
						aktivitas = 'inaktiv'
					 WHERE 
						id = ".$_GET['inaktivalando_id']."
					";

			if ($this->conn->query($this->sql) === TRUE) {
				echo "Sikeres inaktiválás! <b />";
			} else {
				echo "Sikertelen inaktiválás <b />";
			}	
		}		
	}	
	public function adat_torles(){
		if (isset($_GET['torlendo_id']) and 
			is_numeric($_GET['torlendo_id']) and
			!empty($_GET['torlendo_id'])
			){
			$this->sql = "DELETE FROM blogbejegyzes
					 WHERE id = ".$_GET['torlendo_id']."
					";

			if ($this->conn->query($this->sql) === TRUE) {
				echo "Sikeres törlés!";
			} else {
				echo "Sikertelen törlés";
			}	
		}
	}
	
	public function adatok_felvetele(){
		if (isset($_GET['input_tartalom']) and
			!empty($_GET['input_tartalom']) and
			isset($_GET['input_cim']) and
			!empty($_GET['input_cim']) and
			isset($_GET['input_szerzo']) and
			!empty($_GET['input_szerzo'])
			) {		
			$this->sql = "INSERT INTO 
					blogbejegyzes 
						(
						`tartalom`, 
						`nev`, 
						`datum`, 
						`szerzo`
						) 
					VALUES 
						(
						'".$_GET['input_tartalom']."',
						'".$_GET['input_cim']."',
						'".date('Y-m-d H:m:s')."',
						'".$_GET['input_szerzo']."'
							)
			";

			if ($this->conn->query($this->sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $this->sql . "<br>" . $this->conn->error;
			}
		}
	}
	public function osszes_bejegyzes(){
		$this->result = $this->conn->query("SELECT * FROM blogbejegyzes");

		if ($this->result->num_rows > 0) {
			
			
			while($this->row = $this->result->fetch_assoc()) {
				echo "<p>";
					echo $this->row["nev"];
					echo "[" . $this->row["aktivitas"] . "]&nbsp;";
					
					$del_url = "";
					$del_url .= "?site=blog";
					$del_url .= "&action=cmd_delete";
					$del_url .= "&torlendo_id=".$this->row["id"];
					echo "<a href='index.php".$del_url."'>Törlés</a>&nbsp;";
					
					$aktivalas_url = "";
					$aktivalas_url .= "?site=blog";
					$aktivalas_url .= "&action=cmd_update_aktivalas";
					$aktivalas_url .= "&aktivalando_id=".$this->row["id"];
					echo "<a href='index.php".$aktivalas_url."'>Aktiválás</a>&nbsp;";

					$inaktivalas_url = "";
					$inaktivalas_url .= "?site=blog";
					$inaktivalas_url .= "&action=cmd_update_inaktivalas";
					$inaktivalas_url .= "&inaktivalando_id=".$this->row["id"];
					echo "<a href='index.php".$inaktivalas_url."'>Inaktiválás</a>&nbsp;";

					$modositas_url = "";
					$modositas_url .= "?site=blog";
					$modositas_url .= "&action=cmd_update_form";
					$modositas_url .= "&modositando_id=".$this->row["id"];
					echo "<a href='index.php".$modositas_url."'>Módosítás</a>&nbsp;";
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
			echo "Kapcsolat rendben! <b />";
		}		
		$this->conn->set_charset("utf8");
	}
	
	public function kapcsolat_bontas(){
		$this->conn->close();
	}
}

?>