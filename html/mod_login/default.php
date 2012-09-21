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
defined('JPATH_BASE') or die('Restricted access');

//JHtml::_('behavior.keepalive');
?>
<?php if ($type == 'logout') : ?>
	<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" name="form-login">
	<?php if ($params->get('greeting')) : ?>
			<div class="login-greeting">
			<?php
			if ($params->get('name') == 0) :
				{
					echo JText::sprintf('MOD_LOGIN_HINAME', $user->get('name'));
				} else :
				{
					echo JText::sprintf('MOD_LOGIN_HINAME', $user->get('username'));
				} endif;
			?>
			</div>
		<?php endif; ?>
		<div class="readon form-actions">
			<input type="submit" name="Submit" class="button btn" value="<?php echo JText::_('JLOGOUT'); ?>" />
		</div>

		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.logout" />
		<input type="hidden" name="return" value="<?php echo $return; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</form>
<?php else : ?>
	<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" name="form-login">
		<?php if ($params->get('pretext')): ?>
			<div class="pretext">
				<p><?php echo $params->get('pretext'); ?></p>
			</div>
		<?php endif; ?>
		<fieldset class="userdata">
			<p >
				<label ><?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?></label>
				<input  type="text" name="username" class="inputbox"  size="18" />
			</p>
			<p >
				<label ><?php echo JText::_('JGLOBAL_PASSWORD') ?></label>
				<input type="password" name="password" class="inputbox" size="18"  />
			</p>
			<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
				<p >
					<label class="checkbox inline" >
						<input type="checkbox" name="remember" class="inputbox" value="yes"/><?php echo JText::_('MOD_LOGIN_REMEMBER_ME') ?>
					</label>
				</p>
			<?php endif; ?>
			<div class="readon form-actions"><input type="submit" name="Submit" class="btn btn-primary" value="<?php echo JText::_('JLOGIN') ?>" /></div>
			<input type="hidden" name="option" value="com_users" />
			<input type="hidden" name="task" value="user.login" />
			<input type="hidden" name="return" value="<?php echo $return; ?>" />
			<?php echo JHtml::_('form.token'); ?>
		</fieldset>
		<ul class="nav nav-list">
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
					<?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_PASSWORD'); ?></a>
			</li>
			<li>
				<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
					<?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_USERNAME'); ?></a>
			</li>
			<?php
			$usersConfig = JComponentHelper::getParams('com_users');
			if ($usersConfig->get('allowUserRegistration')) :
				?>
				<li>
					<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
						<?php echo JText::_('MOD_LOGIN_REGISTER'); ?></a>
				</li>
			<?php endif; ?>
		</ul>
		<?php if ($params->get('posttext')): ?>
			<div class="posttext">
				<p><?php echo $params->get('posttext'); ?></p>
			</div>
		<?php endif; ?>
	</form>
<?php endif; ?>
