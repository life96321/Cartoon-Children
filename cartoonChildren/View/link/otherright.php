<?php
include_once '../Config/mysql.php';
include_once '../Framework/db.php';

$inMsgs = getInMsgs();
$outMsgs = getOutMsgs();
$AllMsgs = getAllLiMsgs();
?>
<!--右侧-->
<div class="de_right r">
	<h3>动漫风云榜</h3>
	<div class="delist">
		<ul class="ul1">
			<li><a href="" class="deall">全部</a></li>
			<li><a href="" class="dein">国内</a></li>
			<li><a href=""class="deout">国外</a></li>
		</ul>
		<ul class="carts">
			<li class="li1">
				<ul class="ul2">
				<?php
					foreach ($AllMsgs as $row) {
						$pages = "<li>";
						$pages .= "<a href='details.php?id={$row['id']}&title={$row['title']}'>{$row['title']}</a>";
						$pages .= "</li>";
						echo $pages;
					}
				?> 
                	</ul>
			</li>
			<li class="li2">
				<ul class="ul2">
				<?php
					foreach ($inMsgs as $row) {
						$pages = "<li>";
						$pages .= "<a href='details.php?id={$row['id']}&title={$row['title']}'>{$row['title']}</a>";
						$pages .= "</li>";
						echo $pages;
					}
				?> 
                	</ul>
			</li>
			<li class="li3">
				<ul class="ul2">
    				<?php
					foreach ($outMsgs as $row) {
						$pages = "<li>";
						$pages .= "<a href='details.php?id={$row['id']}&title={$row['title']}'>{$row['title']}</a>";
						$pages .= "</li>";
						echo $pages;
					}
				?> 
                	</ul>
			</li>
			
		</ul>
	</div>
	<h3>相关推荐</h3>
	<div class="delist">
		<ul class="recommend">
			<li><img src="img/a1.jpg" alt="" /><div><p>片名：功夫熊猫3</p><p>类型：喜剧/冒险</p></div></li>
			<li><img src="img/a2.jpg" alt="" /><div><p>片名：喜羊羊与灰太狼</p><p>类型：亲子/益智</p></div></li>
			<li><img src="img/a3.jpg" alt="" /><div><p>片名：海贼王</p><p>类型：喜剧/冒险</p></div></li>
			<li><img src="img/a4.jpg" alt="" /><div><p>片名：千与千寻</p><p>类型：经典/冒险</p></div></li>
			<li><img src="img/a5.jpg" alt="" /><div><p>片名：借东西的小人阿莉埃蒂</p><p>类型：励志/冒险</p></div></li>
			<li><img src="img/a6.jpg" alt="" /><div><p>片名：萤火虫之墓</p><p>类型：剧情/战争</p></div></li>
			<li><img src="img/a7.jpg" alt="" /><div><p>片名：红猪</p><p>类型：奇幻/喜悦</p></div></li>
		</ul>
	</div>
</div>