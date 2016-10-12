<?php
$title = '评论界面';
$style = 'headers';
include_once 'link/header.php';
?>
<!--中部-->
<div id="contents">
	<div class="sections">
		<!--左侧-->
		<div class="de_left l">
			<div class="comments">
				<?php include_once 'link/comments.php';?>
			</div>
		</div>
		<!--右侧-->
		<?php
		include_once 'link/otherright.php';
		?>
	</div>
</div>
<?php
include_once 'link/footer.php';
?>
<script src="js/ranking.js" type="text/javascript" charset="utf-8"></script>