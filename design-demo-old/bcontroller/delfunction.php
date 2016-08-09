<?php
//包含需求檔案 ------------------------------------------------------------------------
	include("./class/common_lite.php");
//宣告變數 ----------------------------------------------------------------------------
	$ODb = new run_db("mysql",3306);      //建立資料庫物件
	include("./edit_use.php");
if(is_numeric($_GET['keyNum'])){
switch($_GET['tables']){
case "on_sale_product"://促銷活動
	$uploaddir = "uploads/onSaleDM/";
	$sql = "select `sale_dm` from `on_sale_product` where `sale_num`='".$_GET['keyNum']."'";
	$res=$ODb->query($sql);
	while($rows = mysql_fetch_array($res)){
		$sale_dm = $rows['sale_dm'];
	}

	$sql ="delete from `on_sale_product` where `sale_num`='".$_GET['keyNum']."'";
	$res=$ODb->query($sql);
	if($sale_dm!=''){
	unlink($uploaddir.$sale_dm);
	}
	echo "ok";
break;


case "user"://後台使用者

     $select = "select `title` from `demo_index` `sys_id` = '".$_GET['keyNum']."'";
		$res=$ODb->query($select) or die("載入資料出錯，請聯繫管理員。");
		while($row = mysql_fetch_array($res)){
			$sys=$row['sys'];
		
		}
	
	
	
	//歷史紀錄
	$insert_edit_history = "insert into `edit_history` set `e_name`='".$bcusername."',`e_class`='刪除資料',`e_move`='帳號為".$sys."',`e_ip`='".$myip."',`create_dt`='".$updateDsc."'";
	$res_edit_history=$ODb->query($insert_edit_history) or die("新增資料出錯，請聯繫管理員。");
	
	$sql ="delete from `sysuser` where `sys_id`='".$_GET['keyNum']."'";
	$res=$ODb->query($sql);
	echo "ok";
break;
default:
break;
}


}	
	
?>