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
<div class="contact-category<?php echo $this->pageclass_sfx; ?>">
    <?php if ($this->params->def('show_page_heading', 1)) : ?>
        <h1>
            <?php echo $this->escape($this->params->get('page_heading')); ?>
        </h1>
    <?php endif; ?>
    <?php if ($this->params->get('show_category_title', 1)) : ?>
        <h2>
            <?php echo JHtml::_('content.prepare', $this->category->title); ?>
        </h2>
    <?php endif; ?>
    <?php if ($this->params->def('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
        <div class="category-desc">
            <?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
                <img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
            <?php endif; ?>
            <?php if ($this->params->get('show_description') && $this->category->description) : ?>
                <?php echo JHtml::_('content.prepare', $this->category->description); ?>
            <?php endif; ?>
            <div class="clr"></div>
        </div>
    <?php endif; ?>

    <?php echo $this->loadTemplate('items'); ?>

    <?php if (!empty($this->children[$this->category->id]) && $this->maxLevel != 0) : ?>
        <div class="cat-children">
            <h3><?php echo JText::_('JGLOBAL_SUBCATEGORIES'); ?></h3>
            <?php echo $this->loadTemplate('children'); ?>
        </div>
    <?php endif; ?>
</div>
