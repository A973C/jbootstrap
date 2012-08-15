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

gantry_import('core.gantryfeature');

/**
 * @package     gantry
 * @subpackage  features
 */
class GantryFeatureStyleDeclaration extends GantryFeature
{

	var $_feature_name = 'styledeclaration';

	function isEnabled()
	{
		global $gantry;
		$menu_enabled = $this->get('enabled');

		if (1 == (int) $menu_enabled)
			return true;
		return false;
	}

	function init()
	{
		global $gantry;

		//inline css for dynamic stuff
		$css = 'body {background:' . $gantry->get('bgcolor') . ';}';
		$css .= 'body a {color:' . $gantry->get('linkcolor') . ';}';
		$css .= '#jb-header {background:' . $gantry->get('headercolor') . ';}';
		$css .= '#jb-bottom {background:' . $gantry->get('bottomcolor') . ';}';
		$css .= '#jb-footer, #jb-copyright, #jb-menu {background:' . $gantry->get('footercolor') . ';}';


		$gantry->addInlineStyle($css);

		//style stuff
		$gantry->addStyle($gantry->get('cssstyle') . ".css");
	}

}