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
?>

<fieldset id="users-profile-core">
    <legend>
<?php echo JText::_('COM_USERS_PROFILE_CORE_LEGEND'); ?>
    </legend>
    <dl class="dl-horizontal">
        <dt>
<?php echo JText::_('COM_USERS_PROFILE_NAME_LABEL'); ?>
        </dt>
        <dd>
		<?php echo $this->data->name; ?>
        </dd>
        <dt>
			<?php echo JText::_('COM_USERS_PROFILE_USERNAME_LABEL'); ?>
        </dt>
        <dd>
		<?php echo htmlspecialchars($this->data->username); ?>
        </dd>
        <dt>
			<?php echo JText::_('COM_USERS_PROFILE_REGISTERED_DATE_LABEL'); ?>
        </dt>
        <dd>
		<?php echo JHtml::_('date', $this->data->registerDate); ?>
        </dd>
        <dt>
			<?php echo JText::_('COM_USERS_PROFILE_LAST_VISITED_DATE_LABEL'); ?>
        </dt>

		<?php if ($this->data->lastvisitDate != '0000-00-00 00:00:00')
		{ ?>
			<dd>
			<?php echo JHtml::_('date', $this->data->lastvisitDate); ?>
			</dd>
			<?php } else
			{
				?>
			<dd>
				<?php echo JText::_('COM_USERS_PROFILE_NEVER_VISITED'); ?>
			</dd>
		<?php } ?>

    </dl>
</fieldset>
