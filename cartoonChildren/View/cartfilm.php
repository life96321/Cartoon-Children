<?php
include_once '../Framework/db.php';
$pageConfig = require_once '../Config/page.php';

$allFilm = getAllMsgs();
if (isset($_GET[$pageConfig['page_params']])) {
	$currentPage = $_GET[$pageConfig['page_params']];
} else {
	$currentPage = 1;
}

if ($currentPage <= 0) {
	$currentPage = 1;
}

$pageCount = ceil(getFilmCount() / $pageConfig['page_size']);
if ($currentPage > $pageCount) {
	$currentPage = $pageCount;
}

$allFilm = getFilmNumber($currentPage, $pageConfig['page_size']);
?>
<?php
$title = '动漫电影';
$style = 'header';
include_once 'link/header.php';
?>
<!--中部-->
<div id="content">
	<?php include_once 'link/runimg.php';?>
				<!--电影-->
				<ul class="imgs com">
					<?php
						foreach ($allFilm as $row) {
							$pages = "<li class='lis'>";
							$pages .= "<h3 class='atitle'>{$row['title']}</h3>";
							$pages .= "<a href='details.php?id={$row['id']}&title={$row['title']}'>";
							$pages .= "<img src='{$row['src']}' alt='' class='liimgs l'/></a>";
							$pages .= "<div class='detail'>";
							$pages .= "<p><span>地区：</span>{$row['region']}</p>";
							$pages .= "<p><span>分类：</span>{$row['classify']}</p>";
							$pages .= "<p><span>更新：</span>{$row['newest']}</p>";
							$pages .= "<p><span>状态：</span>{$row['state']}</p>";
							$pages .= "<p class='time'><span>更新时间：</span></p><p>{$row['time']}</p>";
							$pages .= "<p class='details'><a href='details.php?id={$row['id']}&title={$row['title']}'>［详情］</a></p>";
							$pages .= "</div>";
							$pages .= "</li>";
							echo $pages;
						}
					?>
				</ul>
			</div>
		<?php include_once 'link/indexright.php';?>
		</div>
		<?php
			require_once '../Model/pages.php';
			echo createPage($_SERVER['PHP_SELF'],$currentPage, $pageCount);	
		?>
	</div>
</div>
<?php
include_once 'link/footer.php';
?>
<script src="js/carousel.js" type="text/javascript" charset="utf-8"></script>
<script src="js/transition.js" type="text/javascript" charset="utf-8"></script>
<script src="js/index.js" type="text/javascript" charset="utf-8"></script>
