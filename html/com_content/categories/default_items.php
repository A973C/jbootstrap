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

$class = ' class="first"';
if (count($this->items[$this->parent->id]) > 0 && $this->maxLevelcat != 0) :
	?>
	<dl>
	<?php foreach ($this->items[$this->parent->id] as $id => $item) : ?>
			<?php
			if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) :
				if (!isset($this->items[$this->parent->id][$id + 1]))
				{
					$class = ' class="last"';
				}
				?>
				<!-- li<?php echo $class; ?> -->
				<?php $class = ''; ?>
				<dt class="item-title"><a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>">
					<?php echo $this->escape($item->title); ?></a>
				</dt>
				<?php if ($this->params->get('show_subcat_desc_cat') == 1) : ?>
					<?php if ($item->description) : ?>
						<dd class="category-desc">
							<?php echo JHtml::_('content.prepare', $item->description); ?>
						</dd>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($this->params->get('show_cat_num_articles_cat') == 1) : ?>
					<div class="article-count"><span class="jb_numitems_label">
							<?php echo JText::_('COM_CONTENT_NUM_ITEMS'); ?></span>
						<span class="jb_numitems_desc"><?php echo $item->numitems; ?></span>
					</div>
				<?php endif; ?>

				<?php
				if (count($item->getChildren()) > 0) :
					$this->items[$item->id] = $item->getChildren();
					$this->parent = $item;
					$this->maxLevelcat--;
					echo $this->loadTemplate('items');
					$this->parent = $item->getParent();
					$this->maxLevelcat++;
				endif;
				?>

				<!-- /li -->
			<?php endif; ?>
		<?php endforeach; ?>
	</dl>
<?php endif; ?>