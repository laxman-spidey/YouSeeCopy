<?php session_start();?>
<?php require_once('login_auth.php');?>
<?php $thispage ="adminHomescreen"; ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/main.css">
<link href="css/table.css" rel="stylesheet" type="text/css" />
<script src="scripts/tabscripts.js"></script>

<title>Homescreen - YouSee</title>
</head>

	<body style="background:#FFF;">
<div id="wrapper">
<?php include("header_navbar.php"); ?>


<?php include('registrationApprovalForm1.php'); ?>



<!--footer-->
<br />
<?php include 'footer.php' ; ?>
<!--#footer-->
</div>
</body>
</html>