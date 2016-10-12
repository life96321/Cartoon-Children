<?php
//连接数据库
function connect() {
	mysql_connect("localhost", "root", "");
	mysql_select_db("msg");
	mysql_query("set names utf8");
}
?>