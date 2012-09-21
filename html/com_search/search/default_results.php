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
defined('_JEXEC') or die('Restricted access');
?>

<dl class="search-results<?php echo $this->pageclass_sfx; ?>">
<?php foreach ($this->results as $result) : ?>
		<dt class="result-title">
		<?php echo $this->pagination->limitstart + $result->count . '. '; ?>
		<?php if ($result->href) : ?>
			<a href="<?php echo JRoute::_($result->href); ?>"<?php if ($result->browsernav == 1) : ?> target="_blank"<?php endif; ?>>
			<?php echo $this->escape($result->title); ?>
			</a>
			<?php else: ?>
				<?php echo $this->escape($result->title); ?>
		<?php endif; ?>
		</dt>
		<?php if ($result->section) : ?>
			<dd class="result-category">
				<span class="small<?php echo $this->pageclass_sfx; ?>">
					(<?php echo $this->escape($result->section); ?>)
				</span>
			</dd>
	<?php endif; ?>
		<dd class="result-text">
		<?php echo $result->text; ?>
		</dd>
			<?php if ($this->params->get('show_date')) : ?>
			<dd class="result-created<?php echo $this->pageclass_sfx; ?>">
			<?php echo JText::sprintf('JGLOBAL_CREATED_DATE_ON', $result->created); ?>
			</dd>
			<?php endif; ?>
		<?php endforeach; ?>
</dl>

<div class="pagination">
<?php echo $this->pagination->getPagesLinks(); ?>
</div>
