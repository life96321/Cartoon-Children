var topRight = document.querySelector(".top-right>a"),
	textArea = document.querySelector("textarea"),
	publishBtn = document.querySelector(".btm"),
	message = document.querySelector(".message");

var timer1 = null;
var timer2 = null;

function opacityCtrl() {
	if(textArea.value.length == 0) {
		publishBtn.style.opacity = 0.3;
	} else {
		publishBtn.style.opacity = 1;
	}
}

var textLimit = 140;
textArea.onfocus = function() {
	textLimit = 140 - this.value.length;
	topRight.innerHTML = "还可以输入" + textLimit + "字";
	if(textLimit < 0) {
		topRight.innerHTML = "超出" + (this.value.length - 140) + "字, 请修改";
	}
	topRight.style.color = "#CCCCCC";
	opacityCtrl();
}

textArea.onblur = function() {
	topRight.innerHTML = "一起来评论";
	topRight.style.color = "";
	opacityCtrl();
}

textArea.onkeyup = function() {
	textLimit = 140 - this.value.length;
	topRight.innerHTML = "还可以输入" + textLimit + "字";
	if(textLimit < 0) {
		topRight.innerHTML = "超出" + (this.value.length - 140) + "字, 请修改";
	}
	topRight.style.color = "#CCCCCC";
	opacityCtrl();
}

$(".rone").on("click", function() {
	$(".plotimg").animate({
		"left": "-800px"
	});
});
$(".lone").on("click", function() {
	$(".plotimg").animate({
		"left": "0px"
	});
});
$(".rtwo").on("click", function() {
	$(".likeimg").animate({
		"left": "-800px"
	});
});
$(".ltwo").on("click", function() {
	$(".likeimg").animate({
		"left": "0px"
	});
});