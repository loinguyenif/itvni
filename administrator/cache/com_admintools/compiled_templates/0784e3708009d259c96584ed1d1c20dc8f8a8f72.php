<?php /* /home/tekweb/public_html/administrator/components/com_admintools/tmpl/ConfigureWAF/requestfiltering.blade.php */ ?>
<?php
/**
 * @package   admintools
 * @copyright Copyright (c)2010-2022 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU General Public License version 3, or later
 */

/** @var Akeeba\AdminTools\Admin\View\ConfigureWAF\Html $this */

defined('_JEXEC') || die;

?>
<div class="akeeba-form-group">
	<label for="sqlishield"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_SQLISHIELD'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_SQLISHIELD_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_SQLISHIELD'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'sqlishield', $this->wafconfig['sqlishield']); ?>
</div>

<div class="akeeba-form-group">
	<label for="muashield"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_MUASHIELD'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_MUASHIELD_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_MUASHIELD'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'muashield', $this->wafconfig['muashield']); ?>
</div>

<div class="akeeba-form-group">
	<label for="rfishield"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_RFISHIELD'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_RFISHIELD_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_RFISHIELD'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'rfishield', $this->wafconfig['rfishield']); ?>
</div>

<div class="akeeba-form-group">
	<label for="phpshield"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_PHPSHIELD'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_PHPSHIELD_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_PHPSHIELD'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'phpshield', $this->wafconfig['phpshield']); ?>
</div>

<div class="akeeba-form-group">
	<label for="dfishield"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_DFISHIELD'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_DFISHIELD_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_DFISHIELD'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'dfishield', $this->wafconfig['dfishield']); ?>
</div>

<div class="akeeba-form-group">
	<label for="uploadshield"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_UPLOADSHIELD'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_UPLOADSHIELD_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_UPLOADSHIELD'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'uploadshield', $this->wafconfig['uploadshield']); ?>
</div>

<div class="akeeba-form-group">
	<label for="sessionshield"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_SESSIONSHIELD'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_SESSIONSHIELD_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_SESSIONSHIELD'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'sessionshield', $this->wafconfig['sessionshield']); ?>
</div>

<div class="akeeba-form-group">
	<label for="antispam"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_ANTISPAM'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::sprintf('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_ANTISPAM_TIP', 'index.php?option=com_admintools&view=BadWords'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_ANTISPAM'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'antispam', $this->wafconfig['antispam']); ?>
</div>

<div class="akeeba-form-group">
	<label for="tmpl"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_ALLOWED_DOMAINS'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_ALLOWED_DOMAINS_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_ALLOWED_DOMAINS'); ?>
	</label>

	<input type="text" size="45" name="allowed_domains" id="allowed_domains"
		   value="<?php echo $this->escape($this->wafconfig['allowed_domains']); ?>" />
</div>
