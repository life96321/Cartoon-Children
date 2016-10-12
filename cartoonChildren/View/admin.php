<?php
include_once '../Framework/db.php';
$msgs = getAllMsgs();
?>
<!--头部-->
<?php
$title = '后台管理首页';
$style = 'headers';
include_once 'link/adminheader.php';
?>
		<div class="rightwrap">
			<ul class="ulone">
				<?php
				foreach ($msgs as $row) {
					echo "
						<li>
						    <p><img src='{$row['src']}' alt='' /></p>
						    <p class='title'>片名：{$row['title']}</p>
							<p class='getmsg'><a href='editmsg.php?id={$row['id']}'>修改</a>
							<a href='../Model/deleteMsg.php?id={$row['id']}'>删除</a>
							<a href='addImgs.php?id={$row['id']}'>相关</a></p>	
						</li>";
				}
			?>
			</ul>
		</div>
	</div>
</div>
<!--尾部-->
<?php
include_once 'link/footer.php';
?>
<script>
var oTxt = document.querySelector('.txt_search');
var oBtn = document.querySelector('.btn_search');
var oLis = document.querySelectorAll('.li');
var title = document.querySelectorAll('.title');
oBtn.onclick = function() {
	for(var i = 0; i < oLis.length; i++) {
		var thisli = oLis[i];
		var thisT = title[i].innerHTML.toLowerCase();
		var sTxt = oTxt.value.toLowerCase();
		var arr = sTxt.split(' ');
		//当我们点击搜索按钮时，先让所有li消失
		thisli.style.display = 'none';
		//如果找到了我们要搜索到内容，则让此li显示，其它li还是消失
		for(var j = 0; j < arr.length; j++) {
			if(thisT.search(arr[j]) != -1) {
				thisli.style.display = 'block';
			}
		}
	}
};
</script>

