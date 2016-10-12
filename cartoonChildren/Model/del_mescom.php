<?php
header("Content-type:text/html;charset=utf-8");
include_once '../Config/mysql.php';
connect();
$query = "delete from message_say where id = {$_POST['id']}";
if(mysql_query($query)){
	echo '删除成功！';
}else{
	echo '删除失败！';
}
?>