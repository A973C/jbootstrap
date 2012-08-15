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


//JHtml::_('behavior.keepalive');
//JHtml::_('behavior.tooltip');
//JHtml::_('behavior.formvalidation');

// Create shortcut to parameters.
$params = $this->state->get('params');
?>

<script type="text/javascript">
    Joomla.submitbutton = function(task) {
        if (task == 'weblink.cancel' || document.formvalidator.isValid(document.id('adminForm'))) {
<?php echo $this->form->getField('description')->save(); ?>
            Joomla.submitform(task);
        }
        else {
            alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
        }
    }
</script>
<div class="edit<?php echo $this->pageclass_sfx; ?>">
    <?php if ($this->params->get('show_page_heading', 1)) : ?>
        <h1>
            <?php echo $this->escape($this->params->get('page_heading')); ?>
        </h1>
    <?php endif; ?>
    <form action="<?php echo JRoute::_('index.php?option=com_weblinks&view=form&w_id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-horizontal">
        <fieldset>
            <legend><?php echo JText::_('COM_WEBLINKS_LINK'); ?></legend>

            <div class="formelm control-group">
                <?php echo str_replace('class="hasTip', 'class="hasTip control-label', $this->form->getLabel('title')); ?>
                <div class="controls"><?php echo $this->form->getInput('title'); ?></div>
            </div>

            <div class="formelm control-group">
                <?php echo str_replace('class="hasTip', 'class="hasTip control-label', $this->form->getLabel('alias')); ?>
                <div class="controls"><?php echo $this->form->getInput('alias'); ?></div>
            </div>

            <div class="formelm control-group">
                <?php echo str_replace('class="hasTip', 'class="hasTip control-label', $this->form->getLabel('catid')); ?>
                <div class="controls"><?php echo $this->form->getInput('catid'); ?></div>
            </div>
            <div class="formelm control-group">
                <?php echo str_replace('class="hasTip', 'class="hasTip control-label', $this->form->getLabel('url')); ?>
                <div class="controls"><?php echo $this->form->getInput('url'); ?></div>
            </div>
            <?php if ($this->user->authorise('core.edit.state', 'com_weblinks.weblink')): ?>
                <div class="formelm control-group">
                    <?php echo str_replace('class="hasTip', 'class="hasTip control-label', $this->form->getLabel('state')); ?>
                    <div class="controls"><?php echo $this->form->getInput('state'); ?></div>
                </div>
            <?php endif; ?>
            <div class="formelm control-group">
                <?php echo str_replace('class="hasTip', 'class="hasTip control-label', $this->form->getLabel('language')); ?>
                <div class="controls"><?php echo $this->form->getInput('language'); ?></div>
            </div>
            <div class="formelm-buttons form-actions">
                <button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('weblink.save')">
                    <?php echo JText::_('JSAVE') ?>
                </button>
                <button type="button" class="btn" onclick="Joomla.submitbutton('weblink.cancel')">
                    <?php echo JText::_('JCANCEL') ?>
                </button>
            </div>
            <div>
                <?php echo str_replace('class="hasTip', 'class="hasTip control-label', $this->form->getLabel('description')); ?>
                <div class="controls"><?php echo $this->form->getInput('description'); ?></div>
            </div>
        </fieldset>

        <input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>
