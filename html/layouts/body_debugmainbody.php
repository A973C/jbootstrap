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
class GantryLayoutBody_DebugMainBody extends GantryLayout
{

	var $render_params = array(
		'counter' => null,
		'schema' => null,
		'pushPull' => null,
		'classKey' => null,
		'contents' => null,
		'sidebars' => ''
	);

	function render($params = array())
	{
		global $gantry;

		$fparams = $this->_getParams($params);

		ob_start();
// XHTML LAYOUT
		?>      <div id="jb-main" class="<?php echo $fparams->classKey; ?>">
			<span class="status">(<?php echo $fparams->counter; ?>) <?php echo $fparams->classKey; ?></span>
			<div class="jb-grid-<?php echo $fparams->schema['mb']; ?> <?php echo $fparams->pushPull[0]; ?>">
				<div id="jb-mainbody">
					<?php echo $fparams->contents; ?>
				</div>
			</div>
			<?php echo $fparams->sidebars; ?>
		</div>
		<?php
		return ob_get_clean();
	}

}