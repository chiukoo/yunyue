<?php echo date("Y年m月d日");?></li>
            <li>IP位置：<?php
			if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			   $myip = $_SERVER['HTTP_CLIENT_IP'];
			}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			   $myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}else{
			   $myip= $_SERVER['REMOTE_ADDR'];
			}
			 $myip;
			
			
			if(isset($_SESSION['bk_user'])){ 
			$bcusersql = "select `name` from `sysuser` where `sys`='".$_SESSION['bk_user']."'";
	$bcuserres=$ODb->query($bcusersql) or die("載入資料出錯，請聯繫管理員。");
	while($bcuserrow = mysql_fetch_array($bcuserres)){
		
		$bcusername = $bcuserrow['name'];
	}
			 $bcusername;}
			$updateDsc =  date("Y-m-d H:i:s",time());
			?>