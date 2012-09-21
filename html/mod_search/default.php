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
?>
<form action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-search form-inline">
	<div class="search<?php echo $moduleclass_sfx ?>">
<?php
//$output = '<label for="mod-search-searchword">'.$label.'</label><input name="searchword" id="mod-search-searchword" maxlength="'.$maxlength.'"  class="inputbox'.$moduleclass_sfx.'" type="text" size="'.$width.'" value="'.$text.'"  onblur="if (this.value==\'\') this.value=\''.$text.'\';" onfocus="if (this.value==\''.$text.'\') this.value=\'\';" />';
$output = '<input name="searchword" id="mod-search-searchword" maxlength="' . $maxlength . '"  class="inputbox' . $moduleclass_sfx . '" type="text" size="' . $width . '" value="' . $text . '"  onblur="if (this.value==\'\') this.value=\'' . $text . '\';" onfocus="if (this.value==\'' . $text . '\') this.value=\'\';" />';

if ($button) :
	if ($imagebutton) :
		$button = '<input type="image" value="' . $button_text . '" class="button' . $moduleclass_sfx . '" src="' . $img . '" onclick="this.form.searchword.focus();"/>';
	else :
		$button = '<input type="submit" value="' . $button_text . '" class="button' . $moduleclass_sfx . '" onclick="this.form.searchword.focus();"/>';
	endif;
endif;

switch ($button_pos) :
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

echo $output;
?>
		<input type="hidden" name="task" value="search" />
		<input type="hidden" name="option" value="com_search" />
		<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
	</div>
</form>
