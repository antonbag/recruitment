<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.5   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		
* @package		Recruitment
* @subpackage	Recruitment
* @copyright	
* @author		Albert Moreno -  - 
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
if (!defined('COM_RECRUITMENT')) define('COM_RECRUITMENT', 'com_recruitment');
if (!defined('RECRUITMENT_CLASS')) define('RECRUITMENT_CLASS', 'Recruitment');

// Component paths constants
if (!defined('JPATH_ADMIN_RECRUITMENT')) define('JPATH_ADMIN_RECRUITMENT', JPATH_ADMINISTRATOR . '/components/' . COM_RECRUITMENT);
if (!defined('JPATH_SITE_RECRUITMENT')) define('JPATH_SITE_RECRUITMENT', JPATH_SITE . '/components/' . COM_RECRUITMENT);

$app = JFactory::getApplication();

// This constant is used for replacing JPATH_COMPONENT, in order to share code between components.
if (!defined('JPATH_RECRUITMENT')) define('JPATH_RECRUITMENT', ($app->isClient('site')?JPATH_SITE_RECRUITMENT:JPATH_ADMIN_RECRUITMENT));

// Load the component Dependencies
require_once(dirname(__FILE__) . '/helper.php');


jimport('joomla.version');
$version = new JVersion();



// Proxy alias class : CONTROLLER
if (!class_exists('CkJController')){ 	jimport('legacy.controller.legacy'); 	class CkJController extends JControllerLegacy{}}

// Proxy alias class : MODEL
if (!class_exists('CkJModel')){			jimport('legacy.model.legacy');			class CkJModel extends JModelLegacy{}}

// Proxy alias class : VIEW
if (!class_exists('CkJView')){	if (!class_exists('JViewLegacy', false))	jimport('legacy.view.legacy'); class CkJView extends JViewLegacy{}}

require_once(dirname(__FILE__) . '/../classes/loader.php');

RecruitmentClassLoader::setup(false, false);
RecruitmentClassLoader::discover('Recruitment', JPATH_ADMIN_RECRUITMENT, false, true);

// Some helpers
RecruitmentClassLoader::register('JToolBarHelper', JPATH_ADMINISTRATOR ."/includes/toolbar.php", true);

CkJController::addModelPath(JPATH_RECRUITMENT . '/models', 'RecruitmentModel');

/*
//Instance JDom
if (!isset($app->dom))
{
	jimport('jdom.dom');
	if (!class_exists('JDom'))
		jexit('JDom plugin is required');

	JDom::getInstance();	
}

*/
