<?php
# WARNING: This file is publically viewable on the web. Do not put private data here.
#
# This file contains language related includes and settings.
#
# It is included by LocalSettings.php.
#

//Most language settings are in InitializeSettings.php

# Special settings for translation wikis
if ($sfwikiLanguageSuffix != "")
{
	$wgUseSharedUploads = true;
	$wgSharedUploadPath = '//images.starfieldwiki.net';
	$wgSharedUploadDirectory = '/home/sfwiki/www/w/images/';
	$wgHashedSharedUploadDirectory = true;
	$wgUploadNavigationUrl = "//starfieldwiki.net/wiki/Special:Upload";
	$wgUploadMissingFileUrl= "//starfieldwiki.net/wiki/Special:Upload";
	$wgRepositoryBaseUrl = "https://starfieldwiki.net/wiki/File:";
}

