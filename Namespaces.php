<?php
# WARNING: This file is publically viewable on the web. Do not put private data here.
#
# This file contains namespace related includes and settings.
#
# It is included by LocalSettings.php.
#


$wgExtraNamespaces = array(
	100 => 'Starfield',         101 => 'Starfield_talk',
	102 => 'Lore',              103 => 'Lore_talk',
	104 => 'General',           105 => 'General_talk'
);

$wgNamespaceAliases = array(
	'SF' => NS_PROJECT, 'SF_talk' => NS_PROJECT + 1,
	'SFW' => 100,       'SFW_talk' => 101,
	'LO' => 102,        'LO_talk' => 103,
	'GE' => 104,        'GE_talk' => 105
);

$wgNamespacesWithSubpages = array(
	-1 => 0,
	0 => 0,   1 => 1,   2 => 1,   3 => 1,   4 => 1,   5 => 1,   6 => 0,   7 => 1,   8 => 1,   9 => 1,
	10 => 1,  11 => 1,  12 => 1,  13 => 1,  14 => 0,  15 => 1,
	100 => 1, 101 => 1, 102 => 1, 103 => 1,
);

$wgNamespacesToBeSearchedDefault = array(
	-1 => 0,
	0 => 1,   1 => 0,   2 => 0,   3 => 0,   4 => 1,   5 => 0,   6 => 0,   7 => 0,   8 => 0,   9 => 0,
	10 => 0,  11 => 0,  12 => 0,  13 => 0,  14 => 0,  15 => 0,
	100 => 0, 101 => 0, 102 => 1, 103 => 0, 104 => 1, 105 => 0
);

$wgContentNamespaces = array(
	NS_MAIN, NS_PROJECT, 100, 102, 104
);

$wgExtraSignatureNamespaces[] = NS_PROJECT;
