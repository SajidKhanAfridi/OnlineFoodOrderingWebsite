<?php require_once('../Connections/cafeteria.php'); ?>
<?php require_once('../Connections/cafeteria.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Recordset1 = "-1";
if (isset($_GET['CustomerId'])) {
  $colname_Recordset1 = $_GET['CustomerId'];
}
mysql_select_db($database_cafeteria, $cafeteria);
$query_Recordset1 = sprintf("SELECT CustomerName, Address, City, Mobile FROM customer_registration WHERE CustomerId = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $cafeteria) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online Food Ordering</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style9 {font-size: 95%; font-weight: bold; color: #003300; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style10 {
	font-size: 14px;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<div id="wrapper">

  <?php
  include "Header.php";
  ?>

  <div id="content">
    <h2><span style="color:#003300"> Welcome Administrator </span></h2>
    <p align="justify" class="style10">Shipping Address Detail</p>

    <table width="100%" border="0">

      <?php do { ?>
        <tr>
         <td bgcolor="#BDE0A8"><strong>CustomerName</strong></td>
        <td bgcolor="#BDE0A8"><?php echo $row_Recordset1['CustomerName']; ?></td></tr>
        <tr>  <td bgcolor="#E3F2DB"><strong>Address</strong></td>
        <td bgcolor="#E3F2DB"><?php echo $row_Recordset1['Address']; ?></td></tr>
        <tr> <td bgcolor="#BDE0A8"><strong>City</strong></td>
        <td bgcolor="#BDE0A8"><?php echo $row_Recordset1['City']; ?></td></tr>
        <tr> <td bgcolor="#BDE0A8"><strong>Mobile</strong></td>
        <td bgcolor="#BDE0A8"><?php echo $row_Recordset1['Mobile']; ?></td></tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </table>
<?php
    include"categoryList.php";
    ?>
    <p>&nbsp;</p>
  </div>
 <?php
 include "Right.php";
 ?>
  <div style="clear:both;"></div>
   <?php
 include "Footer.php";
 ?>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>