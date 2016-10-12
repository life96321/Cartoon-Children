<!--头部-->
<?php
$title = '登录界面';
$style = 'header';
include_once 'link/header.php';
?>
<!--中部-->
<div id="content" style="margin-bottom: 680px;">
	<div class="bg">
		<div class="page1">
			<canvas id="mycanvas"></canvas>
		</div>
	</div>
	<div class="section">
		<div class="login r">
			<h3>用户登录</h3>
			<p>
				<input type="text" class="name" placeholder="用户名"/>
				<p>用户名不得为空，并且长度不得超过32个字符</p>
			</p> 
			<p>
				<input type="password" class="pass" placeholder="密码"/>
				<p>密码不得为空</p>
			</p> 
			<p>
				<input type="text" class="vcode" placeholder="验证码"/>
				<p>请输入下方验证码</p>
			</p>
			<p>
				<img src="show_vcode.php" alt="" class="code"/>
				<span class="other">换一张</span>
			</p>
 			<input type="submit" id="login" value="登 录" class="submit"/> 
		</div>
	</div>
</div>
<!--尾部-->
<?php
include_once 'link/footer.php';
?>
<script src="js/bg.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(".search").css({
	"display": "none"
});
var footer = document.getElementById('footer');
footer.style.top = 90 + "px";
var vcode = document.querySelector('.code');
var other = document.querySelector('.other');
other.onclick = function() {
	vcode.src = "show_vcode.php";
}
$("#login").on("click", function() {
	$.ajax({
		type: "post",
		url: "../Model/member_login.php?action=login",
		async: true,
		data: {
			name: $('.name').val(),
			pass: $(".pass").val(),
			vcode: $(".vcode").val()
		},
		success: function(json) {
			alert(json);
			if(json == '登录成功'){
				history.go(-1); //返回上一页
			}
		}
	});
});
</script>

