<?php
	error_reporting(E_ALL || ~E_NOTICE);
	$checkbox=$_GET["delete_Number"]; 		
	include 'getCookie.php';
	include 'connect.php';

	$checkbox_Id = array();
	// define an array to save checkbox_Ids which are selected,get rid of ','to get every checkbox_Id
	$checkbox_Id = explode(',',$checkbox);
	for ($i=0; $i <count($checkbox_Id) ; $i++) { 
	 	$delete_Order = substr("$checkbox_Id[$i]",8);
	 	include 'delete.php';
	}

	include 'show.php';
?>