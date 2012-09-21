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

//JHtml::_('behavior.keepalive');
//JHtml::_('behavior.formvalidation');
//JHtml::_('behavior.tooltip');
if (isset($this->error)) :
	?>
	<div class="contact-error">
	<?php echo $this->error; ?>
	</div>
	<?php endif; ?>

<div class="contact-form form-horizontal">
    <form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate">
        <fieldset>
            <legend><?php echo JText::_('COM_CONTACT_FORM_LABEL'); ?></legend>

            <div class="control-group"><?php echo str_replace('class="hasTip', 'class="control-label hasTip', $this->form->getLabel('contact_name')); ?>
                <div class="controls"><?php echo $this->form->getInput('contact_name'); ?></div></div>
            <div class="control-group"><?php echo str_replace('class="hasTip', 'class="control-label hasTip', $this->form->getLabel('contact_email')); ?>
                <div class="controls"><?php echo $this->form->getInput('contact_email'); ?></div></div>
            <div class="control-group"><?php echo str_replace('class="hasTip', 'class="control-label hasTip', $this->form->getLabel('contact_subject')); ?>
                <div class="controls"><?php echo $this->form->getInput('contact_subject'); ?></div></div>
            <div class="control-group"><?php echo str_replace('class="hasTip', 'class="control-label hasTip', $this->form->getLabel('contact_message')); ?>
                <div class="controls"><?php echo $this->form->getInput('contact_message'); ?></div></div>
<?php if ($this->params->get('show_email_copy'))
{ ?>
				<div class="control-group"><?php echo str_replace('class="hasTip', 'class="control-label hasTip', $this->form->getLabel('contact_email_copy')); ?>
					<div class="controls"><?php echo $this->form->getInput('contact_email_copy'); ?></div></div>
			<?php } ?>
			<?php //Dynamically load any additional fields from plugins. ?>
			<?php foreach ($this->form->getFieldsets() as $fieldset): ?>
				<?php if ($fieldset->name != 'contact'): ?>
					<?php $fields = $this->form->getFieldset($fieldset->name); ?>
					<?php foreach ($fields as $field): ?>
						<?php if ($field->hidden): ?>
							<?php echo $field->input; ?>
						<?php else: ?>
							<div class="control-group">

								<?php echo $field->label; ?>
								<?php if (!$field->required && $field->type != "Spacer"): ?>
									<span class="optional"><?php echo JText::_('COM_CONTACT_OPTIONAL'); ?></span>
								<?php endif; ?>

								<div class="controls"><?php echo $field->input; ?></div></div>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif ?>
			<?php endforeach; ?>
            <div class="form-actions"><button class="button validate btn btn-primary" type="submit"><?php echo JText::_('COM_CONTACT_CONTACT_SEND'); ?></button>
                <input type="hidden" name="option" value="com_contact" />
                <input type="hidden" name="task" value="contact.submit" />
                <input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
                <input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
				<?php echo JHtml::_('form.token'); ?>
            </div>

        </fieldset>
    </form>
</div>
