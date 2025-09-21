<?php
/* This file is part of BBClone (A PHP based Web Counter on Steroids)
 * 
 * SVN FILE $Id: ext_lookup_ip2locaton.php $Revision$ $Date$ $Author$ $
 *  
 * Copyright (C) 2001-2023, the BBClone Team (see doc/authors.txt for details)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * See doc/copying.txt for details
 */

////////////////////////////////////////////////////////////////////
/* License
 * Please review the General Terms and Conditions for the database licensing.
 * https://lite.ip2location.com/terms-of-use
 * (See http://ip2Location.com for more details, PHP >=7.2.0)
 */
////////////////////////////////////////////////////////////////////
require './ip2location/autoload.php';
////////////////////////////////////////////////////////////////////

function bbc_extension_plugin($host, $addr) {
    global $BBC_GEOIP_PATH, $BBC_GEOIP2_DB;
    
// Default file I/O lookup
$db = new \IP2Location\Database('./ip2location/data/IP2LOCATION-LITE-DB1.BIN', \IP2Location\Database::FILE_IO);

$records = $db->lookup($addr , \IP2Location\Database::ALL);
$country = $records['countryCode'];
   return strtolower($country);
}

?>
