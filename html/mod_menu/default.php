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

// Note. It is important to remove spaces between elements.

?>

<ul class="nav <?php echo $class_sfx; ?>"<?php
$tag = '';
if ($params->get('tag_id') != null)
{
	$tag = $params->get('tag_id') . '';
	echo ' id="' . $tag . '"';
}
?> role="navigation">
		<?php if ($class_sfx === 'nav-list') : ?>
		<li></li>
		<li class="nav-header"><?php echo $module->title; ?></li>
	<?php endif; ?>
	<?php
	
	$previous_parent = null;
	foreach ($list as $i => &$item) :
		$class = '';
		if ($item->id == $active_id)
		{
			$class .= 'current ';
		}

		if ($item->type == 'alias' &&
				in_array($item->params->get('aliasoptions'), $path)
				|| in_array($item->id, $path))
		{
			$class .= 'active ';
		}
		if ($item->deeper)
		{
			$class .= 'deeper ';
		}

		if ($item->parent)
		{
			$class .= 'parent dropdown ';
			$previous_parent = $item->id;
			$item->flink = "#";
		}

		if (!empty($class))
		{
			$class = ' class="' . trim($class) . '"';
		}

		echo '<li id="item-' . $item->id . '"' . $class . '>';

		// Render the menu item.
		switch ($item->type) :
			case 'separator':
			case 'url':
			case 'component':
				require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
				break;

			default:
				require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
				break;
		endswitch;

		// The next item is deeper.
		if ($item->deeper)
		{
			echo '<ul class="jb-nav dropdown-menu" role="menu" aria-labelledby="drop' . $previous_parent . '">';
		}
		// The next item is shallower.
		else if ($item->shallower)
		{
			echo '</li>';
			echo str_repeat('</ul></li>', $item->level_diff);
		}
		// The next item is on the same level.
		else
		{
			echo '</li>';
		}
	endforeach;
	?>
</ul>
