<?php
  /*包含需求檔案 -----------------------------------------------------------------------*/
	include("./bcontroller/class/common_lite.php");
	session_start();
	
 /*宣告變數 --------------------------------------------------------------------------*/
	$ODb = new run_db("mysql",3306);      //建立資料庫物件
	$uploaddir="./bcontroller/upload/demo/";
	$total_num=0;

	$sql_dsc = "select * from `service`";
	$res=$ODb->query($sql_dsc) or die("載入資料出錯，請聯繫管理員。");
	while($row = mysql_fetch_array($res)){
		$id=$row['id'];
		$content=$row['content'];
		
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
                            <li><a href="service.php"><img src="images/nav2_over.jpg" alt="服務"></a></li>
                            <li><a href="cases.php"><img src="images/nav3_nor.jpg" alt="案例"></a></li>
                            <li><a href="contact.php"><img src="images/nav4_nor.jpg" alt="聯繫"></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- header end -->
            <div id="mobile"><a href="index.php"><img src="images/mobile.jpg" alt="行動選單"></a></div>

            <div id="path">
                <div class="info">
                <a href="index.php">首頁</a>服務</a>
                </div>
            </div><!-- path end -->

            <div id="container">
                <div id="about">
                    <div class="con" style="text-align: center;">
                        <?php echo $content;?>
                    </div>
                </div>
            </div><!-- container end -->


            <?php include 'template/footer.php'; ?>

        </div><!-- wrapper end -->
    </body>
</html>
