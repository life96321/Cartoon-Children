<?php
session_start();
include_once '../Config/mysql.php';
connect();

$action = $_GET['action'];
if ($action == 'login') {//登录
	if (empty($_POST['name'])) {
		echo '用户名不得为空！';
	} else if (mb_strlen($_POST['name']) > 32) {
		echo '用户名长度不要超过32个字符！';
	} else if (empty($_POST['pass'])) {
		echo '密码不得为空！';
	}else if(strtolower($_POST['vcode']) != strtolower($_SESSION['vcode'])){
		echo '验证码输入错误！';
	}else{
		$query = "select * from member where name='{$_POST['name']}' and pw=md5('{$_POST['pass']}')";
		$result = mysql_query($query);
		if (mysql_num_rows($result) == 1) {
			$row = mysql_fetch_row($result);
			$_SESSION['name'] = $row[1];
			$_SESSION['pw'] = sha1($row[2]);
			$_SESSION['admin'] = $row[4];
			echo '登录成功';
		} else {
			echo '用户名或密码错误！';
		}
	}
}
?>