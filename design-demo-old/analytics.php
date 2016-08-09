<?php
/**
* 取得阅读器名称和版本
*
* @access public
* @return string
*/ 

//Detect special conditions devices
$iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
if(stripos($_SERVER['HTTP_USER_AGENT'],"Android") && stripos($_SERVER['HTTP_USER_AGENT'],"mobile")){
        $Android = true;
}else if(stripos($_SERVER['HTTP_USER_AGENT'],"Android")){
        $Android = false;
        $AndroidTablet = true;
}else{
        $Android = false;
        $AndroidTablet = false;
}
$webOS = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
$BlackBerry = stripos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$RimTablet= stripos($_SERVER['HTTP_USER_AGENT'],"RIM Tablet");
 
//do something with this information
if( $iPod || $iPhone ){
        //were an iPhone/iPod touch -- do something here
}else if($iPad){
        //were an iPad -- do something here
}else if($Android){
      "Android";   //we're an Android Phone -- do something here
}else if($AndroidTablet){
        //we're an Android Phone -- do something here
}else if($webOS){
        "webOS"; //we're a webOS device -- do something here
}else if($BlackBerry){
        //we're a BlackBerry phone -- do something here
}else if($RimTablet){
        //we're a RIM/BlackBerry Tablet -- do something here
}else{
        //we're not a mobile device.
}
function getbrowser()
{
    global $_SERVER; 

    $agent           = $_SERVER['HTTP_USER_AGENT'];
    $browser       = '';
    $browser_ver     = ''; 

    if (preg_match('/OmniWeb\/(v*)([^\s|;]+)/i', $agent, $regs)) 
    {
      $browser       = 'OmniWeb';
      $browser_ver     = $regs[2];
    } 

    if (preg_match('/Netscape([\d]*)\/([^\s]+)/i', $agent, $regs)) 
    {
      $browser       = 'Netscape';
      $browser_ver     = $regs[2];
    } 

    if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) 
    {
      $browser       = 'Safari';
      $browser_ver     = $regs[1];
    } 

    if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) 
    {
      $browser       = 'Internet Explorer';
      $browser_ver     = $regs[1];
    } 

    if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) 
    {
      $browser       = 'Opera';
      $browser_ver     = $regs[1];
    } 

    if (preg_match('/NetCaptor\s([^\s|;]+)/i', $agent, $regs)) 
    {
      $browser       = '(Internet Explorer ' .$browser_ver. ') NetCaptor';
      $browser_ver     = $regs[1];
    } 

    if (preg_match('/Maxthon/i', $agent, $regs)) 
    {
      $browser       = '(Internet Explorer ' .$browser_ver. ') Maxthon';
      $browser_ver     = '';
    } 

    if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) 
    {
      $browser       = 'FireFox';
      $browser_ver     = $regs[1];
    } 

    if (preg_match('/Lynx\/([^\s]+)/i', $agent, $regs)) 
    {
      $browser       = 'Lynx';
      $browser_ver     = $regs[1];
    } 

    if ($browser != '')
    {
       return $browser.' '.$browser_ver;
    } 
    else 
    {
      return 'Unknow browser';
    }
} 


/**
* 取得客户真个操作体系
*
* @access private
* @return void
*/ 
function get_os()
{
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $os = false; 

    if (preg_match('/win/i', $agent) && strpos($agent, '95'))
    {
      $os = 'Windows95';
    }
    else if (preg_match('/win 9x/i', $agent) && strpos($agent, '4.90'))
    {
      $os = 'WindowsME';
    }
    else if (preg_match('/win/i', $agent) && preg_match('/98/i', $agent))
{
      $os = 'Windows98';
    }
  else if (preg_match('/win/i', $agent) && preg_match('/nt 6.0/i', $agent))
{
      $os = 'WindowsVista';
    }
 else if (preg_match('/win/i', $agent) && preg_match('/nt 6.1/i', $agent))
{
      $os = 'Windows7';
    }
	else if (preg_match('/win/i', $agent) && preg_match('/nt 6.2/i', $agent))
{
      $os = 'Windows8';
    }
    else if (eregi('win', $agent) && eregi('nt 5.1', $agent))
{
      $os = 'WindowsXP';
    }
    else if (eregi('win', $agent) && eregi('nt 5', $agent))
{
      $os = 'Windows2000';
    }
    else if (eregi('win', $agent) && eregi('nt', $agent))
{
      $os = 'Windows NT';
    }
    else if (eregi('win', $agent) && ereg('32', $agent))
{
      $os = 'Windows32';
    }
	 else if (eregi('Android', $agent))
{
      $os = 'Android';
}
else if (eregi('iPhone', $agent))
{
      $os = 'iPhone';
}
else if (eregi('ipad', $agent))
{
      $os = 'iPad';
}
    else if (eregi("linux", $agent))
{
      $os = 'Linux';
    }
    else if (eregi('unix', $agent))
{
      $os = 'Unix';
    }
    else if (eregi('sun', $agent) && eregi('os', $agent))
{
      $os = 'SunOS';
    }
    else if (eregi('ibm', $agent) && eregi('os', $agent))
{
      $os = 'IBM OS/2';
    }
    else if (eregi('Mac', $agent) && eregi('PC', $agent))
{
      $os = 'Macos';
    }
    else if (eregi('PowerPC', $agent))
{
      $os = 'PowerPC';
    }
    else if (eregi('AIX', $agent))
{
      $os = 'AIX';
    }
    else if (eregi('HPUX', $agent))
{
      $os = 'HPUX';
    }
    else if (eregi('NetBSD', $agent))
{
      $os = 'NetBSD';
    }
    else if (eregi('BSD', $agent))
{
      $os = 'BSD';
    }
    else if (ereg('OSF1', $agent))
{
      $os = 'OSF1';
    }
    else if (ereg('IRIX', $agent))
{
      $os = 'IRIX';
    }
    else if (eregi('FreeBSD', $agent))
{
      $os = 'FreeBSD';
    }
    else if (eregi('teleport', $agent))
{
      $os = 'teleport';
    }
    else if (eregi('flashget', $agent))
{
      $os = 'flashget';
    }
    else if (eregi('webzip', $agent))
{
      $os = 'webzip';
    }
    else if (eregi('offline', $agent))
{
      $os = 'offline';
    }
    else 
    {
      $os = 'Unknown';
    }
    return $os;
} 
 get_os();




 $agent = $_SERVER['HTTP_USER_AGENT'];

if(strpos($agent,"Trident"))
  $browder="Internet Explorer";
/*if(strpos($agent,"MSIE 11.0"))
  $browder="Internet Explorer 11.0";
  if(strpos($agent,"MSIE 10.0"))
  $browder="Internet Explorer 10.0";
  if(strpos($agent,"MSIE 9.0"))
 $browder="Internet Explorer 9.0";
if(strpos($agent,"MSIE 8.0"))
  $browder="Internet Explorer 8.0";
else if(strpos($agent,"MSIE 7.0"))
  $browder="Internet Explorer 7.0";
else if(strpos($agent,"MSIE 6.0"))
  $browder="Internet Explorer 6.0";
else if(strpos($agent,"Firefox/3"))
  $browder="Firefox 3";*/
else if(strpos($agent,"Firefox"))
  $browder="Firefox";
else if(strpos($agent,"Chrome"))
  $browder="Google Chrome";
else if(strpos($agent,"Safari"))
  $browder="Safari";
else if(strpos($agent,"Opera"))
  $browder="Opera";
else
  $browder="Other";
   
 
 // echo base64_encode("taiwancloud1qaz");
//Detect special conditions devices


if (!empty($_SERVER['HTTP_CLIENT_IP']))
    $ip=$_SERVER['HTTP_CLIENT_IP'];
else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
else
    $ip=$_SERVER['REMOTE_ADDR'];
	
	  $ip;
?>
<?php 
function ae_whois($query, $server)
{

    define('AE_WHOIS_TIMEOUT', 5); // connection timeout
    global $ae_whois_errno, $ae_whois_errstr;

    // connecting 
    $f = fsockopen($server, 43, $ae_whois_errno, $ae_whois_errstr, AE_WHOIS_TIMEOUT);
    if (!$f) 
        return false; // connection failed 

    // sending query    
    fwrite($f, $query."\r\n");

    // receving response 
	$country = '';
	/* *******************************************
		只要country, 為節省比對時間,
		從1024byte後開始比對(1024是我大概抓的值).
		用SEEK_CUR, 是因為使用SEEK_SET有問題.
	******************************************** */
	fseek($f, 1024, SEEK_CUR);

    while (!feof($f))
	{
		$arr = explode(':', fgets($f, 1024));
		if ('country' == trim($arr[0]))
		{
			$country = trim($arr[1]);
			break;
		}
	}

    // closing connection 
    fclose($f);

    return $country;
}

// copy-paste function ae_whois(see above) here 

 ae_whois('168.95.1.1', 'whois.apnic.net');


?>

<?php

/*// include functions

include("./maxmind/geoip.inc");

// read GeoIP database

//$handle = geoip_open(dirname(__FILE__) . "./maxmind/GeoIP.dat", GEOIP_STANDARD);

// map IP to country
$country_code = geoip_country_code_by_addr($handle, $_SERVER['REMOTE_ADDR']);


 "IP address ".$ip." located in " . geoip_country_name_by_addr($handle, $ip) . " (country code " . geoip_country_code_by_addr($handle, $_SERVER['REMOTE_ADDR']) . ")";

$contry=geoip_country_name_by_addr($handle, $_SERVER['REMOTE_ADDR']);
$contry_code=geoip_country_code_by_addr($handle, $_SERVER['REMOTE_ADDR']);



// close database handler

geoip_close($handle);

// print compulsory license notice*/







//星期幾
$weekarray=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
 $weekarray[date("w")];

  $a=get_os();
 $b=getbrowser();



 /*//包含需求檔案 ------------------------------------------------------------------------
	include("./bcontroller/class/common_lite.php");
	session_start();
		
	//宣告變數 ----------------------------------------------------------------------------
	$ODb = new run_db("mysql",3306);      //建立資料庫物件*/
	$updateDsc =  date("Y-m-d H:i:s",time());
	
	//檢查是否進入過網站
	$check_new_ip = "select * from `analytics_c` where `c_ip`='".$ip."' and `c_date`='".$updateDsc."'";
	$check_new_ip_res=$ODb->query($check_new_ip) or die("載入資料出錯，請聯繫管理員。");
	while($check_new_ip_row = mysql_fetch_array($check_new_ip_res)){
		
		
	}
	$check_new_ip_num = mysql_num_rows($check_new_ip_res);
	$updateDsc =  date("Y-m-d H:i:s",time());
	if($check_new_ip_num==0&&$_SESSION['costumer_in']!=1){
		//寫入訪客資料
		$insert_new_ip = "insert into `analytics_c` set `c_date`='".$updateDsc."',`c_ip`='".$ip."',`c_browser`='".$browder."',`c_os`='".$a."',`c_week`='".$weekarray[date("w")]."'";
	$res_new_ip=$ODb->query($insert_new_ip) or die("新增資料出錯，請聯繫管理員。");
	
	//建立IP登入次數
	$insert_new_num = "insert into `analytics_n` set `n_date`='".$updateDsc."',`n_ip`='".$ip."',`n_num`='1',`n_week`='".$weekarray[date("w")]."'";
	$res_new_num=$ODb->query($insert_new_num) or die("新增資料出錯，請聯繫管理員。");
		
	$_SESSION['costumer_in']=1;
		}
		
		if($check_new_ip_num>0&&$_SESSION['costumer_in']!=1){
			//取出次數
		$selectnum = "select * from `analytics_n` where `n_ip`='".$ip."'";
		$res_selectnum=$ODb->query($selectnum) or die("載入資料出錯，請聯繫管理員。");
		while($rowselectnum = mysql_fetch_array($res_selectnum)){
			$selectnum_num=$rowselectnum['n_num'];	
		}
		
		//更新次數
		$new_selectnum_num=$selectnum_num+1;
	$update_num ="update `analytics_n` set `n_date`='".$updateDsc."',`n_num`='".$new_selectnum_num."' where `n_ip`='".$ip."'";
	
	$res_update_num=$ODb->query($update_num) or die("更新資料出錯，請聯繫管理員。");
		$_SESSION['costumer_in']=1;	
			}
	
		
		
?>
<!doctype html>
<html>
<head>

<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
</body>
</html>