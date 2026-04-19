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


// Some usefull constants
if(!defined('DS')) define('DS',DIRECTORY_SEPARATOR);
if(!defined('BR')) define("BR", "<br />");
if(!defined('LN')) define("LN", "\n");

// Main component aliases
if (!defined('COM_REMINDER')) define('COM_REMINDER', 'com_reminder');
if (!defined('REMINDER_CLASS')) define('REMINDER_CLASS', 'Reminder');

// Component paths constants
if (!defined('JPATH_ADMIN_REMINDER')) define('JPATH_ADMIN_REMINDER', JPATH_ADMINISTRATOR . '/components/' . COM_REMINDER);
if (!defined('JPATH_SITE_REMINDER')) define('JPATH_SITE_REMINDER', JPATH_SITE . '/components/' . COM_REMINDER);

$app = JFactory::getApplication();

// This constant is used for replacing JPATH_COMPONENT, in order to share code between components.
if (!defined('JPATH_REMINDER')) define('JPATH_REMINDER', ($app->isSite()?JPATH_SITE_REMINDER:JPATH_ADMIN_REMINDER));

// Load the component Dependencies
require_once(dirname(__FILE__) . '/helper.php');
require_once(dirname(__FILE__) . '/custom.php');

jimport('joomla.version');
$version = new JVersion();

if (version_compare($version->RELEASE, '3.0', '<'))
	throw new JException('Joomla! 3.x is required.');

// Proxy alias class : CONTROLLER
if (!class_exists('CkJController')){ 	jimport('legacy.controller.legacy'); 	class CkJController extends JControllerLegacy{}}

// Proxy alias class : MODEL
if (!class_exists('CkJModel')){			jimport('legacy.model.legacy');			class CkJModel extends JModelLegacy{}}

// Proxy alias class : VIEW
if (!class_exists('CkJView')){	if (!class_exists('JViewLegacy', false))	jimport('legacy.view.legacy'); class CkJView extends JViewLegacy{}}

require_once(dirname(__FILE__) . '/../classes/loader.php');

ReminderClassLoader::setup(false, false);
ReminderClassLoader::discover('Reminder', JPATH_ADMIN_REMINDER, false, true);

// Some helpers
ReminderClassLoader::register('JToolBarHelper', JPATH_ADMINISTRATOR ."/includes/toolbar.php", true);

CkJController::addModelPath(JPATH_REMINDER . '/models', 'ReminderModel');
// Register JDom
JLoader::register('JDom', JPATH_ADMIN_REMINDER . '/dom/dom.php', true);

//Instance JDom
if (!isset($app->dom))
{
	if (!class_exists('JDom'))
		jexit('JDom is required');

	JDom::getInstance();	
}

