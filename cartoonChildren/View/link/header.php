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
				<!--导航栏-->
				<div class="nav">
					<!--左侧-->
					<ul class="head l">
						<li><a href="index.php">首页</a></li>
						<div class="l search">
							<input type="text" class="txt_search"/>
							<input type="submit" class="btn_search" value=""/>
						</div>
					</ul>
					<!--右侧-->
					<div class="hlogin r">
						<span class="icons loginimg l"></span>
						<?php
						if(isset($_SESSION['name']) && $_SESSION['admin'] == 0){
							echo '您好：  '.$_SESSION['name'].'！｜<a href="logout.php">注销</a>';
						}else if(isset($_SESSION['name']) && $_SESSION['admin'] == 1){
							echo '您好：  '.$_SESSION['name'].'！｜<a href="admin.php">后台</a> | <a href="logout.php">注销</a>';
						}else{
							echo '<a href="login.php">登录</a><a href="register.php">注册</a>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<!--响应式的导航-->
		<div class="nav-button">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
		</div>
		
