<?php
error_reporting(0);
$hostname = 'localhost';
$username = 'root';
$password = '';
$database= 'db_ciki';
$con = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
if (!isset($_SESSION)) {
  session_start();
}
?>