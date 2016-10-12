<?php
include_once '../Config/mysql.php';
include_once '../Framework/db.php';
$title = $_GET['title'];
$allMsgs = getMesMsgs($title);	

connect();
$sql = "select * from message where id = '{$_GET['id']}'";	
$result = mysql_query($sql);
$row=mysql_fetch_assoc($result);

$isImgs = getIsimgs($title,0,8);
?>
<?php
$title = '详情界面';
$style = 'headers';
include_once 'link/header.php';
?>
<!--中部-->
<div id="contents">
	<div class="sections">
		<!--左侧-->
		<div class="de_left l">
			<!--动漫详情-->
			<div class="imgdetails">
				<p class="img l"><img src="<?php echo $row['src']; ?>" alt="" /></p>
				<img src="img/ddyp_playIcon.png" alt="" class="play"/>
				<div class="news l">
					<h3 class="mes_title"><?php echo $row['title']; ?></h3>
					<p><span>地区：</span><?php echo $row['region']; ?></p>
					<p><span>分类：</span><?php echo $row['classify']; ?></p>
					<p><span>更新：</span><?php echo $row['newest']; ?></p>
					<p><span>状态：</span><?php echo $row['state']; ?></p>
					<p><span>更新时间：</span><?php echo $row['time']; ?></p>
					<p><span>简介：</span></p><p class="cont" style="color: #7d7d7d;;"><?php echo $row['content']; ?></p>
				</div>
			</div>
			<!--相关图片-->
			<div class="plot list">
				<h3><a href="#">相关图片</a></h3>
				<ul class="plotimg ul">
				<?php
					foreach($isImgs as $row){
						echo "<li class='l'><a href=''><img src='{$row['m_image']}' alt='' /></a><div><span></span><i></i></div></li>";
					}	
				?>
				</ul>
				<img src="img/to_left.png" alt="" class="lone"/>
				<img src="img/to_right.png" alt="" class="rone r"/>
			</div>
			<!--猜你喜欢-->
			<div class="like list">
				<h3><a href="#">猜你喜欢</a></h3>
				<ul class="likeimg ul">
					<li><a href="#"><img src="img/001.jpg" alt="" /></a><div><span></span><i></i></div></li>
					<li><a href="#"><img src="img/002.jpg" alt="" /></a><div><span></span><i></i></div></li>
					<li><a href="#"><img src="img/003.jpg" alt="" /><div><span></span><i></i></div></li>
					<li><a href="#"><img src="img/004.jpeg" alt="" /></a><div><span></span><i></i></div></li>
					<li><a href="#"><img src="img/005.jpeg" alt="" /></a><div><span></span><i></i></div></li>
					
					<li><a href="#"><img src="img/link (1).jpeg" alt="" /></a><div><span></span><i></i></div></li>
					<li><a href="#"><img src="img/link (2).jpeg" alt="" /></a><div><span></span><i></i></div></li>
					<li><a href="#"><img src="img/link (3).jpeg" alt="" /></a><div><span></span><i></i></div></li>
					<li><a href="#"><img src="img/link (4).jpeg" alt="" /></a><div><span></span><i></i></div></li>
					<li><a href="#"><img src="img/link (5).jpeg" alt="" /></a><div><span></span><i></i></div></li>
				</ul>
				<img src="img/to_left.png" alt="" class="ltwo"/>
				<img src="img/to_right.png" alt="" class="rtwo r"/>
			</div>
			<!--相关评论-->
			<div class="lags list">
				<h3><a href="#">相关评论</a></h3>
				<div class="detcon">
					<div class="form wrap">
						<textarea placeholder="我也来说两句..." class="coms"></textarea>
						<input type="button" class="btm r" value="发表评论"/>
						<div class="top-right r">
							<a href="###">还可以输入140字</a>
						</div>
					</div>
					<div class="message">
						<ul class="mes">
						<?php
							foreach($allMsgs as $row){
								echo "<li><h3 class='name'><a href='#' class='col'>{$row['name']}</a></h3>
									<p class='m_content'>{$row['mes_content']}</p>
									<p class='m_time'>{$row['mes_time']}</p>";
									if(isset($_SESSION['name']) && $_SESSION['name'] == $row['name']){
										echo "<span class='mesid'>{$row['id']}</span><a href='#' class='close'>删除</a>";
									}
								echo "</li>";
							}	
						?>
						</ul>
					</div>
				</div>
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
include_once 'link/share.php';
?>
<script src="js/comment.js" type="text/javascript" charset="utf-8"></script>
<script src="js/ranking.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(".btm").on("click", function() {
		$.ajax({
			type: "post",
			url: "../Model/add_mescom.php?action=add",
			async: true,
			data: {
				texts: $(".coms").val(),
				title: $(".mes_title").html()
			},
			success: function(json) {
				alert(json);
				if(json == '评论成功！'){
					window.location.reload();
				}
			}
		});
	});
	$(".close").on("click", function() {
		$.ajax({
			type: "post",
			url: "../Model/del_mescom.php",
			async: true,
			data: {
				id: $(this).prev().html()
			},
			success: function(json) {
				alert(json);
				if(json == '删除成功！'){
					window.location.reload();
				}
			}
		});
	});
	var oLis = document.querySelectorAll(".ul li");
	var oDivs = document.querySelectorAll(".ul div");
	for (var j = 0; j < oLis.length; j++) {
		oLis[j].onmousemove = function() {
			for (var i = 0; i < oLis.length; i++) {
				if (this == oLis[i]) {
					oDivs[i].style.display = 'block';
				}
			}
		}
		oLis[j].onmouseout = function() {
			for (var i = 0; i < oLis.length; i++) {
				if (this == oLis[i]) {
					oDivs[i].style.display = 'none';
				}
			}
		}
	}
</script>

