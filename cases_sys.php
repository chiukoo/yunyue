<?php
  //包含需求檔案 ------------------------------------------------------------------------
	include("./bcontroller/class/common_lite.php");
	session_start();
	
 //宣告變數 ----------------------------------------------------------------------------
	$ODb = new run_db("mysql",3306);      //建立資料庫物件
	$uploaddir="./bcontroller/upload/demo/";
	$total_num=0;

	$sql_dsc = "select * from `sys_index` ORDER BY `order` ";
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
<!DOCTYPE html>
<html lang="en">
    <head>

        <?php require_once 'template/base.inc'; ?> 

    </head>
    <body>
        <div id="wrapper" class="animated">
            <div id="header">
                <div class="headbox">
                    <div id="logo"><a href="index.php"><img src="images/logo.jpg" alt="台灣雲端運算有限公司"></a></div>
                    <div id="nav">
                        <ul>
                            <li><a href="about.php"><img src="images/nav1_nor.jpg" alt="關於"></a></li>
                            <li><a href="service.php"><img src="images/nav2_nor.jpg" alt="服務"></a></li>
                            <li><a href="cases.php"><img src="images/nav3_over.jpg" alt="案例"></a></li>
                            <li><a href="contact.php"><img src="images/nav4_nor.jpg" alt="聯繫"></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- header end -->
            <div id="mobile"><a href="index.php"><img src="images/mobile.jpg" alt="行動選單"></a></div>

            <div id="path">
                <div class="info">
                <a href="index.php">首頁</a><a href="cases.php">案例</a>系統設計</a>
                </div>
            </div><!-- path end -->

            <div id="container" class="full">
                <div class="works clearfix">
                    <div class="title">
                        <img src="images/title_case.jpg" alt="作品瀏覽" />
						<div class="works_select"><button onclick="location.href='cases.php'">網頁設計</button><button class="select">系統設計</button></div>
                    </div>
                    <div id="select_case"></div>
                        <ul class="works">
                            <?php for($x=0;$x<$total_num;$x++){?>>
                            <li>
							<?php if($url[$x]!=''){echo "<a href='$url[$x]' target='_blank'>";}?><img src="<?php echo $uploaddir.$img[$x];?>" alt="<?php echo $title[$x];?>" /><span><?php echo $title[$x];?></span>
							<?php if($url[$x]!=''){echo "</a>";}?>
							</li>
                            <?php }?>
                        </ul>
                </div>
            </div><!-- container end -->


            <?php include 'template/footer.php'; ?>

        </div><!-- wrapper end -->
    </body>
</html>
