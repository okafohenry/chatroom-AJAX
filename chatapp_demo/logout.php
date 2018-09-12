<?php
session_start();

session_destroy();

echo "<center>";
echo "You are logged out. click <a href='index.php'>here</a> to login again!";
echo "</center>";



?>