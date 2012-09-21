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

$jspath = $this->baseurl . '/templates/' . $this->template . '/js';
$imgpath = $this->baseurl . '/templates/' . $this->template . '/images';
$lesspath = $this->baseurl . '/templates/' . $this->template . '/css/less';

$gridsystem = $gantry->get('gridsystem');
$responsive = $gantry->get('responsive');
$minified = $gantry->get('minified');
$jquery = $gantry->get('jquery');
$awesome = $gantry->get('awesome');
$googlecodeprettify = $gantry->get('googlecodeprettify');
$twitterwidgets = $gantry->get('twitterwidgets');
$docscss = $gantry->get('docscss');
$lesscompiler = $gantry->get('lesscompiler');

$gantry->displayHead();

$gridrows = ($gridsystem == '' ? 9 : 12);

if ($responsive)
{
	echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>\n";
}

$cssfiles = array();

// Compression - None
if ($minified == 0)
{
	$cssfiles[] = 'bootstrap.css';
	if ($responsive)
	{
		$cssfiles[] = 'bootstrap-responsive.css';
	}
	if ($awesome)
	{
		$cssfiles[] = 'font-awesome.css';
	}
	if ($googlecodeprettify)
	{
		$cssfiles[] = 'prettify.css';
	}
	if ($docscss)
	{
		$cssfiles[] = 'docs.css';
	}
}
else
{
	// Compression - Combination - Combination + Minify
	$cssfiles[] = 'bootstrap.min.css';
	if ($responsive)
	{
		$cssfiles[] = 'bootstrap-responsive.min.css';
	}
	if ($awesome)
	{
		$cssfiles[] = 'font-awesome.min.css';
	}
	if ($googlecodeprettify)
	{
		$cssfiles[] = 'prettify.css';
	}
	if ($docscss)
	{
		$cssfiles[] = 'docs.min.css';
	}
}

// Bootstrap files should be included before *-override.css (priority < 5)
$gantry->addStyles($cssfiles, 4);
?>

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src=\\"//html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
<![endif]-->

<link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<link rel="apple-touch-icon" href="<?php echo $imgpath; ?>/apple-touch-icon-iphone.png"/>
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $imgpath; ?>/apple-touch-icon-ipad.png"/>
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $imgpath; ?>/apple-touch-icon-114x114.png"/>
<?php
if ($lesscompiler)
{
	echo "<link rel=\"stylesheet/less\" type=\"text/css\" href=\"" . $lesspath . "/styles.less\"/>\n";
	echo "<script src=\"" . $jspath . "/less.min.js\" type=\"text/javascript\"></script>";
}
