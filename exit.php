<?php
$_SESSION = array();
session_start();
session_destroy();
//ob_end_clean();

header("Location:/admin/");
?>