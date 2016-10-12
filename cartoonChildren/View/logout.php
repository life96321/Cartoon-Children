<?php
session_start();
include_once '../Config/mysql.php';
unset($_SESSION['name']);
session_destroy();
echo '<script> history.go(-1);</script>'
?>