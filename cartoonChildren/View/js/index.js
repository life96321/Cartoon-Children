$(function() {
	//大图滚动对应的文字
	$('.carousel').carousel();
	var arr = new Array();
	arr[0] = "《新葫芦兄弟》：重温经典，让00后感受80，90的童年";
	arr[1] = "《疯狂动物城》：让我们和朱迪一起去探索这个疯狂而温馨的城市";
	arr[2] = "《名侦探柯南》：真相永远只有一个，跟随柯南去探索真相吧";
	arr[3] = "《倒霉熊》：一部关于可爱的北极熊贝肯的幽默搞笑动画片";
	arr[4] = "《海贼王》：海贼时代，路飞带着朋友开始了一段伟大的冒险旅程";
	arr[5] = "《熊出没》：看森林保护者熊兄弟与光头强的斗志斗勇";
	$('#myntCarousel').on('slid', function() {
		var indexLi = $('#myntCarousel .carousel-inner').find('.item.active').index();
		$('.rtxts span').html(arr[indexLi]);
	});

	//排行榜
	$(".out").on("mouseover", function() {
		$(".iright").animate({
			"left": "-300px"
		})
	});
	$(".in").on("mouseover", function() {
		$(".iright").animate({
			"left": "0px"
		})
	});

	//热播榜
	$(".htone").on("click", function() {
		$(".hits").animate({
			"left": "0px"
		})
	});
	$(".httwo").on("click", function() {
		$(".hits").animate({
			"left": "-300px"
		})
	});
	$(".htthree").on("click", function() {
		$(".hits").animate({
			"left": "-600px"
		})
	});
	$(".htfour").on("click", function() {
		$(".hits").animate({
			"left": "-900px"
		})
	});

	var oNumones = document.querySelectorAll('.numone');
	var oNumtwos = document.querySelectorAll('.numtwo');
	var oIdones = document.querySelectorAll('.idone');
	var oIdtwos = document.querySelectorAll('.idtwo');
	var oIdthrees = document.querySelectorAll('.idthree');
	var oIdfours = document.querySelectorAll('.idfour');
	for(var i = 0; i < oNumones.length; i++) {
		oNumones[i].innerHTML = i + 1;
	}
	for(var i = 0; i < oNumtwos.length; i++) {
		oNumtwos[i].innerHTML = i + 1;
	}
	for(var i = 0; i < 6; i++) {
		oIdones[i].innerHTML = i + 1;
		oIdtwos[i].innerHTML = i + 1;
		oIdthrees[i].innerHTML = i + 1;
		oIdfours[i].innerHTML = i + 1;
	}
});
