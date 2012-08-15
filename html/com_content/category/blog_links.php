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
?>


<div class="items-more">

    <h3><?php echo JText::_('COM_CONTENT_MORE_ARTICLES'); ?></h3>
    <ol>
<?php
foreach ($this->link_items as &$item) :
	?>
			<li>
				<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid)); ?>">
	<?php echo $item->title; ?></a>
			</li>
				<?php endforeach; ?>
    </ol>
</div>
