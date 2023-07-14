<?php
# WARNING: This file is publically viewable on the web. Do not put private data here.
#
# This file contains cache related includes and settings.
#
# It is included by LocalSettings.php.
#


## Shared memory settings
$wgMainCacheType = CACHE_MEMCACHED;
$wgObjectCacheSessionExpiry = 100000;
$wgSessionsInObjectCache = true;

if ($sfwikiIsDev)
{
	$wgCacheDirectory = "/home/sfwiki/cache/dev";
	$wgMemCachedServers = array($UESP_SERVER_BACKUP1 . ":11000");
	$wgCookiePrefix = "sfwiki_dev";
}
else
{
	$wgCacheDirectory = "/home/sfwiki/cache$sfwikiLanguageSuffix/";
	$wgMemCachedServers = [ $SFWIKI_SERVER_MEMCACHED . ':11000' ];
	
	$wgSquidMaxage = 86400;
	$wgSquidServers = array($UESP_SERVER_SQUID1);
	$wgUseSquid = true;
	
	$wgUseCdn = true;
	$wgCdnServers = array();
	$wgCdnServers[] = $UESP_SERVER_SQUID1;
}

$wgUsePrivateIPs = true;

