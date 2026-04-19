<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.10  |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		v1
* @package		Reminder
* @subpackage	Customers
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



/**
* HTML View class for the Reminder component
*
* @package	Reminder
* @subpackage	Customers
*/
class ReminderViewCustomers extends ReminderClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('default', 'modal');

	/**
	* Execute and display a template : Customers
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayDefault($tpl = null)
	{
		$this->model		= $model	= $this->getModel();
		$this->state		= $state	= $this->get('State');
		$this->params 		= JComponentHelper::getParams('com_reminder', true);
		$state->set('context', 'layout.default');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= ReminderHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('default.filters');
		$this->menu = ReminderHelper::addSubmenu('customers', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('REMINDER_LAYOUT_CUSTOMERS'));

		

		//Filters
		// Templete
		$modelTemplete_id = CkJModel::getInstance('templetes', 'ReminderModel');
		$modelTemplete_id->set('context', $model->get('context'));
		$filters['filter_templete_id']->jdomOptions = array(
			'list' => $modelTemplete_id->getItems()
		);
        
        // Package
		$modelPackage_id = CkJModel::getInstance('packages', 'ReminderModel');
		$modelPackage_id->set('context', $model->get('context'));
		$filters['filter_package_id']->jdomOptions = array(
			'list' => $modelPackage_id->getItems()
		);

		// Sort by
		$filters['sortTable']->jdomOptions = array(
			'list' => $this->getSortFields('default')
		);

		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar
		JToolBarHelper::title(JText::_('REMINDER_LAYOUT_CUSTOMERS'), 'list');

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('customer.add', "REMINDER_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('customer.edit', "REMINDER_JTOOLBAR_EDIT");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('REMINDER_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'customer.delete', "REMINDER_JTOOLBAR_DELETE");

		// Config
		if ($model->canAdmin())
			JToolBarHelper::preferences('com_reminder');

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('customers.publish', "REMINDER_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('customers.unpublish', "REMINDER_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('customers.trash', "REMINDER_JTOOLBAR_TRASH");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('customers.archive', "REMINDER_JTOOLBAR_ARCHIVE");
	}

	/**
	* Execute and display a template : Customers
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayModal($tpl = null)
	{
		$this->model		= $model	= $this->getModel();
		$this->state		= $state	= $this->get('State');
		$this->params 		= JComponentHelper::getParams('com_reminder', true);
		$state->set('context', 'layout.modal');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= ReminderHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('modal.filters');
		$this->menu = ReminderHelper::addSubmenu('customers', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('REMINDER_LAYOUT_CUSTOMERS'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar
		JToolBarHelper::title(JText::_('REMINDER_LAYOUT_CUSTOMERS'), 'list');


	}

	/**
	* Returns an array of fields the table can be sorted by.
	*
	* @access	protected
	* @param	string	$layout	The name of the called layout. Not used yet
	*
	*
	* @since	3.0
	*
	* @return	array	Array containing the field name to sort by as the key and display text as value.
	*/
	protected function getSortFields($layout = null)
	{
		return array(
			'domain' => JText::_('REMINDER_FIELD_DOMAIN'),
			'company_name' => JText::_('REMINDER_FIELD_COMPANY_NAME'),
			'creation_date' => JText::_('REMINDER_FIELD_CREATION_DATE'),
			'expiration_date' => JText::_('REMINDER_FIELD_EXPIRATION_DATE'),
			'' => JText::_('REMINDER_FIELD_ID')
		);
	}


}



