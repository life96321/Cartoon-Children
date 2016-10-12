<?php
include_once '../Config/mysql.php';
//获取message_say表中的所有评论信息
function getMsgs() {
	connect();
	$sql = "select * from message_say";
	$r = mysql_query($sql);
	$results = array();
	while ($row = mysql_fetch_assoc($r)) {
		$results[] = $row;
	}
	return $results;
}

//comment界面
function getComment($page, $pageSize) {
	$pagebegin = ($page - 1) * $pageSize;
	connect();
	$sql = "select * from message_say order by id desc limit {$pagebegin},{$pageSize}";
	$r = mysql_query($sql);
	$results = array();
	while ($row = mysql_fetch_assoc($r)) {
		$results[] = $row;
	}
	return $results;
}	
function getCommentCount() {
	connect();
	$sql = "select * from message_say";
	$r = mysql_query($sql);
	return mysql_num_rows($r);
}

//获取message_say表中的所有评论信息
function getMesMsgs($title) {
	connect();
	$sql = "select * from message_say where mes_title='{$title}' order by id desc limit 0,15";
	$r = mysql_query($sql);
	$results = array();
	while ($row = mysql_fetch_assoc($r)) {
		$results[] = $row;
	}
	return $results;
}

//获取message_imgs某一动漫的相关图片
function getIsimgs($title,$numo,$numt) {
	connect();
	$sql = "select * from message_imgs where m_title = '$title' order by id desc limit {$numo},{$numt}";
	$r = mysql_query($sql);
	$results = array();
	while ($row = mysql_fetch_assoc($r)) {
		$results[] = $row;
	}
	return $results;
}

//获取message表中的每个动漫的所有数据
function getAllMsgs() {
	connect();
	$sql = "select * from message order by id desc";
	$r = mysql_query($sql);
	$results = array();
	while ($row = mysql_fetch_assoc($r)) {
		$results[] = $row;
	}
	return $results;
}	

//获取message表中所有动漫排行榜信息
function getAllLiMsgs() {
	connect();
	$sql = "select * from message order by goodnum desc limit 0,8";
	$r = mysql_query($sql);
	$results = array();
	while ($row = mysql_fetch_assoc($r)) {
		$results[] = $row;
	}
	return $results;
}


//获取message表中国大陆的动漫排行榜信息
function getInMsgs() {
	connect();
	$sql = "select * from message where region='大陆' order by goodnum desc limit 0,8";
	$r = mysql_query($sql);
	$results = array();
	while ($row = mysql_fetch_assoc($r)) {
		$results[] = $row;
	}
	return $results;
}

//获取message表国外的动漫排行榜信息
function getOutMsgs() {
	connect();
	$sql = "select * from message where region<>'大陆' order by goodnum desc limit 0,8";
	$r = mysql_query($sql);
	$results = array();
	while ($row = mysql_fetch_assoc($r)) {
		$results[] = $row;
	}
	return $results;
}

//获取message表中大陆的每个动漫的所有数据
function getAllInlandMsgs() {
	connect();
	$sql = "select * from message where region='大陆' limit 0,5";
	$r = mysql_query($sql);
	$results = array();
	while ($row = mysql_fetch_assoc($r)) {
		$results[] = $row;
	}
	return $results;
}	

//获取message表中日本的每个动漫的所有数据
function getAllRblandMsgs() {
	connect();
	$sql = "select * from message where region='日本' limit 0,5";
	$r = mysql_query($sql);
	$results = array();
	while ($row = mysql_fetch_assoc($r)) {
		$results[] = $row;
	}
	return $results;
}

//获取message表中欧美的每个动漫的所有数据
function getAllOmlandMsgs() {
	connect();
	$sql = "select * from message where region='美国' or region='英国' limit 0,5";
	$r = mysql_query($sql);
	$results = array();
	while ($row = mysql_fetch_assoc($r)) {
		$results[] = $row;
	}
	return $results;
}

//index界面
//获取指定页的记录（所有记录中的指定页记录）
//参数一  $page      第几页
//参数二  $pageSize  每一页的记录个数
//return 二维数组
function getMsgsByPageNumber($page, $pageSize) {
	//构造当前页开始记录的下标
	$pagebegin = ($page - 1) * $pageSize;
	connect();
	$sql = "select * from message limit {$pagebegin},{$pageSize}";
	$r = mysql_query($sql);
	$results = array();
	while ($row = mysql_fetch_assoc($r)) {
		$results[] = $row;
	}
	return $results;
}	
//获取message表所有记录的个数
function getMsgCount() {
	connect();
	$sql = "select * from message";
	$r = mysql_query($sql);
	return mysql_num_rows($r);
}


//incartoon界面
//获取message表所有国内记录的个数
function getMsgsByPageInNumber($page, $pageSize) {
	$pagebegin = ($page - 1) * $pageSize;
	connect();
	$sql = "select * from message where region='大陆' limit {$pagebegin},{$pageSize}";
	$r = mysql_query($sql);
	$results = array();
	while ($row = mysql_fetch_assoc($r)) {
		$results[] = $row;
	}
	return $results;
}	
function getMsgInCount() {
	connect();
	$sql = "select * from message where region='大陆'";
	$r = mysql_query($sql);
	return mysql_num_rows($r);
}




//outcartoon界面
//获取message表所有国外记录的个数
function getMsgsByPageOutNumber($page, $pageSize) {
	$pagebegin = ($page - 1) * $pageSize;
	connect();
	$sql = "select * from message where region<>'大陆' limit {$pagebegin},{$pageSize}";
	$r = mysql_query($sql);
	$results = array();
	while ($row = mysql_fetch_assoc($r)) {
		$results[] = $row;
	}
	return $results;
}	
function getMsgOutCount() {
	connect();
	$sql = "select * from message where region<>'大陆'";
	$r = mysql_query($sql);
	return mysql_num_rows($r);
}

//cartfilm界面
//获取message表所有动漫电影记录的个数
function getFilmNumber($page, $pageSize) {
	$pagebegin = ($page - 1) * $pageSize;
	connect();
	$sql = "select * from message where newest='1集全' limit {$pagebegin},{$pageSize}";
	$r = mysql_query($sql);
	$results = array();
	while ($row = mysql_fetch_assoc($r)) {
		$results[] = $row;
	}
	return $results;
}	
function getFilmCount() {
	connect();
	$sql = "select * from message where newest='1集全'";
	$r = mysql_query($sql);
	return mysql_num_rows($r);
}

//cartoon界面
//获取message表所有动漫连载动画记录的个数
function getCartNumber($page, $pageSize) {
	$pagebegin = ($page - 1) * $pageSize;
	connect();
	$sql = "select * from message where newest<>'1集全' limit {$pagebegin},{$pageSize}";
	$r = mysql_query($sql);
	$results = array();
	while ($row = mysql_fetch_assoc($r)) {
		$results[] = $row;
	}
	return $results;
}	
function getCartCount() {
	connect();
	$sql = "select * from message where newest<>'1集全'";
	$r = mysql_query($sql);
	return mysql_num_rows($r);
}
?>