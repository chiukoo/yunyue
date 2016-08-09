<?php
  //包含需求檔案 ------------------------------------------------------------------------
	include("./class/common_lite.php");
	session_start();
	if($_SESSION['zeroteamzero'] != 'IS_LOGIN'){
		ri_jump("../login.php");
	}
 //宣告變數 ----------------------------------------------------------------------------
	$ODb = new run_db("mysql",3306);      //建立資料庫物件
	$uploaddir="./upload/demo/";
	$id=$_GET['id'];
	$total_num=0;
	if(isset($_POST['send_data'])&&$_POST['send_data']=='has_post_value' ){
	
	
		$edit =  date("Y-m-d H:i:s",time());
	
    
      $up_dsc ="update `content` set `content_in`='".$_POST['content_in']."',`name`='".$_POST['name']."',`phone`='".$_POST['phone']."',`email`='".$_POST['email']."',`title`='".$_POST['title']."' where `msg_id`='".$id."' ";
      $res=$ODb->query($up_dsc) or die("更新資料出錯，請聯繫管理員。");
    
			
		ri_jump("contact_us.php");	
  }

	$sql_dsc = "select * from `content` where `msg_id`='".$id."' " ;
	$res=$ODb->query($sql_dsc) or die("載入資料出錯，請聯繫管理員。");
	while($row = mysql_fetch_array($res)){
		$content_in=$row['content_in'];
		$msg_id=$row['msg_id'];
		$re_msg_id=$row['re_msg_id'];
		$m_acc=$row['m_acc'];
		$email=$row['email'];
		$name=$row['name'];
		$phone=$row['phone'];
		$type=$row['type'];
		$title=$row['title'];
		$re_content=$row['re_content'];
		$remark=$row['remark'];
		$img=$row['img'];
		
	}$total_num = mysql_num_rows($res);
	


?>

<!DOCTYPE>
<html dir="ltr" lang="zh-TW">
<head>
<meta charset="UTF-8" />
<title>聯絡我們設定</title>
<link rel="stylesheet" type="text/css" href="./css/stylesheet.css" />
<script type="text/javascript" src="./js/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="./js/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link type="text/css" href="./js/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<script type="text/javascript" src="./js/jquery/tabs.js"></script>

<script>

function BoxNum(form, boxname) { 
  var count = 0;
  set_count = 0;
  for(i = 0; i < form.length; i++)
    if(form.elements[i].type == 'checkbox' && form.elements[i].name == boxname && form.elements[i].checked == true) {
      count++;
	  set_count++;
      var obj = form.elements[i].value;
    }
  return Array(count, obj);
}


function delfun( act ){

  var box = BoxNum(document.forms['d'], 'box[]');

   if(   act == 'del' ){
    document.d.action = 'deldemo.php';
    document.d.submit();
}else if( act == 'update' ){

   if (set_count=='1'){
       if(    $("input[name='box[]']:checked").val() == ''  ){
   var setid = '';
}else{
  var setid = $("input[name='box[]']:checked").val()  ;
}
 document.d.action = 'ad_usupdate.php?id=' + setid ;
       document.d.submit();
   }else{alert('plase choose one(請單選)'); } 
}  else if( act == 'start' ){
   document.d.action = 'ad_aboutstart.php';
   document.d.submit();
}
   else if( act == 'close' ){
   document.d.action = 'ad_aboutclose.php';
   document.d.submit();
   }

  }

</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript" src="./js/jquery.truncatable.js"></script>

<script>
var selectAllVal = '';
function selectall(){

	$("input[name='box[]']").each(function(){
		if( selectAllVal == '' ){
			$(this).attr('checked',true);
		}else{
			$(this).attr('checked',false);
		}
	
	});
	if( selectAllVal == '' ){
		selectAllVal = 1;
		$("#new_select_type").attr('checked',true);
	}else{
		selectAllVal = '';
		$("#new_select_type").attr('checked',false);
	}
	

}

function ck_value(){
$('#form').submit();
}
</script>
<script src="./ckeditor/ckeditor.js" type="text/javascript"></script>
</head>
<body>
<?php include('layout/head.php');?>
<div id="container">

  <?php
  include('layout/menu_left.php');//載入左邊選單
  ?>
  <div id="content">
  <div class="breadcrumb">
        <a href="index.php">首頁(Home)</a> :: <a href="user.php">後台會員</a>:: <a href="#">編輯會員資料</a>
      </div>
    <div class="box">
    <div class="heading">
      <h1><img src="image/category.png" alt="" /> 聯絡我們回覆</h1>
      <div class="buttons"><a onclick="ck_value()" class="button">回覆(Reply)</a><a href="contact_us.php" class="button">取消(Cancel)</a></div>
    </div>
    <div class="content">
      <form action="" method="post" enctype="multipart/form-data" id="form">
        <div id="tab-general">
          <table class="form">
            <tr>
              <td>聯絡人</td>
              <td><?php echo $name;?></td>
            </tr>
            <tr>
              <td>聯絡電話</td>
              <td><?php echo $phone;?></td>
            </tr>
            
            <tr>
              <td>電子郵件</td>
              <td><?php echo $email;?></td>
            </tr>
            <tr>
              <td>主旨</td>
              <td><?php echo $title;?></td>
            </tr>
			
			 <tr>
              <td>內容</td>
              <td><?php echo $content_in;?></td>
            </tr>

            <tr>
              <td>內容</td>
              <td>
                  <textarea></textarea>
              </td>
            </tr>
           
          </table>
        </div>
        <input type="hidden" name="send_data" value="has_post_value">
        <input type="hidden" name="key_num" value="<?php echo $_GET['id'];?>">	
      </form>
    </div>
    </div>
</div>

<script type="text/javascript"><!--
$('#tabs a').tabs(); 
$('#languages a').tabs();
//--></script> 
</div>
<?php include('layout/footer.php');?>
</body></html>