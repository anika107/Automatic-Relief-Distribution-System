<!DOCTYPE html>
<html>
<head>
    <title> Log Out </title>

<?php
	session_start();
	session_destroy();

    header('location: ./index.php');
?>