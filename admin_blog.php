<a href="index.php?site=blog&action=adatfelvetel_form">Adatfelvétel (blog)</a><br />

<?php

	if (isset($_GET["action"]) and $_GET["action"]=="adatfelvetel_form"){
		$form_blog_felvetel = new blogbejegyzesek();
		$form_blog_felvetel->felvetel_form();
	}
	if (isset($_GET["action"]) and $_GET["action"]=="cmd_update_form"){
		$form_blog_modositas = new blogbejegyzesek();
		$form_blog_modositas->cmd_update_form();
	}

	if (isset($_GET["action"]) and $_GET["action"]=="cmd_update_vegrehajt"){
		$blog_modositas = new blogbejegyzesek();
		$blog_modositas->cmd_update_vegrehajt_muvelet();
	}

	if (isset($_GET["action"]) and $_GET["action"]=="cmd_delete"){
		$torles = new blogbejegyzesek();
		$torles->adat_torles();

	}
		
	if (isset($_GET["action"]) and $_GET["action"]=="cmd_update_aktivalas"){
		$aktivalas = new blogbejegyzesek();
		$aktivalas->adat_aktivalas();
	}
	
	if (isset($_GET["action"]) and $_GET["action"]=="cmd_update_inaktivalas"){
		$inaktivalas = new blogbejegyzesek();
		$inaktivalas->adat_inaktivalas();
	}	
	
	if (isset($_GET["action"]) and $_GET["action"]=="cmd_insert"){
		$felvetel = new blogbejegyzesek();
		$felvetel->adatok_felvetele();

	}

$tartalom = new blogbejegyzesek();
$tartalom->osszes_bejegyzes();
	
?>