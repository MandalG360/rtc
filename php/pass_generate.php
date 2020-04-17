<?php
$mydate = getdate(date("U"));
function generatePassword(){
	$array = array('0','1','2','3','4','5','6','7','8','9','A','E','I','U','Z');
	
	$password="";
	for($i=0;$i<=5;$i++){
		$index = rand(0,count($array)-1);
		$password.=$array[$index];
	}
	return $password;
}

	echo @$mydate[mday].generatePassword().@$mydate[year];

?>