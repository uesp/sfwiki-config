<?php
# WARNING: This file is publically viewable on the web. Do not put private data here.
#
# This file contains extension includes and settings.
# It is included by LocalSettings.php.
#

//TODO: Extension array for upgrades

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

//wfLoadExtension( 'MediaFunctions' );
require_once "$IP/extensions/MediaFunctions/MediaFunctions.php";

wfLoadExtension( 'Nuke' );
wfLoadExtension( 'Patroller' );
wfLoadExtension( 'PdfHandler' );
wfLoadExtension( 'Poem' );
wfLoadExtension( 'RegexFunctions' );
wfLoadExtension( 'Tabs' );
wfLoadExtension( 'WikiTextLoggedInOut' );

wfLoadExtension( 'Graph' );
$wgEnableGraphParserTag = true;

wfLoadExtension( 'NativeSvgHandler' );
$wgNativeSvgHandlerEnableLinks = true;

wfLoadExtension( 'TimedMediaHandler' );
$wgEnableTranscode = true;
$wgTranscodeBackgroundTimeLimit = 60 * 5;
$wgFFmpegLocation = '/home/uesp/ffmpeg/ffmpeg';

wfLoadExtension( 'TemplateStyles' );

// Needs messages setup
// wfLoadExtension( 'UploadWizard' );

	// Needs Testing, doesn't fully work
require_once( "$IP/extensions/MetaTemplate/MetaTemplate.php" );






