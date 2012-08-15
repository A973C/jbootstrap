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
?>

<ul class="newsflash-horiz nav nav-pills">
<?php
for ($i = 0, $n = count($list); $i < $n; $i++) :
	$item = $list[$i];
	?>
		<li>
		<?php
		require JModuleHelper::getLayoutPath('mod_articles_news', '_item');

		if ($n > 1 && (($i < $n - 1) || $params->get('showLastSeparator'))) :
			?>

				<span class="article-separator">&#160;</span>

			<?php endif; ?>
		</li>
	<?php endfor; ?>
</ul>