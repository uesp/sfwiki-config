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
		"VisualEditor" => $UESP_EXT_UPGRADE,
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

wfLoadExtension( 'WikiEditor' );

wfLoadExtension( 'Parsoid', "$IP/vendor/wikimedia/parsoid/extension.json" );
wfLoadExtension( 'VisualEditor' );
$wgVisualEditorAvailableNamespaces = [
		'Project' => true,
		'File' => false,
		'General' => true,
		'Lore' => true,
		'Starfield' => true,
		'Starfield_Mod' => true,
		'Merchandise' => true,
];

$wgVirtualRestConfig['modules']['parsoid'] = array(
	'url' => "http://localhost/w/rest.php",
);

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
$wgTorOnionooCA = false;

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
$wgUploadWizardConfig['enableCategoryCheck'] = false;
$wgUploadWizardConfig['minAuthorLength'] = 0;
$wgUploadWizardConfig['minSourceLength'] = 0;
$wgUploadWizardConfig['minDescriptionLength'] = 0;
$wgUploadWizardConfig['defaults']['description'] = 'Uploaded by UploadWizard';
$wgUploadWizardConfig['licensing']['ownWork']['defaults'] = 'cc-by-sa-2.5';
$wgUploadWizardConfig['licensing']['thirdParty']['defaults'] = 'cc-by-sa-2.5';
//$wgUploadWizardConfig['licensing']['ownWork']['template'] = 'p1';
//$wgUploadWizardConfig['licensing']['thirdParty']['template'] = 'p1';

$wgMessagesDirs['UploadWizard'] = array(
		"$IP/extensions/UploadWizard/i18n",
		"$IP/extensions/SFWikiCustomCode/uploadWizard-i18n"
); 

$wgUploadWizardConfig['licensing']['ownWork']['licenses'] = array(
		'cc-by-sa-2.5', 
		'cc-by-sa-3.0',
		'cc-by-2.5',
		'cc-by-sa-nc-2.5',
		'gfdl',
		'sfwiki-pd',
		'sfwiki-usedwithpermission',
		'sfwiki-screenshot',
		'sfwiki-image',
);

$wgUploadWizardConfig['licensing']['thirdParty']['licenses'] = array(
		'cc-by-sa-2.5', 
		'cc-by-sa-3.0',
		'cc-by-2.5',
		'cc-by-sa-nc-2.5',
		'gfdl',
		'sfwiki-pd',
		'sfwiki-usedwithpermission',
		'sfwiki-screenshot',
		'sfwiki-image',
);

$wgUploadWizardConfig['licensing']['thirdParty']['licenseGroups'] = array(
		array(
				'head' => 'mwe-upwiz-license-none-head',
				'licenses' => array(
						'sfwiki-none',
						'sfwiki-dontknow',
				)
		),
		array(
				'head' => 'mwe-upwiz-license-publicdomain-head',
				'licenses' => array(
						'sfwiki-pd',
				)
		),
		array(
				'head' => 'mwe-upwiz-license-cc-head',
				'licenses' => array(
						'cc-by-sa-2.5',
						'cc-by-sa-3.0',
						'cc-by-2.5',
						'cc-by-sa-nc-2.5',
						'gfdl',
						'sfwiki-screenshot',
						'sfwiki-image',
				)
		),
		array(
				'head' => 'mwe-upwiz-license-nonfree-head',
				'licenses' => array(
						'sfwiki-usedwithpermission',
				)
		),
);

$wgUploadWizardConfig['licenses']['sfwiki-none'] = array(
		'msg' => 'mwe-upwiz-license-sfwiki-none',
		'templates' => array( 'nolicense' ),
);
$wgUploadWizardConfig['licenses']['sfwiki-screenshot'] = array(
		'msg' => 'mwe-upwiz-license-sfwiki-screenshot',
		'templates' => array( 'sfwimage' ),
);
$wgUploadWizardConfig['licenses']['sfwiki-image'] = array(
		'msg' => 'mwe-upwiz-license-sfwiki-image',
		'templates' => array( 'sfimage' ),
);
$wgUploadWizardConfig['licenses']['sfwiki-dontknow'] = array(
		'msg' => 'mwe-upwiz-license-sfwiki-dontknow',
		'templates' => array( 'nolicense' ),
);
$wgUploadWizardConfig['licenses']['sfwiki-pd'] = array(
		'msg' => 'mwe-upwiz-license-sfwiki-pd',
		'templates' => array( 'publicdomain' ),
		'icons' => array( 'cc-zero' )
);
$wgUploadWizardConfig['licenses']['cc-by-sa-2.5'] = array(
		'msg' => 'mwe-upwiz-license-cc-by-sa-2.5',
		'templates' => array( 'cc-by-sa-2.5' ),
		'icons' => array( 'cc-by', 'cc-sa' )
);
$wgUploadWizardConfig['licenses']['cc-by-sa-nc-2.5'] = array(
		'msg' => 'mwe-upwiz-license-cc-by-sa-nc-2.5',
		'templates' => array( 'cc-by-sa-nc-2.5' ),
		'icons' => array( 'cc-by', 'cc-sa' )
);
$wgUploadWizardConfig['licenses']['sfwiki-usedwithpermission'] = array(
		'msg' => 'mwe-upwiz-license-sfwiki-usedwithpermission',
		'templates' => array( 'usedwithpermission' ),
);

$wgResourceModules['ext.uploadWizardSfWiki']['messages'] = array(
		"mwe-upwiz-source-ownwork-assert-cc-by-sa-2.5",
		"mwe-upwiz-source-ownwork-cc-by-sa-2.5-explain",
		"mwe-upwiz-license-sfwiki-pd",
		"mwe-upwiz-license-sfwiki-usedwithpermission",
		"mwe-upwiz-license-sfwiki-none",
		"mwe-upwiz-license-sfwiki-dontknow",
		"mwe-upwiz-license-sfwiki-screenshot",
		"mwe-upwiz-license-sfwiki-image",
		"mwe-upwiz-license-publicdomain-head",
		"mwe-upwiz-license-nonfree-head",
		"mwe-upwiz-license-screenshots-head",
);

// TODO: Only need to load for the Special:UploadWizard page
$wgHooks['BeforePageDisplay'][] = 'SFWikiUploadWizard_beforePageDisplay';

function SFWikiUploadWizard_beforePageDisplay($out, $skin)
{
	$out->addModules( 'ext.uploadWizardSfWiki' );
}

wfLoadExtension( 'UespBreadCrumb' );

wfLoadExtension( 'GTag' );
$wgGTagAnalyticsId = 'G-HLRGHY4G65';

wfLoadExtension( 'EmbedVideo' );

wfLoadExtension( "PageSpeedLog" );
$wgPageSpeedLogFile = "/var/log/httpd/sfwiki-pagespeed.log";

wfLoadExtension( 'ParserHelper' );
wfLoadExtension( 'MetaTemplate' );
wfLoadExtension( 'NSInfo' );
wfLoadExtension( 'Riven' );
