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

$lang = JFactory::getLanguage();
$upper_limit = $lang->getUpperLimitSearchWord();
?>

<form id="searchForm" action="<?php echo JRoute::_('index.php?option=com_search'); ?>" method="post">

    <fieldset class="word">
        <label for="search-searchword">
            <?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?>
        </label>
        <input type="text" name="searchword" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->origkeyword); ?>" class="inputbox input-medium search-query" />
        <button name="Search" onclick="this.form.submit()" class="button btn"><?php echo JText::_('COM_SEARCH_SEARCH'); ?></button>
        <input type="hidden" name="task" value="search" />
    </fieldset>

    <div class="searchintro<?php echo $this->params->get('pageclass_sfx'); ?>">
        <?php if (!empty($this->searchword)): ?>
            <p><?php echo JText::plural('COM_SEARCH_SEARCH_KEYWORD_N_RESULTS', $this->total); ?></p>
        <?php endif; ?>
    </div>

    <br/>
    <fieldset class="phrases">
        <legend><?php echo JText::_('COM_SEARCH_FOR'); ?>
        </legend>

        <div class="phrases-box">                        
            <label class="radiobtn radio inline" id="searchphraseall-lbl" for="searchphraseall"><input type="radio" checked="checked" value="all" id="searchphraseall" name="searchphrase"> <?php echo JText::_('COM_SEARCH_ALL_WORDS'); ?></label>
            <label class="radiobtn radio inline" id="searchphraseany-lbl" for="searchphraseany"><input type="radio" value="any" id="searchphraseany" name="searchphrase"> <?php echo JText::_('COM_SEARCH_ANY_WORDS'); ?></label>
            <label class="radiobtn radio inline" id="searchphraseexact-lbl" for="searchphraseexact"><input type="radio" value="exact" id="searchphraseexact" name="searchphrase"> <?php echo JText::_('COM_SEARCH_EXACT_PHRASE'); ?></label>
        </div>

        <div class="ordering-box">
            <label for="ordering" class="ordering">
                <?php echo JText::_('COM_SEARCH_ORDERING'); ?>
            </label>
            <?php echo $this->lists['ordering']; ?>
        </div>
    </fieldset>

    <?php if ($this->params->get('search_areas', 1)) : ?>

        <br/>
        <fieldset class="form-only">
            <legend><?php echo JText::_('COM_SEARCH_SEARCH_ONLY'); ?></legend>
            <?php
            foreach ($this->searchareas['search'] as $val => $txt) :
                $checked = is_array($this->searchareas['active']) && in_array($val, $this->searchareas['active']) ? 'checked="checked"' : '';
                ?>
                <label for="area-<?php echo $val; ?>" class="checkbox inline">
                    <input type="checkbox" name="areas[]" value="<?php echo $val; ?>" id="area-<?php echo $val; ?>" <?php echo $checked; ?> /> <?php echo JText::_($txt); ?>
                </label>
            <?php endforeach; ?>
        </fieldset>
    <?php endif; ?>

    <?php if ($this->total > 0) : ?>

        <fieldset class="form-limit">
            <label for="limit">
                <?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?> <?php echo $this->pagination->getLimitBox(); ?>
            </label>            
        </fieldset>
        <p class="counter pagination-centered">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>

    <?php endif; ?>

</form>
