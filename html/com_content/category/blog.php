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

<div class="jb-blog <?php echo $this->pageclass_sfx; ?>">

<?php /* Begin Page Title * */ if ($this->params->get('show_page_heading', 1)) : ?>
		<h1 class="title">
		<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h1>
		<?php /** End Page Title * */ endif; ?>

	<?php /** Begin Category Title * */ if ($this->params->get('show_category_title', 1) OR $this->params->get('page_subheading')) : ?>
		<h2 class="title">
		<?php echo $this->escape($this->params->get('page_subheading')); ?>
			<?php if ($this->params->get('show_category_title')) : ?>
				<span class="subheading-category"><?php echo $this->category->title; ?></span>
			<?php endif; ?>
		</h2>
		<?php /** End Category Title * */ endif; ?>

	<?php /** Begin Description * */ if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
		<p class="category-desc">
		<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
				<img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
			<?php endif; ?>
			<?php if ($this->params->get('show_description') && $this->category->description) : ?>
				<?php echo JHtml::_('content.prepare', $this->category->description); ?>
			<?php endif; ?>
		<div class="clr"></div>
	</p>
<?php /** End Description * */ endif; ?>

<?php $leadingcount = 0; ?>
<?php /** Begin Leading Articles * */ if (!empty($this->lead_items)) : ?>
	<div class="jb-leading-articles">
	<?php foreach ($this->lead_items as &$item) : ?>
			<div class="leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>">
			<?php
			$this->item = &$item;
			echo $this->loadTemplate('item');
			?>
			</div>
				<?php
				$leadingcount++;
				?>
		<?php endforeach; ?>
	</div>
	<?php /** End Leading Articles * */ endif; ?>

<?php
$introcount = (count($this->intro_items));
$counter = 0;
?>
<?php /** Begin Articles * */ if (!empty($this->intro_items)) : ?>
	<?php
	$jb_row_prev = -1;
	foreach ($this->intro_items as $key => &$item) :
		?>
		<?php
		$key = ($key - $leadingcount) + 1;
		$rowcount = ( ((int) $key - 1) % (int) $this->columns) + 1;
		$row = $counter / $this->columns;

		if ($jb_row_prev == $row)
		{
			$jb_row_class = '';
		} else
		{
			$jb_row_prev = $row;
			$jb_row_class = 'row' . $gridsystem;
		}

		if ($rowcount == 1) :
			?>
			<div class="<?php echo $jb_row_class; ?> items-row cols-<?php echo (int) $this->columns; ?> <?php echo 'row-' . $row; ?>">
			<?php endif; ?>
			<div class="span<?php echo $gridrows / $this->columns; /* JB MAGIC */ ?> item column-<?php echo $rowcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>">
				<?php
				$this->item = &$item;
				echo $this->loadTemplate('item');
				?>
			</div>
			<?php $counter++; ?>
			<?php if (($rowcount == $this->columns) or ($counter == $introcount)): ?>
				<span class="row-separator"></span>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
<?php /** End Articles * */ endif; ?>

<?php /** Begin Article Links * */ if (!empty($this->link_items)) : ?>
	<div class="jb-article-links nav nav-list">
		<?php echo $this->loadTemplate('links'); ?>
	</div>
<?php /** End Article Links * */ endif; ?>

<?php /** Begin Category Children * */ if (!empty($this->children[$this->category->id]) && $this->maxLevel != 0) : ?>
	<div class="jb-cat-children">
		<h3 class="title">
			<?php echo JTEXT::_('JGLOBAL_SUBCATEGORIES'); ?>
		</h3>
		<?php echo $this->loadTemplate('children'); ?>
	</div>
<?php /** End Category Children * */ endif; ?>

<?php
/** Begin Pagination * */
if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) :
	?>
	<?php if ($this->params->def('show_pagination_results', 1)) : ?>
		<p class="counter pagination-centered"><?php echo $this->pagination->getPagesCounter(); ?></p>
	<?php endif; ?>
	<div class="pagination pagination-centered">
		<?php echo $this->pagination->getPagesLinks(); ?>
	</div>
<?php /** End Pagination * */ endif; ?>

</div>