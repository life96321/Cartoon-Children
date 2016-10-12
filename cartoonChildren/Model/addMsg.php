<?php
header("Content-type:text/html;charset=utf-8");
include_once '../Config/mysql.php';


connect();
if (empty($_POST['title'])||empty($_POST['region'])||empty($_POST['classify'])||empty($_POST['newest'])||empty($_POST['state'])||empty($_POST['content'])||empty($_POST['files'])) {
	echo '请将各项信息填写完整！';
}else{
	$query = "select * from message where title ='{$_POST['title']}'";
	$result = mysql_query($query);
	if (mysql_num_rows($result)) {
		echo '这个标题已经存在了！';
	}else{
		include_once 'image.php';
		$src = 'img/' . $imgName;
		$sql = "insert into message(title,region,classify,newest,state,content,src) values('{$_POST['title']}','{$_POST['region']}','{$_POST['classify']}','{$_POST['newest']}','{$_POST['state']}','{$_POST['content']}','{$src}')";
		if (mysql_query($sql)) {
			echo '信息添加成功！';
		} else {
			echo '信息添加失败！';
		}
	}
}
?>
