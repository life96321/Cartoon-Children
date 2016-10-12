<?php
include_once '../Framework/db.php';
include_once '../Config/mysql.php';
connect();
$sql = "select * from message where id='{$_GET['id']}'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
?>
<!--头部-->
<?php
$title = '添加信息界面';
$style = 'headers';
include_once 'link/adminheader.php';
?>
		<div class="rightwrap">
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
			<div class="manage">
				<h3>添加相关图片</h3>
				<div>选择添加的图片：<input type="file" name="file" id="file" value="" /></div>
				<div><button id="submit">添加</button></div>
			</div>
		</div>
	</div>
</div>
<!--尾部-->
<?php
include_once 'link/footer.php';
?>
<script src="js/jquery-1.11.2.js"></script>
<script src="js/ajaxfileupload.js"></script>
<script type="text/javascript">
var footer = document.getElementById('footer');
footer.style.top = 130 + "px";
var img;
$("#submit").on("click", function() {
	$.ajaxFileUpload({
		type: "post",
       	url: "../Model/add_imgs.php",
        secureuri: false, 
        fileElementId: 'file', 
        dataType: 'text', 
        data: {
			title: $('.mes_title').html(),
			files: $("#file").val()
		},
        success: function(json) {
			alert(json);
			if(json == '信息添加成功！'){
				window.location.reload();
			}
		}
   }); 	
});	 
</script>
