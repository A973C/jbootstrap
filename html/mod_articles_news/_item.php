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
<?php if ($params->get('item_title')) : ?>

	<<?php echo $params->get('item_heading'); ?> class="newsflash-title <?php echo $params->get('moduleclass_sfx'); ?>">
	<?php if ($params->get('link_titles') && $item->link != '') : ?>
		<a href="<?php echo $item->link; ?>">
		<?php echo $item->title; ?></a>
	<?php else : ?>
			<?php echo $item->title; ?>
		<?php endif; ?>
	</<?php echo $params->get('item_heading'); ?>>

<?php endif; ?>

<?php
if (!$params->get('intro_only')) :
	echo $item->afterDisplayTitle;
endif;
?>

<?php echo $item->beforeDisplayContent; ?>

<?php echo $item->introtext; ?>

<?php
if (isset($item->link) && $item->readmore && $params->get('readmore')) :
	echo '<a class="readon btn" href="' . $item->link . '"><span>' . $item->linkText . '</span></a>';
endif;
?>
