<?php

$con=new mysqli('localhost','admin', 'admin', 'crudoperation' );

		if(!$con){
		
	die(mysqli_error($con));
	}


?>