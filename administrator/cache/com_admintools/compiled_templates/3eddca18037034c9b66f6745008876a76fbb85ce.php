<?php /* /home/tekweb/public_html/libraries/fof40/ViewTemplates/Common/browse.fef.blade.php */ ?>
<?php
/**
 * @package     FOF
 * @copyright   Copyright (c)2010-2021 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license     GNU GPL version 3 or later
 */

defined('_JEXEC') || die;

/**
 * Template for Browse views using the FEF renderer
 *
 * Use this by extending it (I'm using -at- instead of the actual at-sign)
 * -at-extends('any:lib_fof40/Common/browse')
 *
 * Override the following sections in your Blade template:
 *
 * browse-page-top
 *      Content to put above the form
 *
 * browse-page-bottom
 *      Content to put below the form
 *
 * browse-filters
 *      Filters to place above the table. They are placed inside an inline form. Wrap them in
 *      <div class="akeeba-filter-element akeeba-form-group">
 *
 * browse-table-header
 *      The table header. At the very least you need to add the table column headers. You can
 *      optionally add one or more <tr> with filters at the top.
 *
 * browse-table-body-withrecords
 *      Loop through the records and create <tr>s.
 *
 * browse-table-body-norecords
 *      [ Optional ] The <tr> to show when no records are present. Default is the "no records" text.
 *
 * browse-table-footer
 *      [ Optional ] The table footer. By default that's just the pagination footer.
 *
 * browse-hidden-fields
 *      [ Optional ] Any additional hidden INPUTs to add to the form. By default this is empty.
 *      The default hidden fields (option, view, task, ordering fields, boxchecked and token) can
 *      not be removed.
 *
 * Do not override any other section. The overridden sections should be closed with -at-override instead of -at-stop.
 *//** @var  \FOF40\View\DataView\Html  $this */

$ajaxOrderingSupport = $this->hasAjaxOrderingSupport();
?>

<?php /* Allow tooltips, used in grid headers */ ?>
<?php if(version_compare(JVERSION, '3.999.999', 'le')): ?>
    <?php echo \Joomla\CMS\HTML\HTMLHelper::_('behavior.tooltip'); ?>
<?php endif; ?>
<?php /* Allow SHIFT+click to select multiple rows */ ?>
<?php echo \Joomla\CMS\HTML\HTMLHelper::_('behavior.multiselect'); ?>


<?php $this->startSection('browse-filters'); ?>
    <?php /* Filters above the table. */ ?>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-table-header'); ?>
    <?php /* Table header. Column headers and optional filters displayed above the column headers. */ ?>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-table-body-norecords'); ?>
    <?php /* Table body shown when no records are present. */ ?>
    <tr>
        <td colspan="99">
            <?php echo \Joomla\CMS\Language\Text::_($this->getContainer()->componentName . '_COMMON_NORECORDS'); ?>
        </td>
    </tr>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-table-body-withrecords'); ?>
    <?php /* Table body shown when records are present. */ ?>
	<?php $i = 0; ?>
    <?php foreach($this->items as $row): ?>
        <tr>
            <?php /* You need to implement me! */ ?>
        </tr>
    <?php endforeach; ?>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-table-footer'); ?>
    <?php /* Table footer. The default is showing the pagination footer. */ ?>
    <tr>
        <td colspan="99" class="center">
            <?php echo $this->pagination->getListFooter(); ?>

        </td>
    </tr>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-hidden-fields'); ?>
    <?php /* Put your additional hidden fields in this section */ ?>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-ordering-bar'); ?>
    <?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.browse.orderjs', $this->lists->order); ?>
    <?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.browse.orderheader', $this); ?>
<?php $this->stopSection(); ?>

<?php echo $this->yieldContent('browse-page-top'); ?>

<?php /* Administrator form for browse views */ ?>
<form action="index.php" method="post" name="adminForm" id="adminForm" class="akeeba-form">
    <?php /* Filters and ordering */ ?>
    <section class="akeeba-panel--33-66 akeeba-filter-bar-container">
        <div class="akeeba-filter-bar akeeba-filter-bar--left akeeba-form-section akeeba-form--inline">
            <?php echo $this->yieldContent('browse-filters'); ?>
        </div>
        <div class="akeeba-filter-bar akeeba-filter-bar--right">
            <?php echo $this->yieldContent('browse-ordering-bar'); ?>
        </div>
    </section>

    <table class="akeeba-table akeeba-table--striped--hborder--hover" id="itemsList">
        <thead>
        <?php echo $this->yieldContent('browse-table-header'); ?>
        </thead>
        <tfoot>
        <?php echo $this->yieldContent('browse-table-footer'); ?>
        </tfoot>
        <tbody
                <?php if(!is_null($ajaxOrderingSupport) && $ajaxOrderingSupport['saveOrder']): ?>
                class="js-draggable"
                data-url="<?php echo $ajaxOrderingSupport['saveOrderURL']; ?>"
                data-direction="<?php echo strtolower($this->getModel()->getState('filter_order_Dir', null, 'cmd')); ?>"
                data-nested="<?php echo ($this->getModel() instanceof \FOF40\Model\TreeModel) ? 'true' : 'false'; ?>"
                <?php endif; ?>
        >
        <?php if ( ! (count($this->items))): ?>
            <?php echo $this->yieldContent('browse-table-body-norecords'); ?>
        <?php else: ?>
            <?php echo $this->yieldContent('browse-table-body-withrecords'); ?>
        <?php endif; ?>
        </tbody>
    </table>

    <?php /* Hidden form fields */ ?>
    <div class="akeeba-hidden-fields-container">
        <?php $this->startSection('browse-default-hidden-fields'); ?>
            <input type="hidden" name="option" id="option" value="<?php echo $this->escape($this->getContainer()->componentName); ?>"/>
            <input type="hidden" name="view" id="view" value="<?php echo $this->escape($this->getName()); ?>"/>
            <input type="hidden" name="boxchecked" id="boxchecked" value="0"/>
            <input type="hidden" name="task" id="task" value="<?php echo $this->escape($this->getTask()); ?>"/>
            <input type="hidden" name="filter_order" id="filter_order" value="<?php echo $this->escape($this->lists->order); ?>"/>
            <input type="hidden" name="filter_order_Dir" id="filter_order_Dir" value="<?php echo $this->escape($this->lists->order_Dir); ?>"/>
            <input type="hidden" name="<?php echo $this->container->platform->getToken(true); ?>" value="1"/>
        <?php echo $this->yieldSection(); ?>
        <?php echo $this->yieldContent('browse-hidden-fields'); ?>
    </div>
</form>

<?php echo $this->yieldContent('browse-page-bottom'); ?>
