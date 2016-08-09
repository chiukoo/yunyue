<?php
//包含需求檔案 ------------------------------------------------------------------------
	include("./class/common_lite.php");
//宣告變數 ----------------------------------------------------------------------------
	$ODb = new run_db("mysql",3306);      //建立資料庫物件
	include("./edit_use.php");
    if(is_numeric($_GET['keyNum'])){
    switch($_GET['tables']){


case "sysuser":
	$sql ="delete from `sysuser` where `sys_id`='".$_GET['keyNum']."'";
	$res=$ODb->query($sql);
	echo "ok";
break;


case "content":
	$sql ="delete from `content` where `msg_id`='".$_GET['keyNum']."'";
	$res=$ODb->query($sql);
	echo "ok";
break;		
}
    }
	
?>