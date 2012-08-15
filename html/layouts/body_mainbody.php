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
class GantryLayoutBody_MainBody extends GantryLayout
{

	var $render_params = array(
		'schema' => null,
		'pushPull' => null,
		'classKey' => null,
		'sidebars' => '',
		'contentTop' => null,
		'contentBottom' => null
	);

	function render($params = array())
	{
		global $gantry;
		global $jbsidebars;

		$gridsystem = $gantry->get('gridsystem');
		$gridrows = ($gridsystem == '' ? 9 : 12);

		$fparams = $this->_getParams($params);
		$classKey = $fparams->classKey;
		$renderOrder = explode('-', $classKey);

		// logic to determine if the component should be displayed
		$display_component = !($gantry->get("component-enabled", true) == false && JRequest::getVar('view') == 'featured');
		ob_start();
// XHTML LAYOUT

		echo "        <div id=\"jb-main\" class=\"container{$gridsystem}\">
            <div class=\"row{$gridsystem}\">";

		$sidebar_counter = 0;
		foreach ($renderOrder as $uiObject)
		{
			$isSidebar = ($uiObject[0] == 's');
			if ($isSidebar)
			{
				echo $jbsidebars[$sidebar_counter];
				$sidebar_counter++;
			} else
			{
				?>          
				<div class="span<?php echo $fparams->schema['mb']; ?><?php echo ($fparams->pushPull[0] ? ' offset' . $fparams->pushPull[0] : ''); ?>">
					<?php if (isset($fparams->contentTop)) : ?>
						<div id="jb-content-top">
						<?php echo $fparams->contentTop; ?>
						</div>
				<?php endif; ?>
					<?php if ($display_component) : ?>
						<div id="jb-mainbody">
							<jdoc:include type="component" />
						</div>
						<?php endif; ?>
					<?php if (isset($fparams->contentBottom)) : ?>
						<div id="jb-content-bottom">
					<?php echo $fparams->contentBottom; ?>
						</div>
				<?php endif; ?>
				</div>
				<?php
			}
		}

		echo '            </div>
        </div>';

		return ob_get_clean();
	}

}