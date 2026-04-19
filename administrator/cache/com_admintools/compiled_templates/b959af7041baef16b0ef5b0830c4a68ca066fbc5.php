<?php /* /home/tekweb/public_html/administrator/components/com_admintools/tmpl/SecurityExceptions/default.blade.php */ ?>
<?php
/**
 * @package   admintools
 * @copyright Copyright (c)2010-2022 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU General Public License version 3, or later
 */


defined('_JEXEC') || die;

/** @var $this \Akeeba\AdminTools\Admin\View\SecurityExceptions\Html */

?>


<?php $this->startSection('browse-page-top'); ?>
	<?php echo $this->loadAnyTemplate('admin:com_admintools/BlacklistedAddresses/toomanyips_warning'); ?>
	<?php echo $this->loadAnyTemplate('admin:com_admintools/ControlPanel/needsipworkarounds', [
		'returnurl' => base64_encode('index.php?option=com_admintools&view=SecurityExceptions'),
    ]); ?>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-filters'); ?>
	<div class="akeeba-filter-element akeeba-form-group akeeba-filter-joomlacalendarfix">
		<?php if(version_compare(JVERSION, '3.999.999', 'le')): ?>
			<?php echo \Joomla\CMS\HTML\HTMLHelper::_('calendar', $this->filters['from'], 'datefrom', 'datefrom', '%Y-%m-%d', ['class' => 'input-small']); ?>
		<?php else: ?>
			<input
					type="date"
					pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
					name="datefrom"
					id="datefrom"
					value="<?php echo $this->escape($this->filters['from']); ?>"
					placeholder="<?php echo \Joomla\CMS\Language\Text::_('COM_CONTACTUS_ITEMS_FIELD_CREATED_ON'); ?>"
			>
		<?php endif; ?>
	</div>

	<div class="akeeba-filter-element akeeba-form-group akeeba-filter-joomlacalendarfix">
		<?php if(version_compare(JVERSION, '3.999.999', 'le')): ?>
			<?php echo \Joomla\CMS\HTML\HTMLHelper::_('calendar', $this->filters['to'], 'dateto', 'dateto', '%Y-%m-%d', ['class' => 'input-small']); ?>
		<?php else: ?>
			<input
					type="date"
					pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
					name="dateto"
					id="dateto"
					value="<?php echo $this->escape($this->filters['to']); ?>"
					placeholder="<?php echo \Joomla\CMS\Language\Text::_('COM_CONTACTUS_ITEMS_FIELD_CREATED_ON'); ?>"
			>
		<?php endif; ?>
	</div>

	<div class="akeeba-filter-element akeeba-form-group">
		<?php echo \FOF40\Html\FEFHelper\BrowseView::searchFilter('ip', null, 'COM_ADMINTOOLS_LBL_SECURITYEXCEPTION_IP') ?>
	</div>

	<div class="akeeba-filter-element akeeba-form-group">
		<?php echo \Akeeba\AdminTools\Admin\Helper\Select::reasons('reason', $this->filters['reason'], ['onchange' => 'document.adminForm.submit()']); ?>

	</div>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-table-header'); ?>
	<tr>
		<th width="20px">
			<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.browse.checkall'); ?>
		</th>
		<th style="width:17%">
			<?php echo \FOF40\Html\FEFHelper\BrowseView::sortGrid('logdate', 'COM_ADMINTOOLS_LBL_SECURITYEXCEPTION_LOGDATE') ?>
		</th>
		<th style="width:15%">
			<?php echo \FOF40\Html\FEFHelper\BrowseView::sortGrid('ip', 'COM_ADMINTOOLS_LBL_SECURITYEXCEPTION_IP') ?>
		</th>
		<th style="width: 15%">
			<?php echo \FOF40\Html\FEFHelper\BrowseView::sortGrid('reason', 'COM_ADMINTOOLS_LBL_SECURITYEXCEPTION_REASON') ?>
		</th>
		<th>
			<?php echo \FOF40\Html\FEFHelper\BrowseView::sortGrid('url', 'COM_ADMINTOOLS_LBL_SECURITYEXCEPTION_URL') ?>
		</th>
	</tr>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-table-body-norecords'); ?>
	<?php /* Table body shown when no records are present. */ ?>
	<tr>
		<td colspan="99">
			<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_ERR_SECURITYEXCEPTION_NOITEMS'); ?>
		</td>
	</tr>
<?php $this->stopSection(); ?>

<?php $this->startSection('browse-table-body-withrecords'); ?>
	<?php
	$i = 0;
	$cparams = \Akeeba\AdminTools\Admin\Helper\Storage::getInstance();
	$iplink  = $cparams->getValue('iplookupscheme', 'http') . '://' . $cparams->getValue('iplookup', 'ip-lookup.net/index.php?ip={ip}');
	/** @var \Akeeba\AdminTools\Admin\Model\SecurityExceptions $row */
	?>
	<?php foreach($this->items as $row): ?>
	<tr>
		<td>
			<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.browse.id', ++$i, $row->getId()); ?>
		</td>
		<td>
			<?php echo \Akeeba\AdminTools\Admin\Helper\Html::localisedDate($row->logdate, 'Y-m-d H:i:s T', false); ?>

		</td>
		<td>
			<a href="<?php echo str_replace('{ip}', urlencode($row->ip), $iplink); ?>" target="_blank" class="akeeba-btn--small">
				<span class="akion-search"></span>
			</a>&nbsp;
			<?php if($row->block): ?>
				<a class="akeeba-btn--green--small"
				   href="index.php?option=com_admintools&view=SecurityExceptions&task=unban&id=<?php echo $row->id; ?>&<?php echo $this->container->platform->getToken(true); ?>=1"
				   title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_SECURITYEXCEPTION_UNBAN'); ?>">
					<span class="akion-minus"></span>
				</a>&nbsp;
			<?php else: ?>
				<a class="akeeba-btn--red--small"
				   href="index.php?option=com_admintools&view=SecurityExceptions&task=ban&id=<?php echo $row->id; ?>&<?php echo $this->container->platform->getToken(true); ?>=1"
				   title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_SECURITYEXCEPTION_BAN'); ?>">
					<span class="akion-flag"></span>
				</a>&nbsp;
			<?php endif; ?>
			<?php echo $this->escape($row->ip); ?>

		</td>
		<td>
			<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_SECURITYEXCEPTION_REASON_' . $row->reason); ?>
			<?php if($row->extradata): ?>
				<?php [$moreinfo, $techurl] = explode('|', $row->extradata . ((stristr($row->extradata, '|') === false) ? '|' : '')) ?>
				&nbsp;
				<?php echo \Joomla\CMS\HTML\HTMLHelper::_('tooltip', strip_tags(htmlspecialchars($moreinfo, ENT_COMPAT, 'UTF-8')), '', 'tooltip.png', '', $techurl); ?>
			<?php endif; ?>
		</td>
		<td>
			<?php echo $this->escape($row->url); ?>

		</td>
	</tr>
	<?php endforeach; ?>
<?php $this->stopSection(); ?>
<?php echo $this->loadAnyTemplate('any:lib_fof40/Common/browse'); ?>