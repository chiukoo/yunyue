<?php
  //包含需求檔案 ------------------------------------------------------------------------
	include("./class/common_lite.php");
		session_start();
	if($_SESSION['zeroteamzero'] != 'IS_LOGIN'){
		ri_jump("../login.php");
	}

 //宣告變數 ----------------------------------------------------------------------------
	$ODb = new run_db("mysql",3306);      //建立資料庫物件
	$updateDsc =  date("Y-m-d H:i:s",time());
	$today =  date("Y-m-d",time());
	 $thismonth =  date("Y-m",time());
	//1周期限
	 $check_date=date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")-7, date("Y"))); 
    $weekarray=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
	 // $today=$weekarray[date("w")];


	//取出本日人數
	$select_today_num = "select * from `analytics_c` where `c_date` like '".$today."%' ";
		$res_select_today_num=$ODb->query($select_today_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_today_num = mysql_fetch_array($res_select_today_num)){
			
		}
	  $select_today_num_num = mysql_num_rows($res_select_today_num);
	  
	  
	//取出本月
	 $select_thismonth_num = "select * from `analytics_c` where `c_date` like '".$thismonth."%' ";
		$res_select_thismonth_num=$ODb->query($select_thismonth_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_thismonth_num = mysql_fetch_array($res_select_thismonth_num)){
			
		}
	   $select_thismonth_num_num = mysql_num_rows($res_select_thismonth_num);



	//取出星期數
	$select_Sun_num = "select * from `analytics_c` where `c_date`>='".$check_date."'  and `c_week`='Sun'";
		$res_select_Sun_num=$ODb->query($select_Sun_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_Sun_num = mysql_fetch_array($res_select_Sun_num)){
			$Sun=$row_select_Sun_num['c_week'];	
		}
	  $select_Sun_num_num = mysql_num_rows($res_select_Sun_num);
	
	
	
$select_Mon_num = "select * from `analytics_c` where `c_date`>='".$check_date."'  and `c_week`='Mon'";
		$res_select_Mon_num=$ODb->query($select_Mon_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_Mon_num = mysql_fetch_array($res_select_Mon_num)){
			$Mon=$row_select_Mon_num['c_week'];	
		}
	  $select_Mon_num_num = mysql_num_rows($res_select_Mon_num);
	
	
	$select_Tue_num = "select * from `analytics_c` where `c_date`>='".$check_date."'  and `c_week`='Tue'";
		$res_select_Tue_num=$ODb->query($select_Tue_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_Tue_num = mysql_fetch_array($res_select_Tue_num)){
			$Tue=$row_select_Tue_num['c_week'];	
		}
	  $select_Tue_num_num = mysql_num_rows($res_select_Tue_num);
	
	$select_Wed_num = "select * from `analytics_c` where `c_date`>='".$check_date."'  and `c_week`='Wed'";
		$res_select_Wed_num=$ODb->query($select_Wed_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_Wed_num = mysql_fetch_array($res_select_Wed_num)){
			$Wed=$row_select_Wed_num['c_week'];	
		}
	 $select_Wed_num_num = mysql_num_rows($res_select_Wed_num);
	
	
	$select_Thu_num = "select * from `analytics_c` where `c_date`>='".$check_date."'  and `c_week`='Thu'";
		$res_select_Thu_num=$ODb->query($select_Thu_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_Thu_num = mysql_fetch_array($res_select_Thu_num)){
			$Thu=$row_select_Thu_num['c_week'];	
		}
	  $select_Thu_num_num = mysql_num_rows($res_select_Thu_num);
	
	$select_Fri_num = "select * from `analytics_c` where `c_date`>='".$check_date."'  and `c_week`='Fri'";
		$res_select_Fri_num=$ODb->query($select_Fri_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_Fri_num = mysql_fetch_array($res_select_Fri_num)){
			$Fri=$row_select_Fri_num['c_week'];	
		}
	  $select_Fri_num_num = mysql_num_rows($res_select_Fri_num);
	
	$select_Sat_num = "select * from `analytics_c` where `c_date`>='".$check_date."'  and `c_week`='Sat'";
		$res_select_Sat_num=$ODb->query($select_Sat_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_Sat_num = mysql_fetch_array($res_select_Sat_num)){
			$Sat=$row_select_Sat_num['c_week'];	
		}
	  $select_Sat_num_num = mysql_num_rows($res_select_Sat_num);
	
	//來訪IP TOP10	
	//取出各IP
	$select_ip_top = "select * from `analytics_n` ";
		$res_select_ip_top=$ODb->query($select_ip_top) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_ip_top = mysql_fetch_array($res_select_ip_top)){
		 	$ip_top_ip[]=$row_select_ip_top['n_ip'];
			$ip_top_num[]=$row_select_ip_top['n_num'];
				
		}
	   $select_ip_top_num = mysql_num_rows($res_select_ip_top);
	   //設定陣列
	   $a=0;
	   $iptop10[]='';
	  $iptop10num[]='';
	   //計算各IP登入量
	   for($i=0;$i<$select_ip_top_num;$i++){
		 $checkipcover=0;   
		   //檢查IP重複
		   if($a>0){
		   for($checkipsame=0;$checkipsame<$a;$checkipsame++){
			   if($ip_top_ip[$i]==$iptop10[$checkipsame]){
				   $checkipcover=1;
				 
				   }
			   }}
			   
			   
		   
		   if($checkipcover==0){
			   $iptop10total=0;
			   //取出瀏覽次數
			
			   
			 
		
		    $select_ip_innum = "select `n_ip`,`n_num` from `analytics_n` where `n_ip`='".$ip_top_ip[$i]."'";
		$res_select_ip_innum=$ODb->query($select_ip_innum) or die("載入資料出錯，請聯繫管理員。");
		$aaa=$ip_top_ip[$i];
		while($row_select_ip_innum = mysql_fetch_array($res_select_ip_innum)){
			$ip_num_ip[]=$row_select_ip_innum['n_ip'];
			 
			   $num[$ip_top_ip[$i]][]=$row_select_ip_innum['n_num'];
			 
		}
	    $select_ip_num_innum = mysql_num_rows($res_select_ip_innum);
			   
		   for($x=0;$x<$select_ip_num_innum;$x++){
			  
			   
			       $num[$ip_top_ip[$i]][$x];
			   
			 $iptop10total=$iptop10total+ $num[$ip_top_ip[$i]][$x];
			 
			
			   }
			  // echo "次數<br>";
		 	    $iptop10[$a]=$ip_top_ip[$i];
		
		
			// "IP<br>";
			     $iptop10num[$a]=$iptop10total;
			// "總數<br>";
		
			   $a=$a+1;
		    $iptop10total=0;
		   }}
		 for($k=0;$k<$a;$k++){
			   for($j=0;$j<$k;$j++)
			   {
				   if($iptop10num[$j]<$iptop10num[$j+1]){
					   $change=$iptop10[$j];
					   $iptop10[$j]=$iptop10[$j+1];
					   $iptop10[$j+1]=$change;
					   
					   $changenum=$iptop10num[$j];
					   $iptop10num[$j]=$iptop10num[$j+1];
					   $iptop10num[$j+1]=$changenum;
					   }
				   }
			   }
			   for($j=0;$j<$a-1;$j++){
			  
				   if($iptop10num[$j]<$iptop10num[$j+1]){
					   $change=$iptop10[$j];
					   $iptop10[$j]=$iptop10[$j+1];
					   $iptop10[$j+1]=$change;
					   
					   $changenum=$iptop10num[$j];
					   $iptop10num[$j]=$iptop10num[$j+1];
					  
				   }
			   }
	/*  for($aa=0;$aa<10;$aa++){
		  echo $iptop10[$aa];
		  echo "<br>";
		  echo $iptop10num[$aa];
		  echo "<br>";
		  }
	  */ 
	  
	  //取出總參觀人數
	  
$select_customer_num = "select * from `analytics_c`";
		$res_select_customer_num=$ODb->query($select_customer_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_customer_num = mysql_fetch_array($res_select_customer_num)){
			$customer=$row_select_customer_num['c_week'];	
		}
	   $select_customer_num_num = mysql_num_rows($res_select_customer_num);
	   
	   //取出使用Firefox,IE,Chrome,Safari,Opera,Others
                $select_firefox_num = "select * from `analytics_c` where `c_browser`='Firefox'";
		$res_select_firefox_num=$ODb->query($select_firefox_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_firefox_num = mysql_fetch_array($res_select_firefox_num)){
			
		}
	  $select_firefox_num_num = mysql_num_rows($res_select_firefox_num);
	  
	  
	  $select_ie_num = "select * from `analytics_c` where `c_browser`='Internet Explorer'";
		$res_select_ie_num=$ODb->query($select_ie_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_ie_num = mysql_fetch_array($res_select_ie_num)){
				
		}
	  $select_ie_num_num = mysql_num_rows($res_select_ie_num);
	  
	  $select_chrome_num = "select * from `analytics_c` where `c_browser`='Google Chrome'";
		$res_select_chrome_num=$ODb->query($select_chrome_num) or dchrome("載入資料出錯，請聯繫管理員。");
		while($row_select_chrome_num = mysql_fetch_array($res_select_chrome_num)){
				
		}
	  $select_chrome_num_num = mysql_num_rows($res_select_chrome_num);
	  
	  $select_Safari_num = "select * from `analytics_c` where `c_browser`='Safari'";
		$res_select_Safari_num=$ODb->query($select_Safari_num) or dSafari("載入資料出錯，請聯繫管理員。");
		while($row_select_Safari_num = mysql_fetch_array($res_select_Safari_num)){
			
		}
	  $select_Safari_num_num = mysql_num_rows($res_select_Safari_num);
	  
	  $select_opera_num = "select * from `analytics_c` where `c_browser`='Opera'";
		$res_select_opera_num=$ODb->query($select_opera_num) or dopera("載入資料出錯，請聯繫管理員。");
		while($row_select_opera_num = mysql_fetch_array($res_select_opera_num)){
			
		}
	  $select_opera_num_num = mysql_num_rows($res_select_opera_num);
	  
	  $select_others_num = "select * from `analytics_c` where `c_browser`='Other'";
		$res_select_others_num=$ODb->query($select_others_num) or dothers("載入資料出錯，請聯繫管理員。");
		while($row_select_others_num = mysql_fetch_array($res_select_others_num)){
			
		}
	  $select_others_num_num = mysql_num_rows($res_select_others_num);
	  //計算百分比
	 // echo  $firefox=3/10;
	// echo  $firefox=$select_customer_num_num/$select_customer_num_num;
	  
	if($select_firefox_num_num>0){
		$firefox=round($select_firefox_num_num/$select_customer_num_num, 2)*100;
		
		}else{
			$firefox=0;
			}
			
			if($select_ie_num_num>0){
		$ie=round($select_ie_num_num/$select_customer_num_num, 2)*100;
		
		}else{
			$ie=0;
			}
			if($select_chrome_num_num>0){
		$chrome=round($select_chrome_num_num/$select_customer_num_num, 2)*100;
		
		}else{
			$chrome=0;
			}
			if($select_Safari_num_num>0){
		 $Safari=round($select_Safari_num_num/$select_customer_num_num, 2)*100;
		
		}else{
			$Safari=0;
			}
			if($select_opera_num_num>0){
		$opera=round($select_opera_num_num/$select_customer_num_num, 2)*100;
		
		}else{
			$opera=0;
			}
	 if($select_others_num_num>0){
		$others=100-$firefox-$ie-$chrome-$Safari-$opera;
		
		}else{
			$others=0;
			}
	 //取出使用的OS Windows XP,Windows 7,Windows 8,Linux,Mac OS,iPad,iPhone,Android
	 
                $select_WindowsXP_num = "select * from `analytics_c` where `c_os`='WindowsXP'";
		$res_select_WindowsXP_num=$ODb->query($select_WindowsXP_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_WindowsXP_num = mysql_fetch_array($res_select_WindowsXP_num)){
			
		}
	  $select_WindowsXP_num_num = mysql_num_rows($res_select_WindowsXP_num);





  $select_Windows7_num = "select * from `analytics_c` where `c_os`='Windows7'";
		$res_select_Windows7_num=$ODb->query($select_Windows7_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_Windows7_num = mysql_fetch_array($res_select_Windows7_num)){
			
		}
	   $select_Windows7_num_num = mysql_num_rows($res_select_Windows7_num);





  $select_Windows8_num = "select * from `analytics_c` where `c_os`='Windows8'";
		$res_select_Windows8_num=$ODb->query($select_Windows8_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_Windows8_num = mysql_fetch_array($res_select_Windows8_num)){
			
		}
	  $select_Windows8_num_num = mysql_num_rows($res_select_Windows8_num);
	  
	  
	  
	  $select_Linux_num = "select * from `analytics_c` where `c_os`='Linux'";
		$res_select_Linux_num=$ODb->query($select_Linux_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_Linux_num = mysql_fetch_array($res_select_Linux_num)){
			
		}
	  $select_Linux_num_num = mysql_num_rows($res_select_Linux_num);
	  
	  
	  
	  
	  
	  $select_Macos_num = "select * from `analytics_c` where `c_os`='Macos'";
		$res_select_Macos_num=$ODb->query($select_Macos_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_Macos_num = mysql_fetch_array($res_select_Macos_num)){
			
		}
	  $select_Macos_num_num = mysql_num_rows($res_select_Macos_num);
	  
	  
	  
	  
	  $select_iPad_num = "select * from `analytics_c` where `c_os`='iPad'";
		$res_select_iPad_num=$ODb->query($select_iPad_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_iPad_num = mysql_fetch_array($res_select_iPad_num)){
			
		}
	  $select_iPad_num_num = mysql_num_rows($res_select_iPad_num);
	  
	  
	  
	  
	  
	  $select_iPhone_num = "select * from `analytics_c` where `c_os`='iPhone'";
		$res_select_iPhone_num=$ODb->query($select_iPhone_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_iPhone_num = mysql_fetch_array($res_select_iPhone_num)){
			
		}
	  $select_iPhone_num_num = mysql_num_rows($res_select_iPhone_num);
	  
	  
	  
	  
	  $select_Android_num = "select * from `analytics_c` where `c_os`='Android'";
		$res_select_Android_num=$ODb->query($select_Android_num) or die("載入資料出錯，請聯繫管理員。");
		while($row_select_Android_num = mysql_fetch_array($res_select_Android_num)){
			
		}
	  $select_Android_num_num = mysql_num_rows($res_select_Android_num);

if($select_WindowsXP_num_num>0){
		$WindowsXP=round($select_WindowsXP_num_num/$select_customer_num_num, 2)*100;
		
		}else{
			$WindowsXP=0;
			}
			
			
			if($select_Windows7_num_num>0){
		$Windows7=round($select_Windows7_num_num/$select_customer_num_num, 2)*100;
		
		}else{
			$Windows7=0;
			}
			
			
			if($select_Windows8_num_num>0){
		$Windows8=round($select_Windows8_num_num/$select_customer_num_num, 2)*100;
		
		}else{
			$Windows8=0;
			}
			
			
			if($select_Linux_num_num>0){
		$Linux=round($select_Linux_num_num/$select_customer_num_num, 2)*100;
		
		}else{
			$Linux=0;
			}
			
			
			if($select_Macos_num_num>0){
		$Macos=round($select_Macos_num_num/$select_customer_num_num, 2)*100;
		
		}else{
			$Macos=0;
			}
			
			
			
			if($select_iPad_num_num>0){
		$iPad=round($select_iPad_num_num/$select_customer_num_num, 2)*100;
		
		}else{
			$iPad=0;
			}
			
			
			
			if($select_iPhone_num_num>0){
		$iPhone=round($select_iPhone_num_num/$select_customer_num_num, 2)*100;
		
		}else{
			$iPhone=0;
			}
			
			
			
			
			
			
			
			if($select_Android_num_num>0){
		$Android=round($select_Android_num_num/$select_customer_num_num, 2)*100;
		
		}else{
			$Android=0;
			}

     
	 
		$othersos=100-$WindowsXP-$Windows7-$Windows8-$Linux-$Macos-$iPad-$iPhone-$Android;
		
		
?>

<!DOCTYPE>
<html dir="ltr" lang="zh-TW">
<head>
<meta charset="UTF-8" />
<title>站務資訊 (Breaking info)</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<script type="text/javascript" src="js/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link type="text/css" href="js/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery/tabs.js"></script>
<script type="text/javascript">
//-----------------------------------------
// Confirm Actions (delete, uninstall)
//-----------------------------------------
$(document).ready(function(){
    // Confirm Delete
    $('#form').submit(function(){
        if ($(this).attr('action').indexOf('delete',1) != -1) {
            if (!confirm('確認?(Confirm?)')) {
                return false;
            }
        }
    });
    // Confirm Uninstall
    $('a').click(function(){
        if ($(this).attr('href') != null && $(this).attr('href').indexOf('uninstall', 1) != -1) {
            if (!confirm('確認?(Confirm?)')) {
                return false;
            }
        }
    });

  $('#ulcssmenu ul').hide();
	$('#ulcssmenu li a').click(
		function() {
			var openMe = $(this).next();
			var mySiblings = $(this).parent().siblings().find('ul');
			if (openMe.is(':visible')) {
				openMe.slideUp('normal');  
			} else {
				mySiblings.slideUp('normal');  
				openMe.slideDown('normal');
			}
	  }
	);
});
function ck_value(){
$('#form').submit();
}
function del(num){
	$("#img"+num).css("visibility", "hidden");
	$("#d_img"+num).css("visibility", "hidden");
	$("#del_banner_"+num).val("delimg");

}

    $(function () {
    $('.Visitors-time').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: '每時段來客統計量'
        },
        subtitle: {
            text: ''
        },
        xAxis: [{
            categories: ['Sun.', 'Mon.', 'Tue.', 'Wed.', 'Thu.', 'Fri.',
                'Sat.']
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}',
                style: {
                    color: '#4d7496'
                }
            },
            title: {
                text: '',
                style: {
                    color: '#4d7496'
                }
            }
        }, { // Secondary yAxis
            title: {
                text: '',
                style: {
                    color: '#4d7496'
                }
            },
            labels: {
                format: '{value} ',
                style: {
                    color: '#4d7496'
                }
            },
            opposite: false
        }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: '',
            align: 'left',
            x: 120,
            verticalAlign: 'top',
            y: 100,
            floating: true,
            backgroundColor: '#FFFFFF'
        },
        series: [{
            name: '訪客',
            color: '#65a2a4',
            // type: 'column',
            yAxis: 1,
            data: [<?php echo $select_Sun_num_num;?>, <?php echo $select_Mon_num_num;?>, <?php echo $select_Tue_num_num;?>, <?php echo $select_Wed_num_num;?>, <?php echo $select_Thu_num_num;?>, <?php echo $select_Fri_num_num;?>, <?php echo $select_Sat_num_num;?>],
            tooltip: {
                valueSuffix: ' 人'
            }
        }]
    });
});
$(function () {
    $('.Visitors-day').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: '每日來客統計量'
        },
        subtitle: {
            text: ''
        },
        xAxis: [{
            categories: ['Sun.', 'Mon.', 'Tue.', 'Wed.', 'Thu.', 'Fri.',
                'Sat.']
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}',
                style: {
                    color: '#4d7496'
                }
            },
            title: {
                text: '',
                style: {
                    color: '#4d7496'
                }
            }
        }, { // Secondary yAxis
            title: {
                text: '',
                style: {
                    color: '#4d7496'
                }
            },
            labels: {
                format: '{value} ',
                style: {
                    color: '#4d7496'
                }
            },
            opposite: false
        }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: '',
            align: 'left',
            x: 120,
            verticalAlign: 'top',
            y: 100,
            floating: true,
            backgroundColor: '#FFFFFF'
        },
        series: [{
            name: '訪客',
            color: '#65a2a4',
            // type: 'column',
            yAxis: 1,
            data: [<?php echo $select_Sun_num_num;?>, <?php echo $select_Mon_num_num;?>, <?php echo $select_Tue_num_num;?>, <?php echo $select_Wed_num_num;?>, <?php echo $select_Thu_num_num;?>, <?php echo $select_Fri_num_num;?>, <?php echo $select_Sat_num_num;?>],
            tooltip: {
                valueSuffix: ' 人'
            }
        }]
    });
});
$(function () {
    $('.Visitors-week').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: '每週來客統計量'
        },
        subtitle: {
            text: ''
        },
        xAxis: [{
            categories: ['Sun.', 'Mon.', 'Tue.', 'Wed.', 'Thu.', 'Fri.',
                'Sat.']
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}',
                style: {
                    color: '#4d7496'
                }
            },
            title: {
                text: '',
                style: {
                    color: '#4d7496'
                }
            }
        }, { // Secondary yAxis
            title: {
                text: '',
                style: {
                    color: '#4d7496'
                }
            },
            labels: {
                format: '{value} ',
                style: {
                    color: '#4d7496'
                }
            },
            opposite: false
        }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: '',
            align: 'left',
            x: 120,
            verticalAlign: 'top',
            y: 100,
            floating: true,
            backgroundColor: '#FFFFFF'
        },
        series: [{
            name: '訪客',
            color: '#65a2a4',
            // type: 'column',
            yAxis: 1,
            data: [<?php echo $select_Sun_num_num;?>, <?php echo $select_Mon_num_num;?>, <?php echo $select_Tue_num_num;?>, <?php echo $select_Wed_num_num;?>, <?php echo $select_Thu_num_num;?>, <?php echo $select_Fri_num_num;?>, <?php echo $select_Sat_num_num;?>],
            tooltip: {
                valueSuffix: ' 人'
            }
        }]
    });
});
$(function () {
    $('.Visitors-month').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: '每月來客統計量'
        },
        subtitle: {
            text: ''
        },
        xAxis: [{
            categories: ['Sun.', 'Mon.', 'Tue.', 'Wed.', 'Thu.', 'Fri.',
                'Sat.']
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}',
                style: {
                    color: '#4d7496'
                }
            },
            title: {
                text: '',
                style: {
                    color: '#4d7496'
                }
            }
        }, { // Secondary yAxis
            title: {
                text: '',
                style: {
                    color: '#4d7496'
                }
            },
            labels: {
                format: '{value} ',
                style: {
                    color: '#4d7496'
                }
            },
            opposite: false
        }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: '',
            align: 'left',
            x: 120,
            verticalAlign: 'top',
            y: 100,
            floating: true,
            backgroundColor: '#FFFFFF'
        },
        series: [{
            name: '訪客',
            color: '#65a2a4',
            // type: 'column',
            yAxis: 1,
            data: [<?php echo $select_Sun_num_num;?>, <?php echo $select_Mon_num_num;?>, <?php echo $select_Tue_num_num;?>, <?php echo $select_Wed_num_num;?>, <?php echo $select_Thu_num_num;?>, <?php echo $select_Fri_num_num;?>, <?php echo $select_Sat_num_num;?>],
            tooltip: {
                valueSuffix: ' 人'
            }
        }]
    });
});

$(function () {
    $('.top-ip').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: '來訪IP TOP10'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [<?php if(isset($iptop10['0'])){echo "'".$iptop10['0']."'";}?><?php if(isset($iptop10['1'])){echo ",'".$iptop10['1']."'";}?><?php if(isset($iptop10['2'])){echo ",'".$iptop10['2']."'";}?><?php if(isset($iptop10['3'])){echo ",'".$iptop10['3']."'";}?><?php if(isset($iptop10['4'])){echo ",'".$iptop10['4']."'";}?><?php if(isset($iptop10['5'])){echo ",'".$iptop10['5']."'";}?><?php if(isset($iptop10['6'])){echo ",'".$iptop10['6']."'";}?><?php if(isset($iptop10['7'])){echo ",'".$iptop10['7']."'";}?><?php if(isset($iptop10['8'])){echo ",'".$iptop10['8']."'";}?><?php if(isset($iptop10['9'])){echo ",'".$iptop10['9']."'";}?>],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' '
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: [{
            name: '來訪次數',
            color: '#c86969',
            data: [<?php if(isset($iptop10num['0'])){echo $iptop10num['0'];}?><?php if(isset($iptop10num['1'])){echo ",".$iptop10num['1'];}?><?php if(isset($iptop10num['2'])){echo ",".$iptop10num['2'];}?><?php if(isset($iptop10num['3'])){echo ",".$iptop10num['3'];}?><?php if(isset($iptop10num['4'])){echo ",".$iptop10num['4'];}?><?php if(isset($iptop10num['5'])){echo ",".$iptop10num['5'];}?><?php if(isset($iptop10num['6'])){echo ",".$iptop10num['6'];}?><?php if(isset($iptop10num['7'])){echo ",".$iptop10num['7'];}?><?php if(isset($iptop10num['8'])){echo ",".$iptop10num['8'];}?><?php if(isset($iptop10num['9'])){echo ",".$iptop10num['9'];}?>]
        }]
    });
});

$(function () {
    $('.Browser').highcharts(
    Highcharts.theme = {
        colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#9789d6', '#749ac2', '#FF9655', '#FFF263', '#6AF9C4'],
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '已知瀏覽器分佈圖'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#333',
                    connectorColor: '#ccc',
                    formatter: function () {
                        return '<b>' + this.point.name + '</b>: ' + this.percentage.toFixed(2) + ' %';
                    },
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            color: '#c86969',
            data: [
                ['Firefox', <?php echo $firefox;?>],
                ['IE', <?php echo $ie;?>],
                ['Chrome', <?php echo $chrome;?>],
                ['Safari', <?php echo $Safari;?>],
                ['Opera', <?php echo $opera;?>],
                ['Others', <?php echo $others;?>]

            ]
        }]
    });
});
$(function () {
    $('.system').highcharts(
    Highcharts.theme = {
        colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#9789d6', '#749ac2', '#FF9655', '#FFF263', '#6AF9C4'],
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '已知作業系統分佈圖'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#333',
                    connectorColor: '#ccc',
                    formatter: function () {
                        return '<b>' + this.point.name + '</b>: ' + this.percentage.toFixed(2) + ' %';
                    },
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            color: '#c86969',
            data: [
                ['Windows XP', <?php echo $WindowsXP;?>],
                ['Windows 7', <?php echo $Windows7;?>],
                ['Windows 8', <?php echo $Windows8;?>],
                ['Linux', <?php echo $Linux;?>],
                ['Mac OS', <?php echo $Macos;?>],
                ['iPad', <?php echo $iPad;?>],
                ['iPhone', <?php echo $iPhone;?>],
                ['Android', <?php echo $Android;?>],
				['Others', <?php echo $othersos;?>],

                ]
        }]
    });
});
$(function () {
    $('.country').highcharts(
    Highcharts.theme = {
        colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#9789d6', '#749ac2', '#FF9655', '#FFF263', '#6AF9C4'],
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '已知國家系統分佈圖'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#333',
                    connectorColor: '#ccc',
                    formatter: function () {
                        return '<b>' + this.point.name + '</b>: ' + this.percentage.toFixed(2) + ' %';
                    },
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            color: '#c86969',
            data: [
                ['Windows XP', <?php echo $WindowsXP;?>],
                ['Windows 7', <?php echo $Windows7;?>],
                ['Windows 8', <?php echo $Windows8;?>],
                ['Linux', <?php echo $Linux;?>],
                ['Mac OS', <?php echo $Macos;?>],
                ['iPad', <?php echo $iPad;?>],
                ['iPhone', <?php echo $iPhone;?>],
                ['Android', <?php echo $Android;?>],
				['Others', <?php echo $othersos;?>],

                ]
        }]
    });
});


</script>


</head>
<body>

<?php include('layout/head.php');?>
<div id="container">
 <?php
  include('layout/menu_left.php');//載入左邊選單
  ?>
  <div id="content">
	<div class="breadcrumb">
		<a href="index.php">首頁(Home)</a> :: <a href="">站務資訊</a> :: <a href="">統計報表管理 - 網站訪客統計</a>
	</div>
    <div class="box">
    <div class="heading">
      <h1><img src="image/category.png" alt="" />統計報表管理 - 網站訪客統計 Breaking info</h1>
    </div>
    
    <div class="content">
    
    <div class="buttons"><a class="button">顯示區間 <?php echo $check_date;?> ~ <?php echo $today;?></a>　<a class="button">選擇日期<!--點擊出現日期選擇器--></a></a>　<a class="button">選擇範圍<input type="radio" name="range">日<input type="radio" name="range">週<input type="radio" name="range">月<input type="radio" name="range">年</a></div>
        <fieldset><legend>網站流量統計</legend>
        <table class="list" align="center">
        <tr>
        <td width="90" align="center">本日訪客</td>
        <td><?php echo  $select_today_num_num;?> 人</td>
        </tr>
        <tr>
        <td width="90" align="center">本月訪客</td>
        <td><?php echo $select_thismonth_num_num ;?> 人</td>
        </tr>
        </table>
        </fieldset>
		<ul class="infobox">
        <li><div class="Visitors-time"></div></li>
        <li><div class="Visitors-day"></div></li>
        <li><div class="Visitors-week"></div></li>
	    <li><div class="Visitors-month"></div></li>
        <li><div class="top-ip"></div></li>
        <li><div class="Browser"></div></li>
        <li><div class="system"></div></li>
        <li><div class="country"></div></li>
        </ul>
    </div><!-- content end -->
 
    <script src="js/charts/highcharts.js"></script>
	<script src="js/charts/exporting.js"></script>
    
  </div></div>
<!--[if IE]>
<script type="text/javascript" src="js/jquery/flot/excanvas.js"></script>
<![endif]--> 
<script type="text/javascript" src="js/jquery/flot/jquery.flot.js"></script> 

</div>
<?php include 'layout/footer.php';?>	
</body></html>