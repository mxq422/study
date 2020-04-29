<?php
session_start();
include_once("../config/qcs.init.php");
include_once (QCS_ROOT."/include/category.class.php");

Util::checkLogin_admin();
$db=new db_mysql();
$categoryobj=new category();
$categoryarr=$categoryobj->getAllCategory_jason();
template(array("categoryarr"=>$categoryarr),"admin/main.html");


?>