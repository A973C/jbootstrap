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

// load and inititialize gantry class
require_once('lib/gantry/gantry.php');

//JHTML::_('behavior.framework', false);
//JHTML::_('behavior.mootools', false);
?>
<!DOCTYPE html>
<html lang="<?php echo $gantry->language; ?>" >
    <head>
<?php
include('gantry-head.php');
?>
    </head>
    <body id="jb-body" <?php echo $gantry->displayBodyTag(); ?>>
<?php /** Begin Drawer * */ if ($gantry->countModules('drawer')) : ?>
			<div id="jb-drawer" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
	<?php echo $gantry->displayModules('drawer', 'standard', 'standard'); ?>
				</div>
			</div>
<?php /** End Drawer * */ endif; ?>
		<?php /** Begin Top * */ if ($gantry->countModules('top')) : ?>
			<div id="jb-top" class="navbar navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container<?php echo $gridsystem ?>">
	<?php echo $gantry->displayModules('top', 'basic', 'basic'); ?>
					</div>
				</div>
			</div>
<?php /** End Top * */ endif; ?>
		<?php /** Begin Header * */ if ($gantry->countModules('header')) : ?>
			<div id="jb-header" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
	<?php echo $gantry->displayModules('header', 'standard', 'standard'); ?>
				</div>
			</div>
<?php /** End Header * */ endif; ?>
		<?php /** Begin Menu * */ if ($gantry->countModules('navigation')) : ?>
			<div id="jb-menu" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
	<?php echo $gantry->displayModules('navigation', 'basic', 'basic'); ?>
				</div>
			</div>
<?php /** End Menu * */ endif; ?>
		<?php /** Begin Showcase * */ if ($gantry->countModules('showcase')) : ?>
			<div id="jb-showcase" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
	<?php echo $gantry->displayModules('showcase', 'standard', 'standard'); ?>
				</div>
			</div>
<?php /** End Showcase * */ endif; ?>
		<?php /** Begin Feature * */ if ($gantry->countModules('feature')) : ?>
			<div id="jb-feature" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
	<?php echo $gantry->displayModules('feature', 'standard', 'standard'); ?>
				</div>
			</div>
<?php /** End Feature * */ endif; ?>
		<?php /** Begin Utility * */ if ($gantry->countModules('utility')) : ?>
			<div id="jb-utility" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
	<?php echo $gantry->displayModules('utility', 'standard', 'basic'); ?>
				</div>
			</div>
<?php /** End Utility * */ endif; ?>
		<?php /** Begin Breadcrumbs * */ if ($gantry->countModules('breadcrumb')) : ?>
			<div id="jb-breadcrumbs" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
	<?php echo $gantry->displayModules('breadcrumb', 'standard', 'standard'); ?>
				</div>
			</div>
<?php /** End Breadcrumbs * */ endif; ?>
		<?php /** Begin Main Top * */ if ($gantry->countModules('maintop')) : ?>
			<div id="jb-maintop" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
	<?php echo $gantry->displayModules('maintop', 'standard', 'standard'); ?>
				</div>
			</div>
<?php /** End Main Top * */ endif; ?>
		<?php /** Begin Main Body * */ ?>
		<?php echo $gantry->displayMainbody('mainbody', 'sidebar', 'standard', 'standard', 'standard', 'standard', 'standard'); ?>
		<?php /** End Main Body * */ ?>
		<?php /** Begin Main Bottom * */ if ($gantry->countModules('mainbottom')) : ?>
			<div id="jb-mainbottom" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
	<?php echo $gantry->displayModules('mainbottom', 'standard', 'standard'); ?>
				</div></div>
				<?php /** End Main Bottom * */ endif; ?>
		<?php /** Begin Bottom * */ if ($gantry->countModules('bottom')) : ?>
			<div id="jb-bottom" class="container<?php echo $gridsystem ?>">
				<div class="row<?php echo $gridsystem ?>">
	<?php echo $gantry->displayModules('bottom', 'standard', 'standard'); ?>
				</div></div>
		</div>
<?php /** End Bottom * */ endif; ?>
	<?php /** Begin Footer * */ if ($gantry->countModules('footer')) : ?>
		<div id="jb-footer" class="container<?php echo $gridsystem ?>">
			<div class="row<?php echo $gridsystem ?>">
	<?php echo $gantry->displayModules('footer', 'standard', 'standard'); ?>
			</div>
		</div>
<?php /** End Footer * */ endif; ?>
	<?php /** Begin Copyright * */ if ($gantry->countModules('copyright')) : ?>
		<div id="jb-copyright" class="container<?php echo $gridsystem ?>">
			<div class="row<?php echo $gridsystem ?>">
	<?php echo $gantry->displayModules('copyright', 'standard', 'standard'); ?>
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

	<?php if ($jquery) : ?>
		<script src="<?php echo $jspath; ?>/jquery.js" type="text/javascript"></script>
	<?php endif; ?>
	<script src="<?php echo $jspath; ?>/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
<?php
$gantry->finalize();
?>
