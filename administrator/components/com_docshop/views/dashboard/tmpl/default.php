<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_docshop
 * @copyright   (c) 2026. All rights reserved.
 * @license     GNU General Public License v3.0
 */

defined('_JEXEC') or die;
?>

<div id="j-main-container">
    <h1><?php echo JText::_('COM_DOCSHOP_DASHBOARD'); ?></h1>
    <p><?php echo JText::_('COM_DOCSHOP_DASHBOARD_DESC'); ?></p>

    <div class="row-fluid">
        <div class="span4">
            <div class="well">
                <h3><?php echo JText::_('COM_DOCSHOP_DOCUMENTS'); ?></h3>
                <a href="<?php echo JRoute::_('index.php?option=com_docshop&view=documents'); ?>" class="btn btn-primary">
                    <?php echo JText::_('COM_DOCSHOP_MANAGE_DOCUMENTS'); ?>
                </a>
            </div>
        </div>
        <div class="span4">
            <div class="well">
                <h3><?php echo JText::_('COM_DOCSHOP_CATEGORIES'); ?></h3>
                <a href="<?php echo JRoute::_('index.php?option=com_docshop&view=categories'); ?>" class="btn btn-primary">
                    <?php echo JText::_('COM_DOCSHOP_MANAGE_CATEGORIES'); ?>
                </a>
            </div>
        </div>
        <div class="span4">
            <div class="well">
                <h3><?php echo JText::_('COM_DOCSHOP_ORDERS'); ?></h3>
                <a href="<?php echo JRoute::_('index.php?option=com_docshop&view=orders'); ?>" class="btn btn-primary">
                    <?php echo JText::_('COM_DOCSHOP_VIEW_ORDERS'); ?>
                </a>
            </div>
        </div>
    </div>
</div>
