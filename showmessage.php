<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>QCS网站管理后台信息管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="/admin/css/qcs.admin.v1.css"/>
<script type="text/javascript" src="/admin/jscript/jquery.min.js"></script>
</head>
<body>
<div id="adminmain">
	<div class="module">
		<table cellpadding="0" cellspacing="0" class="table_info" >
		 <caption>
			  提示信息
			  </caption>
			  <tr>
			    <td height="60" valign="middle" class="align_c"><?php echo $msg;?></td>
			  </tr>
			  <tr>
			    <td height="20" valign="middle" class="align_c">
			      <?php if($url_forward == "goback"){?>
			      <script>setTimeout("history.go(-1);",<?php echo $ms?>)</script>
			      <?php }elseif($url_forward){?>
			      <a href="<?php echo $url_forward?>">如果您的浏览器没有自动跳转，请点击这里</a>
			      <script>setTimeout("location.href='<?php echo $url_forward?>'",<?php echo $ms?>)</script>
		
			      <?php } ?>
			    </td>
			  </tr>
		</table>
	</div>
</div>
</body>
</html>