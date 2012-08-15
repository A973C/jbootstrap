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
<ul class="weblinks<?php echo $moduleclass_sfx; ?> nav nav-list">
<?php foreach ($list as $item) : ?>
		<li>
		<?php
		$link = $item->link;
		switch ($params->get('target', 3))
		{
			case 1:
				// open in a new window
				echo '<a href="' . $link . '" target="_blank" rel="' . $params->get('follow', 'no follow') . '">' .
				htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8') . '</a>';
				break;

			case 2:
				// open in a popup window
				echo "<a href=\"#\" onclick=\"window.open('" . $link . "', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\">" .
				htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8') . '</a>';
				break;

			default:
				// open in parent window
				echo '<a href="' . $link . '" rel="' . $params->get('follow', 'no follow') . '">' .
				htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8') . '</a>';
				break;
		}
		?>
			<?php if ($params->get('description', 0)) : ?>
				<?php echo nl2br($item->description); ?>
			<?php endif; ?>

			<?php if ($params->get('hits', 0)) : ?>
				<?php echo '(' . $item->hits . ' ' . JText::_('MOD_WEBLINKS_HITS') . ')'; ?>
			<?php endif; ?>
		</li>
		<?php endforeach; ?>
</ul>
