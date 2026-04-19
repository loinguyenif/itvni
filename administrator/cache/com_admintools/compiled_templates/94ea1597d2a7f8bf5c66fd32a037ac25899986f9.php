<?php /* /home/tekweb/public_html/administrator/components/com_admintools/tmpl/ConfigureWAF/exceptions.blade.php */ ?>
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
			for="neverblockips"
			rel="akeeba-sticky-tooltip"
			data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_LBL_NEVERBLOCKIPS'); ?>"
			data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_LBL_NEVERBLOCKIPS_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_LBL_NEVERBLOCKIPS'); ?>
	</label>

	<input type="text" size="50" name="neverblockips" id="neverblockips"
		   value="<?php echo $this->escape($this->wafconfig['neverblockips']); ?>" />
</div>

<div class="akeeba-form-group">
	<label
			for="whitelist_domains"
			rel="akeeba-sticky-tooltip"
			data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_WHITELIST_DOMAINS'); ?>"
			data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_WHITELIST_DOMAINS_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_WHITELIST_DOMAINS'); ?>
	</label>

	<input type="text" name="whitelist_domains" id="whitelist_domains"
		   value="<?php echo $this->escape($this->wafconfig['whitelist_domains']); ?>">
</div>
