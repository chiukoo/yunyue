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


switch(trim($_GET["act"])){

    case "index":
    if($_POST['box']){
	
	foreach( $_POST['box'] as $val ){
		 $sql = "delete from `demo_index` where `id`='".$val."'";
        
        $res=$ODb->query($sql) or die("刪除資料出錯，請聯繫管理員。");
		
		}
		header("Refresh: 0; url=".$_SERVER['HTTP_REFERER']);
        exit;
		}
		
		
		
	
	case "sys":
    if($_POST['box']){
	
	foreach( $_POST['box'] as $val ){
		 $sql = "delete from `sys_index` where `id`='".$val."'";
        
        $res=$ODb->query($sql) or die("刪除資料出錯，請聯繫管理員。");
		
		}
		header("Refresh: 0; url=".$_SERVER['HTTP_REFERER']);
        exit;
		}
		case "class":
    
		
		
}
		
	
	
	if(is_numeric($_GET['keyNum'])){
switch($_GET['tables']){
case "index"://最新消息

	$sql ="delete from `demo_index` where `id`='".$_GET['keyNum']."'";
	$res=$ODb->query($sql);
	echo "ok";
break;	
	case "sys"://布告欄

	$sql ="delete from `sys_index` where `id`='".$_GET['keyNum']."'";
	$res=$ODb->query($sql);
	echo "ok";
break;	
	

	
	}
	
	}
	
	/*//歷史紀錄
	$insert_edit_history = "insert into `edit_history` set `e_name`='".$bcusername."',`e_class`='刪除資料',`e_move`='標題為".$title."',`e_ip`='".$myip."',`create_dt`='".$updateDsc."'";
	$res_edit_history=$ODb->query($insert_edit_history) or die("新增資料出錯，請聯繫管理員。");

		mysql_query("DELETE FROM `demo_index` WHERE `id` = '".$val."'");
	*/




?>
<!doctype html>
<html>
<head>
<meta http-equiv="refresh" content="0;url=class_list.php" />
<title></title>
</head>

<body>
</body>
</html>