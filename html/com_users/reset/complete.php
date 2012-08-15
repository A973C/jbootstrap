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
//JHtml::_('behavior.formvalidation');

require_once(JPATH_LIBRARIES . '/gantry/gantry.php');
$gantry->init();
gantry_import('core.utilities.gantryjformfieldaccessor');
?>
<div class="reset-complete<?php echo $this->pageclass_sfx ?>">
<?php if ($this->params->get('show_page_heading')) : ?>
		<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h1>
		<?php endif; ?>

	<form action="<?php echo JRoute::_('index.php?option=com_users&task=reset.complete'); ?>" method="post" class="form-validate">

<?php foreach ($this->form->getFieldsets() as $fieldset): ?>
			<p><?php echo JText::_($fieldset->label); ?></p>		<fieldset>
				<dl class="dl-horizontal">
			<?php
			foreach ($this->form->getFieldset($fieldset->name) as $name => $field):
				$fa = new GantryJFormFieldAccessor($field);
				if ($fa->getType() == "password")
					$fa->addClass('inputbox');
				?>
						<dt><?php echo $field->label; ?></dt>
						<dd><?php echo $field->input; ?></dd>
	<?php endforeach; ?>
				</dl>
			</fieldset>
<?php endforeach; ?>

		<div>
			<div class="readon"><button type="submit" class="button btn"><?php echo JText::_('JSUBMIT'); ?></button></div>
<?php echo JHtml::_('form.token'); ?>
		</div>
	</form>
</div>