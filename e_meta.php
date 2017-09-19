<?php
if (!defined('e107_INIT')) { exit; }
//BBCLONE
/*
define("_ESTATS_DIR",e_PLUGIN."bbclone/");
//echo "BBCLONE dir: "._ESTATS_DIR;
define("COUNTER",_ESTATS_DIR."mark_page.php");
//echo "<br>BBCLONE COUNTER: ".COUNTER;
 if (is_readable(COUNTER)) include_once(COUNTER);
//echo "-->".is_readable(COUNTER)."<--";
*/
//TESTE NOVO
//--function file_basename($file= null) {
//--   if($file=== null || strlen($file)<= 0) {
//--       return null;
//--   }
//--   $file= explode('?', $file);
//--   $file= explode('/', $file[0]);
//--   $basename= $file[count($file)-1];
//--   $basename2= basename($basename, ".php");
//--   return $basename2;   
//--}
/*
To edit the output names:
if ($label == "")
{
$label = "";
}
*/
//--$path = file_basename($_SERVER['REQUEST_URI']);
//--$label = ucwords($path);
//echo "Welcome ".$_SERVER['REMOTE_ADDR']."!<br />\n";
//  global $_SERVER;
//  echo "Welcome ".$_SERVER['REMOTE_ADDR']."!<br />\n";
//public function getRemoteIPAddress() {
/*
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        echo $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
        echo $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    echo $_SERVER['REMOTE_ADDR'];
*/
//}
//$label = substr($_SERVER[REQUEST_URI], 8);
// TEMPORÁRIO
$label = e_PAGE;
if ($label == "Submitnews")
{
$label = "Submit News";
} elseif ($label == "Rss")
{
$label = "RSS Feed";
} elseif ($label == "Fpw")
{
$label = "Forgot Password";
}
/*
echo e_PAGE;
echo " -- ";
echo $_SERVER[REQUEST_URI];
echo " => ";
echo $label;
*/
define("_BBC_PAGE_NAME", $label);
define("_ESTATS_DIR", e_PLUGIN."estats/bbclone/");
define("COUNTER", _ESTATS_DIR."mark_page.php");
if (is_readable(COUNTER)) include_once(COUNTER);
?>