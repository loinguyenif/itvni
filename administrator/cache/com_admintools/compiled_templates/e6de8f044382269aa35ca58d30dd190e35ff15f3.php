<?php /* /home/tekweb/public_html/administrator/components/com_admintools/tmpl/BadWords/default.blade.php */ ?>
<?php
/**
 * @package   admintools
 * @copyright Copyright (c)2010-2022 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU General Public License version 3, or later
 */

defined('_JEXEC') || die;

/** @var \Akeeba\AdminTools\Admin\View\BadWords\Html $this */

?>


<?php $this->startSection('browse-page-top'); ?>
    <?php echo $this->loadAnyTemplate('admin:com_admintools/ControlPanel/plugin_warning'); ?>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-filters'); ?>
    <div class="akeeba-filter-element akeeba-form-group">
        <?php echo \FOF40\Html\FEFHelper\BrowseView::searchFilter('word', null, 'COM_ADMINTOOLS_LBL_BADWORD_WORD') ?>
    </div>
<?php $this->stopSection(); ?>


<?php $this->startSection('browse-table-header'); ?>
    <tr>
        <th width="32">
            <?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.browse.checkall'); ?>
        </th>
        <th>
            <?php echo \FOF40\Html\FEFHelper\BrowseView::sortGrid('word', 'COM_ADMINTOOLS_LBL_BADWORD_WORD') ?>
        </th>
    </tr>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-table-body-withrecords'); ?>
	<?php
	$i = 0;
	/** @var \Akeeba\AdminTools\Admin\Model\BadWords $row */
	?>
    <?php foreach($this->items as $row): ?>
    <tr>
        <td>
            <?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.browse.id', ++$i, $row->getId()); ?>
        </td>
        <td>
            <a href="index.php?option=com_admintools&view=BadWords&task=edit&id=<?php echo $row->getId(); ?>">
                <?php echo $this->escape($row->word); ?>

            </a>
        </td>
    </tr>
    <?php endforeach; ?>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-table-body-norecords'); ?>
    <?php /* Table body shown when no records are present. */ ?>
    <tr>
        <td colspan="99">
            <?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_ERR_BADWORD_NOITEMS'); ?>
        </td>
    </tr>
<?php $this->stopSection(); ?>
<?php echo $this->loadAnyTemplate('any:lib_fof40/Common/browse'); ?>