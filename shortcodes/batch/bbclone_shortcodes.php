<?php
/**
 * $Id: memberlist_shortcodes.php 26 2010-09-13 19:42:21Z michiel $
 * 
 * Memberlist plugin for e107 v7xx - by Michiel Horvers
 * This module for the e107 .7+ website system
 * Copyright Michiel Horvers 2010
 *
 * Released under the terms and conditions of the
 * GNU General Public License (http://gnu.org).
 *
 * Initial Creation Date: 4 sep. 2010
 * $HeadURL: svn://ubusrv/echo2/MemberList/frontliners.eu/fl_plugins/memberlist/includes/memberlist_shortcodes.php $
 * 
 * Revision: $LastChangedRevision: 26 $
 * Last Modified: $LastChangedDate: 2010-09-13 21:42:21 +0200 (ma, 13 sep 2010) $
 *
 */
//var_dump ("SHORTCODES CHAMADO!!!!!!!!!");
if (!defined('e107_INIT')) {
    exit;
}
///////////----include_once(e_HANDLER . 'shortcode_handler.php');
//bbclone includes
/*
 if (is_readable(_ESTATS_DIR."constants.php")) {
   require(_ESTATS_DIR."constants.php");
 }
 else exit("invalid path given. it must end with a slash");
 $BBC_IMAGES_PATH = _ESTATS_DIR."images/"; // a workaround 
*/
//define ("_ESTATS_DIR", "bbclone/");
// Change directory
//--chdir("bbclone");

//var_dump ("constants.php");
//-- if (is_readable("constants.php")) {
//--   require_once("constants.php");
//-- }
//-- else exit("invalid path given. it must end with a slash");
//// $BBC_IMAGES_PATH = _ESTATS_DIR."images/"; // a workaround 
//--ob_start();
 //foreach (array("conf/config", "lib/selectlang", "var/access", "show_global", "show_detailed", "show_time", "show_views") as $i) {
//-- foreach (array("conf/config", "lib/html", "lib/selectlang", "var/access", "show_global", "show_detailed", "show_time", "show_views") as $i) {
//ob_start();
/*
  var_dump (_BBCLONE_DIR);
   if (is_readable(_BBCLONE_DIR.$i.".php")) require(_BBCLONE_DIR.$i.".php");
   else exit(bbc_msg(_BBCLONE_DIR.$i.".php"));
*/
//  var_dump ($i);
//--   if (is_readable($i.".php")) require_once($i.".php");
//--   else exit(bbc_msg($i.".php"));
//ob_end_clean();
//--}
//require_once ("lib/html.php");
//--ob_end_clean();
////-----------------------$estats_shortcodes = $tp->e_sc->parse_scbatch(__FILE__);


/*
echo "<hr>";
echo bbc_show_access();
echo "<hr>";
*/
class plugin_estats_bbclone_shortcodes extends e_shortcode
{

  function __construct(){
    $this->replacestr= array ("</td>\n<td align=\"left\">" => "", "colspan=\"4\"" => "colspan=\"3\""); 
  }

  function sc_bbc_menu()
  {
	global $translation;
// $BBC_IMAGES_PATH = "bbclone/images/"; // a workaround 
// $htmlstr = "<span class='navbar flatview'>";
 $htmlstr = "<ul class='navbar flatview nav nav-tabs'>"; // Bootstrap nav tabs
    // Navigation Buttons
    $navbar = array(
//    	"config"	=> array( "url" => "",	"title" => !empty($BBC_SHOW_CONFIG)? $translation['navbar_configuration'] : "", "icon" => "navbar_config.png" ),
    	"global"	=> array( "url" => "",	"title" => $translation['navbar_global_stats'],	"icon" => "navbar_global.png" ),
    	"detailed"	=> array( "url" => "?id=-2", "title" => $translation['navbar_detailed_stats'], "icon" => "navbar_detailed.png" ),
    	"time"		=> array( "url" => "?id=-1",		"title" => $translation['navbar_time_stats'],		"icon" => "navbar_time.png" )
    );
    $sep = "&nbsp; &nbsp;";
    // Create Navigation Buttons
    foreach (array_keys($navbar) as $menu_key) {
    	$url   = $navbar[$menu_key]['url'];
    	$title = $navbar[$menu_key]['title'];
    	$icon  = $navbar[$menu_key]['icon'];
//    	$selected_class = (("?id=".$_GET['id']==$url) ? " selected" : "");
    	$selected_class = ((("?id=".$_GET['id']==$url) || (is_null($_GET['id']) && $menu_key == "global"))? "active" : "");
//    	if (is_null($_GET['id']) && $menu_key == "global") {
//    		$selected_class = " selected";
//    		$selected_class = "active";
//    	}
	   	if (empty($title)){
    		continue;
    	}
//    	$htmlstr .= "<a class=\"".$selected_class."\" href=\"estats.php$url\"><img src=\"bbclone/images/".$icon."\" alt=\"icon\" />&nbsp;$title</a>&nbsp;\n";
    	$htmlstr .= "<li class=\"".$selected_class."\"><a href=\"estats.php$url\"><img src=\"bbclone/images/".$icon."\" alt=\"icon\" />&nbsp;$title</a></li>";
    }
// $htmlstr .= "</span>";
 $htmlstr .= "</ul>";
return $htmlstr;
  }
  function sc_bbc_showbrowser()
  {
//    var_dump (bbc_show_browser());
//    var_dump ($this->replacestr);
    return strtr(bbc_show_browser(), $this->replacestr);
/////    return str_replace("</td>\n<td align=\"left\">", "", bbc_show_browser());
//  	return bbc_show_browser();
  }
  function sc_bbc_showrobot()
  {
    return strtr(bbc_show_robot(), $this->replacestr);
//    return str_replace("</td>\n<td align=\"left\">", "", bbc_show_robot());
//	return bbc_show_robot();
  }
  function sc_bbc_showos()
  {
    return strtr(bbc_show_os(), $this->replacestr);
//    return str_replace("</td>\n<td align=\"left\">", "", bbc_show_os());
//	return bbc_show_os();
  }
  function sc_bbc_showextension()
  {
    return strtr(bbc_show_extension(), $this->replacestr);
//    return str_replace("</td>\n<td align=\"left\">", "", bbc_show_extension());
//	return bbc_show_extension();
  }
  function sc_bbc_showtoppages()
  {
	return bbc_show_top_pages();
  }
  function sc_bbc_showtoporigins()
  {
	return bbc_show_top_origins();
  }
  function sc_bbc_showtophosts()
  {
	return bbc_show_top_hosts();
  }
  function sc_bbc_showtopkeys()
  {
	return bbc_show_top_keys();
  }
  function sc_bbc_showaccess()
  {
  return bbc_show_access();
  }
  function sc_bbc_showdetailed()
  {
  return str_replace("show_views", "estats", bbc_rows_gen());
  }
  function sc_bbc_listvisitsleg()
  {
  global $BBC_HTML;
  return $BBC_HTML->color_explain();
  }
  function sc_bbc_listvisits()
  {
  return "<table>".bbc_list_visits();
  }
  function sc_bbc_statssince()
  {
  global $BBC_HTML;
    global $translation, $access;
    $timestamp = isset($access['time']['reset']) ? $access['time']['reset'] : "";
//   return "<table>Estatísticas desde ".date_format_translated($translation['global_day_format'], $timestamp);
   return "Estatísticas desde ".date_format_translated($translation['global_day_format'], $timestamp);
  }
  function sc_bbc_showday()
  {
	global $translation;
	return "<strong>".$translation['tstat_last_day'].bbc_show_plot_time_type("hour", 640, 200);
  }
  function sc_bbc_showweek()
  {
	global $translation;
	return "<strong>".$translation['tstat_last_week'].bbc_show_plot_time_type("wday", 203, 200);
  }
  function sc_bbc_showyear()
  {
	global $translation;
	return "<strong>".$translation['tstat_last_year'].bbc_show_plot_time_type("month", 407, 200);
  }
  function sc_bbc_showmonth()
  {
	global $translation;
	return "<strong>".$translation['tstat_last_month'].bbc_show_plot_time_type("day", 640, 200);
  }
  function sc_bbc_title()
  {
    global $BBC_TIMESTAMP, $BBC_TIME_OFFSET, $BBC_TITLEBAR, $translation;
//   global $BBC_TIMESTAMP, $BBC_TIME_OFFSET, $translation;
//var_dump ($translation);
//    $translation['global_day_format'] = "l j F, Y";
//$BBC_TITLEBAR = "Estatísticas de %SERVER, geradas em %DATE";
    $conv = array(
//      "%DATE" => date_format_translated($translation['global_day_format'], ($BBC_TIMESTAMP + ($BBC_TIME_OFFSET * 60))),
      "%DATE" => date_format_translated($translation['global_day_format'], ($BBC_TIMESTAMP + ($BBC_TIME_OFFSET * 60)))." )</small>",
//      "%SERVER" => SITENAME
      "%SERVER," => SITENAME." <br><small>( ".$this->sc_bbc_statssince()." - "
    );
//    var_dump ($BBC_TITLEBAR);
    if (empty($BBC_TITLEBAR)) {
    	$BBC_TITLEBAR = $translation['global_titlebar'];
    };

    return strtr($BBC_TITLEBAR, $conv);
}
}


?>