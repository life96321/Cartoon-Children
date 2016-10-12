<?php
include_once '../Framework/db.php';
$inMsgs = getInMsgs();
$outMsgs = getOutMsgs();
$dlMsgs = getAllInlandMsgs();
$rbMsgs = getAllRblandMsgs();
$omMsgs = getAllOmlandMsgs();
?>
<!--中间右侧-->
<div class="rights r">
	<!--排行榜-->
	<h2 class="l">排行榜</h2>
	<div class="imgright r">
		<ul class="ileft l">
			<li><a href="" class="in">国内排行榜</a></li>
			<li><a href="" class="out">国外排行榜</a></li>
		</ul>
		<ul class="smltil l">
			<li><a href="">标题</a></li>
			<li><a href="">关注度</a></li>
		</ul>
		<ul class="iright l">
			<li class="l inside">
				<ul>
				<?php
					foreach ($inMsgs as $row) {
						$pages = "<li>";
						$pages .= "<a href='details.php?id={$row['id']}&title={$row['title']}'><p><span class='numone'></span>{$row['title']}<i>{$row['goodnum']}万</i></p></a>";
						$pages .= "</li>";
						echo $pages;
					}
				?> 
                	</ul>
			</li>
			<li class="l outside">
				<ul>
    				<?php
					foreach ($outMsgs as $row) {
						$pages = "<li>";
						$pages .= "<a href='details.php?id={$row['id']}&title={$row['title']}'><p><span class='numtwo'></span>{$row['title']}<i>{$row['goodnum']}万</i></p></a>";
						$pages .= "</li>";
						echo $pages;
					}
				?> 
                	</ul>
			</li>
		</ul>
	</div>
	<!--热播榜-->
	<h2 class="l">热播榜</h2>
	<div class="hit r">
		<!--<div>放滚动的图片</div>-->
		<ul class="hitul">
			<li class="htone">内地</li>
      		<li class="httwo">日本</li>
      		<li class="htthree">欧美</li>
      		<li class="htfour">韩国</li>
  		</ul>
  		<ul class="hits">
  			<!--内地-->
  			<li class="hits_ulone">
  				<ul>
  					<?php
						foreach ($dlMsgs as $row) {
							$pages = "<li>";
							$pages .= "<img src='{$row['src']}' alt='' class='hitone_img'/><p><span class='idone'></span><a href='details.php?id={$row['id']}&title={$row['title']}'>{$row['title']}</a></p>";
							$pages .= "</li>";
							echo $pages;
						}
					?>
  				</ul>
  			</li>
  			<!--港台-->
  			<li class="hits_ultwo">
  				<ul>
  					<?php
						foreach ($rbMsgs as $row) {
							$pages = "<li>";
							$pages .= "<img src='{$row['src']}' alt='' class='hitone_img'/><p><span class='idtwo'></span><a href='details.php?id={$row['id']}&title={$row['title']}'>{$row['title']}</a></p>";
							$pages .= "</li>";
							echo $pages;
						}
					?>
  				</ul>
  			</li>
  			<!--欧美-->
  			<li class="hits_ulthree">
  				<ul>
  					<?php
						foreach ($omMsgs as $row) {
							$pages = "<li>";
							$pages .= "<img src='{$row['src']}' alt='' class='hitone_img'/><p><span class='idthree'></span><a href='details.php?id={$row['id']}&title={$row['title']}'>{$row['title']}</a></p>";
							$pages .= "</li>";
							echo $pages;
						}
					?>
  				</ul>
  			</li>
  			<!--日韩-->
  			<li class="hits_ulfour">
  				<ul>
  					<?php
						foreach ($rbMsgs as $row) {
							$pages = "<li>";
							$pages .= "<img src='{$row['src']}' alt='' class='hitone_img'/><p><span class='idfour'></span><a href='details.php?id={$row['id']}&title={$row['title']}'>{$row['title']}</a></p>";
							$pages .= "</li>";
							echo $pages;
						}
					?>
  				</ul>
  			</li>
  		</ul>
    	</div>
    	<!--漫迷俱乐部-->
    	<h2 class="l">漫迷俱乐部</h2>
    	<div class="club r">
    		<div>
    			<h4><a href="#">疯狂动物城</a></h4>
    			<img src="img/07.jpg" alt="" />
    			<p>有很多奇思妙想之处，把各种大小动物的特点展现的淋漓尽致，比如长颈鹿，和小型啮齿类动物城，眼前一亮。特别是树懒闪电让人捧腹。适合全家人一起看……</p>
    		</div>
    		<div>
    			<h4><a href="#">千与千寻</a></h4>
    			<img src="img/08.jpg" alt="" />
    			<p>小时候看不明白看不懂，虽说小时候没看懂但还是特别喜欢这部动漫。长大后就看懂了也明白了爱情，琥珀主和千寻的爱情很美好，看得我很羡慕……</p>
    		</div>
    		<div>
    			<h4><a href="#">哈尔的移动城堡</a></h4>
    			<img src="img/09.jpg" alt="" />
    			<p>从18岁的美少女变成了90岁的老太婆。她惊恐地逃出家里，但又进入了一座移动的城堡，她和不能与人相恋但懂魔法的哈尔，谱出了一段战地恋曲……</p>
    		</div>
    		<p class="more"><a href="comment.php">更多</a></p>
    	</div>
</div>