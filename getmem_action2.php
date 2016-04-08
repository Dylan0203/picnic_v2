<?
include_once 'setting.inc';
$num = 0;

class mems
{
	public $ifexist = '0';	
	public $marray = array();
}

if(!empty($_GET['mno'])){
	$qer = mysql_query("select * from member where team = '".$_GET['mno']."' and mem_no = ".$_GET['mno']); //組長
	$num = mysql_num_rows($qer);
	$qer2 = mysql_query("select * from member where team='".$_GET['mno']."' and mem_no != ".$_GET['mno']); //組員
	$num2 = mysql_num_rows($qer);
}

$m = new mems();

if($num != 0){
	$m->ifexist = '1';
	
	if($num2 != 0)
		while($row = mysql_fetch_object($qer2)) {
			$m->marray[] = $row->mem_no;
		}
}
else{
	$m->ifexist = '0';
}

echo json_encode($m);
?>