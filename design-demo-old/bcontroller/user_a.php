<?php
  //包含需求檔案 ------------------------------------------------------------------------
	include("./class/common_lite.php");
		session_start();
	if($_SESSION['zeroteamzero'] != 'IS_LOGIN'){
		ri_jump("../login.php");
	}

 //宣告變數 ----------------------------------------------------------------------------
	$ODb = new run_db("mysql",3306);      //建立資料庫物件
include("./edit_use.php");
if(isset($_POST['send_data'])&&$_POST['send_data']=='has_post_value'){
	
	
	$updateDsc =  date("Y-m-d H:i:s",time());
	$insert_sql_dsc = "insert into `sysuser` set `sys`='".$_POST['sys']."',`pwd`='".base64_encode($_POST['pwd'])."',`name`='".$_POST['name']."',`pet_name`='".$_POST['pet_name']."',`create_dt`='".$updateDsc."'";
	$res=$ODb->query($insert_sql_dsc) or die("新增資料出錯，請聯繫管理員。");
	
	
	//歷史紀錄
	$insert_edit_history = "insert into `edit_history` set `e_name`='".$bcusername."',`e_class`='新增資料',`e_move`='帳號為".$_POST['sys']."',`e_ip`='".$myip."',`create_dt`='".$updateDsc."'";
	$res_edit_history=$ODb->query($insert_edit_history) or die("新增資料出錯，請聯繫管理員。");
	ri_jump("user.php");
}
?>

<!DOCTYPE>
<html dir="ltr" lang="zh-TW">
<head>
<meta charset="UTF-8" />
<title>新增後台會員</title>
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
    /*$('#cssmenu > ul > li ul').each(function(index, e){
      var count = $(e).find('li').length;
      var content = '<span class="cnt">' + count + '</span>';
      $(e).closest('li').children('a').append(content);
    });
    $('#cssmenu ul ul li:odd').addClass('odd');
    $('#cssmenu ul ul li:even').addClass('even');
    $('#cssmenu > ul > li > a').click(function() {
      $('#cssmenu li').removeClass('active');
      $(this).closest('li').addClass('active');	
      var checkElement = $(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
        $(this).closest('li').removeClass('active');
        checkElement.slideUp('normal');
      }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
        $('#cssmenu ul ul:visible').slideUp('normal');
        checkElement.slideDown('normal');
      }
      if($(this).closest('li').find('ul').children().length == 0) {
        return true;
      } else {
        return false;	
      }
    });*/
    //$('#ulcssmenu').accordion();
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
</script>
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>

</head>
<body>
<?php include('layout/head.php');?>
<div id="container">

  <?php
  include('layout/menu_left.php');//載入左邊選單
  ?>
  <div id="content">
  <div class="breadcrumb">
        <a href="index.php">首頁(Home)</a> :: <a href="user.php">後台會員</a> :: <a href="#">新增會員</a>
      </div>
    <div class="box">
    <div class="heading">
      <h1><img src="image/category.png" alt="" /> 新增會員</h1>
      <div class="buttons"><a onclick="ck_value()" class="button">保存(Save)</a><a href="user.php" class="button">取消(Cancel)</a></div>
    </div>
    <div class="content">
      <form action="user_a.php" method="post" enctype="multipart/form-data" id="form">
        <div id="tab-general">
            <table class="form">
              
			<tr>
				<td>帳號</td>
				<td><input type="text" name="sys" id="sys" value="" ></td>
			</tr>
				<tr>
				<td>密碼</td>
				<td><input type="password" name="pwd" id="pwd" value="" ></td>
			</tr>	
			
            <tr>
				<td>姓名</td>
				<td><input type="text" name="name" id="name" value="" ></td>
			</tr> 
             <tr>
				<td>暱稱</td>
				<td><input type="text" name="pet_name" id="pet_name" value="" ></td>
			</tr> 	
			
            
		</table>
        </div>		
		<input type="hidden" name="send_data" value="has_post_value">
      </form>
    </div>
  </div>
</div>

<script type="text/javascript"><!--
$('#tabs a').tabs(); 
$('#languages a').tabs();
//--></script> 
</div>
<?php include('layout/footer.php');?></body></html>