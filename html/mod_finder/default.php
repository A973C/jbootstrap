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
defined('JPATH_BASE') or die('Restricted access');

//JHtml::_('behavior.framework');
JHtml::addIncludePath(JPATH_SITE . '/components/com_finder/helpers/html');

// Load the smart search component language file.
$lang = JFactory::getLanguage();
$lang->load('com_finder', JPATH_SITE);

$suffix = $params->get('moduleclass_sfx');
$output = '<div class="controls"><input type="text" name="q" id="mod-finder-searchword" class="inputbox search-query" size="' . $params->get('field_size', 20) . '" value="' . htmlspecialchars(JFactory::getApplication()->input->get('q', '', 'string')) . '" /></div>';
$button = '';
$label = '';

if ($params->get('show_label', 1))
{
	$label = '<label for="mod-finder-searchword" class="control-label finder' . $suffix . '">' . $params->get('alt_label', JText::_('JSEARCH_FILTER_SUBMIT')) . '</label>';

	switch ($params->get('label_pos', 'left')):
		case 'top' :
			$label = $label . '<br />';
			$output = $label . $output;
			break;

		case 'bottom' :
			$label = '<br />' . $label;
			$output = $output . $label;
			break;

		case 'right' :
			$output = $output . $label;
			break;

		case 'left' :
		default :
			$output = $label . $output;
			break;
	endswitch;
}

if ($params->get('show_button', 1))
{
	$button = '<div class="form-actions"><button class="btn btn-primary button' . $suffix . ' finder' . $suffix . '" type="submit">' . JText::_('MOD_FINDER_SEARCH_BUTTON') . '</button></div>';

	switch ($params->get('button_pos', 'right')):
		case 'top' :
			$button = $button . '<br />';
			$output = $button . $output;
			break;

		case 'bottom' :
			$button = '<br />' . $button;
			$output = $output . $button;
			break;

		case 'right' :
			$output = $output . $button;
			break;

		case 'left' :
		default :
			$output = $button . $output;
			break;
	endswitch;
}

JHtml::stylesheet('com_finder/finder.css', false, true, false);
?>

<script type="text/javascript">
    //<![CDATA[
    window.addEvent('domready', function() {
        var value;

        // Set the input value if not already set.
        if (!document.id('mod-finder-searchword').getProperty('value')) {
            document.id('mod-finder-searchword').setProperty('value', '<?php echo JText::_('MOD_FINDER_SEARCH_VALUE', true); ?>');
        }

        // Get the current value.
        value = document.id('mod-finder-searchword').getProperty('value');

        // If the current value equals the default value, clear it.
        document.id('mod-finder-searchword').addEvent('focus', function() {
            if (this.getProperty('value') == '<?php echo JText::_('MOD_FINDER_SEARCH_VALUE', true); ?>') {
                this.setProperty('value', '');
            }
        });

        // If the current value is empty, set the previous value.
        document.id('mod-finder-searchword').addEvent('blur', function() {
            if (!this.getProperty('value')) {
                this.setProperty('value', value);
            }
        });

        document.id('mod-finder-searchform').addEvent('submit', function(e){
            e = new Event(e);
            e.stop();

            // Disable select boxes with no value selected.
            if (document.id('mod-finder-advanced') != null) {
                document.id('mod-finder-advanced').getElements('select').each(function(s){
                    if (!s.getProperty('value')) {
                        s.setProperty('disabled', 'disabled');
                    }
                });
            }

            document.id('mod-finder-searchform').submit();
        });

        /*
         * This segment of code sets up the autocompleter.
         */
<?php if ($params->get('show_autosuggest', 1)): ?>
	<?php JHtml::script('com_finder/autocompleter.js', false, true); ?>
				var url = '<?php echo JRoute::_('index.php?option=com_finder&task=suggestions.display&format=json&tmpl=component', false); ?>';
				var ModCompleter = new Autocompleter.Request.JSON(document.id('mod-finder-searchword'), url, {'postVar': 'q'});
<?php endif; ?>
	});
	//]]>
</script>

<form id="mod-finder-searchform" action="<?php echo JRoute::_($route); ?>" method="get" class="form-horizontal">
    <div class="finder<?php echo $suffix; ?> control-group">
		<?php
// Show the form fields.
		echo $output;
		?>

		<?php if ($params->get('show_advanced', 1)): ?>
			<?php if ($params->get('show_advanced', 1) == 2): ?>
				<br />
				<a href="<?php echo JRoute::_($route); ?>"><?php echo JText::_('COM_FINDER_ADVANCED_SEARCH'); ?></a>
			<?php elseif ($params->get('show_advanced', 1) == 1): ?>
				<div id="mod-finder-advanced">
					<?php echo JHtml::_('filter.select', $query, $params); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php echo modFinderHelper::getGetFields($route); ?>
    </div>
</form>
