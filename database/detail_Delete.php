<?php
error_reporting(E_ALL || ~E_NOTICE);
	include 'getCookie.php';
	$delete_Order = $_COOKIE["order"];
	include 'connect.php';
	include 'delete.php';

	echo '<script language="javascript">';
	echo "window.location.href = '../index.php?q='+$q+'&q0='+'$q0'+'&q1='+'$q1'+'&q2='+'$q2'+'&q3='+'$q3'+'&check=1'";
	echo '</script>';

		?>