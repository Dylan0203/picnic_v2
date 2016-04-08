<?
include_once '../setting.inc';
$num = 0;

class mems
{
	public $ifexist = '0';	
	public $name = "";
	public $dept = "";
}

if(!empty($_GET['mno'])){
	$qer = mysql_query("select * from member where mem_no = '".$_GET['mno']."'");
	$num = mysql_num_rows($qer);
	$obj = mysql_fetch_object($qer);
}

$m = new mems();

if($num != 0){
	$m->ifexist = '1';
	$m->name = $obj->name;
	$m->dept = $obj->dept;
	
}
elseif(!empty($_GET['mno'])){
	$m->ifexist = '0';
}
else{	
	$m->ifexist = '3'; //未輸入編號
}

echo json_encode($m);
?>