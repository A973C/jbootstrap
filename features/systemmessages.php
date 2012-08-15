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

class GantryFeatureSystemMessages extends GantryFeature
{

	var $_feature_name = 'systemmessages';

	function render($position = "")
	{
		$app = & JFactory::getApplication();

//	    /* dummy msgs for testing */
		/* $app->enqueueMessage('This is a message');
		  $app->enqueueMessage('This is an error', 'error');
		  $app->enqueueMessage('This is a notice', 'notice'); */

		$msgs = $app->getMessageQueue();

		/* <jdoc:include type="message" /> */

		ob_start();
		if (sizeof($msgs) > 0) :
			foreach ($msgs as $msg)
			{
				$style = "info";
				if ($msg['type'] == 'error')
					$style = "error";
				if ($msg['type'] == 'notice')
					$style = "warn";
				?>
				<div class="alert alert-block alert-<?php echo $style; ?> <?php echo $msg['type']; ?>">
					<a data-dismiss="alert" class="close">×</a>
					<p><?php echo $msg['message']; ?></p>
				</div>
				<?php
			}
		endif;
		return ob_get_clean();
	}

}