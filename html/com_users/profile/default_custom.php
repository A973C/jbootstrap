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

JLoader::register('JHtmlUsers', JPATH_COMPONENT . '/helpers/html/users.php');
JHtml::register('users.spacer', array('JHtmlUsers', 'spacer'));

$fieldsets = $this->form->getFieldsets();
if (isset($fieldsets['core']))
	unset($fieldsets['core']);
if (isset($fieldsets['params']))
	unset($fieldsets['params']);

foreach ($fieldsets as $group => $fieldset): // Iterate through the form fieldsets
	$fields = $this->form->getFieldset($group);
	if (count($fields)):
		?>
		<fieldset id="users-profile-custom" class="users-profile-custom-<?php echo $group; ?>">
		<?php if (isset($fieldset->label)):// If the fieldset has a label set, display it as the legend. ?>
				<legend><?php echo JText::_($fieldset->label); ?></legend>
			<?php endif; ?>
			<dl class="dl-horizontal">
			<?php
			foreach ($fields as $field):
				if (!$field->hidden) :
					?>
						<dt><?php echo $field->title; ?></dt>
						<dd>
							<?php if (JHtml::isRegistered('users.' . $field->id)): ?>
								<?php echo JHtml::_('users.' . $field->id, $field->value); ?>
							<?php elseif (JHtml::isRegistered('users.' . $field->fieldname)): ?>
								<?php echo JHtml::_('users.' . $field->fieldname, $field->value); ?>
							<?php elseif (JHtml::isRegistered('users.' . $field->type)): ?>
								<?php echo JHtml::_('users.' . $field->type, $field->value); ?>
							<?php else: ?>
								<?php echo JHtml::_('users.value', $field->value); ?>
							<?php endif; ?>
						</dd>
					<?php endif; ?>
				<?php endforeach; ?>
			</dl>
		</fieldset>
	<?php endif; ?>
<?php endforeach; ?>
