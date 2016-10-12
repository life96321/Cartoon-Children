window.onload = function() {
	var bodyWidth = document.body.offsetWidth;
	console.log(bodyWidth);
	var oDiv = document.getElementById('div1');
	var oDivWidth = oDiv.offsetWidth;
	console.log(oDivWidth);
	//alert(oDiv.offsetLeft);     //-150
	//如果两个函数功能一样，参数越少越好
	oDiv.onmouseover = function() {
		startMove(bodyWidth - oDivWidth);
	};
	oDiv.onmouseout = function() {
		startMove(bodyWidth);
	};
};
var timer = null;
//封装函数，然后调用
//参数为运动元素要达到的目标值
function startMove(iTarget) {
	var oDiv = document.getElementById('div1');
	clearInterval(timer);
	timer = setInterval(function() {
		//先定义一个变量speed，用来存储要变化的速度
		var speed = 0;
		if(oDiv.offsetLeft > iTarget) {
			speed = -1;
		} else {
			speed = 1;
		}
		if(oDiv.offsetLeft == iTarget) {
			clearInterval(timer);
		} else {
			oDiv.style.left = oDiv.offsetLeft + speed + 'px';
		}
		//console.log(oDiv.style.left);
	}, 1);
}