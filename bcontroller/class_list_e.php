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
	include("./edit_use.php");
	
	if(isset($_POST['send_data'])&&$_POST['send_data']=='has_post_value' ){
	
	
			
			//右圖
		$file_type_dsc = explode(".",basename($_FILES['img']['name']));
		
		$mtime = explode(" ", microtime()); 
		$startTime = $mtime[1] + $mtime[0];		
		$new_name = $startTime.".".$file_type_dsc[1];
		$uploadfile = $uploaddir.$new_name;

	
			if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
				$up_dsc ="update `demo_index` set `img`='".$new_name."'  where `id`='".$_POST['id']."'";
				$res=$ODb->query($up_dsc) or die("更新資料出錯，請聯繫管理員。");
				
				
		//歷史紀錄	
			$insert_edit_history = "insert into `edit_history` set `e_name`='".$bcusername."',`e_class`='修改圖片',`e_move`='/upload/demo/".$new_name."',`e_ip`='".$myip."',`create_dt`='".$updateDsc."'";
	$res_edit_history=$ODb->query($insert_edit_history) or die("新增資料出錯，請聯繫管理員。");
			}
			$updateDsc =  date("Y-m-d H:i:s",time());
			$up_dsc ="update `demo_index` set `order`='".$_POST['order']."',`title`='".$_POST['title']."',`content`='".$_POST['content1']."',`url`='".$_POST['url']."',`edit_dt`='".$updateDsc."' where `id`='".$_POST['id']."'";
				$res=$ODb->query($up_dsc) or die("更新資料出錯，請聯繫管理員。");
		//歷史紀錄	
			$insert_edit_history = "insert into `edit_history` set `e_name`='".$bcusername."',`e_class`='修改資料',`e_move`='標題".$_POST['title']."',`e_ip`='".$myip."',`create_dt`='".$updateDsc."'";
	$res_edit_history=$ODb->query($insert_edit_history) or die("新增資料出錯，請聯繫管理員。");
			
			ri_jump("class_list.php");
	}








$sql_dsc = "select * from `demo_index` where `id`='".$_GET['num']."' ";
	$res=$ODb->query($sql_dsc) or die("載入資料出錯，請聯繫管理員。");
	while($row = mysql_fetch_array($res)){
		$order=$row['order'];
		$title=$row['title'];
		$img=$row['img'];
		$content=$row['content'];
		$url=$row['url'];
	
	}



?>

<!DOCTYPE>
<html dir="ltr" lang="zh-TW">
<head>
<meta charset="UTF-8" />
<title>電子書主頁設定</title>
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
      <a href="index.php">首頁(Home)</a> :: <a href="class_list.php">主頁</a> :: <a href="#">修改主頁</a>
      </div>
    <div class="box">
    <div class="heading">
      <h1><img src="image/category.png" alt="" /> 修改主頁資訊</h1>
      <div class="buttons"><a onClick="ck_value()" class="button">保存(Save)</a><a href="class_list.php" class="button">取消(Cancel)</a></div>
    </div>
    <div class="content">
   <form action="" method="post" enctype="multipart/form-data" id="form">
        <div id="tab-general">
            <table class="form">
			
			
             <tr><td>
           排序
            </td><td>
            <input name="order" type="text" id="order" value="<?php echo $order;?>">
            </td></tr>
             <tr><td>
           標題
            </td><td>
            <input name="title" type="text" id="title" value="<?php echo $title?>">
            </td></tr>
			
             <!--<tr><td>
           簡介
            </td><td>
            <input name="content1" type="text" id="content1" value="<?php echo $content;?>">
            </td></tr>-->
                    <tr><td>
           連結網址
            </td><td>
            <input name="url" type="text" id="url" value="<?php echo $url;?>">
            </td></tr>       
              <tr>
                        
                        <td width="50" height="50">圖片</td><td><?php if($img !=""){echo '<img width="100" height="50" id="img" src="'.$uploaddir.$img.'">';}?><input type="file" name="img" id="img"></td>
						
			  </tr>
           
		</table>
        </div>		
		<input type="hidden" name="send_data" value="has_post_value">
        
        <input name="id" type="hidden" id="id" value="<?php echo $_GET['num'];?>">
      </form>
    </div>
  </div>
</div>

<!-- list open -->
<script type="text/javascript">
$(document).ready(function(){
	$('#ulcssmenu li[id="book"] ul').slideDown('fast');
	$('#book_1').attr('class','over');
});
</script>
</div>
<?php include('layout/footer.php');?>
</body></html>