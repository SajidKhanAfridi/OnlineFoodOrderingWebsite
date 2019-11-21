<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$cmbCategory=$_GET['CategoryId'];
	$txtName=$_POST['txtName'];
	$txtDesc=$_POST['txtDesc'];
	$txtPrice=$_POST['txtPrice'];
	$txtFinal=$_POST['txtFinal'];

	$path1 = $_FILES["txtFile"]["name"];
	move_uploaded_file($_FILES["txtFile"]["tmp_name"],"../Products/"  .$_FILES["txtFile"]["name"]);
	// Establish Connection with MYSQL
	$con = mysql_connect ("localhost","root");
	// Select Database
	mysql_select_db("onlinefood", $con);
	// Specify the query to Insert Record
	$sql = "insert into item_master	(CategoryId,ItemName,Description,Image,Price,Total) values(".$cmbCategory.",'".$txtName."','".$txtDesc."','".$path1."',".$txtPrice.",".$txtFinal.")";
	// execute query
	mysql_query ($sql,$con);
	// Close The Connection
	mysql_close ($con);
	header("location:Products.php?CategoryId=".$cmbCategory."")

?>
</body>
</html>
