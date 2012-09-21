<?php

/**
 * @package     Extly.Templates
 * @subpackage  JBootstrap - Twitter's Bootstrap for Joomla (with Gantry administration)
 * 
 * @author      Prieco S.A. <support@extly.com>
 * @copyright   Copyright (C) 2007 - 2012 Prieco, S.A. All rights reserved.
 * @license     http://http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL 
 *** @link        http://www.extly.com http://support.extly.com
 */
// No direct access
defined('JPATH_BASE') or die('Restricted access');

gantry_import('core.gantryfeature');

class GantryFeatureJSTools extends GantryFeature
{

	var $_feature_name = 'jstools';

	function isEnabled()
	{
		return false;
	}

	function isInPosition($position)
	{
		return false;
	}

	function isOrderable()
	{
		return false;
	}

	function init()
	{
		global $gantry;

		// date
		/* if ($gantry->get('date-enabled') && $gantry->get('date-clientside')) {
		  $gantry->addScript('gantry-date.js');
		  $gantry->addInlineScript($this->_dateFormat());
		  } */
		// build spans
		/* if ($gantry->get('buildspans-enabled')) {
		  $modules = "['jb-block']";
		  $headers = "['h3','h2','h1']";

		  $gantry->addScript('gantry-buildspans.js');
		  $gantry->addInlineScript($this->_buildSpans($modules, $headers));
		  } */
		// inputs
		/* if ($gantry->get('inputstyling-enabled') && !($gantry->browser->name == 'ie' && $gantry->browser->shortversion == '6')) {
		  $exclusions = $gantry->get('inputstyling-exclusions');
		  $gantry->addScript('gantry-inputs.js');
		  $gantry->addInlineScript("InputsExclusion.push($exclusions)");
		  } */
	}

	function _dateLanguage()
	{

		$days = array(
			'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat',
			'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
		);

		$months = array(
			'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec',
			'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
		);

		return "dayNames:['" . implode("', '", $days) . "'], monthNames:['" . implode("', '", $months) . "']";
	}

	function _dateFormat()
	{
		global $gantry;

		$formats = str_replace("%", "$", $gantry->get('date-formats'));

		$js = "
			dateFormat.i18n = {
				" . $this->_dateLanguage() . "
			};
			var dateFeature = new Date().format('$formats');
			window.addEvent('domready', function() {
				var dates = $$('.date-block .date, .date, .jb-date-feature');
				if (dates.length) {
					dates.each(function(date) {
						date.set('text', dateFeature);
					});
				}
			});
		";

		return $js;
	}

	function _buildSpans($modules, $headers)
	{
		global $gantry;

		$js = "
			window.addEvent('domready', function() {
				var modules = $modules;
				var header = $headers;
				GantryBuildSpans(modules, header);
			});
		";

		return $js;
	}

}