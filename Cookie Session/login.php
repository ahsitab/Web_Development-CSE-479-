<?php
ob_start();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Log debug information to a file
    $logFile = 'session_debug.log';
    file_put_contents($logFile, "Username: $username, Password: $password\n", FILE_APPEND);

    if ($username === "admin" && $password === "1234") {
        $_SESSION["username"] = $username;

        // Log session status
        if (isset($_SESSION["username"])) {
            file_put_contents($logFile, "Session is set: " . $_SESSION["username"] . "\n", FILE_APPEND);
        } else {
            file_put_contents($logFile, "Session is not set.\n", FILE_APPEND);
        }
        
        setcookie("PHPSESSID", session_id(), time() + 3600, "/");
        setcookie("MyNewCookie", "my_cookie_value", time() + 7200);
        
        // Log cookie setting
        file_put_contents($logFile, "MyNewCookie set for user: $username\n", FILE_APPEND);
        
        // Log redirection attempt
        file_put_contents($logFile, "Redirecting to dashboard.php\n", FILE_APPEND);
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Login Form</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required value="admin">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required value="1234">
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
