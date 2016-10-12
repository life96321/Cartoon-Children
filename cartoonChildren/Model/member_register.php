<?php
session_start();
include_once '../Config/mysql.php';
connect();

$action = $_GET['action'];
if ($action == 'register') {
	if (empty($_POST['name'])) {
		echo '用户名不得为空！';
	}else if (mb_strlen($_POST['name']) > 32) {
		echo '用户名长度不要超过32个字符！';
	}else if (mb_strlen($_POST['pass']) < 6) {
		echo '密码不得少于6位！';
	}else if ($_POST['pass'] != $_POST['confirm_pass']) {
		echo '两次密码输入不一致！';
	}else if(strtolower($_POST['vcode']) != strtolower($_SESSION['vcode'])){
		echo '验证码输入错误！';
	}else{
		$query = "select * from member where name ='{$_POST['name']}'";
		$result = mysql_query($query);
		if (mysql_num_rows($result)) {
			echo '这个用户名已经被别人注册了！';
		}else{
			$query = "insert into member(name,pw,register_time) values('{$_POST['name']}',md5('{$_POST['pass']}'),now())";
			if (mysql_query($query)) {
				$_SESSION['name'] = $_POST['name'];
				$_SESSION['pw'] = sha1(md5($_POST['pass']));
				$_SESSION['admin'] = 0;
				echo '注册成功！';
			} else {
				echo '注册失败，请重试！';
			}
		}
	}
}
?>