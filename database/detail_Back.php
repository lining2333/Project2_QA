<?php
error_reporting(E_ALL || ~E_NOTICE);
		include 'getCookie.php';
		echo '<script language="javascript">';
		//turn to index page
		echo "window.location.href = '../index.php?q='+$q+'&q0='+'$q0'+'&q1='+'$q1'+'&q2='+'$q2'+'&q3='+'$q3'+'&check=1'";
		echo '</script>';
		?>