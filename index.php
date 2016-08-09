<?php
  /*包含需求檔案 -----------------------------------------------------------------------*/
	include("./bcontroller/class/common_lite.php");
	session_start();
	
 /*宣告變數 --------------------------------------------------------------------------*/
	$ODb = new run_db("mysql",3306);      //建立資料庫物件
	$uploaddir="./bcontroller/upload/demo/";
	$total_num=0;

	$sql_dsc = "select * from `demo_index` order by rand() ";
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
<html lang="en">
    <head>

        <?php require_once 'template/base.inc'; ?> 


        <link href="css/banner.css" rel="stylesheet" type="text/css">
		<!-- jQuery -->
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <!-- jmpress plugin -->
		<script type="text/javascript" src="js/banner.jmpress.js"></script>
		<!-- jmslideshow plugin : extends the jmpress plugin -->
		<script type="text/javascript" src="js/banner.jmslideshow.js"></script>

    </head>
    <body>
        
        <div id="wrapper" class="animated fadeInDown">
            <div id="header">
                <div class="headbox">
                    <div id="logo"><a href="index.php"><img src="images/logo.jpg" alt="台灣雲端運算有限公司"></a></div>
                    <div id="nav">
                        <ul>
                            <li><a href="about.php"><img src="images/nav1_nor.jpg" alt="關於"></a></li>
                            <li><a href="service.php"><img src="images/nav2_nor.jpg" alt="服務"></a></li>
                            <li><a href="cases.php"><img src="images/nav3_nor.jpg" alt="案例"></a></li>
                            <li><a href="contact.php"><img src="images/nav4_nor.jpg" alt="聯繫"></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- header end -->
            <div id="mobile"><a href="index.php"><img src="images/mobile.jpg" alt="行動選單"></a></div>



            <div id="banner">
            <section id="jms-slideshow" class="jms-slideshow">
				<div class="step" data-color="color-2">
					<div class="jms-content">
						<h3>Responsive Design</h3>
					<p>　　數位時代來臨，在建置一個網站時，除了參考以往大多數 設計網頁時會考量到的1024×768標準解析度，現在也因為手持 裝置的興盛，有了其他選擇。<br> 　 EHTAN MARCOTTE提出了響應式網頁設計概念，簡而言之， 就是整個網頁頁面會對應不同的解新度，而有不同的呈現方式， 讓裝置成為一個介質，使用者才是真正的主角…</p>
						<!--<a class="jms-link" href="#">Read more</a>-->
					</div>
					<img src="images/1.png" />
				</div>
				<div class="step" data-color="color-3" data-y="900">
					<div class="jms-content">
						<h3>行動裝置APP</h3>
					<p>Android系統應用開發。
                            <br>Google Play 發佈。</p>
					</div>
					<img src="images/2.png" />
				</div>
				<div class="step" data-color="color-4" data-x="-100" data-rotate="170">
					<div class="jms-content">
						<h3>Web應用(B/S)訂製開發</h3>
					<p>自主研發、完善的開發框架。 詳細的需求調研及解?方案。 實施項目經驗豐富的項目團隊。</p>
					</div>
					<img src="images/3.png" />
				</div>
				<div class="step" data-color="color-5" data-x="3000">
					<div class="jms-content">
						<h3>您的網站全職管家</h3>
					<p>成熟的監控與警報機制。 豐富的整合營銷的能力和經驗。 專業數據分析、開發和維護部門。</p>
					</div>
					<img src="images/4.png" />
				</div>
			</section>
			</div>

            


            <div id="container">
                <div class="workbox clearfix">
                    <div class="title index"><img src="images/title_case.jpg" alt="作品瀏覽" /></div>
                    <ul class="works hidden">
                        <?php for($x=0;$x<$total_num;$x++){?>
                        <li><?php if($url[$x]!=''){echo "<a href='$url[$x]' target='_blank'>";}?><img src="<?php echo $uploaddir.$img[$x];?>" alt="<?php echo $title[$x];?>" /><?php if($url[$x]!=''){echo "</a>";}?></li>
                        <?php }?>
                    </ul>
                </div>
                
            </div><!-- container end -->


            <?php include 'template/footer.php'; ?>

        </div><!-- wrapper end -->

       <script type="text/javascript">
			$(function() {
				
				var jmpressOpts	= {
					animation		: { transitionDuration : '1.0s' }
				};
				
				$( '#jms-slideshow' ).jmslideshow( $.extend( true, { jmpressOpts : jmpressOpts }, {
					autoplay	: true,
					bgColorSpeed: '1.0s',
					arrows		: false
				}));
				
			});
		</script>
    </body>
</html>
