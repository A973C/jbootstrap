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
defined('_JEXEC') or die('Restricted access');

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
?>
<div class="categories-list<?php echo $this->pageclass_sfx; ?>">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
		<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h1>
		<?php endif; ?>
		<?php if ($this->params->get('show_base_description')) : ?>
		<?php //If there is a description in the menu parameters use that;  ?>
		<?php if ($this->params->get('categories_description')) : ?>
			<?php echo JHtml::_('content.prepare', $this->params->get('categories_description')); ?>
		<?php else: ?>
			<?php //Otherwise get one from the database if it exists. ?>
			<?php if ($this->parent->description) : ?>
				<div class="category-desc">
				<?php echo JHtml::_('content.prepare', $this->parent->description); ?>
				</div>
				<?php endif; ?>
			<?php endif; ?>
	<?php endif; ?>
	<?php
	echo $this->loadTemplate('items');
	?>
</div>