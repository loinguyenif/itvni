<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_docshop
 * @copyright   (c) 2026. All rights reserved.
 * @license     GNU General Public License v3.0
 */

defined('_JEXEC') or die;
?>

<form action="<?php echo JRoute::_('index.php?option=com_docshop&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
    <div class="form-horizontal">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_DOCSHOP_DOCUMENT_DETAILS'); ?></legend>
            <div class="row-fluid">
                <div class="span6">
                    <?php echo $this->form->renderField('title'); ?>
                    <?php echo $this->form->renderField('description'); ?>
                    <?php echo $this->form->renderField('price'); ?>
                    <?php echo $this->form->renderField('category_id'); ?>
                </div>
                <div class="span6">
                    <?php echo $this->form->renderField('file'); ?>
                    <?php echo $this->form->renderField('published'); ?>
                    <?php echo $this->form->renderField('ordering'); ?>
                </div>
            </div>
        </fieldset>
    </div>
    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
</form>