<?php
if (!isset($_SESSION)) session_start();
unset($_SESSION["thongtindangnhap"]);
		header("location:login.php");
		exit;
