<?php 
	header("Content-Type:text/html;charset=utf8");
	$value = $_GET["value"];
	$id = $_GET["id"];
	$url = "https://api.douban.com/v2/book/search?q=".$value;
	$content = file_get_contents($url);
	$content = json_decode($content);
	$content = $content->books[$id];
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
	html,body {
			font-size: 10px;
			/*font-family: "Microsoft Yahei";*/
		}
		* {
			margin:0;
			padding:0;
		}
		.clearfix {
			*zoom: 1;
		}
		.clearfix:after {
			content: "";
			clear: both;
			display: block;
			visibility: hidden;
			font-size: 0;
			height: 0;
		}
		img {
			display: block;
			width:100%;
		}
		ul,ol {
			list-style: none;
		}
		#info {
			width:90%;
			margin:5% auto;
		}
		#info h1 {
			font-size: 2rem;
		}
		.book-box {
			margin:5% 0;
		}
		.book-box>div {
			float: left;
		}
		.book-box>div:first-child {
			width:40%;
			margin-right: 5%;
		}
		.book-box .book-detials {
			width:52%;
		}
		.book-box>div p {
			font-size: 1.8rem;
		}
		.book-intro li {
			margin:5% 0;
		}
		.book-intro h2{
			color:#007722;
			font-size: 1.8rem;
			margin-bottom: 2%;
		}
		.book-intro div {
			color:#333;
			font-size: 1.6rem;
			text-indent: 2rem;
		}


	</style>
</head>
<body>
	<div id="info">
	<h1><?php echo $content->title; ?></h1>
	<div class="book-box clearfix">
	<div>
	<img src="<?php echo $content->image ?>">
	</div>
	<div class="book-details">
	<p>作者：<?php echo $content->author; ?></p>
	<p>出版社：<?php echo $content->publisher; ?></p>
	<p>副标题：<?php echo $content->subtitle; ?></p>
	<p>出版年：<?php echo $content->pubdate; ?></p>
	<p>页数：<?php echo $content->pages; ?></p>
	<p>定价: <?php echo $content->price ?>元</p>
	<p>装帧：<?php echo $content->binding; ?></p>
	<p>ISBN:<?php echo $content->isbn13; ?></p>
	</div>
	</div>
	 <ul class="book-intro">
		<li>
			<h2>作者简介·····</h2>
			<div>
				<?php echo $content->author_intro; ?>
			</div>
		</li>

		<li>
			<h2>内容简介</h2>
			<div>
				<?php echo $content->summary; ?>
			</div>
		</li>
	 </ul>
	</div>

</body>
</html>