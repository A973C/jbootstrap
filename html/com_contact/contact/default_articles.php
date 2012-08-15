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
<?php if ($this->params->get('show_articles')) : ?>
	<div class="contact-articles">

		<ol>
	<?php foreach ($this->item->articles as $article) : ?>
				<li>
				<?php $link = JRoute::_('index.php?option=com_content&view=article&id=' . $article->id); ?>
				<?php echo '<a href="' . $link . '">' ?>
					<?php echo $article->text = htmlspecialchars($article->title, ENT_COMPAT, 'UTF-8'); ?>
					</a>
				</li>
				<?php endforeach; ?>
		</ol>
	</div>
		<?php endif; ?>
