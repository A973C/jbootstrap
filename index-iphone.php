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
defined('GANTRY_VERSION') or die('Restricted index access');

?>
<!DOCTYPE html>
<html lang="<?php echo $gantry->language; ?>" >
    <head>
		<?php
		include 'gantry-head.php';
		?>
    </head>
    <body id="jb-body" <?php echo $gantry->displayBodyTag(); ?>>
		<?php /** Begin Drawer * */ if ($gantry->countModules('mobile-drawer')) : ?>
			<div id="jb-drawer" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
					<?php echo $gantry->displayModules('mobile-drawer', 'standard', 'standard'); ?>
				</div>
			</div>
		<?php /** End Drawer * */ endif; ?>
		<?php /** Begin Top * */ if ($gantry->countModules('mobile-top')) : ?>
			<div id="jb-top" class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container<?php echo $gridsystem ?>">
						<?php echo $gantry->displayModules('mobile-top', 'basic', 'basic'); ?>
					</div>
				</div>
			</div>
		<?php /** End Top * */ endif; ?>
		<?php /** Begin Header * */ if ($gantry->countModules('mobile-header')) : ?>
			<div id="jb-header" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
					<?php echo $gantry->displayModules('mobile-header', 'standard', 'standard'); ?>
				</div>
			</div>
		<?php /** End Header * */ endif; ?>
		<?php /** Begin Menu * */ if ($gantry->countModules('mobile-navigation')) : ?>
			<div id="jb-menu" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
					<?php echo $gantry->displayModules('mobile-navigation', 'basic', 'basic'); ?>
				</div>
			</div>
		<?php /** End Menu * */ endif; ?>
		<?php /** Begin Showcase * */ if ($gantry->countModules('mobile-showcase')) : ?>
			<div id="jb-showcase" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
					<?php echo $gantry->displayModules('mobile-showcase', 'standard', 'standard'); ?>
				</div>
			</div>
		<?php /** End Showcase * */ endif; ?>
		<?php /** Begin Main Body * */ ?>
		<?php echo $gantry->displayMainbody('mainbody', 'sidebar', 'standard', 'standard', 'standard', 'standard', 'standard'); ?>
		<?php /** End Main Body * */ ?>
		<?php /** Begin Footer * */ if ($gantry->countModules('mobile-footer')) : ?>
			<div id="jb-footer" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
					<?php echo $gantry->displayModules('mobile-footer', 'standard', 'standard'); ?>
				</div>
			</div>
		<?php /** End Footer * */ endif; ?>
		<?php /** Begin Copyright * */ if ($gantry->countModules('mobile-copyright')) : ?>
			<div id="jb-copyright" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
					<?php echo $gantry->displayModules('mobile-copyright', 'standard', 'standard'); ?>
				</div>
			</div>
		<?php /** End Copyright * */ endif; ?>
		<?php /** Begin Debug * */ if ($gantry->countModules('debug')) : ?>
			<div id="jb-debug" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
					<?php echo $gantry->displayModules('debug', 'standard', 'standard'); ?>
				</div>
			</div>
		<?php /** End Debug * */ endif; ?>
		<?php /** Begin Analytics * */ if ($gantry->countModules('analytics')) : ?>
			<?php echo $gantry->displayModules('analytics', 'basic', 'basic'); ?>
		<?php /** End Analytics * */ endif; ?>

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
		} elseif ($minified == 1)
		{
			// Compression - Combination
			$jsfiles[] = 'bootstrap.js';
		} else
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