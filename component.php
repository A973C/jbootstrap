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
defined('_JEXEC') or die('Restricted index access');

// Load and inititialize gantry class
require_once 'lib/gantry/gantry.php';

$jspath = $this->baseurl . '/templates/' . $this->template . '/js';
$imgpath = $this->baseurl . '/templates/' . $this->template . '/images';
?>
<?php
if (JRequest::getString('type') == 'raw')
{
	?>
	<jdoc:include type="component" />
	<?php
}
else
{
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html lang="<?php echo $gantry->language; ?>" >
		<head>
			<?php
			include 'gantry-head.php';
			?>
		</head>
		<body <?php echo $gantry->displayBodyTag(); ?>>
			<div id="jb-main">
				<jdoc:include type="component" />
			</div>

			<?php
			if ($twitterwidgets)
			{
				echo '<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
			}			
			
			$jsfiles = array();
			if ($jquery)
			{
				$jsfiles[] = 'jquery.js';
			}
			if ($googlecodeprettify)
			{
				$jsfiles[] = 'prettify.js';
			}

// Compression - None
			if ($minified == 0)
			{
				$jsfiles[] = 'bootstrap-transition.js';
				$jsfiles[] = 'bootstrap-alert.js';
				$jsfiles[] = 'bootstrap-modal.js';
				$jsfiles[] = 'bootstrap-dropdown.js';
				$jsfiles[] = 'bootstrap-scrollspy.js';
				$jsfiles[] = 'bootstrap-tab.js';
				$jsfiles[] = 'bootstrap-tooltip.js';
				$jsfiles[] = 'bootstrap-popover.js';
				$jsfiles[] = 'bootstrap-button.js';
				$jsfiles[] = 'bootstrap-collapse.js';
				$jsfiles[] = 'bootstrap-carousel.js';
				$jsfiles[] = 'bootstrap-typeahead.js';
				$jsfiles[] = 'bootstrap-affix.js';
			}
			elseif ($minified == 1)
			{
				// Compression - Combination
				$jsfiles[] = 'bootstrap.js';
			}
			else
			{
				// Compression - Combination + Minify
				$jsfiles[] = 'bootstrap.min.js';
			}

			foreach ($jsfiles as $jsfile)
			{
				echo '<script src="' . $jspath . '/' . $jsfile . '"></script>';
			}
			?>

		</body>
	</html>
	<?php
}

$gantry->finalize();