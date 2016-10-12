<?php
header("Content-type:text/html;charset=utf-8");
include_once '../Config/mysql.php';

connect();
if (empty($_POST['files'])) {
	echo '请先选择要上传的图片！';
} else {
	include_once 'image.php';
	$src = 'img/' . $imgName;
	$sql = "insert into message_imgs(m_title,m_image) values('{$_POST['title']}','{$src}')";
	if (mysql_query($sql)) {
		echo '信息添加成功！';
	} else {
		echo '信息添加失败！';
	}
}
?>