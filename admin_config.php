<?php
require_once('../../class2.php');
if (!defined('e107_INIT')) {
    exit;
}
if (!getperms('P')) {
    header('location:' . e_HTTP . 'index.php');
    exit;
}
require_once(e_ADMIN . 'auth.php');
if (!defined('ADMIN_WIDTH')) {
    define(ADMIN_WIDTH, 'width:100%;');
}
$ns->tablerender("BBClone Administration", 'This plugin doesn\'t need administration, but if you want to change something, edit conf/config.php
<br/>
<br/>
If something is not working, please verify if you chmoded this files to 666:<br/>
var/counter[0-15].inc (counter0.inc to counter15.inc)<br/> var/access.php<br/> var/last.php<br/> var/.htalock<br/>
and verify if this code is in your theme.php file:
<div style=\'border: 1px solid ;\'>//BBCLONE PAGE TAGGER<br>
define(\"COUNTER\", e_PLUGIN.\"bbclone/mark_page.php\");<br>
 if (is_readable(COUNTER)) include_once(COUNTER);<br>
</div>
If not, copy & add the above code to your theme.php file!');
require_once(e_ADMIN . 'footer.php');
?>