<?php
  //包含需求檔案 ------------------------------------------------------------------------
	include("./class/common_lite.php");
	session_start();
		if($_SESSION['zeroteamzero'] != 'IS_LOGIN'){
		ri_jump("../login.php");
	}

 //宣告變數 ----------------------------------------------------------------------------
	$ODb = new run_db("mysql",3306);      //建立資料庫物件
	$total_num=0;

	$sql_dsc = "select `sys_id`,`sys` ,`name` from `sysuser` ORDER BY `create_dt` ";
	$res=$ODb->query($sql_dsc) or die("載入資料出錯，請聯繫管理員。");
	while($row = mysql_fetch_array($res)){
		$sys_id[] = $row['sys_id'];
		$sys[] = $row['sys'];
		$name[] = $row['name'];
	}
	$total_num = mysql_num_rows($res);

?>

<!DOCTYPE>
<html dir="ltr" lang="zh-TW">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>後台會員列表</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<script type="text/javascript" src="js/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link type="text/css" href="js/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery/tabs.js"></script>
<script type="text/javascript">
    //-----------------------------------------
    // Confirm Actions (delete, uninstall)
    //-----------------------------------------
    $(document).ready(function () {
        // Confirm Delete
        $('#form').submit(function () {
            if ($(this).attr('action').indexOf('delete', 1) != -1) {
                if (!confirm('確認?(Confirm?)')) {
                    return false;
                }
            }
        });
        // Confirm Uninstall
        $('a').click(function () {
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
            function () {
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
    function del(key_num, msg) {
        if (confirm("您确定要刪除" + msg + "嗎？")) {
            $.ajax({
                url: 'delfunction.php',
                data: { keyNum: key_num, tables: "sysuser" },
                error: function (xhr) {
                    alert('Ajax request 發生錯誤');
                },
                success: function (response) {
                    location.reload();
                }
            });
        } else { }
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
        <a href="index.php">首頁(Home)</a> :: <a href="user.php">後台會員</a>
      </div>
    <div class="box">
    <div class="heading">
      <h1><img src="image/category.png" alt="" /> 產品</h1>
      <div class="buttons"><a href="user_a.php" class="button">新增(Add)</a></div>	  
	  </div>
    </div>
    <div class="content">
      <form action="member.php" method="post" enctype="multipart/form-data" id="form">
        <div id="tab-general">
            <table class="list">
              <tr>
              <td>會員帳號</td>
                <td>會員名稱</td>
                <td align="center" width="200">功能操作</td>
              </tr>
		<?php	for($x=0;$x<$total_num;$x++){	?>
			<tr>
            <td><?php if($sys[$x] !=''){echo $sys[$x];}?></td>
				<td><?php echo $name[$x];?></td>
				<td align="right"><div class="buttons"><a href="user_e.php?id=<?php echo $sys_id[$x];?>" class="button">編輯(Edit)</a>  
                    <a onclick="del('<?php echo $sys_id[$x];?>','<?php echo $name[$x];?>');" class="button">刪除(Del)</a></div></td>
			</tr>
		<?php	}	?>			  
            </table>
        </div>
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