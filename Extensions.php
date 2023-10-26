<?php
# WARNING: This file is publically viewable on the web. Do not put private data here.
#
# This file contains extension includes and settings.
# It is included by LocalSettings.php.
#

#
# Keep this array updated as extensions are added or removed. It is currently only used when
# upgrading MediaWiki in order to automatically upgrade extensions as needed.
#
#   EXTENSION_DIRECTORY => VALUE,
#
$UESP_EXT_DEFAULT = 0;		// Included with the MW extension
$UESP_EXT_UPGRADE = 1;		// Upgrade with the uesp-getmwext script
$UESP_EXT_OTHER = 2;		// Needs a manual upgrade
$UESP_EXT_NONE = 3;			// Doesn't need an upgrade

$UESP_EXTENSION_INFO = [
		//"" => $UESP_EXT_UPGRADE,
		"AbuseFilter" => $UESP_EXT_DEFAULT,
		"AntiSpoof" => $UESP_EXT_DEFAULT,
		"CharInsert" => $UESP_EXT_DEFAULT,
		"CheckUser" => $UESP_EXT_UPGRADE,
		"CirrusSearch" => $UESP_EXT_UPGRADE,
		"Cite" => $UESP_EXT_DEFAULT,
		"CiteThisPage" => $UESP_EXT_DEFAULT,
		"ConfirmEdit" => $UESP_EXT_DEFAULT,
		"DeleteBatch" => $UESP_EXT_UPGRADE,
		"DisableAccount" => $UESP_EXT_UPGRADE,
		"Disambiguator" => $UESP_EXT_UPGRADE,
		"Editcount" => $UESP_EXT_UPGRADE,
		"Elastica" => $UESP_EXT_UPGRADE,
		"EmbedVideo" => $UESP_EXT_OTHER,
		"Gadgets" => $UESP_EXT_DEFAULT,
		"Graph" => $UESP_EXT_UPGRADE,
		"GTag" => $UESP_EXT_OTHER,
		"ImageMap" => $UESP_EXT_DEFAULT,
		"InputBox" => $UESP_EXT_DEFAULT,
		"Interwiki" => $UESP_EXT_DEFAULT,
		"JsonConfig" => $UESP_EXT_UPGRADE,
		"LabeledSectionTransclusion" => $UESP_EXT_UPGRADE,
		"LocalisationUpdate" => $UESP_EXT_DEFAULT,
		"MediaFunctions" => $UESP_EXT_UPGRADE,
		"MetaTemplate" => $UESP_EXT_OTHER,
		"MobileFrontend" => $UESP_EXT_UPGRADE,
		"NativeSvgHandler" => $UESP_EXT_UPGRADE,
		"Nuke" => $UESP_EXT_DEFAULT,
		"PageImages" => $UESP_EXT_DEFAULT,
		"PageSpeedLog" => $UESP_EXT_OTHER,
		"ParserFunctions" => $UESP_EXT_DEFAULT,
		"ParserHelper" => $UESP_EXT_OTHER,
		"Patroller" => $UESP_EXT_UPGRADE,
		"PdfHandler" => $UESP_EXT_DEFAULT,
		"Poem" => $UESP_EXT_DEFAULT,
		"RegexFunctions" => $UESP_EXT_UPGRADE,
		"Riven" => $UESP_EXT_OTHER,
		"Renameuser" => $UESP_EXT_DEFAULT,
		"Scribunto" => $UESP_EXT_DEFAULT,
		"SFWikiCustomCode" => $UESP_EXT_OTHER,
		"SpamBlacklist" => $UESP_EXT_DEFAULT,
		"SyntaxHighlight_GeSHi" => $UESP_EXT_DEFAULT,
		"Tabs" => $UESP_EXT_UPGRADE,
		"TemplateStyles" => $UESP_EXT_UPGRADE,
		"TimedMediaHandler" => $UESP_EXT_UPGRADE,
		"TitleBlacklist" => $UESP_EXT_DEFAULT,
		"TorBlock" => $UESP_EXT_UPGRADE,
		"UespBreadCrumb" => $UESP_EXT_OTHER, 
		//"VisualEditor" => $UESP_EXT_UPGRADE,	//Not working?
		"WikiEditor" => $UESP_EXT_DEFAULT,
		"WikiTextLoggedInOut" => $UESP_EXT_UPGRADE,
];

if ($UESP_UPGRADING_MW == 1) return;

wfLoadExtension( 'Cite' );
wfLoadExtension( 'CiteThisPage' );
wfLoadExtension( 'ConfirmEdit' );
wfLoadExtension( 'Gadgets' );
wfLoadExtension( 'ImageMap' );
wfLoadExtension( 'InputBox' );
wfLoadExtension( 'Interwiki' );
wfLoadExtension( 'Renameuser' );
wfLoadExtension( 'SpamBlacklist' );
wfLoadExtension( 'SyntaxHighlight_GeSHi' );
wfLoadExtension( 'TitleBlacklist' );
// wfLoadExtension( 'VisualEditor' );		//Disabled until we can get it to work
wfLoadExtension( 'WikiEditor' );

wfLoadSkin( 'MinervaNeue' );
wfLoadSkin( 'DarkVector' );

if ($sfwikiIsDev)
{
	wfLoadSkin( 'SFWikiDarkVector' );
}

wfLoadExtension( 'SFWikiCustomCode' );

wfLoadExtension( 'ParserFunctions' );
$wgPFEnableStringFunctions = true;
$wgPFStringLengthLimit = 30000;

wfLoadExtension( 'Scribunto' );
$wgScribuntoDefaultEngine = 'luastandalone';

wfLoadExtension( 'AbuseFilter' );
$wgAddGroups   ['sysop'] = array ( 'abuseeditor', 'autopatrolled', 'blockuser', 'confirmed', 'patroller', 'userpatroller' );
$wgRemoveGroups['sysop'] = array ( 'abuseeditor', 'autopatrolled', 'blockuser', 'confirmed', 'patroller', 'userpatroller');
$wgGroupPermissions['*']['abusefilter-log'] = true;
$wgGroupPermissions['*']['abusefilter-log-detail'] = true;
$wgGroupPermissions['*']['abusefilter-view'] = true;
$wgGroupPermissions['abuseeditor']['abusefilter-modify'] = true;
$wgGroupPermissions['abuseeditor']['abusefilter-modify-restricted'] = true;
$wgGroupPermissions['abuseeditor']['abusefilter-privatedetails'] = true;
$wgGroupPermissions['abuseeditor']['abusefilter-revert'] = true;

wfLoadExtensions([ 'ConfirmEdit', 'ConfirmEdit/QuestyCaptcha' ]);
$wgCaptchaClass = 'QuestyCaptcha';

# Now a more complicated one
# Generate a random string 10 characters long
$myChallengeLength = rand(2, 5);
$myChallengeIndex = rand(0, 12 - $myChallengeLength);
$myChallengeString = md5(uniqid(mt_rand(), true));
$prefix = substr($myChallengeString, 0, $myChallengeIndex);
$answer = substr($myChallengeString, $myChallengeIndex, $myChallengeLength);
$suffix = substr($myChallengeString, $myChallengeIndex + $myChallengeLength, 12 - $myChallengeIndex + $myChallengeLength);
$myChallengeString = "<span style='background-color:dimgrey'>$prefix</span><span style='background-color:darkgreen'>$answer</span><span style='background-color:dimgrey'>$suffix</span>";
# Pick a random location in the string

# Build the question/anwer
$wgCaptchaQuestions[] = array (
	'question' => "Please enter the characters highlighted in green in the following sequence: <code>$myChallengeString</code>",
	'answer' => $answer
);

$wgCaptchaTriggers['addurl'] = false;

wfLoadExtension( 'AntiSpoof' );
wfLoadExtension( 'CharInsert' );
wfLoadExtension( 'CheckUser' );
wfLoadExtension( 'Editcount' );
wfLoadExtension( 'PageImages' );

wfLoadExtension( 'TorBlock' );
$wgGroupPermissions['user']['torunblocked'] = false;

wfLoadExtension( 'LocalisationUpdate' );
$wgLocalisationUpdateDirectory = "/home/sfwiki/cache";

wfLoadExtension( 'DeleteBatch' );
wfLoadExtension( 'DisableAccount' );
wfLoadExtension( 'Disambiguator' );
wfLoadExtension( 'JsonConfig' );
wfLoadExtension( 'LabeledSectionTransclusion' );

wfLoadExtension( 'MediaFunctions' );

wfLoadExtension( 'Nuke' );
wfLoadExtension( 'Patroller' );
wfLoadExtension( 'PdfHandler' );
wfLoadExtension( 'Poem' );
wfLoadExtension( 'RegexFunctions' );
wfLoadExtension( 'Tabs' );
wfLoadExtension( 'WikiTextLoggedInOut' );

//wfLoadExtension( 'Graph' );
//$wgEnableGraphParserTag = true;

wfLoadExtension( 'NativeSvgHandler' );
$wgNativeSvgHandlerEnableLinks = true;

wfLoadExtension( 'TimedMediaHandler' );
$wgEnableTranscode = true;
$wgTranscodeBackgroundTimeLimit = 60 * 5;
$wgFFmpegLocation = '/home/uesp/ffmpeg/ffmpeg';

wfLoadExtension( 'TemplateStyles' );

// Needs messages setup
wfLoadExtension( 'UploadWizard' );
$wgUploadWizardConfig['uwLanguages'] = array( 'en' => 'English' );
$wgUploadWizardConfig['tutorial']= [ 'skip' => true ];

wfLoadExtension( 'UespBreadCrumb' );

wfLoadExtension( 'GTag' );
$wgGTagAnalyticsId = 'G-HLRGHY4G65';

wfLoadExtension( 'EmbedVideo' );

wfLoadExtension( "PageSpeedLog" );
$wgPageSpeedLogFile = "/var/log/httpd/sfwiki-pagespeed.log";

wfLoadExtension( 'ParserHelper' );
wfLoadExtension( 'MetaTemplate' );
wfLoadExtension( 'Riven' );
