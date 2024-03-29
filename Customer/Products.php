<?php require_once('../Connections/cafeteria.php'); ?>
<?php require_once('Connections/cafeteria.php'); ?>
<?php
session_start();
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
if (isset($_GET['CategoryId'])) {
  $colname_Recordset1 = $_GET['CategoryId'];
}
mysql_select_db($database_cafeteria, $cafeteria);
$query_Recordset1 = sprintf("SELECT ItemId, ItemName, `Description`, Image, Price, Total FROM item_master WHERE CategoryId = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $cafeteria) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_cafeteria, $cafeteria);
$query_Recordset2 = "SELECT ItemId, ItemName, `Description`, Image, Price, Total FROM item_master";
$Recordset2 = mysql_query($query_Recordset2, $cafeteria) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
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
	color: #FFFFFF;
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
    <h2><span style="color:#003300">Welcome <?php echo $_SESSION['Name'];?></span></h2>
    <table width="100%" border="1" cellpadding="2" cellspacing="2" bordercolor="#669933">
      <tr>
      <td bordercolor="#669933" bgcolor="#669933"><span class="style10">Code</span></td>
        <td bordercolor="#669933" bgcolor="#669933"><span class="style10">ItemName</span></td>
        <td bordercolor="#669933" bgcolor="#669933"><span class="style10">Description</span></td>
        <td bordercolor="#669933" bgcolor="#669933"><span class="style10">Image</span></td>
        <td bordercolor="#669933" bgcolor="#669933"><span class="style10">Price</span></td>
        <td bordercolor="#669933" bgcolor="#669933"><span class="style10">Total</span></td>
        <td bordercolor="#669933" bgcolor="#669933"><span class="style10">Cart</span></td><strong></strong>      </tr>

      <?php
	  if(isset($_GET['CategoryId']))
	  {
	  do
	  {
	  ?>
        <tr>
         <td><?php echo $row_Recordset1['ItemId']; ?></td>
          <td><?php echo $row_Recordset1['ItemName']; ?></td>
          <td><?php echo $row_Recordset1['Description']; ?></td>
          <td><img src="../Products/<?php echo $row_Recordset1['Image']; ?>" height="125px" width="125px"/></td>
          <td><?php echo $row_Recordset1['Price']; ?></td>
          <td><?php echo $row_Recordset1['Total']; ?></td>
           <td><a href="InsertCart.php?ItemId=<?php echo $row_Recordset1['ItemId']; ?>"><img src="img/onlinefood-cart.png"/></a></td><strong></strong>        </tr>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
		}
		else
		{
		do
	  {
	  ?>
        <tr>
         <td><?php echo $row_Recordset2['ItemId']; ?></td>
          <td><?php echo $row_Recordset2['ItemName']; ?></td>
          <td><?php echo $row_Recordset2['Description']; ?></td>
          <td><img src="../Products/<?php echo $row_Recordset2['Image']; ?>" height="125px" width="125px"/></td>
          <td><?php echo $row_Recordset2['Price']; ?></td>
          <td><?php echo $row_Recordset2['Total']; ?></td>
           <td><a href="InsertCart.php?ItemId=<?php echo $row_Recordset2['ItemId']; ?>"><img src="img/onlinefood-cart.png"/></a></td>
        </tr>
        <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2));
		}

        ?>
    </table>
<?php
      include "categoryList.php";
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
<blockquote>&nbsp;	</blockquote>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
