<?
include ("../setting.inc");
session_start();

if(!(isset($_SESSION["id"]) && $_SESSION["id"] == $adminid)){
	header("Location:index.php");		
	exit;
}

date_default_timezone_set( "Asia/Taipei" );


if($_GET['cancel'] == 1){

	$jno = $_GET['jno'];
	
	$upSql = "update member set register='0', pro='0', team='' where team='".$jno."'";
	mysql_query($upSql) or wrongmsg(" 寫入資料庫寫入失敗！<br>請重新輸入");
		
	echo "<script language=javascript>alert('取消完成！')</script>";
	echo "<body onload=\"window.location='main.php'\";>";
}

$pro_query = "SELECT DISTINCT team FROM member where register = 1 and pro = 1";
$pro_result = mysql_query($pro_query);
$pro_count = mysql_num_rows($pro_result);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="../css/font-style.css">
<link rel="stylesheet" type="text/css" href="../css/form.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>報名統計</title>
</head>
<body>

<div>

	<div style="width:100%;">
		<form name="searchform" method="post" action="<?php echo "$PHP_SELF?search=1"; ?>">
			<span style="display:inline-block;width:59%;">員工編號：
				<input name="member_no" type="text" id="member_no" size="12" maxlength="12">
				<input type="submit" name="button2" id="button2" value="查詢" class="button">
				<?if($_GET['search']==1){ echo "<a href='main.php'>顯示全部</a>";}?>
			</span>
			<span style="display:inline-block;width:20%;">布置達人組數：<?echo $pro_count;?></span>		
			<span style="display:inline-block;width:20%;"><a href=toExcel.php><img src="pics/excel.jpg" border="0"> Excel存檔</a></span>
		</form>	
	</div>

<?	
	
if($_GET['search']==1){
	$result = mysql_query("select * from member where mem_no = '".$_POST['member_no']."'");
	$obj2 = mysql_fetch_object($result);
	if($obj2->register == 0){ //未報名?>
<p>報名查詢結果：<?echo $_POST['member_no'];?>尚未報名</p>
<?}
	else{ //已報名 
		$result = mysql_query("select * from member where mem_no = '".$obj2->team."'");
		$obj = mysql_fetch_object($result);
	
	?>
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
			<td>修改</td>
			<td>取消參加</td>
		</tr>
		<tr bgcolor='#FFFFFF' align='center' style="font-size:14pt;">
			<td><?echo $obj->mem_no;?></td>
			<td><?echo $obj->name;?></td>
			<td><?echo $obj->tel;?></td>
			<td><?echo $obj->dept;?></td>
			<?			
			$query2 = "SELECT mem_no, name FROM member WHERE team = ".$obj->mem_no." and mem_no != ".$obj->mem_no;
			$result2 = mysql_query($query2);
			for ( $i=0; $i< 5; $i++ ){
			list($mem,$name) = mysql_fetch_row($result2);?>			
			<td><?echo $mem." ".$name;?></td>
			<?}?>
			<td><?echo ($obj->pro)?"<img src='pics/check.jpg'>":"";?></td>
			<td><a href="modify.php?jno=<?echo $row->mem_no;?>">修改</a></td>
			<td ><a href="main.php?cancel=1&jno=<?echo $obj->mem_no;?>">取消參加</a></td>
		</tr>
	</table>	
<?	}
}
else{
	$query = "SELECT * FROM member WHERE register = 1 and mem_no IN(SELECT DISTINCT team FROM member where register = 1)";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);

	if($count){  //此if避免當count=0會出現錯誤?>
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
			<td>修改</td>
			<td>取消參加</td>
		</tr>
	
<?	while($row = mysql_fetch_object($result)) {?>
		
		<tr bgcolor='#FFFFFF' align='center' style="font-size:14pt;">
			<td><?echo $row->mem_no;?></td>
			<td><?echo $row->name;?></td>
			<td><?echo $row->tel;?></td>
			<td><?echo $row->dept;?></td>
			<?			
			$query2 = "SELECT mem_no, name FROM member WHERE team = ".$row->mem_no." and mem_no != ".$row->mem_no;
			$result2 = mysql_query($query2);
			for ( $i=0; $i< 5; $i++ ){
			list($mem,$name) = mysql_fetch_row($result2);?>			
			<td><?echo $mem." ".$name;?></td>
			<?}?>
			<td><?echo ($row->pro)?"<img src='pics/check.jpg'>":"";?></td>
			<td><a href="modify.php?jno=<?echo $row->mem_no;?>">修改</a></td>
			<td><a href="main.php?cancel=1&jno=<?echo $row->mem_no;?>">取消參加</a></td>
		</tr><?}?>
	</table><?}?>
<?}?>
</div>

</body>
</html>