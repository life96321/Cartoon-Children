var back = document.querySelector(".back");
var timer = null;
//监听滚动时间
window.onscroll = function() {
	var t = document.body.scrollTop || document.documentElement.scrollTop;
	if(t > 0) {
		back.style.display = "block";
	} else if(t == 0) {
		back.style.display = "none";
	}
}
back.onclick = function() {
	//alert(document.body.scrollTop=0);
	//scrollTop 设置为0 直接回到开头
	//document.body.scrollTop=0;
	clearInterval(timer);
	//DTD模式下不能直接使用body
	//使用document
	var start = document.body.scrollTop || document.documentElement.scrollTop;
	var end = 0;
	var t = 0;
	var d = 30;
	timer = setInterval(function() {
		t++;
		if(t >= d) {
			clearInterval(timer);
		}
		var speed = Tween.Back.easeOut(t, start, end - start, d);
		//区分DTD模式
		if(document.body) {
			document.body.scrollTop = speed;
		} else {
			document.documentElement.scrollTop = speed;
		}
	}, 30)
}