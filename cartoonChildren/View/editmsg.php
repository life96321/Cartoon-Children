<?php
include_once '../Config/mysql.php';
connect();
$sql = "select * from message where id = '{$_GET['id']}'";	
$result = mysql_query($sql);
$row=mysql_fetch_assoc($result);
?>
<!--头部-->
<?php
$title = '修改信息界面';
$style = 'headers';
include_once 'link/adminheader.php';
?>
		<div class="rightwrap">
			<div class="manage">
				<h3>修改信息</h3>
				<div>标题：
					<input type="text" value="<?php echo $row['title']; ?>" class="title"/>
				</div>
				<div>地区：
					<input type="text" value="<?php echo $row['region']; ?>" class="region"/>
				</div>
				<div>分类：
					<input type="text" value="<?php echo $row['classify']; ?>" class="classify"/>
				</div>
				<div>更新：
					<input type="text" value="<?php echo $row['newest']; ?>" class="newest"/>
				</div>
				<div>状态：
					<input type="text" value="<?php echo $row['state']; ?>" class="state"/>
				</div>
				<div>简介：<br>
					<textarea class="contents"><?php echo $row['content']; ?></textarea>
				</div>
				<div class="showimg">
					<img src="<?php echo $row['src']; ?>" alt="" />
				</div>
				<div>要修改的图片：
					<input type="file" name="file" id="file" value="" />
				</div>
				<div>
					<button id="edit">修改</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!--尾部-->
<?php
include_once 'link/footer.php';
?>
<script type="text/javascript">
var footer = document.getElementById('footer');
footer.style.top = 130 + "px";
$("#edit").on("click", function() {	
	$.ajax({
		type: "post",
		url: "<?php echo '../Model/editMsg.php?id='.$_GET['id']?>",
		async: true,
		data: {
			title: $('.title').val(),
			region:$('.region').val(),
			classify:$('.classify').val(),
			newest:$('.newest').val(),
			state:$('.state').val(),
			content: $(".contents").val()
		},
		success: function(json) {
			alert(json);
			if(json == '信息修改成功！'){
				window.location.href = "admin.php";
			}
		}
	});
});	
</script>