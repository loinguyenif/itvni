<?php /* /home/tekweb/public_html/administrator/components/com_admintools/tmpl/ConfigureWAF/logging.blade.php */ ?>
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
			for="emailphpexceptions"
			rel="akeeba-sticky-tooltip"
			data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_EMAILPHPEXCEPTIONS'); ?>"
			data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_EMAILPHPEXCEPTIONS_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_EMAILPHPEXCEPTIONS'); ?>
	</label>

	<input type="text" size="20" name="emailphpexceptions" id="emailphpexceptions"
		   value="<?php echo $this->escape($this->wafconfig['emailphpexceptions']); ?>">
</div>

<div class="akeeba-form-group">
	<label
			for="saveusersignupip"
			rel="akeeba-sticky-tooltip"
			data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_SAVEUSERSIGNUPIP'); ?>"
			data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_SAVEUSERSIGNUPIP_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_SAVEUSERSIGNUPIP'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'saveusersignupip', $this->wafconfig['saveusersignupip']); ?>
</div>

<div class="akeeba-form-group">
	<label for="logbreaches"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_LOGBREACHES'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_LOGBREACHES_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_LOGBREACHES'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'logbreaches', $this->wafconfig['logbreaches']); ?>
</div>

<div class="akeeba-form-group">
	<label for="logfile"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_CONFIGUREWAF_OPT_LOGFILE'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_CONFIGUREWAF_OPT_LOGFILE_TIP'); ?>"
	>
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_CONFIGUREWAF_OPT_LOGFILE'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'logfile', $this->wafconfig['logfile']); ?>
</div>

<div class="akeeba-form-group">
	<label for="iplookup"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_IPLOOKUP_LABEL'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_IPLOOKUP_DESC'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_IPLOOKUP_LABEL'); ?>
	</label>

	<div>
		<?php echo \Akeeba\AdminTools\Admin\Helper\Select::httpschemes('iplookupscheme', ['class' => 'input-small'], $this->wafconfig['iplookupscheme']); ?>


		<input type="text" size="50" name="iplookup" value="<?php echo $this->escape($this->wafconfig['iplookup']); ?>"
			   title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_IPLOOKUP_DESC'); ?>" />
	</div>
</div>

<div class="akeeba-form-group">
	<label for="emailbreaches"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_EMAILBREACHES'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_EMAILBREACHES_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_EMAILBREACHES'); ?>
	</label>

	<input type="text" size="20" name="emailbreaches" id="emailbreaches"
		   value="<?php echo $this->escape($this->wafconfig['emailbreaches']); ?>">
</div>

<div class="akeeba-form-group">
	<label for="emailonadminlogin"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_EMAILADMINLOGIN'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_EMAILADMINLOGIN_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_EMAILADMINLOGIN'); ?>
	</label>

	<input type="text" size="20" name="emailonadminlogin" id="emailonadminlogin"
		   value="<?php echo $this->escape($this->wafconfig['emailonadminlogin']); ?>">
</div>

<div class="akeeba-form-group">
	<label for="emailonfailedadminlogin"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_EMAILADMINFAILEDLOGIN'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_EMAILADMINFAILEDLOGIN_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_EMAILADMINFAILEDLOGIN'); ?>
	</label>

	<input type="text" size="20" name="emailonfailedadminlogin" id="emailonfailedadminlogin"
		   value="<?php echo $this->escape($this->wafconfig['emailonfailedadminlogin']); ?>">
</div>

<div class="akeeba-form-group">
	<label
			for="reasons_nolog"
			rel="akeeba-sticky-tooltip"
			data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_REASONS_NOLOG'); ?>"
			data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_REASONS_NOLOG_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_REASONS_NOLOG'); ?>
	</label>

	<?php echo \Akeeba\AdminTools\Admin\Helper\Select::reasons('reasons_nolog[]', $this->wafconfig['reasons_nolog'], [
			'class'     => 'advancedSelect input-large',
			'multiple'  => 'multiple',
			'size'      => 5,
			'hideEmpty' => true,
		]); ?>

</div>

<div class="akeeba-form-group">
	<label
			for="reasons_noemail"
			rel="akeeba-sticky-tooltip"
			data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_REASONS_NOEMAIL'); ?>"
			data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_REASONS_NOEMAIL_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_REASONS_NOEMAIL'); ?>
	</label>

	<?php echo \Akeeba\AdminTools\Admin\Helper\Select::reasons('reasons_noemail[]', $this->wafconfig['reasons_noemail'], [
			'class'     => 'advancedSelect input-large',
			'multiple'  => 'multiple',
			'size'      => 5,
			'hideEmpty' => true,
		]); ?>

</div>

<div class="akeeba-form-group">
	<label
			for="email_throttle"
			rel="akeeba-sticky-tooltip"
			data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_EMAILTHROTTLE'); ?>"
			data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_EMAILTHROTTLE_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_EMAILTHROTTLE'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'email_throttle', $this->wafconfig['email_throttle']); ?>
</div>
