<?php /* /home/tekweb/public_html/administrator/components/com_admintools/tmpl/ConfigureWAF/projecthoneypot.blade.php */ ?>
<?php
/**
 * @package   admintools
 * @copyright Copyright (c)2010-2022 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU General Public License version 3, or later
 */

defined('_JEXEC') || die;

/** @var Akeeba\AdminTools\Admin\View\ConfigureWAF\Html $this */
?>
<div class="akeeba-form-group">
	<label
			for="httpblenable"
			rel="akeeba-sticky-tooltip"
			data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_HTTPBLENABLE'); ?>"
			data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_HTTPBLENABLE_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_HTTPBLENABLE'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'httpblenable', $this->wafconfig['httpblenable']); ?>
</div>

<div class="akeeba-form-group">
	<label for="bbhttpblkey"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_BBHTTPBLKEY'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_BBHTTPBLKEY_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_BBHTTPBLKEY'); ?>
	</label>

	<input type="text" size="45" name="bbhttpblkey" id="bbhttpblkey"
		   value="<?php echo $this->escape($this->wafconfig['bbhttpblkey']); ?>" />
</div>

<div class="akeeba-form-group">
	<label
			for="httpblthreshold"
			rel="akeeba-sticky-tooltip"
			data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_HTTPBLTHRESHOLD'); ?>"
			data-content="<?php echo str_replace('"', '&quot;', \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_HTTPBLTHRESHOLD_TIP')); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_HTTPBLTHRESHOLD'); ?>
	</label>

	<input type="text" size="5" name="httpblthreshold"
		   value="<?php echo $this->escape($this->wafconfig['httpblthreshold']); ?>" />
</div>

<div class="akeeba-form-group">
	<label
			for="httpblmaxage"
			rel="akeeba-sticky-tooltip"
			data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_HTTPBLMAXAGE'); ?>"
			data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_HTTPBLMAXAGE_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_HTTPBLMAXAGE'); ?>
	</label>

	<input type="text" size="5" name="httpblmaxage"
		   value="<?php echo $this->escape($this->wafconfig['httpblmaxage']); ?>" />
</div>

<div class="akeeba-form-group">
	<label
			for="httpblblocksuspicious"
			rel="akeeba-sticky-tooltip"
			data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_HTTPBLBLOCKSUSPICIOUS'); ?>"
			data-content="<?php echo str_replace('"', '&quot;', \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_HTTPBLBLOCKSUSPICIOUS_TIP')); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_HTTPBLBLOCKSUSPICIOUS'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'httpblblocksuspicious', $this->wafconfig['httpblblocksuspicious']); ?>
</div>
