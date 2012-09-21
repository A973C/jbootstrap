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
defined('GANTRY_VERSION') or die('Restricted access');

gantry_import('core.gantrylayout');

/**
 *
 * @package gantry
 * @subpackage html.layouts
 */
class GantryLayoutOrderedBody_MainBody extends GantryLayout {

    var $render_params = array(
        'schema' => null,
        'pushPull' => null,
        'classKey' => null,
        'sidebars' => '',
        'contentTop' => null,
        'contentBottom' => null,
        'extraClass' => ''
    );

    function render($params = array()) {
        global $gantry;

        $fparams = $this->_getParams($params);

        // logic to determine if the component should be displayed
        $display_component = !($gantry->get("component-enabled", true) == false && JRequest::getVar('view') == 'featured');
        ob_start();

        $mbClasses = trim("jb-grid-" . trim($fparams->schema['mb'] . " " . $fparams->pushPull[0] . " " . $fparams->extraClass));
        $mbClasses = preg_replace('/\s\s+/', ' ', $mbClasses);

// XHTML LAYOUT
        ?>          <div id="jb-main" class="<?php echo $fparams->classKey; ?>">
        <?php foreach ($fparams->schema as $position => $value): ?>
            <?php if ($position != 'mb'): ?>
                <?php echo $fparams->sidebars[$position]; ?>
            <?php else: ?>
                    <div class="<?php echo $mbClasses; ?>">
                        <?php if (isset($fparams->contentTop)) : ?>
                            <div id="jb-content-top">
                                <?php echo $fparams->contentTop; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($display_component) : ?>
                            <div id="jb-mainbody">
                                <div class="component-content">
                                    <jdoc:include type="component" />
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($fparams->contentBottom)) : ?>
                            <div id="jb-content-bottom">
                                <?php echo $fparams->contentBottom; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php
        return ob_get_clean();
    }

}