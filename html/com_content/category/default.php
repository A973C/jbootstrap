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

require_once(JPATH_LIBRARIES . '/gantry/gantry.php');
global $gantry;
$gantry->init();
$gridsystem = $gantry->get('gridsystem');
$gridrows = ($gridsystem == '' ? 9 : 12);

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
?>
<div class="category-list<?php echo $this->pageclass_sfx; ?>">

<?php if ($this->params->get('show_page_heading', 1)) : ?>
		<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h1>
		<?php endif; ?>

	<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
		<h2>
		<?php echo $this->escape($this->params->get('page_subheading')); ?>
			<?php if ($this->params->get('show_category_title')) : ?>
				<span class="subheading-category"><?php echo $this->category->title; ?></span>
			<?php endif; ?>
		</h2>
		<?php endif; ?>

	<?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
		<div class="category-desc">
		<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
				<img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
			<?php endif; ?>
			<?php if ($this->params->get('show_description') && $this->category->description) : ?>
				<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
			<?php endif; ?>
			<div class="clr"></div>
		</div>
<?php endif; ?>

    <div class="cat-items">
<?php echo $this->loadTemplate('articles'); ?>
    </div>

<?php if (!empty($this->children[$this->category->id]) && $this->maxLevel != 0) : ?>
		<div class="cat-children row<?php echo $gridsystem ?>">
			<h3>
	<?php echo JTEXT::_('JGLOBAL_SUBCATEGORIES'); ?>
			</h3>

	<?php echo $this->loadTemplate('children'); ?>
		</div>
		<?php endif; ?>
</div>
