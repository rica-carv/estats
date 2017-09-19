<?php
/*
- Corrigir os menus e vistas permitidas ao utilizador
- Transformar isto num plugin de estatística geral, com o bbclone incluido....
*/
require_once('../../class2.php');
if (!defined("USER_WIDTH")) {
    define(USER_WIDTH, "width:98%;");
}
if(!defined("_BBC_PAGE_NAME")){define("_BBC_PAGE_NAME", "BBClone");}
/*
echo "<hr>";
echo "BBCLONE:";
echo defined("_ESTATS_DIR");
echo "---";
echo _ESTATS_DIR;
echo "-----------------------------------";
*/
// install directory path, starting from the www-root and with a trailing slash 
//define("_ESTATS_DIR", e_PLUGIN."bbclone/");
//defined("_ESTATS_DIR") or define("_ESTATS_DIR", e_PLUGIN."bbclone/");
// CONSTANT USED INSIDE BBCLONE CONSTANTS.PHP
//define("_BBCLONE_DIR","bbclone/");
/*
echo "<hr>";
echo "BBCLONE:";
echo defined("_ESTATS_DIR");
echo "---";
echo _ESTATS_DIR;
*/
//$grabhtml = "";
If (isset($grabhtml)){
//Captura do html ecoado pelo bbclone....
function getTags( $dom, $tagName, $attrName, $attrValue ){
    $html = '';
    $domxpath = new DOMXPath($dom);
    $newDom = new DOMDocument;
    $newDom->formatOutput = true;
    $filtered = $domxpath->query("//$tagName" . '[@' . $attrName . "='$attrValue']");
    // $filtered =  $domxpath->query('//div[@class="className"]');
    // '//' when you don't know 'absolute' path
    // since above returns DomNodeList Object
    // I use following routine to convert it to string(html); copied it from someone's post in this site. Thank you.
    $i = 0;
    while( $myItem = $filtered->item($i++) ){
        $node = $newDom->importNode( $myItem, true );    // import node
        $newDom->appendChild($node);                    // append node
    }
    $html = $newDom->saveHTML();
    return $html;
}
$phpfile = ($_GET['page']?$_GET['page']:"show_global.php");
// Show by default the Global Stats
//if (is_readable("show_global.php")) include_once("show_global.php");
ob_start();
//if (is_readable("show_global.php")) include_once("show_global.php");
if (is_readable("bbclone/".$phpfile)) include_once("bbclone/".$phpfile);
$bbc_text = ob_get_contents();
ob_end_clean();
$dom = new DOMDocument;
$dom->preserveWhiteSpace = false;
@$dom->loadHTML($bbc_text);
$csstext = getTags( $dom, 'link', 'rel', 'stylesheet' );
preg_match("/<body>(.*?)<\\/body>/si", $bbc_text, $match);
$dom = new DOMDocument;
$dom->preserveWhiteSpace = false;
@$dom->loadHTML($match[1]);
$tagName = 'table';
$attrName = 'class';
$title = strip_tags(getTags( $dom, $tagName, $attrName, 'titlebar' ));
//TRATAMENTO DO NAVBAR
$navbarb = preg_replace('/<a class="navbar" href="..">(.*?)<\/a>/ims', '', getTags( $dom, $tagName, $attrName, 'navbar bottom' ));
//O LINK DAS CONFIGURAÇÕES É VISÍVEL SÓ PARA ADMINS
$navbarb = ((ADMIN)?str_replace("show_config.php?", "estats.php?page=show_config.php&", $navbarb):preg_replace('/<a class="navbar" href="show_config(.*?)<\/a>/ims', '', $navbarb));
$phpname=array ("show_global", "show_detailed", "show_time");
foreach ($phpname as $phpn) {
    $navbarb = str_replace($phpn, "estats.php?page=".$phpn, $navbarb);
}
    $navbarb = str_replace("?lng", "&lng", $navbarb);
$chapter = $dom->getElementsByTagName('table');
$finder = new DomXPath($dom);
$classname=array ("navbar", "titlebar", "navbar bottom");
foreach ($classname as $class) {
  $nodes = $finder->query('//*[@class="'.$class.'"]');
  if($nodes->item(0)) {
    $nodes->item(0)->parentNode->removeChild($nodes->item(0));
  }
}
$htmltext=$dom->saveHTML();
$htmltext = str_replace("show_views", "estats.php?page=show_views", $htmltext);
$htmltext = str_replace("?id", "&id", $htmltext);
$htmltext = $csstext."<center>".$navbarb."</center>".$htmltext."<br>";
} else {
//Inserção directa do html a partir das funções do bbclone....
/*
echo "<hr>TEMPLATE:";
echo _ESTATS_DIR."estats_template.php";
echo "<hr>";
echo (file_exists(_ESTATS_DIR."estats_template.php"));
echo "<hr>";
echo __FILE__;
echo "<hr>";
echo (file_exists(_ESTATS_DIR."estats_template.php"));
*/

/*--
if (file_exists(THEME."estats_template.php")) {
	require_once(THEME."estats_template.php");
} else {
//	require_once(_ESTATS_DIR."estats_template.php");
//	require_once("bbclone/estats_template.php");
	require_once("estats_template.php");
}
*/
////////////////$sc->wrapper('phalbum');
//$tp       = e107::getParser();
//var_dump ($estats_shortcodes);
//chdir("..");

$estats_shortcodes = e107::getScBatch('bbclone','estats');
$template = e107::getTemplate('estats', 'bbclone');
////////////////$template = e107::getTemplate('phil_alb', 'phalbum'); 	
//require_once(_ESTATS_DIR."estats_shortcodes.php");
//require_once("bbclone/estats_shortcodes.php");
//--require_once("estats_shortcodes.php");
//var_dump ($template);
/////$htmltext = '-----------------------------------------------------------------<link rel="stylesheet" type="text/css" href="estats_style.css">';
chdir("bbclone");
// Change directory
//chdir("bbclone");

//var_dump ("constants.php");
 if (is_readable("constants.php")) {
   require_once("constants.php");
 }
 else exit("invalid path given. it must end with a slash");
//// $BBC_IMAGES_PATH = _ESTATS_DIR."images/"; // a workaround 
ob_start();
 //foreach (array("conf/config", "lib/selectlang", "var/access", "show_global", "show_detailed", "show_time", "show_views") as $i) {
 foreach (array("conf/config", "lib/html", "lib/selectlang", "var/access", "show_global", "show_detailed", "show_time", "show_views") as $i) {
//ob_start();
/*
  var_dump (_BBCLONE_DIR);
   if (is_readable(_BBCLONE_DIR.$i.".php")) require(_BBCLONE_DIR.$i.".php");
   else exit(bbc_msg(_BBCLONE_DIR.$i.".php"));
*/
//  var_dump ($i);
   if (is_readable($i.".php")) require_once($i.".php");
   else exit(bbc_msg($i.".php"));
//ob_end_clean();
}

//require_once ("lib/html.php");
ob_end_clean();
////-----------------------$estats_shortcodes = $tp->e_sc->parse_scbatch(__FILE__);
//chdir ("..");
    $translation['global_day_format'] = "l j F, Y";

 		$title .= $tp->parsetemplate("{BBC_TITLE}", true, $estats_shortcodes);

//var_dump ($title);

		$htmltext .= $tp->parsetemplate($template['header'], true, $estats_shortcodes);
    $id = $_GET['id'];
switch (TRUE){
  case ($id==-2):
//    if (ADMIN) {
		$htmltext .= $tp->parsetemplate($template['detailed'], true, $estats_shortcodes);
//    }
    break;
  case ($id==-1):
		$htmltext .= $tp->parsetemplate($template['time'], true, $estats_shortcodes);
    break;
  case ($id>0):
		$htmltext .= $tp->parsetemplate($template['visits'], true, $estats_shortcodes);
    break;
  case (is_null($id)) :
		$htmltext .= $tp->parsetemplate($template['global'], true, $estats_shortcodes);
    break;
}
		$htmltext .= $tp->parsetemplate($template['footer'], true, $estats_shortcodes);
}

//echo "<hr>";
//var_dump ($htmltext);

chdir("..");

//e107::css('estats', 'estats_style.css');
//e107::css('phil', 'includes/dhtmltooltip.css');

define('e_PAGETITLE', $title);
require_once(HEADERF);
$ns->tablerender($title, $htmltext);
require_once(FOOTERF);
?>