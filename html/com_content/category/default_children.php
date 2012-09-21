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
defined('_JEXEC') or die('Restricted access');

require_once(JPATH_LIBRARIES . '/gantry/gantry.php');
global $gantry;
$gantry->init();
$gridsystem = $gantry->get('gridsystem');
$gridrows = ($gridsystem == '' ? 9 : 12);


$class = ' class="first"';
?>

<?php if (count($this->children[$this->category->id]) > 0) : ?>

	<?php foreach ($this->children[$this->category->id] as $id => $child) : ?>
		<?php
		if ($this->params->get('show_empty_categories') || $child->getNumItems(true) || count($child->getChildren())) :
			if (!isset($this->children[$this->category->id][$id + 1])) :
				$class = ' class="last"';
			endif;
			?>

			<div class="row<?php echo $gridsystem ?>"><div class="span<?php echo $gridrows; ?>"><dl<?php echo $class; ?>>
			<?php $class = ''; ?>
						<dt class="item-title"><a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($child->id)); ?>">
						<?php echo $this->escape($child->title); ?></a>
						</dt>
							<?php if ($this->params->get('show_subcat_desc') == 1) : ?>
							<?php if ($child->description) : ?>
								<dd class="category-desc">
								<?php echo JHtml::_('content.prepare', $child->description, '', 'com_content.category'); ?>
								</dd>
								<?php endif; ?>
						<?php endif; ?>
						<?php if ($this->params->get('show_cat_num_articles', 1)) : ?>
							<dl>
								<dt>
				<?php echo JText::_('COM_CONTENT_NUM_ITEMS'); ?>
								</dt>
								<dd>
				<?php echo $child->getNumItems(true); ?>
								</dd>
							</dl>
			<?php endif; ?>

						<?php
						if (count($child->getChildren()) > 0) :
							$this->children[$child->id] = $child->getChildren();
							$this->category = $child;
							$this->maxLevel--;
							if ($this->maxLevel != 0) :
								echo $this->loadTemplate('children');
							endif;
							$this->category = $child->getParent();
							$this->maxLevel++;
						endif;
						?>
					</dl></div></div>
					<?php endif; ?>
	<?php endforeach; ?>

<?php endif; ?>
