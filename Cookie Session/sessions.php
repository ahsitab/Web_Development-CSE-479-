<?php
session_start();

$_SESSION["username"] = "JohnDoe";
$_SESSION["lastname"] = "Doe";
$_SESSION["email"] = "john.doe@example.com";

if(isset($_SESSION["lastname"])){
    unset($_SESSION["lastname"]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Session Examples</title>
</head>
<body>
    <h1>Session Examples</h1>
    
    <h2>Session Data</h2>
    <pre>
    <?php print_r($_SESSION); ?>
    </pre>
    
    <p><a href="login.php">Go to Login</a></p>
</body>
</html>