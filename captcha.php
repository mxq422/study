<?php
/**
 *------------------------------------------------------------------------------------
 * @ Copyright(c) 2009  HuaQiZhuLi Science&Technology,Co.Ltd. All Rights Reserved.
 *------------------------------------------------------------------------------------
 * DESCRIPTION            : 验证码生成
 * -----------------------------------------------------------------------------------
 * Date	            Author	      Version        Description
 * -----------------------------------------------------------------------------------
 * 2010-01-08       leon.li         1.0 	     Initial Create
 * -----------------------------------------------------------------------------------
 */
session_start();
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header("content-type: image/png");

$length =  4; // 校验码长度

$codeStr = '346789ABCDEFGHJKLMNPQRTUVWXY';// 01IO容易混淆，不用
$codeWave = 7; // 验证码上线波动 
$imageX = 5;//mt_rand(1, 55); // 左边距
$imageY = 5;//mt_rand(1, 40) + $codeWave; // 上边距
$imageL = $imageX + $length*10 + 60; // 图片宽度
$imageH = $imageY + 20; // 图片高度
$noiseNum = 300*$length; // 杂点数量
$lineNum = 50; // 干扰线数量

// 建立一幅 $imageL x $imageH 的图像

$image = imagecreatetruecolor($imageL, $imageH);    
$bgImg = dirname(__FILE__).'/images/captchabg/bg_' . mt_rand(1,8) . '.jpg';
$bg = imagecreatefromjpeg($bgImg);

imagecopyresampled($image, $bg, 0, 0, 0, 0, $imageL, $imageH, 80, 80);

//imagerectangle($image, 0, 0, $imageL-1, $imageH-1, $rectangleColor); // 添加边框


$code = ''; // 校验码
$codeNX = 0; // 校验码第N个字符的左边距

for ($i = 0; $i<$length; $i++) {
	$code[$i] = $codeStr[mt_rand(0, 27)];
	$codeNX += 10 + mt_rand(0,12);
	imagestring($image, 5, $codeNX, $imageY+ mt_rand(0, $codeWave),$code[$i], imagecolorallocate($image, mt_rand(1,100), mt_rand(1,100), mt_rand(1,100))); // 把校验码写入图像
}

$_SESSION['captcha'] = join('', $code); // 把校验码保存到session

imagepng($image); // 输出图像
imagedestroy($image);
?>