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

// If the page class is defined, add to class as suffix.
// It will be a separate class if the user starts it with a space
?>
<div class="blog-featured<?php echo $this->pageclass_sfx; ?>">
<?php if ($this->params->get('show_page_heading') != 0): ?>
		<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h1>
		<?php endif; ?>

	<?php echo $this->loadTemplate('items'); ?>
	<?php if ($this->params->def('show_pagination', 2) == 1 || ($this->params->get('show_pagination') == 2 && $this->pagination->get('pages.total') > 1)) : ?>
		<?php if ($this->params->def('show_pagination_results', 1)) : ?>
			<p class="counter pagination-centered">
			<?php echo $this->pagination->getPagesCounter(); ?>
			</p>
			<?php endif; ?>
		<div class="pagination">
		<?php echo $this->pagination->getPagesLinks(); ?>
		</div>
		<?php endif; ?>

</div>
