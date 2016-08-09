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
	$total_num=0;

	$sql_dsc = "select * from `demo_index` ORDER BY `order` ";
	$res=$ODb->query($sql_dsc) or die("載入資料出錯，請聯繫管理員。");
	while($row = mysql_fetch_array($res)){
		$id[]=$row['id'];
	    $img[]=$row['img'];
		$title[]=$row['title'];
		$content[]=$row['content'];
		$order[]=$row['order'];
		$url[]=$row['url'];
		
	}
	$total_num = mysql_num_rows($res);

?>

<!DOCTYPE>
<html dir="ltr" lang="zh-TW">
<head>
<meta charset="UTF-8" />
<title>主頁設定</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<script type="text/javascript" src="js/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link type="text/css" href="js/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery/tabs.js"></script>

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
	   
	   if(confirm("您确定要刪除嗎？")){
	   
  document.d.action = 'deldemo.php?act=index&id=' + setid ;
    document.d.submit();
	 
	 }
	 else{
      
	 return false;
	 }
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
  function del(key_num,msg){
	
	
	if(confirm("您确定要刪除嗎？")){
	   $.ajax({ 
    url: 'deldemo.php',
	data: {keyNum:key_num,tables:"index"},
    error: function(xhr) {
		alert('Ajax request 發生錯誤');
    },
    success: function(response) {
		location.reload();
    }
  });
  
	 }
	 else{
      
	 return false;
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
</script>
</head>
<body>
<?php include('layout/head.php');?>
<div id="container">
  <?php include('layout/menu_left.php');?>
  <div id="content">
  <div class="breadcrumb">
        <a href="index.php">首頁(Home)</a> :: <a href="class_list.php">demo設定</a>
      </div>
    <div class="box">
    <div class="heading">
      <h1><img src="image/category.png" alt="" />主頁</h1>
      <div class="buttons"><a href="class_list_a.php" class="button">新增(Add)</a><a href="javascript:delfun('del');" class="button">刪除(Del)</a></div>	  
	  </div>
    </div>
    <div class="content">
      <form action="" method="post" enctype="multipart/form-data" id="d" name="d">
        <div id="tab-general">
            <table class="list">
              <tr>
                <th><a onclick='selectall()'><img src="image/checkbox.png" alt="全選"></a><!-- 點擊全選 --></th>
              <th>排序</th>
             
                <th>標題</th>
                <!--<th>簡介</th>-->
                 <th>圖片</th>
                <th width="200">功能操作</th>
              </tr>
		<?php	for($x=0;$x<$total_num;$x++){	?>
			<tr>
			  <td width="50" align="center"> <input name="box[]" type="checkbox" value="<?php echo $id[$x]; ?>"  ></td>
            <td width="50" align="center"><?php if($order[$x] !=''){echo $order[$x];}?></td>
            
           <td width="200" align="center"><?php if($title[$x]!=''){echo $title[$x];}?>
                    </td>
                     <!--<td width="200" align="center"><?php //if($content[$x]!=''){echo $content[$x];}?>
                    </td>-->
            <td width="200" class="book-img"><a href="<?php echo $url;?>"><?php if($img[$x] !=""){echo '<img width="100" height="50" id="img" src="'.$uploaddir.$img[$x].'">';}?></a>
                    </td>
            
			  <td align="right"><div class="buttons"><a href="class_list_e.php?num=<?php echo $id[$x];?>" class="button">編輯(Edit)</a>  <a onClick="del(<?php echo $id[$x];?>);" class="button">刪除(Del)</a></div></td>
			</tr>
		<?php	}	?>			  
            </table>
        </div>
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