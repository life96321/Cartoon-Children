<?php
session_start();
include_once '../Model/vcode.php';
$_SESSION['vcode']=vcode(90);
?>