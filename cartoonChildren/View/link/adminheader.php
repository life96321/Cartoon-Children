<?php
session_start();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="css/index.css" />
		<link rel="stylesheet" href="css/adminindex.css" />
		<link rel="stylesheet" href="css/<?php echo $style; ?>.css" />
	</head>
	<body>
		<!--头部-->
		<div id="header">
			<div class="logo">
				<a href="index.php" class="l"><h1>CartoonChildren</h1></a>
				<p class="l head"><a href="admin.php">首页</a></p>
				<div class="l search">
					<input type="text" class="txt_search"/>
					<input type="submit" class="btn_search" value=""/>
				</div>
				<div class="hlogin r">
					<b class="icons loginimg"></b>
					<?php
					if(isset($_SESSION['name']) && $_SESSION['admin'] == 0){
						echo '您好：  '.$_SESSION['name'].'！｜<a href="logout.php">注销</a>';
					}else if(isset($_SESSION['name']) && $_SESSION['admin'] == 1){
						echo '您好：  '.$_SESSION['name'].'！｜<a href="logout.php">注销</a>';
					}else{
						echo '<a href="login.php">登录</a><a href="register.php">注册</a>';
					}
					?>
				</div>
			</div>
		</div>
		<!--中部-->
		<div id="main">
			<div class="content">
				<ul class="senav adnav">
					<li><a href="index.php">前台首页</a></li>
					<li><a href="admin.php">后台首页</a></li>
					<li><a href="addmsg.php">添加信息</a></li>
				</ul>

