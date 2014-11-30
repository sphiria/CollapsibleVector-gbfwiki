<?php
/**
 * CollapsibleVector extension
 * 
 * @file
 * @ingroup Extensions
 * 
 * @license GPL v2 or later
 * @version 0.1.5
 *
 * Requires MediaWiki 1.24+
 */


if ( version_compare( $GLOBALS['wgVersion'], '1.24c', '<' ) ) {
    die( '<b>Error:</b> CollapsibleVector requires MediaWiki 1.24 or above.' );
} 


/* Configuration */

// Each module may be configured individually to be globally on/off or user preference based
$GLOBALS['wgVectorFeatures'] = array(
	'collapsiblenav' => array( 'global' => false, 'user' => true ),
);

/* 
 * Setting default option.
 *
 * Do not remove this.
 *
 * Bug T76314
 */
$wgDefaultUserOptions['vector-collapsiblenav'] = 1;

/* 
 * Setting default option.
 * Do not remove this.
 */
$wgDefaultUserOptions['vector-noexperiments'] = 0;

/* Setup */

$GLOBALS['wgExtensionCredits']['other'][] = array(
	'path' => __FILE__,
	'name' => 'CollapsibleVector',
	'author' => array( 'Paladox' ),
	'version' => '0.1.5',
	'url' => 'https://www.mediawiki.org/wiki/Extension:CollapsibleVector',
	'descriptionmsg' => 'collapsiblevector-desc',
);
$GLOBALS['wgAutoloadClasses']['VectorHooks'] = __DIR__ . '/CollapsibleVector.hooks.php';
$GLOBALS['wgMessagesDirs']['CollapsibleVector'] = __DIR__ . '/i18n';
$GLOBALS['wgHooks']['BeforePageDisplay'][] = 'VectorHooks::beforePageDisplay';
$GLOBALS['wgHooks']['GetPreferences'][] = 'VectorHooks::getPreferences';
$GLOBALS['wgHooks']['ResourceLoaderGetConfigVars'][] = 'VectorHooks::resourceLoaderGetConfigVars';
$GLOBALS['wgHooks']['MakeGlobalVariablesScript'][] = 'VectorHooks::makeGlobalVariablesScript';


$GLOBALS['wgResourceModules']['ext.vector.collapsibleNav'] = array(
	'scripts' => array(
		'modules/ext.vector.collapsibleNav.js',
	),
	'styles' => 'modules/ext.vector.collapsibleNav.less',
	'messages' => array(
		'collapsiblevector-collapsiblenav-more',
	),
	'dependencies' => array(
		'jquery.client',
		'jquery.cookie',
		'jquery.tabIndex',
	),
	'remoteExtensionPath' => 'CollapsibleVector',
	'localBasePath' => __DIR__,
);
