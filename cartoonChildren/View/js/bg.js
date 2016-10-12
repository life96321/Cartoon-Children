function drawroll() {
	var canvas1 = document.getElementById('mycanvas');
	var ctx = canvas1.getContext('2d');
	var page1 = document.querySelector(".page1");
	page1.style.height = document.body.clientHeight+"px";
	canvas1.style.height = document.body.clientHeight+"px";
	var m = 0;
	(function() {
		var requestAnimationFrame =
			window.requestAnimationFrame ||
			window.mozRequestAnimationFrame ||
			window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
		window.requestAnimationFrame = requestAnimationFrame;
	})();
	$(function() {
		var rolls = [];
		var rollline = [];

		function rand(max, min) {
			return parseInt(Math.random() * (max - min + 1)) + min;
		}

		function roll(x, y, r, c) {
			this.x = x;
			this.y = y;
			this.r = r;
			this.c = c;
			this.speedx = 0.5;
			this.speedy = 0.5;
		}
		roll.prototype.draw = function() {
			this.move();
			ctx.beginPath();
			ctx.fillStyle = this.c;
			ctx.arc(this.x, this.y, this.r, 0, 2 * Math.PI, true);
			ctx.fill();
			ctx.closePath();
		}
		roll.prototype.move = function() {
			if(this.x < this.r) {
				this.x = canvas1.width - this.r;
			} else if(this.x > canvas1.width - this.r) {
				this.x = this.r
			}
			if(this.y < this.r) {
				this.y = canvas1.height - this.r;
			} else if(this.y > canvas1.height - this.r) {
				this.y = this.r;
			}
			this.x += this.speedx;
			this.y -= this.speedy;
		}
		window.addEventListener("resize", function() {
				rolls = [];
				init();
			})
			//初始化对象
		function init() {
			rollline = [];
			canvas1.width = page1.offsetWidth;
			canvas1.height = page1.offsetHeight;
			for(var i = 0; i < canvas1.width; i += 50) {
				for(var j = 0; j < canvas1.height; j += 50) {
					var obj = new roll(rand(0, canvas1.width), rand(0, canvas1.height), rand(0, 200) * 0.01, "rgb(" + rand(0, 255) + "," + rand(0, 255) + "," + rand(0, 255) + ")");
					rolls.push(obj);
				}
			}
		}
		//画图
		function rolldraw() {
			m = (m >= 1000) ? 0 : ++m;
			if(m % 5 == 0) {
				ctx.clearRect(0, 0, canvas1.width, canvas1.height);
				for(var i = 0; i < rolls.length; i++) {
					rolls[i].draw();
				}
				drawline();
			}
			window.requestAnimationFrame(rolldraw);
		}
		init();
		rolldraw();
		canvas1.addEventListener("mousemove", function() {
			var x = event.pageX;
			var y = event.pageY - page1.offsetTop;
			rollline = [];
			var ron = Math.sqrt(Math.pow(0.15 * canvas1.width, 2) + Math.pow(0.15 * canvas1.height, 2))
			for(var i = 0; i < rolls.length; i++) {
				if(Math.sqrt(Math.pow(rolls[i].x - x, 2) + Math.pow(rolls[i].y - y, 2)) <= ron) {
					rollline.push(rolls[i]);
				}
			}
			console.log(rollline);
		}, false);
		//清除线条
		canvas1.addEventListener("mouseout", function() {
			rollline = [];
		})

		function drawline() {
			for(var i = 0; i < rollline.length; i++) {
				for(var j = 0; j < i; j++) {
					if(Math.sqrt(Math.pow(rollline[i].x - rollline[j].x, 2) + Math.pow(rollline[i].y - rollline[j].y, 2)) <= 80) {
						ctx.beginPath();
						ctx.strokeStyle = rollline[i].c;
						ctx.moveTo(rollline[i].x, rollline[i].y);
						ctx.lineTo(rollline[j].x, rollline[j].y);
						ctx.lineWidth = 0.2;
						ctx.stroke();
						ctx.closePath();
					}
				}
			}
		}
	})
}
drawroll();