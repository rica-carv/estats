<?php
/**
 * $Id: memberlist_template.php 25 2010-09-13 19:41:48Z michiel $
 * 
 * Memberlist plugin for e107 v7xx - by Michiel Horvers
 * This module for the e107 .7+ website system
 * Copyright Michiel Horvers 2010
 *
 * Released under the terms and conditions of the
 * GNU General Public License (http://gnu.org).
 *
 * Initial Creation Date: 4 sep. 2010
 * $HeadURL: svn://ubusrv/echo2/MemberList/frontliners.eu/fl_plugins/memberlist/templates/memberlist_template.php $
 * 
 * Revision: $LastChangedRevision: 25 $
 * Last Modified: $LastChangedDate: 2010-09-13 21:41:48 +0200 (ma, 13 sep 2010) $
 *
 */
//var_dump ("TEMPLATE CHAMADO!!!!!!!!!");
if (!defined('e107_INIT')) {exit;}

//e107::css('estats', 'bbclone/css/bbclone.css');
//e107::css('estats', 'bbclone/css/default.css');
e107::css('estats', 'css/bbclone.css');
//e107::css('phil', 'includes/dhtmltooltip.css');

// BOOTSTRAP TEMPLATE!!!!
$BBCLONE_TEMPLATE['header'] = "<div id='bbclone' class='table-responsive text-center'>{BBC_MENU}
<div class='tab-content'>
  <div id='home' class='tab-pane fade in active container-fluid'>
";

/*
$BBCLONE_TEMPLATE['global'] = "
        <table>
		<tr>
			<td class='forumheader' valign='top'>{BBC_SHOWBROWSER}</td>
			<td class='forumheader' valign='top'>{BBC_SHOWROBOT}</td>
			<td class='forumheader' valign='top'>{BBC_SHOWOS}</td>
			<td class='forumheader' valign='top'>{BBC_SHOWEXTENSION}</td>
		</tr>
        </table>
      </td>
    </tr>
		<tr>
      <td>
        <table>
		<tr>
			<td class='forumheader' valign='top'>{BBC_SHOWTOPPAGES}</td>
			<td class='forumheader' valign='top'>{BBC_SHOWTOPORIGINS}</td>
			<td class='forumheader' valign='top'>{BBC_SHOWTOPHOSTS}</td>
			<td class='forumheader' valign='top'>{BBC_SHOWTOPKEYS}</td>
		</tr>
        </table>
      </td>
    </tr>
		<tr>
      <td>
        <table>
		<tr>
			<td class='forumheader' valign='top' colspan='4'>{BBC_SHOWACCESS}</td>
		</tr>
        </table>
      </td>
    </tr>
";
*/
$BBCLONE_TEMPLATE['global'] = "
    <br>
    <div class='row'>
      <div class='col-md-4'>
        <div class='table-responsive well well-sm'>{BBC_SHOWBROWSER}</div>
      </div>
      <div class='col-md-4'>
        <div class='table-responsive well well-sm'>{BBC_SHOWROBOT}</div>
      </div>
      <div class='col-md-4'>
        <div class='table-responsive well well-sm'>{BBC_SHOWOS}</div>
      </div>
    </div>
    <div class='row'>
      <div class='col-md-4'>
        <div class='table-responsive well well-sm'>{BBC_SHOWEXTENSION}</div>
      </div>
      <div class='col-md-4'>
        <div class='table-responsive well well-sm'>{BBC_SHOWTOPPAGES}</div>
      </div>
      <div class='col-md-4'>
        <div class='table-responsive well well-sm'>{BBC_SHOWTOPHOSTS}</div>
      </div>
    </div>
    <div class='row'>
      <div class='col-md-6'>
        <div class='table-responsive well well-sm'>{BBC_SHOWTOPORIGINS}</div>
      </div>
      <div class='col-md-6'>
        <div class='table-responsive well well-sm'>{BBC_SHOWTOPKEYS}</div>
      </div>
    </div>
    <div class='row'>
      <div class='col-md-12'>
        <div class='table-responsive well well-sm'>{BBC_SHOWACCESS}</div>
      </div>
    </div>
";
/*
$BBCLONE_TEMPLATE['detailed'] = "
		<tr>
			<center>{BBC_LISTVISITSLEG}</center><td class='forumheader' valign='top'>{BBC_SHOWDETAILED}</td>
		</tr>
";
*/
$BBCLONE_TEMPLATE['detailed'] = "
    <br>
    <div class='row'>
      <div class='col-md-12 text-center'>{BBC_LISTVISITSLEG}</div>
    </div>
    <div class='row'>
      <div class='col-md-12 text-center'><table><tr><td>{BBC_SHOWDETAILED}</td></tr></table></div>
    </div>
";
/*
$BBCLONE_TEMPLATE['visits'] = "
      <center>
			{BBC_LISTVISITSLEG}</center>
		  <tr><td>
		  {BBC_LISTVISITS}
      </td></tr>
";
*/
$BBCLONE_TEMPLATE['visits'] = "
    <br>
    <div class='row'>
      <div class='col-md-12 text-center'>{BBC_LISTVISITSLEG}</div>
    </div>
    <div class='row'>
      <div class='col-md-12 text-center'><table><tr><td>{BBC_LISTVISITS}</td></tr></table></div>
    </div>
";
/*
$BBC_TIME = "
		<tr>
			<td class='forumheader' valign='top' colspan='2' width='250px'>{BBC_SHOWDAY}</td>
		</tr>
		<tr>
			<td class='forumheader' valign='top'  width='250px'>{BBC_SHOWWEEK}</td>
			<td class='forumheader' valign='top'  width='250px'>{BBC_SHOWYEAR}</td>
		</tr>
		<tr>
			<td class='forumheader' valign='top' colspan='2' width='250px'>{BBC_SHOWMONTH}</td>
		</tr>
";
*/
/*
$BBCLONE_TEMPLATE['time'] = "
		<tr>
			<td class='forumheader' valign='top' colspan='2'>{BBC_SHOWDAY}</td>
		</tr>
		<tr>
			<td class='forumheader' valign='top'>{BBC_SHOWWEEK}</td>
			<td class='forumheader' valign='top'>{BBC_SHOWYEAR}</td>
		</tr>
		<tr>
			<td class='forumheader' valign='top' colspan='2'>{BBC_SHOWMONTH}</td>
		</tr>
";
*/
$BBCLONE_TEMPLATE['time'] = "
    <br>
    <div class='row'>
      <div class='col-md-12'>
        <div class='text-center well well-sm'>{BBC_SHOWDAY}</div>
      </div>
    </div>
    <div class='row'>
      <div class='col-md-6'>
        <div class='text-center well well-sm'>{BBC_SHOWWEEK}</div>
      </div>
      <div class='col-md-6'>
        <div class='text-center well well-sm'>{BBC_SHOWYEAR}</div>
      </div>
    </div>
    <div class='row'>
      <div class='col-md-12'>
        <div class='text-center well well-sm'>{BBC_SHOWMONTH}</div>
      </div>
    </div>
";
/*
$BBCLONE_TEMPLATE['footer'] = "
	</table></div><br/>
";
*/
$BBCLONE_TEMPLATE['footer'] = "
  </div>
</div>
";
?>