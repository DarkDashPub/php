<?php
session_start();
include("./classes/basics.php");
include("./classes/blog.php");
include("./classes/felhasznalok.php");
include("./classes/formok.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
</head>
<body>

<?php

	if (isset($_POST["action"]) and $_POST["action"]=="login"){
		if (isset($_POST['input_username']) and
			!empty($_POST['input_username']) and
			isset($_POST['input_password']) and
			!empty($_POST['input_password'])
			){				
			echo "Emailed: " . $_POST['input_username'] . "<br />";
			echo "Jelszavad: " . $_POST['input_password'] . "<br />";
			$felhasznalok = new felhasznalok();
			echo $felhasznalok->check_login();
		}	
	}	
	if (isset($_POST["action"]) and $_POST["action"]=="logout"){
		$_SESSION["login_state"]="nincs_felhasznalo_az_adatbazisban";
	}
	
	if (isset($_SESSION["login_state"])){
		if($_SESSION["login_state"]=="van_ilyen_felhasznalo_az_adatbazisban"){

			if (isset($_SESSION["user_perm"]) and $_SESSION["user_perm"]=="admin"){
				$menu = new menus();
				$menu->menu_admin();
				$content = new contents();
				$content->content_admin();
				$login_form = new formok();
				$login_form->form_logout();	
			} elseif (isset($_SESSION["user_perm"]) and $_SESSION["user_perm"]=="user"){
				$menu = new menus();
				$menu->menu_user();
				$content = new contents();
				$content->content_user();
				$login_form = new formok();
				$login_form->form_logout();	
			} else {
				$_SESSION["login_state"]="nincs_felhasznalo_az_adatbazisban";
				$login_form = new formok();
				$login_form->form_login();					
				echo "Nem megfelelő jogosultsági szint!<br />"; 
			}
				
		} else {
			echo "Ide kerül a NEM bejelentkezett oldal tartalma!<br />";
			$login_form = new formok();
			$login_form->form_login();			
		}
	}
	if (!isset($_SESSION["login_state"])){
		$login_form = new formok();
		$login_form->form_login();	
	}		

		
	$felhasznalok = new felhasznalok();
	$felhasznalok->all_users();
	
	
?>

</body>
</html>