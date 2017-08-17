<?php
/*
 * checklogin.php
 * _____________
 * This simple file checks a session and returns a '1' if the session is active. It returns nothing otherwise.
 * 
 */
session_start();
//echo("This is working");
//echo(session_status() == PHP_SESSION_ACTIVE);
echo($_SESSION['login']);

?>