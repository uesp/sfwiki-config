<?php
# WARNING: This file is publically viewable on the web. Do not put private data here.
#
# This file contains database related includes and settings.
#
# It is included by LocalSettings.php.
#

## Database settings
$wgDBtype = "mysql";
$wgDBname = $sfWikiDB;

# $wgDBserver = $UESP_SERVER_DB1;
# $wgDBuser = $sfWikiUser;
# $wgDBpassword = $sfWikiPW;

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Shared database table
# This has no effect unless $wgSharedDB is also set.
$wgSharedTables[] = "actor";

$sfWikiDBName = $sfWikiDB;

if ($sfwikiIsDev)
{
	$wgDBname = "sfwiki_dev";
	$sfWikiDBName = $wgDBname;
	
	$wgDBservers = array(
		array(          # backup1 is the only dev wiki database
				'host' => $UESP_SERVER_BACKUP1,
				'dbname' => $sfWikiDBName,
				'user' => $sfWikiUser,
				'password' => $sfWikiPW,
				'type' => "mysql",
				'flag' => DBO_DEFAULT,
				'load' => 1,
			),
		);
}
else
{
	$wgDBservers = array(
			array(          # db1 - Write Master
					'host' => $UESP_SERVER_DB1,
					'dbname' => $sfWikiDBName,
					'user' => $sfWikiUser,
					'password' => $sfWikiPW,
					'type' => "mysql",
					'flag' => DBO_DEFAULT,
					'load' => 1,
			),
			array(          # db2 - Primary Read
					'host' => $UESP_SERVER_DB2,
					'dbname' => $sfWikiDBName,
					'user' => $sfWikiUser,
					'password' => $sfWikiPW,
					'type' => "mysql",
					'flag' => DBO_DEFAULT,
					'load' => 10,
					'max lag' => 1000,
			)
		);
		
	$sfWikiBackup1Db = 
		array(          # backup1 - Backup Read
				'host' => $UESP_SERVER_BACKUP1,
				'dbname' => $sfWikiDBName,
				'user' => $sfWikiUser,
				'password' => $sfWikiPW,
				'type' => "mysql",
				'flag' => DBO_DEFAULT,
				'load' => 10,
		);
		
		/* Don't include by default as backup lag can affect production servers */	
	//$wgDBservers[] = $sfWikiBackup1Db;
}