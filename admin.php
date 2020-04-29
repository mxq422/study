<?php
include_once("../config/qcs.init.php");
include_once(QCS_ROOT."/include/news.class.php");
include_once(QCS_ROOT."/include/files.class.php");
include_once(QCS_ROOT."/include/picasa.class.php");
include_once(QCS_ROOT."/include/category.class.php");
include_once(QCS_ROOT."/include/guestbook.class.php");
include_once(QCS_ROOT."/include/product.class.php");
include_once(QCS_ROOT."/include/case.class.php");
include_once(QCS_ROOT."/include/video.class.php");
include_once(QCS_ROOT."/include/picture.class.php");

Util::checkLogin_admin();
	
$catid=$_REQUEST["catid"];
$currpage=$_REQUEST["currpage"];

if(empty($currpage)){
	$currpage=1;
}
if (empty($catid))
{
	showmessage("数据出错");
}
$infotype=$_REQUEST["infotype"];
$db = new db_mysql();
$categoryobj=new category();
$categoryarr=$categoryobj->getcategorybyid($catid);
 //var_dump($categoryarr);exit;
if(!empty($categoryarr)){
switch ($categoryarr["infotype"]){
	case "1":
		$newsobj=new news();
		if ($categoryarr["isinternal"]==1){
			global $new_color;
			global $new_font;
			$newarr=$newsobj->gettopnews($catid);
			$_content = $newarr[0]['content'];
			$_islook = $newarr[0]['islook'];
			$_isdown = $newarr[0]['isdown'];
			if (count($newarr)>0){
				template(array('isdown'=>$_isdown,'islook'=>$_islook,'content'=>$_content,"new"=>$newarr[0],"catid"=>$catid,"new_color"=>$new_color,"new_font"=>$new_font),"admin/news/editnews.html");
			}else{
				template(array('isdown'=>$_isdown,'islook'=>$_islook,'content'=>$_content,"catid"=>$catid,"new_color"=>$new_color,"new_font"=>$new_font),"admin/news/editnews.html");
			}
		}else{
			$iwhere="isdelete=0 and catid=".$catid;	
			$newspage=$newsobj->findPageBykey($iwhere,$currpage,$categoryarr["pagesize"]);
			template(array("newspage"=>$newspage,"categoryarr"=>$categoryarr),"admin/news/news.html");	
		}		
		break;
	case "2":	
		$picasaobj=new picasa();	
		$iwhere="isdelete=0 and catid=".$catid;
		$picasapage=$picasaobj->getPageForManager($currpage,$categoryarr["pagesize"],$iwhere);
		template(array("picasapage"=>$picasapage,"categoryarr"=>$categoryarr),"admin/pics/picasa.html");	
		break;
	case "3":
		$productobj = new product();	
		$iwhere="isdelete=0 and catid=".$catid;
		$list = $productobj->getproduct_page($currpage, $categoryarr["pagesize"],$iwhere);
		$viewdata["categoryarr"] = $categoryarr;
		$viewdata["productspage"] = $list;
		template($viewdata,"admin/product/product.html");
		break;
	case "4":
		$caseobj = new cases();	
		$iwhere="isdelete=0 and catid=".$catid;
		$list = $caseobj->getcases_page($currpage, $categoryarr["pagesize"],$iwhere);
		$viewdata["categoryarr"] = $categoryarr;
		$viewdata["casepage"] = $list;
		template($viewdata,"admin/case/case.html");
		break;
	case "6":
		$video = new video();
		$iwhere="isdelete=0 and catid=".$catid;
		$list = $video->getPageForManager($currpage, $categoryarr["pagesize"],$iwhere);
		$viewdata["categoryarr"] = $categoryarr;
		$viewdata["filepage"] = $list;
		template($viewdata,"admin/video/index.html");
		break;
    case "8":
        $picture = new picture();
        $iwhere="isdelete=0 and catid=".$catid;
        $list=$picture->findPageBykey($iwhere,$currpage,$categoryarr["pagesize"]);
        //print_r($list);exit;
        template(array("list"=>$list,"categoryarr"=>$categoryarr,"banner_type"=>$banner_type),"admin/picture/index.html");
        break;
	default:
	showmessage("没有模板页","/admin/index.php");
	exit;
}
}
else{
	showmessage("您要查看的栏目不存在","/admin/index.php");
}


?>