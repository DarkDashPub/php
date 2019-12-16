<?php

class formok{
	
	public function form_login(){
		?>
		<form method="POST">
			<input type="email" 
				   name="input_username" 
				   placeholder="Add meg az email!"><br />
			<input type="password" 
				   name="input_password" 
				   placeholder="Add meg a jelszavad!"><br />
			<input type="hidden" name="site" value="kezdolap">
			<input type="hidden" name="action" value="login">
			<input type="submit" value="Login">
		</form>		
		<?php
	}
	public function form_logout(){
		?>
		<form method="POST">
			<input type="hidden" name="site" value="kezdolap">
			<input type="hidden" name="action" value="logout">
			<input type="submit" value="Logout">
		</form>		
		<?php
	}

	
}

?>