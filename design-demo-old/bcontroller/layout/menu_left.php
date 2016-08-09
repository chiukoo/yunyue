

<!--左方選單-->	

<div id="cssmenu">
	<ul class="menu" id="ulcssmenu">
   		<li><a href="index.php">站務資訊</a></li>
		
		
        <li><a href="class_list.php">編輯demo</a>
		</li>
		<li><a href="sys_list.php">編輯system</a>
		</li>
         <li><a href="about_us.php">編輯關於我們</a>
		</li>
         <li><a href="contact_us.php">編輯聯絡我們</a>
		</li>
        <li><a href="user.php">後台管理者列表</a>
		</li>
        <li><a class="top">統計報表 <span>4</span></a>
            <ul>
                <li><a href="infor_analysis.php">網站訪客統計</a></li>
                <li><a href="infor_visitors.php">網站分析統計</a></li>
                 <li><a href="infor_modify.php">網站修改紀錄</a></li>
                <li><a href="logsckfinder.php">後台登入紀錄</a></li>
            </ul>
        </li>
	</ul>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<!--initiate accordion-->
<!--initiate accordion-->

<script type="text/javascript">

$(document).ready(function(){

    $('#ulcssmenu ul').hide();
	$('#ulcssmenu>li>a').click(
		function() {
			
			 var mySiblings = $(this).parent().find('ul');
			if( mySiblings.css('display') != 'block' ){
		
				$('#ulcssmenu ul').slideUp();
			    var mySiblings = $(this).parent().find('ul');
				mySiblings.slideDown();
		    }
	    }
	);
	//$('#ulcssmenu li#book ul').show();
	

});

</script>  
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  