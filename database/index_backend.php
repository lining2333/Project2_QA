
<?php
//add condition for search into cookie
$q = $_GET["q"];
setcookie("q", $q, time()+3600);
$q0 = $_GET["q0"];
setcookie("q0", $q0, time()+3600);
$q1 = $_GET["q1"];
setcookie("q1", $q1, time()+3600);
$q2 = $_GET["q2"];
setcookie("q2", $q2, time()+3600);
$q3 = $_GET["q3"];
setcookie("q3", $q3, time()+3600);

include 'connect.php';
include 'show.php';

?>
