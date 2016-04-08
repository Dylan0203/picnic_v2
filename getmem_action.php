<?
include_once 'setting.inc';
$num = 0;

class mems
{
	public $ifexist = '0';
	public $mem_name;
	public $mem_dept;
	
	public $m2exist = '0';
	public $mem2_name;
	public $m3exist = '0';
	public $mem3_name;
	public $m4exist = '0';
	public $mem4_name;
	public $m5exist = '0';
	public $mem5_name;
	public $m6exist = '0';
	public $mem6_name;
}

if(!empty($_GET['mno'])){
	$qer = mysql_query("select * from member where mem_no='".$_GET['mno']."'");
	$num = mysql_num_rows($qer);
	$obj = mysql_fetch_object($qer);
}


if(!empty($_GET['m2'])){
	if(strcmp($_GET['m2'],$_GET['m3']) && strcmp($_GET['m2'],$_GET['m4']) && strcmp($_GET['m5'],$_GET['m2']) && strcmp($_GET['m6'],$_GET['m2'])){
		$qer = mysql_query("select * from member where mem_no='".$_GET['m2']."'");
		$num2 = mysql_num_rows($qer);
		$obj2 = mysql_fetch_object($qer);
	}
}

if(!empty($_GET['m3'])){
	if(strcmp($_GET['m5'],$_GET['m3']) && strcmp($_GET['m3'],$_GET['m2']) && strcmp($_GET['m3'],$_GET['m4']) && strcmp($_GET['m6'],$_GET['m3'])){
		$qer = mysql_query("select * from member where mem_no='".$_GET['m3']."'");
		$num3 = mysql_num_rows($qer);
		$obj3 = mysql_fetch_object($qer);
	}
}

if(!empty($_GET['m4'])){
	if(strcmp($_GET['m5'],$_GET['m4']) && strcmp($_GET['m4'],$_GET['m2']) && strcmp($_GET['m4'],$_GET['m3']) && strcmp($_GET['m6'],$_GET['m4'])){
		$qer = mysql_query("select * from member where mem_no='".$_GET['m4']."'");
		$num4 = mysql_num_rows($qer);
		$obj4 = mysql_fetch_object($qer);
	}
}
if(!empty($_GET['m5'])){
	if(strcmp($_GET['m5'],$_GET['m2']) && strcmp($_GET['m5'],$_GET['m3']) && strcmp($_GET['m5'],$_GET['m4']) && strcmp($_GET['m6'],$_GET['m5'])){
		$qer = mysql_query("select * from member where mem_no='".$_GET['m5']."'");
		$num5 = mysql_num_rows($qer);
		$obj5 = mysql_fetch_object($qer);
	}
}
if(!empty($_GET['m6'])){
	if(strcmp($_GET['m6'],$_GET['m2']) && strcmp($_GET['m6'],$_GET['m3']) && strcmp($_GET['m6'],$_GET['m4']) && strcmp($_GET['m6'],$_GET['m5'])){
		$qer = mysql_query("select * from member where mem_no='".$_GET['m6']."'");
		$num6 = mysql_num_rows($qer);
		$obj6 = mysql_fetch_object($qer);
	}
}

$m = new mems();

if($num != 0){
	$qer_d = mysql_query("select * from member where mem_no='".$_GET['mno']."' and register = 1 and team != '".$_GET['mno']."'");
	$num_d = mysql_num_rows($qer_d);
	if($num_d) $m->ifexist = '2'; //已參加其他組
	else{
		$m->ifexist = '1';
		$m->mem_name = $obj->name;
		$m->mem_dept = $obj->dept;
	}
}
else{
	$m->ifexist = '0';
}

if($num2){
	$m->mem2_name = $obj2->name;
	if($obj2->register == 1 && $_GET['mo'] == 0) //非修改且已報名
		$m->m2exist = '2';//已參加其他組
	else{
		$m->m2exist = '1';
	}
}
elseif(!empty($_GET['m2'])){
	$m->m2exist = '0';
}
else{	
	$m->m2exist = '3'; //未輸入編號
}

if($num3){
	$m->mem3_name = $obj3->name;
	if($obj3->register == 1 && $_GET['mo'] == 0)
		$m->m3exist = '2';//已參加其他組
	else{
		$m->m3exist = '1';
	}
}
elseif(!empty($_GET['m3'])){
	$m->m3exist = '0';
}
else{	
	$m->m3exist = '3'; //未輸入編號
}

if($num4){
	$m->mem4_name = $obj4->name;
	if($obj4->register == 1 && $_GET['mo'] == 0)
		$m->m4exist = '2';//已參加其他組
	else{
		$m->m4exist = '1';
	}
}
elseif(!empty($_GET['m4'])){
	$m->m4exist = '0';
}
else{	
	$m->m4exist = '3'; //未輸入編號
}

if($num5){
	$m->mem5_name = $obj5->name;
	if($obj5->register == 1 && $_GET['mo'] == 0)
		$m->m5exist = '2';//已參加其他組
	else{
		$m->m5exist = '1';
	}
}
elseif(!empty($_GET['m5'])){
	$m->m5exist = '0';
}
else{	
	$m->m5exist = '3'; //未輸入編號
}

if($num6){
	$m->mem6_name = $obj6->name;
	if($obj6->register == 1 && $_GET['mo'] == 0)
		$m->m6exist = '2';//已參加其他組
	else{
		$m->m6exist = '1';
	}
}
elseif(!empty($_GET['m6'])){
	$m->m6exist = '0';
}
else{	
	$m->m6exist = '3'; //未輸入編號
}

echo json_encode($m);
?>