<?php
	$con=new mysqli('localhost', 'miyakemichael', 'pagmamahal', 'miyakecrud');
	if(!$con){
		die(mysqli_error($con));
	}

?>