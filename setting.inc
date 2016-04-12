<?
$hostname = "cathay3vs3com.ipowermysql.com";	/* MySQL的主機名稱 */
$username = "cathaypicnic";		/* MySQL的使用者名稱 */
$password = "pic321nic";		/* MySQL的使用者密碼 */
$dbName = "cathaypicnic";		/* 資料庫名稱*/

//管理頁面登陸帳號密碼
$adminid='cathaypicnic';
$adminpw='cathaypicnic123';

//電子報設定
$sendermail='service@cathayfun.com.tw';	//寄件者信箱
$sendername='國泰服務人員';		//寄件者名稱

//資料表名稱
$member='member';	//員工資料

MYSQL_CONNECT($hostname, $username, $password) OR DIE("Unable to connect to database");
mysql_query("SET NAMES 'utf8'");
@mysql_select_db( "$dbName") or die( "Unable to select database");
date_default_timezone_set('Asia/Taipei');
?>
