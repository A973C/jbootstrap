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

JHtml::addIncludePath(JPATH_COMPONENT . DS . 'helpers');
?>
<div class="archive<?php echo $this->pageclass_sfx; ?>">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
		<h1 class="title">
		<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h1>
		<?php endif; ?>
    <form id="adminForm" action="<?php echo JRoute::_('index.php') ?>" method="post" class="well form-inline">
        <fieldset class="filters">
            <legend class="hidelabeltxt"><?php echo JText::_('JGLOBAL_FILTER_LABEL'); ?></legend>
            <div class="filter-search">
<?php if ($this->params->get('filter_field') != 'hide') : ?>
					<label class="filter-search-lbl" for="filter-search"><?php echo JText::_('COM_CONTENT_' . $this->params->get('filter_field') . '_FILTER_LABEL') . '&#160;'; ?></label>
					<input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->filter); ?>" class="inputbox" onchange="document.getElementById('adminForm').submit();" />
<?php endif; ?>

				<?php echo $this->form->monthField; ?>
				<?php echo $this->form->yearField; ?>
				<?php echo $this->form->limitField; ?>
                <button type="submit" class="button btn"><?php echo JText::_('JGLOBAL_FILTER_BUTTON'); ?></button>
            </div>
            <input type="hidden" name="view" value="archive" />
            <input type="hidden" name="option" value="com_content" />
            <input type="hidden" name="limitstart" value="0" />
        </fieldset>
    </form>

<?php echo $this->loadTemplate('items'); ?>

</div>