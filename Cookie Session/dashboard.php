<?php
session_start();

if (!isset($_SESSION["username"]) || !isset($_COOKIE["PHPSESSID"]) || $_COOKIE["PHPSESSID"] != session_id()) {
    header("Location: login.php");
    exit();
}

echo "Welcome, " . $_SESSION["username"] . "! You are logged in.";
echo "<br><a href='logout.php'>Logout</a>";
echo "<h3>Session Information</h3>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<h3>Cookie Information</h3>";
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";

echo "<h3>My New Cookie</h3>";
if (isset($_COOKIE["MyNewCookie"])) {
    echo "<p>MyNewCookie value: " . $_COOKIE["MyNewCookie"] . "</p>";
} else {
    echo "<p>MyNewCookie is not set.</p>";
}
