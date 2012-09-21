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

/*    <ul class="breadcrumb">
  <li>
  <a href="#">Home</a> <li class="divider">/</li>
  </li>
  <li>
  <a href="#">Library</a> <li class="divider">/</li>
  </li>
  <li class="active">Data</li>
  </ul> */
?>

<ul class="breadcrumb">
	<?php
	if ($params->get('showHere', 1))
	{
		echo '<li class="showHere">' . JText::_('MOD_BREADCRUMBS_HERE') . '</li>';
	}
	?>
	<?php
	for ($i = 0; $i < $count; $i++) :

		// If not the last item in the breadcrumbs add the separator
		if ($i < $count - 1)
		{
			if (!empty($list[$i]->link))
			{
				echo ' <li><a href="' . $list[$i]->link . '" class="pathway">' . $list[$i]->name . '</a></li>';
			} else
			{
				echo '<li>';
				echo $list[$i]->name;
				echo '</li>';
			}
			if ($i < $count - 2)
			{
				echo '<li class="divider">' . $separator . '</li>';
			}
		} else if ($params->get('showLast', 1))
		{ // when $i == $count -1 and 'showLast' is true
			if ($i > 0)
			{
				echo '<li class="divider">' . $separator . '</li>';
			}
			echo '<li>';
			echo $list[$i]->name;
			echo '</li>';
		}
	endfor;
	?>
</ul>
