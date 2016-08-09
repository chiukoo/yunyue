<?php
session_start();
if(isset($_POST["username"])) {
	if(($_SESSION['captcha_code'] == $_POST['username']) && (!empty($_SESSION['captcha_code'])) ) {
		//Passed!
		$captcha_msg="Thank you";
	}else{
		// Not passed 8-(
		$captcha_msg="invalid code";
		if(isset($_POST["MM_insert"])){
	  		unset($_POST["MM_insert"]);
		}
		if(isset($_POST["MM_update"])){
			unset($_POST["MM_update"]);
		}
	}
}
class CaptchaImage {
	var $font = "verdana.ttf";
	function hex_to_dec($hexcolor){
	//convert hex hex values to decimal ones
	$dec_color=array('r'=>hexdec(substr($hexcolor,0,2)),'g'=>hexdec(substr($hexcolor,2,2)),'b'=>hexdec(substr($hexcolor,4,2)));
	return $dec_color;
	}
	function generateCode($characters) {
		/* list all possible characters, similar looking characters and vowels have been removed */
		$possible = '23456789bcdfghjkmnpqrstvwxyz'; 
		$code = '';
		$i = 0;
		while ($i < $characters) { 
			$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$i++;
		}
		return $code;
	}
	function CaptchaImage($width='120',$height='30',$characters='3',$hex_bg_color='FFFFFF',$hex_text_color="FF0000",$hex_noise_color="CC0000", $img_file='captcha.jpg') {
		$rgb_bg_color=$this->hex_to_dec($hex_bg_color);
		$rgb_text_color=$this->hex_to_dec($hex_text_color);
		$rgb_noise_color=$this->hex_to_dec($hex_noise_color);
		$code = $this->generateCode($characters);
		/* font size will be 60% of the image height */
		$font_size = $height * 0.40;
		$image = @imagecreate($width, $height) or die('Cannot Initialize new GD image stream');
		/* set the colours */
		$background_color = imagecolorallocate($image, $rgb_bg_color['r'], $rgb_bg_color['g'],$rgb_bg_color['b']);
		$text_color = imagecolorallocate($image, $rgb_text_color['r'], $rgb_text_color['g'],$rgb_text_color['b']);
		$noise_color = imagecolorallocate($image, $rgb_noise_color['r'], $rgb_noise_color['g'],$rgb_noise_color['b']);
		/* generate random dots in background */
		for( $i=0; $i<($width*$height)/3; $i++ ) {
			imagefilledellipse($image, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
		}
		/* generate random lines in background */
		for( $i=0; $i<($width*$height)/150; $i++ ) {
			imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $noise_color);
		}
		/* create textbox and add text */
		$textbox = imagettfbbox($font_size, 0, $this->font, $code);
		$x = ($width - $textbox[4])/2;
		$y = ($height - $textbox[5])/2;
		imagettftext($image, $font_size, 0, $x, $y, $text_color, $this->font , $code);
		/* save the image */
		imagejpeg($image,$img_file);
		imagedestroy($image);
		echo "<img src=\"$img_file?".time()."\" width=\"$width\" height=\"$height\" alt=\"security code\" id=\"captchaImg\">";
		$_SESSION['captcha_code'] = $code;
	}

}

if (!empty($_SERVER['HTTP_CLIENT_IP']))
    $ip=$_SERVER['HTTP_CLIENT_IP'];
else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
else
    $ip=$_SERVER['REMOTE_ADDR'];
	
	  $ip;
	
//包含需求檔案 ------------------------------------------------------------------------
	include("./bcontroller/class/common_lite.php");
 //宣告變數 ----------------------------------------------------------------------------
	$ODb = new run_db("mysql",3306);      //建立資料庫物件
	if(isset($_POST['key_code'])&&$_POST['key_code']=='login_in'){
	if($_POST['username']=='' || $_POST['password']==''){
			 header("Content-type:text/html; charset=utf-8");
		   echo   "<script charset='UTF-8'>alert('帳號或密碼請勿留白!!')</script>";
        		    header("Refresh: 0; url=login.php" );
			 
		   exit;
			}}
	if(isset($_POST['key_code'])&&$_POST['key_code']=='login_in' && $_POST['username']!='' && $_POST['password']!=''){
		if($_POST['recaptcha']!=$_POST['code']){
			 header("Content-type:text/html; charset=utf-8");
		   echo   "<script charset='UTF-8'>alert('驗證碼錯誤!!')</script>";
        		    header("Refresh: 0; url=login.php" );
			 
		   exit;
			}
	
	$cloud ="select * from `taiwancloud` where `cloudname`='".$_POST['username']."' and `cloudpassword`='".base64_encode($_POST['password'])."'";
		$rescloud = $ODb->query($cloud) or die("更新資料出錯，請聯繫管理員。");
	
	
		 $up_dsc ="select * from `sysuser` where `sys`='".$_POST['username']."' and `pwd`='".base64_encode($_POST['password'])."'";
		$res = $ODb->query($up_dsc) or die("更新資料出錯，請聯繫管理員。");
		
		if(mysql_num_rows($res)>0||mysql_num_rows($rescloud)>0){
			$_SESSION['zeroteamzero'] = 'IS_LOGIN';
			$_SESSION['bk_user']=$_POST['username'];
			//紀錄登入者
			$updateDsc =  date("Y-m-d H:i:s",time());
			$insert_login_history = "insert into `login_history` set `l_name`='".$_SESSION['bk_user']."',`l_ip`='".$ip."',`create_dt`='".$updateDsc."'";
	$res_login_history=$ODb->query($insert_login_history) or die("新增資料出錯，請聯繫管理員。");
			
			
			ri_jump("./bcontroller/index.php");
		}else{
			 header("Content-type:text/html; charset=utf-8");
		   echo   "<script charset='UTF-8'>alert('帳號密碼錯誤!!')</script>";
        		    header("Refresh: 0; url=login.php" );
			 
		   exit;
			}
	}
	//$agent = $_SERVER['HTTP_USER_AGENT'];
//if(strpos($agent,"MSIE 8.0"))
//  echo "Internet Explorer 8.0";
//else if(strpos($agent,"MSIE 7.0"))
//  echo "Internet Explorer 7.0";
//else if(strpos($agent,"MSIE 6.0"))
//  echo "Internet Explorer 6.0";
//else if(strpos($agent,"Firefox/3"))
//  echo "Firefox 3";
//else if(strpos($agent,"Firefox/2"))
//  echo "Firefox 2";
//else if(strpos($agent,"Chrome"))
//  echo "Google Chrome";
//else if(strpos($agent,"Safari"))
//  echo "Safari";
//else if(strpos($agent,"Opera"))
//  echo "Opera";
//else
//  echo $agent;
//  echo "<br>";
//  echo base64_encode("taiwancloud1qaz");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網站管理系統 Taiwan Cloud Management Systems</title>
<link media="screen" rel="stylesheet" href="css/login.css" /> 
<script type="text/javascript" src="./bcontroller/js/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="./bcontroller/js/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link type="text/css" href="./bcontroller/js/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet">
<script type="text/javascript" src="./bcontroller/js/jquery/tabs.js"></script>
<script type="text/javascript">
function chk(){
$('#logintxt').submit();
}
function previewScreen(block){
var value = block.innerHTML;
var printPage = window.open("","printPage","");
printPage.document.open();
printPage.document.write("<OBJECT classid='CLSID:8856F961-340A-11D0-A96B-00C04FD705A2' height=0 id=wc name=wc width=0></OBJECT>");
printPage.document.write("<HTML><head></head><BODY onload='javascript:wc.execwb(7,1);window.close()'>");
printPage.document.write("<PRE>");
printPage.document.write(value);
printPage.document.write("</PRE>");
printPage.document.close("</BODY></HTML>");
}
function printScreen(block){
var value = block.innerHTML;
var printPage = window.open("","printPage","");
printPage.document.open();
printPage.document.write("<HTML><head></head><BODY onload='window.print();window.close()'>");
printPage.document.write("<PRE>");
printPage.document.write(value);
printPage.document.write("</PRE>");
printPage.document.close("</BODY></HTML>");
}
</script>
</head>

<body>

<?php /*?>列印功能<P><img id="ruten" name="ruten" SRC="http://www.ruten.com.tw/imgs/2008/logo.gif"></P></div>
<input type="button" value="區塊預覽" onclick="previewScreen(block)"><?php */?>

<?php /*?><div id="block">
<P><img id="ruten" name="ruten" SRC="http://www.ruten.com.tw/imgs/2008/logo.gif"></P>

<input type="button" value="部分列印" onclick="printScreen(block)"><?php */?>
    <div id="loginbox">
    
        <img src="images/title.png" />
        
            <form method="post" enctype="multipart/form-data" id="logintxt">
            <li class="id"><input type="text" name="username" placeholder="管理者帳號" /></li>
            <li class="pw"><input type="password" name="password" placeholder="管理者密碼" /></li>
            <li class="code"><input type="code" name="code" placeholder="輸入驗證碼" /></li>
            <li id="captcha"><?php $captcha = new CaptchaImage(120,50,4,'ebebeb','333333','999999');?><div class="fixbtn"><a onclick="chk()" class="btn">登入</a></div></li><input name="recaptcha" type="hidden" value="<?php echo $_SESSION['captcha_code'];?>" />
            <input name="key_code" type="hidden" value="login_in" />
            </form>
            
        <div id="powerby">Web Design / System Design By <a href="http://www.taiwan-cloud.com">Taiwan Cloud</a></div>
    </div>
    
    <!-- loginbox end -->
    
<?php /*?></div><?php */?>
<?php include("analytics.php");?>
</body>
</html>
