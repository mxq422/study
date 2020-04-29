<?php
include_once("../config/qcs.init.php");
$ip=Util::getClientIp();
template(array("ip"=>$ip),"admin/qcs.html");


?>