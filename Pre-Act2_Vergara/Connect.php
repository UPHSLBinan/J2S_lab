<?php
	$con=new mysqli('localhost', 'Melo', 'Melo', 'vergara');
	if(!$con){
		die(mysqli_error($con));
	}

?>