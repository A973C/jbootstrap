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
defined('GANTRY_VERSION') or die('Restricted access');

gantry_import('core.gantrylayout');

/**
 *
 * @package gantry
 * @subpackage html.layouts
 */
class GantryLayoutBody_iPhoneMainBody extends GantryLayout
{

	var $render_params = array(
		'schema' => null,
		'classKey' => null
	);

	function render($params = array())
	{
		global $gantry;

		$fparams = $this->_getParams($params);

		// logic to determine if the component should be displayed
		$display_component = !($gantry->get("component-enabled", true) == false && JRequest::getVar('view') == 'featured');
		ob_start();
// XHTML LAYOUT
		?>          <div id="jb-main" class="<?php echo $fparams->classKey; ?>">
		<?php if ($display_component) : ?>
				<div id="jb-mainbody">
					<jdoc:include type="component" />
				</div>
			<?php endif; ?>
		</div>
		<?php
		return ob_get_clean();
	}

}