<?php

if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'CollapsibleVector' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$GLOBALS['wgMessagesDirs']['CollapsibleVector'] = __DIR__ . '/i18n';
	wfWarn(
		'Deprecated PHP entry point used for CollapsibleVector extension.' .
		'Please use wfLoadExtension instead,' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	);
	return;
} else {
	die( 'This version of the CollapsibleVector extension requires MediaWiki 1.35+' );
}
