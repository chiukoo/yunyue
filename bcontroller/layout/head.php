<!--右方登入者身份提示與登出按鈕-->
<div id="header">    
	<div class="div1">    
    	<div class="div2"><img src="image/logo.jpg" /></div>
		<div class="div3">
        <div id="btn">
        <ul>
        	<li><?php echo date("Y年m月d日");?></li>
            <li>IP位置：<?php
			if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			   $myip = $_SERVER['HTTP_CLIENT_IP'];
			}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			   $myip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}else{
			   $myip= $_SERVER['REMOTE_ADDR'];
			}
			echo $myip;
			?></li>
			<li><!--<img src="image/lock.png" alt="" style="position: relative; top: 3px;" />&nbsp;-->您已登入為 <span><?php 
			
			if(isset($_SESSION['bk_user'])){ 
			$bcusersql = "select `name` from `sysuser` where `sys`='".$_SESSION['bk_user']."'";
	$bcuserres=$ODb->query($bcusersql) or die("載入資料出錯，請聯繫管理員。");
	while($bcuserrow = mysql_fetch_array($bcuserres)){
		
		$bcusername = $bcuserrow['name'];
	}
			echo $bcusername;}?></span></li>
			<a class="top" href="./logout.php"><li>登出系統</li></a>
         </ul>
		</div>
        </div>
	</div>
</div>