<?php
# WARNING: This file is publically viewable on the web. Do not put private data here.
#
# This file initializes SFWiki specific global variables used later on in the
#
# It is included by LocalSettings.php.
#

$sfwikiIsDev = false;
if ($_SERVER['HTTP_HOST'] == "dev.starfieldwiki.net" || $_SERVER['HTTP_HOST'] == "dev.m.starfieldwiki.net") $sfwikiIsDev = true;

# Check command line arguments (this only parses long options related to the SFWiki).
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
		fwrite(STDERR, "\tForcing SFWiki dev wiki!\n");
	}
	
}

