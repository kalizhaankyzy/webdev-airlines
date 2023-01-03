<?php
session_start();
$passid=$_SESSION['pass_id'];
$tickid=$_SESSION['ticket_id'];

echo "1+".$passid;
echo "2+".$tickid;
?>