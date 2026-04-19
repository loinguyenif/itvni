<?php /* /home/tekweb/public_html/administrator/components/com_admintools/tmpl/ConfigureWAF/cloaking.blade.php */ ?>
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
			for="custgenerator"
			rel="akeeba-sticky-tooltip"
			data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_CUSTGENERATOR'); ?>"
			data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_CUSTGENERATOR_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_CUSTGENERATOR'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'custgenerator', $this->wafconfig['custgenerator']); ?>
</div>
<div class="akeeba-form-group">
	<label for="generator"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_GENERATOR'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_GENERATOR_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_GENERATOR'); ?>
	</label>

	<input type="text" size="45" id="generator" name="generator" value="<?php echo $this->escape($this->wafconfig['generator']); ?>">
</div>

<div class="akeeba-form-group">
	<label for="tmpl"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_TMPL'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_TMPL_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_TMPL'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'tmpl', $this->wafconfig['tmpl']); ?>
</div>

<div class="akeeba-form-group">
	<label for="tmplwhitelist"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_TMPLWHITELIST'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_TMPLWHITELIST_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_TMPLWHITELIST'); ?>
	</label>

	<input type="text" size="45" name="tmplwhitelist" id="tmplwhitelist"
		   value="<?php echo $this->escape($this->wafconfig['tmplwhitelist']); ?>" />
</div>

<div class="akeeba-form-group">
	<label for="template"
		   rel="akeeba-sticky-tooltip"
		   data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_TEMPLATE'); ?>"
		   data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_TEMPLATE_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_TEMPLATE'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'template', $this->wafconfig['template']); ?>
</div>

<div class="akeeba-form-group">
	<label
			for="allowsitetemplate"
			rel="akeeba-sticky-tooltip"
			data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_ALLOWSITETEMPLATE'); ?>"
			data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_ALLOWSITETEMPLATE_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_ALLOWSITETEMPLATE'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', 'allowsitetemplate', $this->wafconfig['allowsitetemplate']); ?>
</div>

<div class="akeeba-form-group">
	<label
			for="404shield_enable"
			rel="akeeba-sticky-tooltip"
			data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_404SHIELD_ENABLE'); ?>"
			data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_404SHIELD_ENABLE_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_404SHIELD_ENABLE'); ?>
	</label>

	<?php echo \Joomla\CMS\HTML\HTMLHelper::_('FEFHelp.select.booleanswitch', '404shield_enable', $this->wafconfig['404shield_enable']); ?>
</div>


<div class="akeeba-form-group">
	<label
			for="404shield"
			rel="akeeba-sticky-tooltip"
			data-original-title="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_404SHIELD'); ?>"
			data-content="<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_404SHIELD_TIP'); ?>">
		<?php echo \Joomla\CMS\Language\Text::_('COM_ADMINTOOLS_LBL_CONFIGUREWAF_OPT_404SHIELD'); ?>
	</label>

	<textarea id="404shield" name="404shield"
			  rows="5"><?php echo $this->escape($this->wafconfig['404shield']); ?></textarea>
</div>
