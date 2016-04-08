<?
include_once 'setting.inc';
date_default_timezone_set( "Asia/Taipei" );

if(count($_POST)){
	
	$str="update member set tel='".$_POST['telephone']."',adult='".$_POST['adultNum']."',children='".$_POST['childNum']."' where mem_no='".$_POST['mno']."'";
	mysql_query($str) or wrongmsg(" 寫入資料庫寫入失敗！<br>請重新輸入");
		
	echo "<meta http-equiv='content-type' content='text/html; charset=utf-8' />";
	echo "<script language=javascript>alert('報名完成')</script>";		
	echo "<body onload=\"window.location='login.php'\";>";exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
	 <meta http-equiv="content-type" content="text/html; charset=utf-8">
	 <title>幸福野餐日</title>
	<script src="javascript/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
   <link rel="stylesheet" type="text/css" href="css/form.css">

    <meta name="viewport" content="width=device-width, init-scale=1.0">

<link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
  </head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.5&appId=489145587957678";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    
    
    <header>
        <h1 class="Three-Dee">Let's Picnic</h1>
			
	</header>
            
    <div class="step" align="center" >
        <fieldset class="step1">
        <h2>讀取資料</h2>
            <legend><span class=""> </span><h1>Step 1</h1></legend>
            <label for="member_no">員工編號:</label>
            <input id="member_no" name="member_no" placeholder="請輸入員工編號">
            <p><button type="reset">重新輸入</button>
            <button name="button1" id="button1">讀取資料</button></p>
        
        </fieldset>

    <form method="post">
        <fieldset class="step1">
        <h2>員工資料</h2>
            <legend><span class=""> </span></legend>
            <label for="mem_name">姓名:</label>
            <input type="text" id="mem_name" name="mem_name" placeholder="您的姓名">
            <p><label for="tel">電話:</label>
            <input type="tel" id="telephone" name="telephone" placeholder="電話"></p>
            <p><label for="dep" >部門:</label>
            <input type="text" id="dep" name="dep" placeholder="部門"></p>
            
        </fieldset>
		
       
        <fieldset class="step2">
        <h2>輸入參加人數</h2>
            <legend>
            如欲修改參加人數只要讀取資料後 重新輸入就可以修改參加人數<span class=""> </span>
            <h1>Step 2</h1></legend>
            <p><label for="adult">成人:</label>
            <input type="number" id="adultNum" name="adultNum" placeholder="請輸入成人參加人數"></p>
            <p><label for="child">小孩:</label>
            <input type="number" id="childNum" name="childNum" placeholder="請輸入小孩參加人數"></p>
            <p><button type="submit" name="button2" id="button2">確定參加</button></p>
        
        </fieldset>
		
		<input type="hidden" name="idexist" id="idexist" value="0" />
		<input type="hidden" name="mno" id="mno" />
        
    </form>
    
<script>
$(function() {
	$("#button2").hide();
});
$("#button1").click(function() {

	url = "getmem_action.php?mno="+encodeURIComponent($("input#member_no").val());
	var jqxhr = $.getJSON(url,
    function(data) {
		if(data.ifexist == 1){		
			$("#mem_name").val(data.mem_name);
			$("#telephone").val(data.mem_tel);
			$("#dep").val(data.mem_dept);
			$("#mno").val(data.mem_no);
			$("#adultNum").val(data.adultNum);
			$("#childNum").val(data.childNum);
			$("#idexist").val("1");
			$("#button2").show();
		}
		else{
			alert("編號錯誤");
			$("#mem_name").val("");
			$("#telephone").val("");
			$("#dep").val("");
			$("#mno").val("");
			$("#adultNum").val("");
			$("#childNum").val("");
			$("#idexist").val("0");
			$("#button2").hide();
		}
    })
	.error(function() { alert("error"); })
	.complete(function() { $.unblockUI(); });
	
}); 

$("form").submit(function(){
	
  if($("#idexist").val() == 0){
	alert("請輸入員工編號");
	return false;
  }
  
  return true;
});
</script>	

  	<footer>
<!--            <div class="fb-like" data-href="http://www.cathaypicnic.com.tw" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>    -->

  			<p>&copy; 2016 國泰世華銀行</p>
  	</footer>

</body>
</html>
