<?php
# WARNING: This file is publically viewable on the web. Do not put private data here.
#
# This file contains wiki settings common to *all* UESP wikis. Note that some settings
# may be overridden in a site dependant config file.
#
# It is included by LocalSettings.php.
#

$wgSitename = "Starfield Wiki";
$wgMetaNamespace = "StarfieldWiki";

$wgEnableCanonicalServerLink = true;
$wgCanonicalServer = "https://$wgLanguageCode.starfieldwiki.net";
if ($wgLanguageCode == "en") $wgCanonicalServer = "https://starfieldwiki.net";

$wgScriptPath = "/w";
$wgAjaxSearch = true;
$wgAllowUserCss = true;
$wgAllowUserJs  = true;
$wgArticlePath  = "/wiki/$1";
$wgResourceBasePath = $wgScriptPath;
$wgAllowSiteCSSOnRestrictedPages = true;

$wgLogos = [ '1x' => "https://images.starfieldwiki.net/6/60/Wiki_Logo.png" ];

if ($sfwikiIsDev)
{
	//TODO: Language logo?
	$wgLogos = [ '1x' => "https://dev.starfieldwiki.net/w/images/8/8b/Dev_Wiki_Logo.png" ];
}


$wgEnableEmail = true;
$wgEnableUserEmail = true;

$wgEmergencyContact = "dave@uesp.net";
$wgPasswordSender = "password@uesp.net";

$wgEnotifUserTalk = true;
$wgEnotifWatchlist = true;
$wgEmailAuthentication = true;

$wgUploadPath = "//images.starfieldwiki.net";

$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

$wgHashedUploadDirectory = true;
array_push($wgFileExtensions, 'ogg', 'zip', 'bmp', 'pcx', 'tga', 'svg', 'webm', 'webp');

$wgUseInstantCommons = false;

$wgPingback = true;

$wgShellLocale = "en_US.utf8";
$wgLanguageCode = "en";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "https://creativecommons.org/licenses/by-sa/4.0/";
$wgRightsText = "Creative Commons Attribution-ShareAlike";
$wgRightsIcon = "$wgResourceBasePath/resources/assets/licenses/cc-by-sa.png";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "darkvector";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Timeless' );
wfLoadSkin( 'Vector' );
wfLoadSkin( 'DarkVector' );

$wgAutoConfirmAge = 3600*24*4;
$wgAutoConfirmCount = 10;

$wgUpgradeKey = $sfWikiSecretKey;
$wgSecretKey = $sfWikiUpgradeKey;

$wgGalleryOptions['imageWidth'] = 200;
$wgGalleryOptions['imageHeight'] = 200;
$wgGalleryOptions['mode'] = 'packed';

if ($sfwikiIsDev)
{
	$wgUploadPath = "//dev.starfieldwiki.net/w/images";
}
