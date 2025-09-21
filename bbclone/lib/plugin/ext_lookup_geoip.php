<?php
/* This file is part of BBClone (A PHP based Web Counter on Steroids)
 * 
 * SVN FILE $Id: ext_lookup_geoip.php 417 2022-12-21 11:27:14Z joku $
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

/////////////////////////////////////////
// Plug-in: Extension look-up by GeoIP //
/////////////////////////////////////////

function bbc_extension_plugin($host, $addr) {
    global $BBC_GEOIP_PATH, $gi;
	
	if ( function_exists("geoip_country_code_by_name") ){
		$addr = geoip_country_code_by_name($addr);
	} else { 
		// First of all let's check if the include file exists
		if ( !@file_exists( $BBC_GEOIP_PATH.'geoip.inc' ) ) {
			bbc_msg('Missing geoip installation');
		}
		@include_once ( $BBC_GEOIP_PATH.'geoip.inc' );

		// Bail out if the file exists but does not seem to be geoip
		if ( !function_exists('geoip_open') ) {
			return "";
		}

		if (filter_var($addr, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
			$gi = geoip_open($BBC_GEOIP_PATH ."GeoIPv6.dat",GEOIP_STANDARD);
			$addr = geoip_country_code_by_addr_v6($gi, $addr);
		 } elseif (filter_var($addr, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
			$gi = geoip_open($BBC_GEOIP_PATH ."GeoIP.dat",GEOIP_STANDARD);
			$addr = geoip_country_code_by_addr($gi, $addr);
		 } else {
			 if((strpos($addr, ":") === false)) {
				//ipv4
				$gi = geoip_open($BBC_GEOIP_PATH ."GeoIP.dat",GEOIP_STANDARD);
				$addr = geoip_country_code_by_addr($gi, $addr);
			} else {
				//ipv6
				$gi = geoip_open($BBC_GEOIP_PATH ."GeoIPv6.dat",GEOIP_STANDARD);
				$addr = geoip_country_code_by_addr_v6($gi, $addr);
			}
		 }
		geoip_close($gi);
	}

    return strtolower($addr);
}

?>
