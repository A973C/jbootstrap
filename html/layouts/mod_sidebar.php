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
defined('GANTRY_VERSION') or die('Restricted access');

gantry_import('core.gantrylayout');

/**
 *
 * @package gantry
 * @subpackage html.layouts
 */
class GantryLayoutMod_Sidebar extends GantryLayout
{

	var $render_params = array(
		'contents' => null,
		'position' => null,
		'gridCount' => null,
		'pushPull' => ''
	);

	function render($params = array())
	{
		global $gantry;
		global $jbsidebars;
		if (!$jbsidebars)
			$jbsidebars = array();

		$rparams = $this->_getParams($params);
		$pushPull = ($rparams->pushPull ? ' offset' . $rparams->pushPull : '');

		ob_start();
		// XHTML LAYOUT        
		$sidebar = "            <div class=\"span{$rparams->gridCount}{$pushPull}\">
                <div id=\"jb-{$rparams->position}\" class=\"well sidebar-nav\">
                    {$rparams->contents}
                </div>
            </div>";

		echo $sidebar;
		$jbsidebars[] = $sidebar;

		return ob_get_clean();
	}

}