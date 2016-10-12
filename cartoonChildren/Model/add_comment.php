<?php
session_start();
include_once '../Config/mysql.php';
connect();

$action = $_GET['action'];
if ($action == 'add') {//登录
	if(!isset($_SESSION['name'])){
		echo '请先登录再进行评论！';
	}else if (empty($_POST['texts'])) {
		echo '您还未输入任何评论信息！';
	}else{
		$sql = "insert into message_say(name,mes_content) values('{$_SESSION['name']}','{$_POST['texts']}')";
		if (mysql_query($sql)) {
			echo '发布成功！';
		} else {
			echo '发布失败！';
		}
	}
}
?>