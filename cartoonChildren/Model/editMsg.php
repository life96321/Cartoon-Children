<?php
include_once '.../Config/mysql.php';
connect();

$sql = "update message set title = '{$_POST['title']}', content = '{$_POST['content']}',region='{$_POST['region']}',classify='{$_POST['classify']}',newest='{$_POST['newest']}',state='{$_POST['state']}' where id = '{$_GET['id']}'";
if (mysql_query($sql)) {
	echo '信息修改成功！';
} else {
	echo '信息修改失败！';
}
?>