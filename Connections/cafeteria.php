<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cafeteria = "localhost";
$database_cafeteria = "onlinefood";
$username_cafeteria = "root";
$password_cafeteria = "";
$cafeteria = mysql_pconnect($hostname_cafeteria, $username_cafeteria, $password_cafeteria) or trigger_error(mysql_error(),E_USER_ERROR);
?>
