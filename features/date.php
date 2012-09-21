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

class GantryFeatureDate extends GantryFeature
{

	var $_feature_name = 'date';

	function render($position = "")
	{
		global $gantry;
		ob_start();

		$now = &JFactory::getDate();
		$format = $this->get('formats');
		?>
		<div class="date-block">
			<span class="date"><?php echo $now->toFormat($format); ?></span>
		</div>
		<?php
		return ob_get_clean();
	}

}