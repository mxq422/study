<?php
include_once("../config/qcs.init.php");
include_once(QCS_ROOT."/include/user.class.php");


$action=$_REQUEST['action'];
if(!isset($action) || $action!="login"){
	template(array(),"admin/login.html");
	return;
}

$db=new db_mysql();
$userobj=new user();

$username=$_REQUEST['username'];
$password=$_REQUEST['password'];
$ck_captcha=$_REQUEST['ck_captcha'];	

$re_login=$userobj->login($username,$password,$ck_captcha);

if(is_array($re_login)){
	header("Location:/admin/index.php");
}
else{
	template(array("result"=>$re_login,"username"=>$username),"admin/login.html");
}

?>