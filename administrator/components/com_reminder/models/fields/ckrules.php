<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.10  |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		v1
* @package		Reminder
* @subpackage	Reminder
* @copyright	
* @author		 -  - 
* @license		
*
*             .oooO  Oooo.
*             (   )  (   )
* -------------\ (----) /----------------------------------------------------------- +
*               \_)  (_/
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

if (!class_exists('ReminderHelper'))
	require_once(JPATH_ADMINISTRATOR . '/components/com_reminder/helpers/loader.php');


/**
* Form field for Reminder.
*
* @package	Reminder
* @subpackage	Form
*/
class JFormFieldCkrules extends ReminderClassFormField
{
	/**
	* The form field type.
	*
	* @var string
	*/
	public $type = 'ckrules';

	/**
	* Method to get the field input markup.
	*
	* @access	public
	*
	*
	* @since	11.1
	*
	* @return	string	The field input markup.
	*/
	public function getInput()
	{

		$this->input = JDom::_('html.form.input.text', array_merge(array(
				'dataKey' => $this->getOption('name'),
				'domClass' => $this->getOption('class'),
				'domId' => $this->id,
				'domName' => $this->name,
				'dataValue' => $this->value,
				'prefix' => $this->getOption('prefix'),
				'responsive' => $this->getOption('responsive'),
				'suffix' => $this->getOption('suffix')
			), $this->jdomOptions));

		return parent::getInput();
	}


}



