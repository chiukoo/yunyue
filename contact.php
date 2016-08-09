<?php
  //包含需求檔案 ------------------------------------------------------------------------
session_start();
	include("./bcontroller/class/common_lite.php");
		

 //宣告變數 ----------------------------------------------------------------------------
	$ODb = new run_db("mysql",3306);      //建立資料庫物件
	$uploaddir = "./images/banner/";		//圖片的目錄
	
	if(isset($_POST['contact_add'])&&$_POST['contact_add']=='add'){
		
	    $uploaddir = "./bcontroller/upload/message/";		//圖片的目錄
      
		   		
	//$upload_img_name_array = array('img1','img2','img3','img4');//上傳圖片的欄位名稱
		   
		  // $a=1;
		//foreach($upload_img_name_array as $weight_name){
		$file_type_dsc = explode(".",basename($_FILES['picup']['name']));
		
		$mtime = explode(" ", microtime()); 
		$startTime = $mtime[1] + $mtime[0];		
		 $new_name = $startTime.".".$file_type_dsc[1];
		$uploadfile = $uploaddir.$new_name;
		
	   
			if (move_uploaded_file($_FILES['picup']['tmp_name'], $uploadfile)) {
			
			$_POST['picup']=$new_name;
				//$up_dsc ="update `msg_leave` set  `img1`='".$new_name."' where `id`=1";
				//$res=$ODb->query($up_dsc) or die("更新資料出錯，請聯繫管理員。");
			
			}
			//$a++;
	//	}
	
	$updateDsc =  date("Y-m-d H:i:s",time());
	$insert_sql_dsc = "insert into `content` set `name`='".$_POST['name']."',`content_in`='".$_POST['content_in']."',`email`='".$_POST['email']."',`title`='".$_POST['title']."',`phone`='".$_POST['phone']."',`type`='".$_POST['type']."',`img`='".$_POST['picup']."',`create_dt`='".$updateDsc."'";
	$res=$ODb->query($insert_sql_dsc) or die("新增資料出錯，請聯繫管理員。");
	ri_jump("contact.php");	
		
		
		}

	?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <?php require_once 'template/base.inc'; ?> 

        <!-- verification -->
        <script type="text/javascript" src="js/judge.js"></script>

        <!-- map -->
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="js/jquery.tinyMap-2.5.3.min.js"></script>
        <script type="text/javascript" >
        $(function () {
            $('#map').tinyMap({
                center: '台中市北屯區三段67號4樓', 
                zoom: 17, 
                mapTypeId: 'roadmap', 
		        marker: [ 
                {addr: '台中市北屯區三段67號4樓', text: '<h5>雲玥資訊有限公司</h5>台中市北屯區三段67號4樓',  css: 'label',
		         icon: 'images/map_mark.png'
		        }, 
		        ]
            });
        });
        </script>

        <!-- submit -->
        <script>
            function ck_value(){
			//alert("aaa");
            $('#contactbox').submit();
            }
        </script>

    </head>
    <body>
        <div id="wrapper" class="animated">
            <div id="header">
                <div class="headbox">
                    <div id="logo"><a href="index.php"><img src="images/logo.jpg" alt="雲玥資訊有限公司"></a></div>
                    <div id="nav">
                        <ul>
                            <li><a href="about.php"><img src="images/nav1_nor.jpg" alt="關於"></a></li>
                            <li><a href="service.php"><img src="images/nav2_nor.jpg" alt="服務"></a></li>
                            <li><a href="cases.php"><img src="images/nav3_nor.jpg" alt="案例"></a></li>
                            <li><a href="contact.php"><img src="images/nav4_over.jpg" alt="聯繫"></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- header end -->
            <div id="mobile"><a href="index.php"><img src="images/mobile.jpg" alt="行動選單"></a></div>

            <div id="path">
                <div class="info">
                <a href="index.php">首頁</a>聯絡我們</a>
                </div>
            </div><!-- path end -->

            <div id="container">

                <div id="contact">
                    <div class="infor">
                        <div id="map"></div>
                    </div>
                    <div class="forms">
                        <div class="infor">
                        <p>如尚有任何需求或疑問需我們為您服務，請填寫下表，留下您所需的服務內容及聯絡方式，我們將盡速主動與您聯絡，謝謝。</p>
                        <p>
                            電話:0422370918</br>
							地址:台中市北屯區三段67號4樓
                        </p>
                        </div>
                        <!-- form star -->
                        <form action="" method="post" enctype="multipart/form-data" id="contactbox" name="contactbox" >
                            <ul>
                                <li><label>聯絡人</label><input type="text" id="name" name="name" title="聯絡人" />　　　<label>聯絡電話</label><input type="tel" id="phone" name="phone" title="聯絡電話" /></li>
                                <li><label>電子郵件</label><input type="email" id="email" name="email" title="電子郵件" /></li>
                                <li><label>主旨</label><input type="text" id="title" name="title" title="主旨" /></li>
                                <li><label>內容</label><textarea id="content_in" name="content_in" title="內容"></textarea></textarea></li>
                                <li><label>驗證碼</label><input type="text" class="input" id="code_char" name="code_char" maxlength="4"  />　<img src="code_char.php" id="getcode_char" title="看不清楚，點擊換一張">　<span>看不清楚，點擊換一張</span></li>
            
                                <li><label></label><button type="button" class="btn" id="chk_char">送出</button><button type="reset">清除</button></li>
                            </ul>
                            <!--<input id="contact_type" name="contact_type" type="hidden" value="0" />-->
                            <input name="contact_add" type="hidden" value="add" />
                        </form>
                        <!-- form end -->
                    </div>
                
        
        	


                </div><!-- contact end -->

            </div><!-- container end -->


           <?php include 'template/footer.php'; ?>

        </div><!-- wrapper end -->
    </body>
</html>
