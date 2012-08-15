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

class GantryFeatureCopyright extends GantryFeature
{

	var $_feature_name = 'copyright';

	function render($position = "")
	{
		ob_start();
		?>
		<div id="copyright"><dl class="dl-horizontal"><dd>
					<a href="http://www.rockettheme.com/" title="rockettheme.com" id="rocket"></a>
		<?php echo $this->get('text'); ?>
				</dd></dl>
		</div>
		<?php
		return ob_get_clean();
	}

}
