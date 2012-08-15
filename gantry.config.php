<?php

/**
 * @package     Extly.Templates
 * @subpackage  JBootstrap - Twitter's Bootstrap for Joomla (with RocketTheme's Gantry administration)
 * 
 * @author      Prieco S.A. <support@extly.com>
 * @copyright   Copyright (C) 2007 - 2012 Prieco, S.A. All rights reserved.
 * @license     http://http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL 
 * @link        http://www.extly.com http://support.extly.com http://www.prieco.com
 */
// No direct access
defined('JPATH_BASE') or die('Restricted access');

$gantry_config_mapping = array(
	'belatedPNG' => 'belatedPNG',
	'ie6Warning' => 'ie6Warning'
);

$gantry_presets = array(
	'presets' => array(
		'preset1' => array(
			'name' => 'Preset 1',
			'cssstyle' => 'style1',
			'bgcolor' => '#dddddd',
			'headercolor' => '#111111',
			'bottomcolor' => '#111111',
			'footercolor' => '#666666',
			'linkcolor' => '#cc0000',
			'font-family' => 'helvetica'
		),
		'preset2' => array(
			'name' => 'Preset 2',
			'cssstyle' => 'style2',
			'bgcolor' => '#151515',
			'headercolor' => '#292929',
			'bottomcolor' => '#292929',
			'footercolor' => '#494949',
			'linkcolor' => '#ffcc00',
			'font-family' => 'helvetica'
		),
		'preset3' => array(
			'name' => 'Preset 3',
			'cssstyle' => 'style3',
			'bgcolor' => '#151515',
			'headercolor' => '#333333',
			'bottomcolor' => '#ffffff',
			'footercolor' => '#aaaaaa',
			'linkcolor' => '#669900',
			'font-family' => 'geneva'
		),
		'preset4' => array(
			'name' => 'Preset 4',
			'cssstyle' => 'style4',
			'bgcolor' => '#eee',
			'headercolor' => '#555555',
			'bottomcolor' => '#ffffff',
			'footercolor' => '#7F8C51',
			'linkcolor' => '#34647F',
			'font-family' => 'georgia'
		)
	)
);

$gantry_browser_params = array(
	'ie6' => array(
		'backgroundlevel' => 'low',
		'bodylevel' => 'low'
	)
);

$gantry_belatedPNG = array('.png', '#jb-logo');

$gantry_ie6Warning = "<h3>IE6 DETECTED: Currently Running in Compatibility Mode</h3><h4>This site is compatible with IE6, however your experience will be enhanced with a newer browser</h4><p>Internet Explorer 6 was released in August of 2001, and the latest version of IE6 was released in August of 2004.  By continuing to run Internet Explorer 6 you are open to any and all security vulnerabilities discovered since that date.  In March of 2009, Microsoft released version 8 of Internet Explorer that, in addition to providing greater security, is faster and more standards compliant than both version 6 and 7 that came before it.</p> <br /><a class='external'  href='http://www.microsoft.com/windows/internet-explorer/?ocid=ie8_s_cfa09975-7416-49a5-9e3a-c7a290a656e2'>Download Internet Explorer 8 NOW!</a>";
