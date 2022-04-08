<?php
# WARNING: This file is publically viewable on the web. Do not put private data here.
#
# This file contains extension includes and settings.
# It is included by LocalSettings.php.
#

wfLoadExtension( "Elastica" );
wfLoadExtension( "CirrusSearch" );
$wgDisableSearchUpdate = false;

$wgCirrusSearchServers = [ [ 'host' => "10.12.222.41", 'port' => 9206 ] ];	// 1.35 uses ElasticSearch v6.8 on port 9206
$wgSearchType = 'CirrusSearch';

# Can't enable this until the search-highlighter plugin installed on the Elastica server
# $wgCirrusSearchUseExperimentalHighlighter = true;
# $wgCirrusSearchOptimizeIndexForExperimentalHighlighter = true;

$wgDebugLogGroups['CirrusSearch'] = "/var/log/httpd/sfwiki-cirrussearch.log";