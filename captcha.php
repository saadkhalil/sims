<?php
header('X-Frame-Options: SAMEORIGIN');
date_default_timezone_set('Asia/Karachi');
ini_set('session.gc_maxlifetime', 15*300);
// each client should remember their session id for EXACTLY 5 minutes
session_set_cookie_params(15*300);
session_start();

//This should contain something like www.zend.com
error_reporting(E_ERROR |  E_PARSE );

// require_once("globalpath.php");

$r_id = $_REQUEST['r_id'];
$randVal = $_SESSION['ramdomval'];
unset($_SESSION['ramdomval']);


if(!isset($r_id) || !isset($randVal) || $r_id=="" || $randVal=="" || $r_id !=$randVal)
{
	// die('Un Authenticated access blocked');
}

// Set the content-type
header('Content-Type: image/png');
function getRandomWord($len = 6) {
$word = array_merge(range('0', '9'), range('A', 'Z'));
shuffle($word);
return substr(implode($word), 0, $len);
}

$ranStr = getRandomWord();
$_SESSION["vercode"] = $ranStr;

$height = 48; //CAPTCHA image height
$width = 228; //CAPTCHA image width
$font_size = 24; //CAPTCHA Font size

$image_p = imagecreate($width, $height);
$graybg = imagecolorallocate($image_p, 245, 245, 245);
$textcolor = imagecolorallocate($image_p, 34, 34, 34);

$DOCUMENT_ROOT = __DIR__;
$font = $DOCUMENT_ROOT.'/mono.ttf';

imagefttext($image_p, $font_size, 0, 50, 35, $textcolor, $font, $ranStr);
imagepng($image_p);

?>
