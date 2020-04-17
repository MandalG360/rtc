<?php

	$dob = $_POST['dob'];
	$today = date("Y-m-d");
	$age = date_diff(date_create($dob), date_create($today));
	
	if($dob!=''){
		echo 'Your Age: '.$age->format('<b>'.'%y'.'</b> साल '.'<b>'.'%m'.'</b> माह '.'<b>'.'%d'.'</b> दिन ');
	}
	
?>