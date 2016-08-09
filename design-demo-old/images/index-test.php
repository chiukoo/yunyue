<?php
  //包含需求檔案 ------------------------------------------------------------------------
	include("./bcontroller/class/common_lite.php");
	session_start();
	
 //宣告變數 ----------------------------------------------------------------------------
	$ODb = new run_db("mysql",3306);      //建立資料庫物件
	$uploaddir="./bcontroller/upload/demo/";
	$total_num=0;

	$sql_dsc = "select * from `demo_index` ORDER BY `order` ";
	$res=$ODb->query($sql_dsc) or die("載入資料出錯，請聯繫管理員。");
	while($row = mysql_fetch_array($res)){
		$id[]=$row['id'];
	    $img[]=$row['img'];
		$title[]=$row['title'];
		$content[]=$row['content'];
		$order[]=$row['order'];
		$url[]=$row['url'];
		
	}
	$total_num = mysql_num_rows($res);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網站建置 | 網頁設計 - Taiwan Cloud 台灣雲端</title>
<meta name="keywords" content="網頁設計,網頁設計公司,台中網頁設計,台灣雲端網頁設計" />
<meta name="description" content="台灣雲端網頁設計公司提供最優質的網頁設計、網站架設、系統設計等多項服務. 我們的客戶來自於各行各業，以最全面性的服務來滿足您的需求。" />
<meta name="author" content="" />
<meta name="copyright" content="" />


<link media="screen" rel="stylesheet" href="css/web.css" /> 
<link media="screen" rel="stylesheet" href="css/chocolat.css" /> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="js/fade.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<link rel="shortcut icon" href="images/favicon.ico" />
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery.chocolat.js"></script>
<script type="text/javascript" src="js/jquery.waterfall.js"></script>

<script type="text/javascript"><!-- 
function printout() {
if (!window.print){alert("列印功能暫時停用，請按 Ctrl-P 來列印"); return;}
window.print();}
function MM_openBrWindow(theURL,winName,features) {
window.open(theURL,winName,features);}
// --></script>

<script type="text/javascript">
	  $(function() {
		  $('#example a').Chocolat({overlayColor:'#000',leftImg:'images/leftw.gif',rightImg:'images/rightw.gif',closeImg:'images/closew.gif'});
	  });
</script>
	<style type="text/css">
		#content{width:1000px;margin:50px auto;}
		#content > div{float:left;width:230px;margin:0 20px 20px 0;background:#eee;text-align:center;font-size:24px;color:#999;padding-top:20px;}
	</style>
	
	

</head>

<body>

<div class="animated fadeInDown">

<header>
<div id="logo"><a href=""><img src="images/logo.jpg" /></a></div>
<nav><ul>
<a href="about.php" ><li><img src="images/nav1_nor.jpg" /></li></a>
<a href="index.php"><li><img src="images/nav2_nor.jpg" /></li></a>
<a href="sys_index.php"><li><img src="images/nav3_nor.jpg" /></li></a>
<a href="contact.php"><li><img src="images/nav4_nor.jpg" /></li></a>
</ul></nav>
</header>


<div id="content">
<div><img src="images/title.png" height="94" /></div>
<div><img src="images/title.png" height="194" /></div>
<div><img src="images/title.png" height="294" /></div>
<div><img src="images/title.png" height="54" /></div>
<div><img src="images/title.png" height="44" /></div>

	</div>

	

<section>




<?php for($x=0;$x<$total_num;$x++){?>

<div class="item">
    <div id="example">
    <a  href="<?php echo $uploaddir.$img[$x];?>"  title="<?php echo $content[$x];?>"><span class="roll"></span><img width="200" src="<?php echo $uploaddir.$img[$x];?>"/></a></div>
    <a class="image"  href="<?php echo $url[$x];?>" target="_blank"><h2><?php echo $title[$x];?></h2></a>
    <hr />
    <span><?php echo $content[$x];?></span>
</div>

<?php }?>

</section>


		<script type="text/javascript">
		var t = "";
		$("#content").waterfall({
			isResizable : true,
			end:function(){
				t = $("#footer").offset().top;
			}		
		});
		
		$(window).scroll(function(){
			var a = $(window).scrollTop();

			if( a + $(window).height() > t -10 ){
				var html = "",
					i = $("#content > div.waterfall").length,
					n = i+10;
					
				for(i=i; i<=n; i++){
					var h = parseInt( Math.random()*300 + 100 );
					html += '<div style="height:'+h+'px;">'+i+'</div>';
					
				}

				$("#content").append(html).waterfall({
					isResizable : true,
					end:function(){
						t = $("#footer").offset().top;
					}
				});
			}
			
		});
	</script>

<footer><a href="http://www.taiwan-cloud.com">© Copyright 2013 Taiwan Cloud All rights Reserved.</a></footer>

</div><!-- animated end -->


</body>
</html>
