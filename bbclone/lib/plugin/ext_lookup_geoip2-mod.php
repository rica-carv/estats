<?php
/* This file is part of BBClone (A PHP based Web Counter on Steroids)
 * 
 * SVN FILE $Id: ext_lookup_maxmind-mod.php 63 2022-03-19 15:19:31Z matthys $
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
// Plug-in: Extension look-up by GeoIP2 PHP/Perl Module           //
// Use PHP extension=maxminddb.so | pecl install maxminddb        //
// Depends on the new GeoIP2/GeoLite2 MaxMind DataBase (mmdb)     //
////////////////////////////////////////////////////////////////////

use MaxMind\Db\Reader;

function bbc_extension_plugin($host, $addr) {
    global $BBC_GEOIP_PATH, $BBC_GEOIP2_DB;
    
    $databaseFile = $BBC_GEOIP_PATH.$BBC_GEOIP2_DB;
    $reader = new Reader($databaseFile);
    $country=($reader->get($addr)['country']['iso_code']);
    $reader->close();
    return strtolower($country);
}

?>