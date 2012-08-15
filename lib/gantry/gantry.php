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
defined('_JEXEC') or die('Restricted index access');

global $gantry;

$gantry_path_j15 = JPATH_SITE . '/components/com_gantry/gantry.php';
$gantry_path_j16 = JPATH_SITE . '/libraries/gantry/gantry.php';

$gantry_path = '';
if (version_compare(JVERSION, '1.5', '>=') && version_compare(JVERSION, '1.6', '<'))
{
	$gantry_path = $gantry_path_j15;
}
elseif (version_compare(JVERSION, '1.6', '>='))
{
	$gantry_path = $gantry_path_j16;
}

if (!file_exists($gantry_path))
{
	echo JText::_('Unable to find Gantry library.  Please make sure you have it installed.');
	die;
}
require_once $gantry_path;

$app = JFactory::getApplication();
if (!$app->isAdmin())
{
	$app->triggerEvent('onGantryTemplateInit', array($filename));
}
