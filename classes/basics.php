<?php

class menus{
	public function menu_admin(){
		?>
		<a href="index.php?site=blog">Blog</a>&nbsp;
		<a href="index.php?site=felhasznalok">Felhasználók</a><br />
		<?php
	}
	public function menu_user(){
		?>
		<a href="index.php?site=blog">Blog</a><br />
		<?php
	}	
}

class contents{
	public function content_admin(){
		if(isset($_GET["site"])){
			if($_GET["site"]=="blog") { include("admin_blog.php"); }
			elseif($_GET["site"]=="felhasznalok") { include("admin_felhasznalok.php"); }
			else { include("admin_blog.php"); }
		} else { include("admin_blog.php"); }
	}
	public function content_user(){
		if(isset($_GET["site"])){
			if($_GET["site"]=="blog") { include("admin_blog.php"); }
			else { include("admin_blog.php"); }
		} else { include("admin_blog.php"); }		
	}
}

?>