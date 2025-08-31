<?php
setcookie("MyCookie", "example_value", time() + 7200);
setcookie("AnotherCookie", "another_value", time() + 604800);
setcookie("MyNewCookie", "my_cookie_value", time() + 7200);

$strAddress = $_SERVER['REMOTE_ADDR'];
$strBrowser = $_SERVER['HTTP_USER_AGENT'];
$strInfo = "$strAddress::$strBrowser";
setcookie("userinfo", $strInfo, time() + 7200);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cookie Examples</title>
</head>
<body>
    <h1>Cookie Examples</h1>
    
    <h2>All Cookies</h2>
    <ul>
    <?php
    foreach ($_COOKIE as $key => $val) {
        echo "<li><strong>$key</strong>: $val</li>";
    }
    ?>
    </ul>
    
    <h2>User Info from Cookie</h2>
    <?php
    if (isset($_COOKIE["userinfo"])) {
        $arrInfo = explode("::", $_COOKIE["userinfo"]);
        echo "<p>Your IP address is: " . $arrInfo[0] . "</p>";
        echo "<p>Your Browser is: " . $arrInfo[1] . "</p>";
    }
    ?>
    
    <p><a href="login.php">Go to Login</a></p>
</body>
</html>