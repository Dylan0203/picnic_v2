<?
include ("../setting.inc");
session_start();

if(!(isset($_SESSION["id"]) && $_SESSION["id"] == $adminid)){
	header("Location:index.php");		
	exit;
}

date_default_timezone_set( "Asia/Taipei" );

if(count($_POST)){	
	$str="update member set register='0', team='', pro='0' where team='".$_POST['jno']."'";
	mysql_query($str) or wrongmsg(" 寫入資料庫寫入失敗！<br>請重新輸入");
	
	if($_POST['member_no1']){	
		$str="update member set tel='".$_POST['telephone']."', register='1', team='".$_POST['member_no1']."', pro='".$_POST['picnic-display']."' where mem_no='".$_POST['member_no1']."'";
		mysql_query($str) or wrongmsg(" 寫入資料庫寫入失敗！<br>請重新輸入");
	}
	if($_POST['member_no2']){
		$str="update member set register='1', team='".$_POST['member_no1']."', pro='".$_POST['picnic-display']."' where mem_no='".$_POST['member_no2']."'";
		mysql_query($str) or wrongmsg(" 寫入資料庫寫入失敗！<br>請重新輸入");
	}
	if($_POST['member_no3']){
		$str="update member set register='1', team='".$_POST['member_no1']."', pro='".$_POST['picnic-display']."' where mem_no='".$_POST['member_no3']."'";
		mysql_query($str) or wrongmsg(" 寫入資料庫寫入失敗！<br>請重新輸入");
	}
	if($_POST['member_no4']){
		$str="update member set register='1', team='".$_POST['member_no1']."', pro='".$_POST['picnic-display']."' where mem_no='".$_POST['member_no4']."'";
		mysql_query($str) or wrongmsg(" 寫入資料庫寫入失敗！<br>請重新輸入");
	}
	if($_POST['member_no5']){
		$str="update member set register='1', team='".$_POST['member_no1']."', pro='".$_POST['picnic-display']."' where mem_no='".$_POST['member_no5']."'";
		mysql_query($str) or wrongmsg(" 寫入資料庫寫入失敗！<br>請重新輸入");
	}
	if($_POST['member_no6']){
		$str="update member set register='1', team='".$_POST['member_no1']."', pro='".$_POST['picnic-display']."' where mem_no='".$_POST['member_no6']."'";
		mysql_query($str) or wrongmsg(" 寫入資料庫寫入失敗！<br>請重新輸入");
	}
	echo "<meta http-equiv='content-type' content='text/html; charset=utf-8' />";
	echo "<script language=javascript>alert('修改完成')</script>";	
	echo "<body onload=\"window.location='main.php'\";>";//exit;
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="../css/font-style.css">
<link rel="stylesheet" type="text/css" href="../css/form.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>報名資料修改</title>
</head>
<body>
<div>

<?
$result = mysql_query("select * from member where team = '".$_POST['jno']."'");
$obj2 = mysql_fetch_object($result);

if($obj2->register == 0){ //未報名?>
<p><?echo $_POST['jno'];?>尚未報名</p>
<?}
else{ //已報名 
	$result = mysql_query("select * from member where mem_no = '".$obj2->team."'");
	$obj = mysql_fetch_object($result);
	?>
	
<form name="form1" method="post">
	<table align='center' bgcolor='#fff' width=100% class="table">
		<tr bgcolor="#FFD011" align='center'>
			<td>組長 - 員工編號</td>
			<td>組長 - 姓名</td>
			<td>組長 - 電話</td>
			<td>組長 - 部門</td>
			<td>組員</td>
			<td>組員</td>
			<td>組員</td>
			<td>組員</td>
			<td>組員</td>
			<td>佈置達人</td>
		</tr>
		<tr bgcolor='#FFFFFF' align='center' style="font-size:14pt;">
			<td><input id="member_no1" name="member_no1" value="<?echo $obj->mem_no;?>"></td>
			<td><span id="name_no1"><?echo $obj->name;?></span></td>
			<td><input id="telephone" name="telephone" value="<?echo $obj->tel;?>"></td>
			<td><span id="dept"><?echo $obj->dept;?></span></td>
			<?			
			$query2 = "SELECT mem_no, name FROM member WHERE team = ".$obj->mem_no." and mem_no != ".$obj->mem_no;
			$result2 = mysql_query($query2);
			for ( $i=0; $i< 5; $i++ ){
			list($mem,$name) = mysql_fetch_row($result2);?>			
			<td><input id="member_no<?echo ($i+2);?>" name="member_no<?echo ($i+2);?>" value="<?echo $mem;?>"><span id="name_no<?echo ($i+2);?>"><?echo $name;?></span></td>
			<?}?>
			<td><input type="checkbox" id="picnic-display" name="picnic-display" value="1" <?echo ($obj->pro)?"checked":"";?>></td>
		</tr>
	</table>
	
	<input type="hidden" name="jno" id="jno" value="<?echo $_POST['jno'];?>" />
	 <p><button type="submit" name="button2" id="button2">確定修改</button></p>
</form>

</div>


<script>
$("#member_no1").change(function() {
	url = "getmem_action.php?mno="+encodeURIComponent($("input#member_no1").val());
	var jqxhr = $.getJSON(url,
    function(data) {
		if(data.ifexist == 1){
			$("#name_no1").text(data.name);
			$("#dept").text(data.dept);
		}
		else{
			alert("編號錯誤");
			$("#name_no1").text("");
			$("#dept").text("");
		}
    })
	.error(function() { alert("error"); })
	.complete(function() { $.unblockUI(); });
});

<?for($i=2; $i<=6;$i++){?>
$("#member_no<?echo $i;?>").change(function() {
	url = "getmem_action.php?mno="+encodeURIComponent($("input#member_no<?echo $i;?>").val());
	var jqxhr = $.getJSON(url,
    function(data) {
		if(data.ifexist == 1){
			$("#name_no<?echo $i;?>").text(data.name);
		}
		else{
			alert("編號錯誤");
			$("#name_no<?echo $i;?>").text("");
		}
    })
	.error(function() { alert("error"); })
	.complete(function() { $.unblockUI(); });
});
<?}?>
</script>	

</body>
</html>