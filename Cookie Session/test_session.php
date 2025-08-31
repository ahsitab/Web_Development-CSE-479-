<?php
session_start();
if (!isset($_SESSION['test'])) {
    $_SESSION['test'] = 'Session is working!';
    echo "Session started. Refresh the page.";
} else {
    echo $_SESSION['test'];
}
?>
