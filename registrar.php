<?php 
session_start();


include("db.php");

if (isset($_POST['register_users'])) {
    if (strlen($_POST['name']) >= 1 && strlen($_POST['password']) >= 1) {
	    $name = trim($_POST['name']);
	    $email = trim($_POST['email']);
		$username = trim($_POST['username']);
	    $password = trim($_POST['password']);
		//$create_on = date($_POST['crete_on']);
		$user_check_query = "SELECT * FROM pacientes WHERE user='$username' OR email='$email' LIMIT 1";
		$result_validate = mysqli_query($conex, $user_check_query);
  		$user = mysqli_fetch_assoc($result_validate);

		if($user){
			if($user['user'] === $username){
				?> 
	    	<h3 class="ok">¡El usuario ya existe!</h3>
           <?php
			}else if($user['email'] === $email){
				?> 
				<h3 class="ok">¡el email ya existe!</h3>
			   <?php
			}
		}
		else{
			$consulta = "INSERT INTO pacientes (name, email, user, password) VALUES ('$name','$email','$username','$password')";
			$resultado = mysqli_query($conex,$consulta);
				
			if ($resultado) {
				?> 
				<h3 class="ok">¡Te has inscripto correctamente!</h3>
			   <?php
			} else {
				?> 
				<h3 class="bad">¡Ups ha ocurrido un error!</h3>
			   <?php
			}
		}
	   }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}

function execute_insert () {
	
}

?>