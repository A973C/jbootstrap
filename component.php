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
defined('_JEXEC') or die('Restricted index access');

// Load and inititialize gantry class
require_once 'lib/gantry/gantry.php';

$jspath = $this->baseurl . '/templates/' . $this->template . '/js';
$imgpath = $this->baseurl . '/templates/' . $this->template . '/images';
?>
<?php if (JRequest::getString('type') == 'raw')
{ ?>
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
				if ($jquery)
				{
					?>
					<script src="<?php echo $jspath; ?>/jquery.js" type="text/javascript"></script>
					<?php
				}
				?>
			<script src="<?php echo $jspath; ?>/bootstrap.min.js" type="text/javascript"></script>
		</body>
	</html>
<?php
}

$gantry->finalize();