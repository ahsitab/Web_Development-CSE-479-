<?php  
session_start();  

session_unset();  
session_destroy();  

setcookie("PHPSESSID", "", time() - 3600, "/");  

echo "You have been logged out. <a href='login.php'>Login again</a>";  
?>