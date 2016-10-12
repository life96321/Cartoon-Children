<!--头部-->
<?php
$title = '添加信息界面';
$style = 'headers';
include_once 'link/adminheader.php';
?>
		<div class="rightwrap">
			<div class="manage">
				<h3>添加信息</h3>
				<div>标题：<input type="text" name="title" class="title"/></div>
				<div>地区：<input type="text" name="region" class="region"/></div>
				<div>分类：<input type="text" name="classify" class="classify"/></div>
				<div>更新：<input type="text" name="newest" class="newest"/></div>
				<div>状态：<input type="text" name="state" class="state"/></div>
				<div>简介：<br><textarea name="content" class="contents"></textarea></div>
				<div>要添加的图片：<input type="file" name="file" id="file" value="" /></div>
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
footer.style.top = 90 + "px";
var img;
$("#submit").on("click", function() {
	$.ajaxFileUpload({
		type: "post",
       	url: "../Model/addMsg.php", 
        secureuri: false, //是否需要安全协议，一般设置为false
        fileElementId: 'file', 
        dataType: 'text', 
        data: {
			title: $('.title').val(),
			region:$('.region').val(),
			classify:$('.classify').val(),
			newest:$('.newest').val(),
			state:$('.state').val(),
			content: $(".contents").val(),
			files: $("#file").val()
		},
        success: function(json) {
			alert(json);
			if(json == '信息添加成功！'){
				window.location.href = "admin.php";
			}
		}
    }); 		
});	 
</script>

