<?php
  //包含需求檔案 ------------------------------------------------------------------------
	include("./class/common_lite.php");
	session_start();
	session_destroy();
	ri_jump("../login.php");
	
?>

