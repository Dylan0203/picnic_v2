<?
include_once 'setting.inc';
date_default_timezone_set( "Asia/Taipei" );

if(count($_POST)){	
	if($_POST['modify']){
		$str="update member set register='0', team='', pro='0' where team='".$_POST['modify']."'";
		mysql_query($str) or wrongmsg(" 寫入資料庫寫入失敗！<br>請重新輸入");
	}
	
	if($_POST['mno']){	
		$str="update member set tel='".$_POST['telephone']."', register='1', team='".$_POST['mno']."', pro='".$_POST['picnic-display']."' where mem_no='".$_POST['mno']."'";
		mysql_query($str) or wrongmsg(" 寫入資料庫寫入失敗！<br>請重新輸入");
	}
	if($_POST['mno2']){
		$str="update member set register='1', team='".$_POST['mno']."', pro='".$_POST['picnic-display']."' where mem_no='".$_POST['mno2']."'";
		mysql_query($str) or wrongmsg(" 寫入資料庫寫入失敗！<br>請重新輸入");
	}
	if($_POST['mno3']){
		$str="update member set register='1', team='".$_POST['mno']."', pro='".$_POST['picnic-display']."' where mem_no='".$_POST['mno3']."'";
		mysql_query($str) or wrongmsg(" 寫入資料庫寫入失敗！<br>請重新輸入");
	}
	if($_POST['mno4']){
		$str="update member set register='1', team='".$_POST['mno']."', pro='".$_POST['picnic-display']."' where mem_no='".$_POST['mno4']."'";
		mysql_query($str) or wrongmsg(" 寫入資料庫寫入失敗！<br>請重新輸入");
	}
	if($_POST['mno5']){
		$str="update member set register='1', team='".$_POST['mno']."', pro='".$_POST['picnic-display']."' where mem_no='".$_POST['mno5']."'";
		mysql_query($str) or wrongmsg(" 寫入資料庫寫入失敗！<br>請重新輸入");
	}
	if($_POST['mno6']){
		$str="update member set register='1', team='".$_POST['mno']."', pro='".$_POST['picnic-display']."' where mem_no='".$_POST['mno6']."'";
		mysql_query($str) or wrongmsg(" 寫入資料庫寫入失敗！<br>請重新輸入");
	}
	echo "<meta http-equiv='content-type' content='text/html; charset=utf-8' />";
	if($_POST['modify']) echo "<script language=javascript>alert('修改完成')</script>";	
	else echo "<script language=javascript>alert('報名完成')</script>";		
	echo "<body onload=\"window.location='login2.php'\";>";//exit;
}

$query = "SELECT DISTINCT team FROM member where register = 1 and pro = 1";
$result = mysql_query($query);
$pro_count = mysql_num_rows($result);
$max_pro = 50;
?>
<!DOCTYPE html>
<html>
  <head>
	 <meta http-equiv="content-type" content="text/html; charset=utf-8">
	 <title>Fun輕鬆，我們野餐趣</title>
	<script src="javascript/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/font-style.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
   <link rel="stylesheet" type="text/css" href="css/form.css">

    <meta name="viewport" content="width=device-width, init-scale=1.0">

<link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
  </head>
<body class="bodyimage">

    
<header>
 <h1 class="Three-Dee"></h1> 
</header>
<div class="logoinfrom"></div>
<div class="agree">
                <h2 style="text-align: center">報名簡章</h2>

<h4 style="line-height:200%">活動名稱：Fun輕鬆，我們野餐趣<br>
活動日期：2016年5月14日(星期六) 下午1時至下午5時<br>
活動地點：大臺北都會公園&lt;幸福水漾園區&gt;<br>
報名人數：每組參加二至六人(需內含至少一位員工)，歡迎邀請同事、親朋好友共同參與。<br>
注意事項：活動保險 與 特別聲明<br></h4>
<h5 style="line-height:200%">現場提供必要緊急醫療救護，有關本身疾患引起之病症不在承保範圍內，而公共意外險只
承保因意外所受之傷害做理賠。本次活動針對報名者投保新台幣300萬元之公共意外險。<span style="font-size: 14px">（所有細節依國泰產險之保險契約為準）</span></h5>
<h5><!--<li>公共意外險承保範圍：<br></li>
<ul>(一)被保險人因在保險期間內於活動會場發生意外事故所致第三人體傷、死亡或第三人財
       物損害，依法應負賠償責任，而受賠償請求時，本公司對被保險人負賠償之責。</ul>
<ul>(二)特別不保事項：</ul>
    <ul>1.個人疾病導致運動傷害。</ul>
    <ul>2.因個人體質或因自身心血管所致之症狀，例如休克、心臟症、糖尿病、熱衰竭、中暑
       、高山症、癲癇、脫水等。對於因本身疾患所引起之病症將不在保險範圍內，而公共
        意外險只承擔因外來意外所受之傷害理賠。</ul>
    <ul>3.民眾如遇與跟第二項所述之疾病之病史，建議慎重考慮自身安全，自行加保個人人身
       意外保險。</ul>-->
<li>本活動辦法如有未盡事宜，以國泰世華銀行人資部公告事項為主。</li></h5>
<h4 style="text-align: center"> <input type="radio" name="agree" value="1">
 已詳細閱讀、充分瞭解並同意上述聲明內容。<input type="radio" name="agree" value="0">
  不同意上述聲明內容。</h4>
 
    </div>

<div class="step" >
     
<fieldset class="step1">
        
  <legend>
          
          <span class=""> </span>
            
  </legend>
          <label for="member_no">
  <h2>員工參加人數最少1人</h2><h3>歡迎邀請同事、親朋好友共同參與 </h3><p></p>
  請輸入員工編號
  </label>
  <p></p>
            <input id="member_no1" name="member_no1" placeholder="請輸入員工編號-組長">
          <input id="member_no2" name="member_no2" placeholder="請輸入員工編號-參加者">
          <input id="member_no3" name="member_no3" placeholder="請輸入員工編號-參加者">
          <input id="member_no4" name="member_no4" placeholder="請輸入員工編號-參加者">
          <input id="member_no5" name="member_no5" placeholder="請輸入員工編號-參加者">
          <input id="member_no6" name="member_no6" placeholder="請輸入員工編號-參加者"><p></p>

          <p><button name="reset" id="reset">重新輸入</button>
            <button name="button1" id="button1">讀取資料</button>
            <button name="button3" id="button3">更新資料</button></p>
        
</fieldset>

    <form method="post">
        <fieldset class="step2">

        <h2>組長資料</h2>
            <legend><span class=""> </span></legend>
            <label for="mem_name">姓名</label><br>
            <input type="text" id="mem_name" name="mem_name" placeholder="組長姓名由資料庫讀取">
            <p><label for="dep" >部門</label><br>
          <input type="text" id="dep" name="dep" placeholder="部門由資料庫讀取"></p>

              <label for="tel">電話</label>
              <br>
            <input type="tel" id="telephone" name="telephone" placeholder="電話"></p>
            
        </fieldset>
		
       
        <fieldset class="step2">
        <h2>參加者資料</h2>
          <input type="text" id="mem_name2" name="mem_name2" placeholder="參加者姓名由資料庫讀取">
        <input type="text" id="mem_name3" name="mem_name3" placeholder="參加者姓名由資料庫讀取"><p></p>
        <input type="text" id="mem_name4" name="mem_name4" placeholder="參加者姓名由資料庫讀取">
        <input type="text" id="mem_name5" name="mem_name5" placeholder="參加者姓名由資料庫讀取"><p></p>
        <input type="text" id="mem_name6" name="mem_name6" placeholder="參加者姓名由資料庫讀取"><p></p>
        <input type="checkbox" id="picnic-display" name="picnic-display" value="1" <?echo ($pro_count>=$max_pro)?"disabled":"";?>> 我要餐加野餐佈置達人活動！<p></p>
        
          <p><button type="submit" name="button2" id="button2">確定參加</button></p>
        
        </fieldset>
		
		<input type="hidden" name="idexist" id="idexist" value="0" />
		<input type="hidden" name="modify" id="modify" value="0" />
		<input type="hidden" name="mno" id="mno" />
		<input type="hidden" name="mno2" id="mno2" />
		<input type="hidden" name="mno3" id="mno3" />
		<input type="hidden" name="mno4" id="mno4" />
		<input type="hidden" name="mno5" id="mno5" />
		<input type="hidden" name="mno6" id="mno6" />
        
    </form>
    
<script>
$(function() {
	$("#button2").hide();
	$("#button3").hide();
	$(".step2").hide();
});

$("#member_no1").change(function() {
	url = "getmem_action2.php?mno="+encodeURIComponent($("input#member_no1").val());
	var jqxhr = $.getJSON(url,
    function(data) {
		if(data.ifexist == 1){
			if(data.marray[0]) $("#member_no2").val(data.marray[0]);
			if(data.marray[1]) $("#member_no3").val(data.marray[1]);
			if(data.marray[2]) $("#member_no4").val(data.marray[2]);
			if(data.marray[3]) $("#member_no5").val(data.marray[3]);
			if(data.marray[4]) $("#member_no6").val(data.marray[4]);
			$("#button2").text("確定修改");
			$("#modify").val($("input#member_no1").val());
		}
		else{
			$("#button2").text("確定參加");
			$("#modify").val(0);
		}
    })
	.error(function() { alert("error"); })
	.complete(function() { $.unblockUI(); });
	
}); 

$("#reset").click(function() {
	$("#member_no1").val("");
	$("#member_no2").val("");
	$("#member_no3").val("");
	$("#member_no4").val("");
	$("#member_no5").val("");
	$("#member_no6").val("");
	$(".step2").hide();
});

$("#button1").click(function() {
	url = "getmem_action2.php?mno="+encodeURIComponent($("input#member_no1").val());
	var jqxhr = $.getJSON(url,
    function(data) {
		if(data.ifexist == 1){
			if(data.marray[0]) $("#member_no2").val(data.marray[0]);
			if(data.marray[1]) $("#member_no3").val(data.marray[1]);
			if(data.marray[2]) $("#member_no4").val(data.marray[2]);
			if(data.marray[3]) $("#member_no5").val(data.marray[3]);
			if(data.marray[4]) $("#member_no6").val(data.marray[4]);
			$("#button2").text("確定修改");
			$("#modify").val($("input#member_no1").val());
			$("#button1").hide();
			$("#button3").show();
		}
		else{
			$("#button2").text("確定參加");
			$("#modify").val(0);
			$("#button3").hide();
			$("#button1").show();
		}
    })
	.error(function() { alert("error"); })
	.complete(function() { $.unblockUI(); });
	
	var idexist = 0;
	var errorstr = "";
	
	url = "getmem_action.php?mno="+encodeURIComponent($("input#member_no1").val())+"&m2="+encodeURIComponent($("input#member_no2").val())+"&m3="+encodeURIComponent($("input#member_no3").val())+"&m4="+encodeURIComponent($("input#member_no4").val())+"&m5="+encodeURIComponent($("input#member_no5").val())+"&m6="+encodeURIComponent($("input#member_no6").val())+"&mo="+$("#modify").val();
	var jqxhr = $.getJSON(url,
    function(data) {
		if(data.ifexist == 1){		
			$("#mem_name").val(data.mem_name);
			$("#dep").val(data.mem_dept);
			$("#mno").val($("input#member_no1").val());
			idexist+=1;
		}
		else if(data.ifexist == 2){
			errorstr += $("input#member_no1").val()+"已報名其他組，請先從原報名組別中移除\n";
			$("#mem_name").val("");
			$("#dep").val("");
			$("#mno").val("");
			$("#idexist").val("0");
			$("#button2").hide();			
			$(".step2").hide();
		}
		else{
			errorstr +="組長 員工編號錯誤\n";
			$("#mem_name").val("");
			$("#dep").val("");
			$("#mno").val("");
			$("#idexist").val("0");
			$("#button2").hide();		
			$(".step2").hide();
		}
		if(data.m2exist == 1){
			$("#mem_name2").val(data.mem2_name);
			
			$("#mno2").val($("input#member_no2").val());
		}
		else if(data.m2exist == 2){
			errorstr += data.mem2_name+"已報名其他組，請先從原報名組別中移除\n";
			$("#mno2").val("");
		}
		else if(data.m2exist == 0){
			errorstr += $("input#member_no2").val()+"編號錯誤\n";
			$("#mno2").val("");
			$("#member_no2").val("");
		}
		
		if(data.m3exist == 1){	
			$("#mem_name3").val(data.mem3_name);
			
			$("#mno3").val($("input#member_no3").val());
		}
		else if(data.m3exist == 2){
			errorstr += data.mem3_name+"已報名其他組，請先從原報名組別中移除\n";
			$("#mno3").val("");
		}
		else if(data.m3exist == 0){
			errorstr += $("input#member_no3").val()+"編號錯誤\n";
			$("#mno3").val("");
			$("#member_no3").val("");
		}
		
		if(data.m4exist == 1){
			$("#mem_name4").val(data.mem4_name);
			
			$("#mno4").val($("input#member_no4").val());
		}
		else if(data.m4exist == 2){
			errorstr += data.mem4_name+"已報名其他組，請先從原報名組別中移除\n";
			$("#mno4").val("");
		}
		else if(data.m4exist == 0){
			errorstr += $("input#member_no4").val()+"編號錯誤\n";
			$("#mno4").val("");
			$("#member_no4").val("");
		}
		
		if(data.m5exist == 1){		
			$("#mem_name5").val(data.mem5_name);
			
			$("#mno5").val($("input#member_no5").val());
		}
		else if(data.m5exist == 2){
			errorstr += data.mem5_name+"已報名其他組，請先從原報名組別中移除\n";
			$("#mno5").val("");
		}
		else if(data.m5exist == 0){
			errorstr += $("input#member_no5").val()+"編號錯誤\n";
			$("#mno5").val("");
			$("#member_no5").val("");
		}
		
		if(data.m6exist == 1){		
			$("#mem_name6").val(data.mem6_name);
			
			$("#mno6").val($("input#member_no6").val());
		}
		else if(data.m6exist == 2){
			errorstr += data.mem6_name+"已報名其他組，請先從原報名組別中移除\n";
			$("#mno6").val("");
		}
		else if(data.m6exist == 0){
			errorstr += $("input#member_no6").val()+"編號錯誤\n";
			$("#mno6").val("");
			$("#member_no6").val("");
		}
		
		if(errorstr){
			alert(errorstr);
		}
		else if(idexist > 0){
			$("#idexist").val(idexist);		
			if($("#modify").val()==0)
				$(".step1").hide();
			$("#button2").show();		
			$(".step2").show();
		}
		
    })
	.error(function() { alert("error"); })
	.complete(function() { $.unblockUI(); });
	
}); 


$("#button3").click(function() { //更新資料按鈕(已報名要修改)
	var idexist = 0;
	var errorstr = "";
	
	$("#mem_name2").val("");
	$("#mem_name3").val("");
	$("#mem_name4").val("");
	$("#mem_name5").val("");
	$("#mem_name6").val("");
	$("#mno2").val("");
	$("#mno3").val("");
	$("#mno4").val("");
	$("#mno5").val("");
	$("#mno6").val("");
	
	url = "getmem_action.php?mno="+encodeURIComponent($("input#member_no1").val())+"&m2="+encodeURIComponent($("input#member_no2").val())+"&m3="+encodeURIComponent($("input#member_no3").val())+"&m4="+encodeURIComponent($("input#member_no4").val())+"&m5="+encodeURIComponent($("input#member_no5").val())+"&m6="+encodeURIComponent($("input#member_no6").val())+"&mo="+$("#modify").val();
	var jqxhr = $.getJSON(url,
    function(data) {
		if(data.ifexist == 1){		
			$("#mem_name").val(data.mem_name);
			$("#dep").val(data.mem_dept);
			$("#mno").val($("input#member_no1").val());
			idexist+=1;
		}
		else if(data.ifexist == 2){
			errorstr += $("input#member_no1").val()+"已報名其他組，請先從原報名組別中移除\n";
			$("#mem_name").val("");
			$("#dep").val("");
			$("#mno").val("");
			$("#idexist").val("0");
			$("#button2").hide();			
			$(".step2").hide();
		}
		else{
			errorstr +="組長 員工編號錯誤\n";
			$("#mem_name").val("");
			$("#dep").val("");
			$("#mno").val("");
			$("#idexist").val("0");
			$("#button2").hide();		
			$(".step2").hide();
		}
		if(data.m2exist == 1){
			$("#mem_name2").val(data.mem2_name);
			
			$("#mno2").val($("input#member_no2").val());
		}
		else if(data.m2exist == 2){
			errorstr += data.mem2_name+"已報名其他組，請先從原報名組別中移除\n";
			$("#mno2").val("");
		}
		else if(data.m2exist == 0){
			errorstr += $("input#member_no2").val()+"編號錯誤\n";
			$("#mno2").val("");
			$("#member_no2").val("");
		}
		
		if(data.m3exist == 1){	
			$("#mem_name3").val(data.mem3_name);
			
			$("#mno3").val($("input#member_no3").val());
		}
		else if(data.m3exist == 2){
			errorstr += data.mem3_name+"已報名其他組，請先從原報名組別中移除\n";
			$("#mno3").val("");
		}
		else if(data.m3exist == 0){
			errorstr += $("input#member_no3").val()+"編號錯誤\n";
			$("#mno3").val("");
			$("#member_no3").val("");
		}
		
		if(data.m4exist == 1){
			$("#mem_name4").val(data.mem4_name);
			
			$("#mno4").val($("input#member_no4").val());
		}
		else if(data.m4exist == 2){
			errorstr += data.mem4_name+"已報名其他組，請先從原報名組別中移除\n";
			$("#mno4").val("");
		}
		else if(data.m4exist == 0){
			errorstr += $("input#member_no4").val()+"編號錯誤\n";
			$("#mno4").val("");
			$("#member_no4").val("");
		}
		
		if(data.m5exist == 1){		
			$("#mem_name5").val(data.mem5_name);
			
			$("#mno5").val($("input#member_no5").val());
		}
		else if(data.m5exist == 2){
			errorstr += data.mem5_name+"已報名其他組，請先從原報名組別中移除\n";
			$("#mno5").val("");
		}
		else if(data.m5exist == 0){
			errorstr += $("input#member_no5").val()+"編號錯誤\n";
			$("#mno5").val("");
			$("#member_no5").val("");
		}
		
		if(data.m6exist == 1){		
			$("#mem_name6").val(data.mem6_name);
			
			$("#mno6").val($("input#member_no6").val());
		}
		else if(data.m6exist == 2){
			errorstr += data.mem6_name+"已報名其他組，請先從原報名組別中移除\n";
			$("#mno6").val("");
		}
		else if(data.m6exist == 0){
			errorstr += $("input#member_no6").val()+"編號錯誤\n";
			$("#mno6").val("");
			$("#member_no6").val("");
		}
		
		if(errorstr){
			alert(errorstr);
		}
		else if(idexist > 0){
			$("#idexist").val(idexist);		
			$(".step1").hide();
			$("#button2").show();		
			$(".step2").show();
		}
		
    })
	.error(function() { alert("error"); })
	.complete(function() { $.unblockUI(); });
	
}); 

$("form").submit(function(){
	
  if($("#idexist").val() < 1){
	alert("請輸入員工編號，每組至少一人");
	return false;
  }
  if(!($("#telephone").val())){
	alert("請輸入組長電話");
	return false;
  }
  
  var agree = $("input[name='agree']:checked").val();
  if( typeof(agree) == "undefined" || agree == 0){
	alert("請詳細閱讀注意事項");
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
