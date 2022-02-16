<?php
# WARNING: This file is publically viewable on the web. Do not put private data here.
#
# This file contains cache related includes and settings.
#
# It is included by LocalSettings.php.
#


## Shared memory settings
$wgMainCacheType = CACHE_MEMCACHED;
$wgMemCachedServers = [ $UESP_SERVER_MEMCACHED . ':11000' ];
$wgObjectCacheSessionExpiry = 100000;
$wgSessionsInObjectCache = true;

$wgCacheDirectory = "/home/sfwiki/cache/";

$wgSquidMaxage = 86400;
$wgSquidServers = array($UESP_SERVER_SQUID1);
$wgUseSquid = true;
$wgUsePrivateIPs = true;

