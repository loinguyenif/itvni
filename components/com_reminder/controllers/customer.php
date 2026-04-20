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
* Reminder Customer Controller
*
* @package	Reminder
* @subpackage	Customer
*/
class ReminderControllerCustomer extends ReminderClassControllerItem
{
	/**
	* The context for storing internal data, e.g. record.
	*
	* @var string
	*/
	protected $context = 'customer';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'customer';

	/**
	* The URL view list variable.
	*
	* @var string
	*/
	protected $view_list = 'customers';

	/**
	* Constructor
	*
	* @access	public
	* @param	array	$config	An optional associative array of configuration settings.
	*
	* @return	void
	*/
	public function __construct($config = array())
	{
		parent::__construct($config);
		$app = JFactory::getApplication();

	}

	/**
	* Override method when the author allowed to delete own.
	*
	* @access	protected
	* @param	array	$data	An array of input data.
	* @param	string	$key	The name of the key for the primary key; default is id..
	*
	* @return	boolean	True on success
	*/
	protected function allowDelete($data = array(), $key = id)
	{
		return parent::allowDelete($data, $key, array(
		'key_author' => 'created_by'
		));
	}

	/**
	* Override method when the author allowed to edit own.
	*
	* @access	protected
	* @param	array	$data	An array of input data.
	* @param	string	$key	The name of the key for the primary key; default is id..
	*
	* @return	boolean	True on success
	*/
	protected function allowEdit($data = array(), $key = id)
	{
		return parent::allowEdit($data, $key, array(
		'key_author' => 'created_by'
		));
	}

	/**
	* Return the current layout.
	*
	* @access	protected
	* @param	bool	$default	If true, return the default layout.
	*
	* @return	string	Requested layout or default layout
	*/
	protected function getLayout($default = null)
	{
		if ($default)
			return '';

		$jinput = JFactory::getApplication()->input;
		return $jinput->get('layout', '', 'CMD');
	}

    
    public function cronJob($default = null){
        $config = JComponentHelper::getParams('com_reminder');
        $model = CkJModel::getInstance('Customers', 'ReminderModel');
		$customers = $model->getItems();
        
        //get params
		$params = array();
		$params['$today'] = JHtml::date('now', 'd/m/Y H:ia');
        

		//Send client email 
		foreach($customers as $row){
		    $params['$domain'] = $row->domain;     
		    $params['$company_name'] = $row->company_name;
            $params['$email'] = $row->email;
            $params['$address'] = $row->address;
            $params['$phone_no'] = $row->phone_no;
            $params['$package'] = $row->_package_id_name; 
            $params['$expiration_date'] = $row->expiration_date; 
            $price = ($row->package_id)?$row->_package_id_price:$row->price;  
            $params['$price'] = TSCustom::currencyFormat($price);    
			$model_templete = CkJModel::getInstance('Templete', 'ReminderModel');
		    $templete = $model_templete->getItem($row->templete_id);
			if ($templete) {
				$subject = TSCustom::replaceParams($templete->subject, $params);
				$body = TSCustom::replaceParams($templete->content, $params);
                TSCustom::sendMail($row->email, $subject, $body, $config->get('admin_email'));
			}
		}
        echo 'okay';		
	}
}



