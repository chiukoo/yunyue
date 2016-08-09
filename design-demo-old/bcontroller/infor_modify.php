<?php
  //包含需求檔案 ------------------------------------------------------------------------
	include("./class/common_lite.php");
		session_start();
	if($_SESSION['zeroteamzero'] != 'IS_LOGIN'){
		ri_jump("../login.php");
	}

 //宣告變數 ----------------------------------------------------------------------------
	$ODb = new run_db("mysql",3306);      //建立資料庫物件
	
	 if(isset($_POST['start'])&&$_POST['start']!=''){
		$_SESSION['date_start']=$_POST['start'];
		$daydate = strtotime($_POST['close']);
		$_SESSION['date_close']=date('Y-m-d', strtotime('+1 days', $daydate));
		ri_jump("./infor_modify.php");
		}
	
	if($_SESSION['date_start']==''||$_SESSION['date_close']==''){
		$_SESSION['date_start']=date("Y-m-d",time());
		$_SESSION['date_close']=$check_date=date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+1, date("Y")));
		}
	
	 if(isset($_SESSION['date_start'])&&$_SESSION['date_start']!=''){
		 $select_edit_history = "select `e_move`,`e_class`,`e_name`,`e_ip`,`create_dt` from `edit_history` where `create_dt` between '".$_SESSION['date_start']."' and '".$_SESSION['date_close']."'";
		$res_edit_history=$ODb->query($select_edit_history) or die("載入資料出錯，請聯繫管理員。");
		while($row_edit_history = mysql_fetch_array($res_edit_history)){
			$move[]=$row_edit_history['e_move'];
			$class[]=$row_edit_history['e_class'];
			$name[]=$row_edit_history['e_name'];
			$ip[]=$row_edit_history['e_ip'];
			$time[]=$row_edit_history['create_dt'];	
		}
	  $edit_history_num = mysql_num_rows($res_edit_history);
	
		
		}
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

  //$('#ulcssmenu ul').hide();
  /*
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
	*/
});
function ck_value(){
$('#form').submit();
}
function del(num){
	$("#img"+num).css("visibility", "hidden");
	$("#d_img"+num).css("visibility", "hidden");
	$("#del_banner_"+num).val("delimg");

}
</script>
<script>
  $(function () {
   
    $( "#datepickers" ).datepicker({
		dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
	
 
    });

	
  });
   
  </script>
<script>
  $(function () {
   
    $( "#datepickerc" ).datepicker({
		dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
	
 
    });

	
  });
   
  </script>
  <script>
  function login(){
$('#search').submit();
}

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
		<a href="index.php">首頁(Home)</a> :: <a href="">統計報表</a> :: <a href="logsckfinder.php">登入紀錄</a>
	</div>
    <div class="box">
    <div class="heading">
      <h1><img src="image/category.png" alt="" />站務資訊 Breaking info</h1>
      
    </div>
    </div>
   <form method="post" enctype="multipart/form-data" id="search">
   <div class="buttons searchdate"><input name="start"  id="datepickers">至 <input name="close"  id="datepickerc"><a onclick="login()" class="button">搜尋</a></div>
    	</form>
    	<div class="content">
        <table class="list center">
        <tr>
        <th width="50">項次</th>
        <th>日期</th>
        <th>執行者</th>
        <th>IP位置</th>
        <th align="left">動作</th>
        </tr>
       <?php for($x=0;$x<$edit_history_num;$x++){?>
        <tr>
        <td><?php echo $x+1;?></td>
        <td><?php echo $time[$x];?></td>
        <td><?php echo $name[$x];?></td>
        <td><?php echo $ip[$x]?></td>
        <td align="left"><?php echo "[".$class[$x]."]".$move[$x]?></td>
        </tr>
        <?php }?>
        
        </table>
        </div>
        
   
    
  </div></div>
<!--[if IE]>
<script type="text/javascript" src="js/jquery/flot/excanvas.js"></script>
<![endif]--> 
<script type="text/javascript" src="js/jquery/flot/jquery.flot.js"></script> 
<!-- list open -->
<script type="text/javascript">
$(document).ready(function(){
	$('#ulcssmenu li[id="report"] ul').slideDown('fast');
	$('#report_3').attr('class','over');
});
</script>
</div>
<?php include 'layout/footer.php';?>	
</body></html>