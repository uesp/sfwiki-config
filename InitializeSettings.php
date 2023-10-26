<?php
# WARNING: This file is publically viewable on the web. Do not put private data here.
#
# This file initializes SFWiki specific global variables used later on in the
#
# It is included by LocalSettings.php.
#

$sfwikiIsDev = false;
if ($_SERVER['HTTP_HOST'] == "dev.starfieldwiki.net" || $_SERVER['HTTP_HOST'] == "devgr.starfieldwiki.net") $sfwikiIsDev = true;
if ($_SERVER['HTTP_HOST'] == "dev.sfwiki.net" || $_SERVER['HTTP_HOST'] == "devde.sfwiki.net") $sfwikiIsDev = true;

$curDir = getcwd();
if (substr($curDir, 0, 21) == "/home/sfwiki/dev/www/") $sfwikiIsDev = true;

# Translation Projects and Languages

# The language suffix is added to the end of database names and other
# settings for translation wiki projects. Set in Language.php if needed
$sfwikiLanguageSuffix = "";

# TODO: More robust language detection
$wgLanguageCode = "en";

$host = $_SERVER['HTTP_HOST'];

if ($host == "de.starfieldwiki.net" || $host == "devde.starfieldwiki.net")
{
	$wgLanguageCode = "de";
}

if ($wgLanguageCode != "en")
{
	$sfwikiLanguageSuffix = "_" . $wgLanguageCode;
}

$wgLocalInterwikis = array( $wgLanguageCode );

# Set server according to environment and host name
if ($sfwikiIsDev)
{
	$wgServer = "https://dev" . $wgLanguageCode . ".starfieldwiki.net";
	if ($wgLanguageCode == "en") $wgServer = "https://dev.starfieldwiki.net";
}
else
{
	$wgServer = "https://" . $wgLanguageCode . ".starfieldwiki.net";
	if ($wgLanguageCode == "en") $wgServer = "https://starfieldwiki.net";
}


# Check command line arguments (this only parses long options related to the SFWiki).
# In MW 1.38 it doesn't let you use unknown command line parameters (results in an error).
if (php_sapi_name() == "cli") {
	
	function sfwikiParseCommandArgs()
	{
		global $argv;
		
		$args = array();
		
		for ( $arg = reset( $argv ); $arg !== false; $arg = next( $argv ) ) 
		{
			
			if ( substr( $arg, 0, 2 ) == '--' ) 
			{
				$option = substr( $arg, 2 );
				$bits = explode( '=', $option, 2 );
				if ($bits[1] == null) $bits[1] = true;
				$args[$bits[0]] = $bits[1];
			}
		}
		
		return $args;
	}
	
	$sfwikiArgs = sfwikiParseCommandArgs();
	
	if ($sfwikiArgs["sfwikidev"])
	{
		$sfwikiIsDev = true;
	}
	
}

if ($sfwikiIsDev && defined('STDERR')) fwrite(STDERR, "\tForcing SFWiki dev wiki!\n");

