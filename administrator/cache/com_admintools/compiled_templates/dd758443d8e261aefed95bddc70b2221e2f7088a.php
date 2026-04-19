<?php /* /home/tekweb/public_html/administrator/components/com_admintools/tmpl/IPAutoBanHistories/default.blade.php */ ?>
<?php
/**
 * @package   admintools
 * @copyright Copyright (c)2010-2022 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU General Public License version 3, or later
 */

/** @var $this \Akeeba\AdminTools\Admin\View\IPAutoBanHistories\Html */

defined('_JEXEC') || die;

?>


<?php $this->startSection('browse-page-top'); ?>
	<?php /* Let's check if the system plugin is correctly installed AND published */ ?>
	<?php echo $this->loadAnyTemplate('admin:com_admintools/ControlPanel/plugin_warning'); ?>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-filters'); ?>
	<div class="akeeba-filter-element akeeba-form-group">
		<?php echo \FOF40\Html\FEFHelper\BrowseView::searchFilter('ip', null, 'COM_ADMINTOOLS_LBL_AUTOBANNEDADDRESS_IP') ?>
	</div>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-table-header'); ?>
	<tr>
		<th width="32">
			<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.browse.checkall'); ?>
		</th>
		<th>
			<?php echo \FOF40\Html\FEFHelper\BrowseView::sortGrid('ip', 'COM_ADMINTOOLS_LBL_AUTOBANNEDADDRESS_IP') ?>
		</th>
		<th>
			<?php echo \FOF40\Html\FEFHelper\BrowseView::sortGrid('reason', 'COM_ADMINTOOLS_LBL_AUTOBANNEDADDRESS_REASON') ?>
		</th>
		<th>
			<?php echo \FOF40\Html\FEFHelper\BrowseView::sortGrid('until', 'COM_ADMINTOOLS_LBL_AUTOBANNEDADDRESS_UNTIL') ?>
		</th>
	</tr>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-table-body-withrecords'); ?>
	<?php
	$i = 0;
	/** @var \Akeeba\AdminTools\Admin\Model\IPAutoBanHistories $row */
	?>
	<?php foreach($this->items as $row): ?>
	<tr>
		<td>
			<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.browse.id', ++$i, $row->getId()); ?>
		</td>
		<td>
			<?php echo \Akeeba\AdminTools\Admin\Helper\Html::IpLookup($row->ip); ?>

		</td>
		<td>
			<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_SECURITYEXCEPTION_REASON_' . $row->reason); ?>
		</td>
		<td>
			<?php echo \Akeeba\AdminTools\Admin\Helper\Html::localisedDate($row->until, 'Y-m-d H:i:s T', false); ?>

		</td>
	</tr>
	<?php endforeach; ?>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-table-body-norecords'); ?>
	<?php /* Table body shown when no records are present. */ ?>
	<tr>
		<td colspan="99">
			<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_ERR_AUTOBANNEDADDRESS_NOITEMS'); ?>
		</td>
	</tr>
<?php $this->stopSection(); ?>

<?php echo $this->loadAnyTemplate('any:lib_fof40/Common/browse'); ?>