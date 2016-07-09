<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>list</title>
	<style type="text/css">
	html,body {
			font-size: 10px;
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
		#search input,#search a{
			float: left;
			box-sizing: border-box;
		}
		#search input {
			width:90%;
			border:1px solid #333;
			border-right: none;
			outline: none;
			height: 28px;
			line-height: 28px;
			border-radius: 4px 0 0 4px;
			font-size: 1.8rem;
			padding: 2px 12px;
		}
		#search a {
			width:10%;
			height: 28px;
			line-height: 28px;
			color:#fff;
			border-radius: 0 4px 4px 0;
			text-align: center;
			text-decoration: none;
			background-color: hsla(0,100%,50%,1);
		}
		
		#search,#bookList {
			width:90%;
			margin:0 auto;
		}
		#search {
			margin-top:5%;
			margin-bottom: 5%;
		}
		#bookList {
			border-bottom:1px dashed #d9d9d9;
		}
		#bookList li {
			border-top:1px dashed #d9d9d9;
			padding-top: 5%;
			padding-bottom: 5%;
			/*border-bottom:1px dashed #d9d9d9;*/
		}
		#bookList li h2 {
			color:#666699;
			font-size: 2rem;
			margin-bottom: 2%;
		}
		#bookList li p {
			color:#666;
			font-size: 1.6rem;
			margin-bottom: 4%;
		}
		#bookList li .content-score {
			color:#e09015;
		}
		#bookList li a>div {
			float: left;
		}
		#bookList li a>div:first-child {
			width:30%;
			margin-right: 8%;
		}
		#bookList li a>div:nth-child(2) {
			width:60%;
		}



	</style>
</head>
<body>
	<div id="search" class="clearfix">
		<input type="search" id="searchBox" placeholder="请输入要搜索的电影">
		<a href="javascript:void(0);" id="searchBtn">搜索</a>
	</div>
	<ul id="bookList">
		<!-- <li class="clearfix">
			<a href="details.html">
				<div class="book-poster">
					<img src="https://img3.doubanio.com/mpic/s3400022.jpg">
				</div>
				<div>
					<h2>Javascript</h2>
					<p>作者</p>
					<p>
						<span class="content-score">评分：99.5</span>
						<span>（XXX人评价）</span>
					</p>
				</div>
			</a>
		</li>
		<li class="clearfix">
			<a href="">
				<div class="book-poster">
					<img src="https://img3.doubanio.com/mpic/s3400022.jpg">
				</div>
				<div>
					<h2>Javascript</h2>
					<p>作者</p>
					<p>
						<span class="content-score">评分：99.5</span>
						<span>（XXX人评价）</span>
					</p>
				</div>
			</a>
		</li>
		<li class="clearfix">
			<a href="">
				<div class="book-poster">
					<img src="https://img3.doubanio.com/mpic/s3400022.jpg">
				</div>
				<div>
					<h2>Javascript</h2>
					<p>作者</p>
					<p>
						<span class="content-score">评分：99.5</span>
						<span>（XXX人评价）</span>
					</p>
				</div>
			</a>
		</li> -->
	</ul>

	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$("#searchBtn").on("click",function(){


			var searchVal = $.trim($("#searchBox").val())
			
			bookNames(searchVal);
		})
			function bookNames(name){
			$.ajax({
					type:"GET",
					url:'https://api.douban.com/v2/book/search?q='+name,
					dataType:"jsonp",
					success:function(data){
						$("#bookList").html("")
						var booksData = data.books;
						for(var i = 0; i<booksData.length;i++){
							$li = $("<li class='clearfix'></li>");
var content = '<li class="clearfix">'+
			'<a href="details.php?value='+name+'&id='+i+'">'+
				'<div class="book-poster">'+
					'<img src="'+booksData[i].image+'">'+
				'</div>'+
				'<div>'+
					'<h2>'+booksData[i].title+'</h2>'+
					'<p>'+booksData[i].author+'</p>'+
					'<p>'+
						'<span class="content-score">评分：'+booksData[i].rating.average+'</span>'+
						'<span>（'+booksData[i].rating.numRaters+'）</span>'+
					'</p>'+
				'</div>'+
			'</a>'+
		'</li>'
					$li.html(content);
					$("#bookList").append($li);

						}
					}
				})
            }
            bookNames("百年孤独")
		})


	</script>
</body>
</html>