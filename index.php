<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online Food Ordering</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style8 {font-size: 24px}
.style9 {font-size: 95%; font-weight: bold; color: #003300; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
</head>
<body>
<div id="wrapper">

  <?php
  include "Header.php";
  ?>

  <div id="content">
    <h2><span style="color:#f0ffff"> Welcome to Our Online Food Ordering </span></h2>
    <p align="justify"><span class="style8">W</span>elcome to online Food Ordering website. Here you can order varieties of food items such as Chicken Karahi, Chicken Handi, Chinese Chawal, Biryani, Lobya, Chana, Aloo Saag and much more . Customer has to just register on this website and then he or she can order various food products online. You need not to go to Cafeteria.</p>
    <p align="justify">If you have any complain regarding dispatched order feel free to send us feedback. So we can improve our services.</p>
<?php
      include "categoryList.php"
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
