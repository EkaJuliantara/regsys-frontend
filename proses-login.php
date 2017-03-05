<?php

ob_start();
session_start();

if ($_POST['id']) {
	$_SESSION['hackfest']['id'] = $_POST['id'];
}

?>