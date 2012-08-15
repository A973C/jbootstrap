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

//JHtml::_('behavior.tooltip');
?>
<div class="profile<?php echo $this->pageclass_sfx ?>">
<?php if ($this->params->get('show_page_heading')) : ?>
		<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h1>
		<?php endif; ?>

	<?php echo $this->loadTemplate('core'); ?>

	<?php echo $this->loadTemplate('params'); ?>

	<?php echo $this->loadTemplate('custom'); ?>

	<?php if (JFactory::getUser()->id == $this->data->id) : ?>
		<a href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id=' . (int) $this->data->id); ?>">
		<?php echo JText::_('COM_USERS_Edit_Profile'); ?></a>
		<?php endif; ?>
</div>
