<?php
include_once '../Framework/db.php';
$allMsgs = getMsgs();	

$pageConfig = require_once '../Config/page.php';

if (isset($_GET[$pageConfig['page_params']])) {
	$currentPage = $_GET[$pageConfig['page_params']];
} else {
	$currentPage = 1;
}

if ($currentPage <= 0) {
	$currentPage = 1;
}

$pageCount = ceil(getCommentCount() / $pageConfig['page_size']);
if ($currentPage > $pageCount) {
	$currentPage = $pageCount;
}

$allMsgs = getComment($currentPage, $pageConfig['page_size']);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/comment.css"/>
	</head>
	<body>
		<div class="wrap">
			<div class="top">
				<div class="top-left">说点什么吧！</div>
				<div class="top-right">
					<a href="###">一起来评论</a>
				</div>
			</div>
			<div class="middle">
				<textarea maxlength="140" class="text"></textarea>
			</div>
			<div class="bottom">
				<div class="bottom-left">
					<div>表情</div>
					<div>图片</div>
					<div>视频</div>
					<div>话题</div>
					<div>文章</div>
				</div>
				<div class="btm">发布</div>
			</div>
		</div>
		<div class="message">
			<ul class="mes">
			<?php
				foreach($allMsgs as $row){
					echo "<li><h3 class='name'>{$row['name']}－－{$row['mes_title']}</h3>
						<p class='m_content'>{$row['mes_content']}</p>
						<p class='m_time'>{$row['mes_time']}</p>";
						if(isset($_SESSION['name']) && $_SESSION['name'] == $row['name']){
							echo "<a href='../Model/del_comment.php?id={$row['id']}' class='close'>删除</a>";
						}
					echo "</li>";
				}	
			?>
			</ul>
		</div>
		<div id="page">
			<?php
				require_once '../Model/pages.php';
				echo createPage($_SERVER['PHP_SELF'],$currentPage, $pageCount);	
			?>
		</div>
		<script src="js/jquery-1.11.2.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/comment.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(".btm").on("click", function() {
				$.ajax({
					type: "post",
					url: "../Model/add_comment.php?action=add",
					async: true,
					data: {
						texts: $(".text").val()
					},
					success: function(json) {
						alert(json);
						if(json == '发布成功！'){
							window.location.href = "comment.php";
						}
					}
				});
			});
		</script>
	</body>
</html>