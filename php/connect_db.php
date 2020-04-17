<?php

$link = mysql_connect('localhost', 'root', 'Ashish@123') or die("Couldn't make connection.");
$con = mysql_select_db('rtc', $link) or die("Couldn't select database");

?>