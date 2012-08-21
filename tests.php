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
defined('_JEXEC') or die('Restricted access');

echo "<h1>Gantry::getParams();</h1>";
var_dump(Gantry::getParams());

echo "<h1>Gantry::get('primaryStyle');</h1>";
var_dump(Gantry::get('primaryStyle'));

echo "<h1>Gantry::set('primaryStyle', 'moo');</h1>";
var_dump(Gantry::set('primaryStyle', 'moo'));

echo "<h1>Gantry::get('primaryStyle');</h1>";
var_dump(Gantry::get('primaryStyle'));

echo "<h1>Current Browser. Gantry::\$browser</h1>";
var_dump(Gantry::getBrowser());

echo "<h1>Gantry::getPositions()</h1>";
var_dump(Gantry::getPositions());

echo "<h1>Gantry::getPositions('top')</h1>";
var_dump(Gantry::getPositions('top'));

echo "<h1>Gantry::getPositions('top', '-')</h1>";
var_dump(Gantry::getPositions('top', '-'));

echo "<h1>Gantry::getPositions('user', '([0-9])?')</h1>";
var_dump(Gantry::getPositions('user', '([0-9])?'));

echo "<h1>Gantry::getPositions('user', '(\d)?')</h1>";
var_dump(Gantry::getPositions('user', '(\d)?'));

echo "<h1>Gantry::countModules('user', '(\d)?')</h1>";
var_dump(Gantry::countModules('user', '(\d)?'));

echo "<h1>Gantry::countModules('top')</h1>";
var_dump(Gantry::countModules('top'));

echo "<h1>Gantry::countModules('top', '-')</h1>";
var_dump(Gantry::countModules('top', '-'));

