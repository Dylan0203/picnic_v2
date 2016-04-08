<?
include ("../setting.inc");

  session_start();
  session_destroy();
  session_start();
  
if($_POST['loginid']){
	if($_POST['loginid'] == $adminid && $_POST['pw'] == $adminpw){
		$id = $_POST['loginid'];
		$_SESSION['id'] = $id; 		
	    header("Location:main.php");
	}
	else
		$msg="帳號密碼錯誤，請重新輸入帳號密碼。";
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
 <link rel="stylesheet" type="text/css" href="../css/font-style.css">
  <link rel="stylesheet" type="text/css" href="../css/form.css">


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Big5">
<title>系統登入 </title>
<link rel="stylesheet" href="style.css" type="text/css">
<style type="text/css">
<!--
.style1 {
	color: #006600;
	font-size: 20px;
	font-weight: bold;
}
body {
	background-color: #FFF;
	border-radius: 10px;
}

table {
background-color: #E3E3E3;
border-radius: 10px;
padding: 15px;


}
.button{

	border: none;
	background-color: #FFAD00;
	/*-webkit-box-shadow: 3px 3px 3px #9F9F9F;
	box-shadow: 3px 3px 3px #9F9F9F;*/
	color: white;
	padding: 15px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	border-radius: 5px;
	margin: 10px;
	border:0;;
}

body {
align: center;
}
</style>
</head>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align=center><font face="Arial Black" color=red><?=$msg; ?> </font></p>
<form name=form1 method=post>
<table width="600" height="240" border="0" align="center">
<tr><td align="center"><p></p>
<div align=center class="style1">2016國泰幸福野餐日 管理系統登入</div>
<br>
<table width="300" border= "0" align="center"  bgcolor="FFFFFF" cellpadding="2" cellspacing="3" class="textsty2">
<tr>
  <td width="100%"><p><h4>帳號&nbsp;Login Id
    </h4>
    <p>
      <input type="text" name="loginid" style="width:100%;">
  </p></td></tr>
<tr><td><p><h4>密碼&nbsp;Password</h4>
  <p>
    <input type="password" name="pw" style="width:100%;">
  </p></td></tr>
<tr>
  <td align=center><input type="submit" value="確定" class="button"> &nbsp;&nbsp;&nbsp;<input type="reset" value="取消" class="button"></td>
</tr>
</table>
</td></tr>
</table>
</form>
</body>
</html>