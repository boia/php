<?php
/************************************************
********��Ľ���:����MySQL����*******************
********����:boia********************************
********ʱ��:2012-10-25**************************
************************************************/

class Mysql{
	private $hostname;
	private $username;
	private $password;
	private $characterset;
	private $dbname;
	
	function __construct($hostname,$username,$password,$dbname,$characterset){
		$this->hostname = $hostname;
		$this->username = $username;
		$this->password = $password;
		$this->dbname = $dbname;
		$this->characterset = $characterset;
		$this->connect();
	}
	
	function connect(){
		$link = @mysql_connect($this->hostname,$this->username,$this->password)or die("���ݿ����Ӵ���");
		mysql_select_db($this->dbname,$link)or die("���ݿ�ѡ�����");
		mysql_query("set names $this->characterset");
	}
	
	function affected_rows(){
		return mysql_affected_rows();
	}
	
	function close(){
		return mysql_close(); 
	} 
	
	function create_db($new_db_name){
		return mysql_create_db($new_db_name);
	}
	
	function data_seek($result,$row_number){
		return mysql_data_seek($result,$row_number);
	}
	
	function error(){
		return mysql_error();
	}
	
	function fetch_array($result){
		return mysql_fetch_array($result);
	}

	/*������һЩ�ʺ��Լ��õĳ�Ա����*/	
	function select_query($field,$tbname,$other_condition=""){
		$query="select $field from $tbname $other_condition";
		return mysql_query($query);
	}

}

/*������һ��demo��������Ŀ�����*/
$mydb = new Mysql("localhost","root","910620","messageboard","GBK");
$result=$mydb->select_query("*","message");
$rows=$mydb->fetch_array($result);
echo $rows["id"];
?>