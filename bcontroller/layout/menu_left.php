

<!--左方選單-->	

<div id="cssmenu">
	<ul class="menu" id="ulcssmenu">
   		<li><a href="index.php">站務資訊</a></li>
        <li><a href="class_list.php">編輯　webdesign</a></li>
         <li><a href="about_us.php">編輯　關於我們</a></li>
        <li><a href="service.php">編輯　服務項目</a>
		</li>
         <li><a href="contact_us.php">編輯　聯絡我們</a>
		</li>
        <li><a href="user.php">後台管理者列表</a>
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
  
  